<?php

class Items_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('login_model');
		$this->load->library('encryption');
		$this->encryption->initialize(array(
			'driver' => 'openssl',
			'cipher' => 'aes-256',
			'mode'   => 'ctr',
			'key'    => '79576e30adf336fe9de3e509d039aa07b2c6ca888ff1a4b489c1ba1267cf6e7c'
		));
	}

	public function get_items_fields() {
		return $this->db->list_fields('app_items');
	}
      
	public function get_items() {
		//echo bin2hex($this->encryption->create_key(32));

		if ($this->input->post('title') != '') {
			$this->db->like('title', $this->input->post('title'));
		}
		/*
		if ($page != false && $num_per_page != false) {
			$this->db->limit($num_per_page, $num_per_page * ($page-1) );
		}
		*/
		$data = $this->db->order_by('title')
			->where('registry_id', $this->session->userdata('registry_id'))
			->get('app_items')
			->result_array();

		$result = array();

		foreach ($data as $key => $value) {
			$result[] = array(
				'id'            => $value['id'],
				'title'         => $value['title'],
				'username'      => $this->encryption->decrypt($value['username']),
				'password'      => $this->encryption->decrypt($value['password']),
				'url'           => $value['url'],
				'note'          => $this->encryption->decrypt($value['note']),
				'creation_date' => $value['creation_date'],
				'edit_date'     => $value['edit_date'],
			);
		}

		return $result;
	}

	public function get_items_rows() {
		if ($this->input->post('title') != '') {
			$this->db->like('title', $this->input->post('title'));
		}
		return $this->db->from('app_items')
			->count_all_results();
	}	

	public function get_item($id) {	
		return $this->db->where('id', $id)
			->get('app_items')
			->row_array();
	}
	public function delete_item($id) {
		$this->db->where('id', $id)
			->delete('app_items');
	}

	public function insert_item() {	
		$data = array(
			'title'         => trim($this->input->post("title")),
			'url'           => trim($this->input->post("url")),
			'username'      => $this->encryption->encrypt($this->input->post("username")),
			'password'      => $this->encryption->encrypt($this->input->post("password")),
			'note'          => $this->encryption->encrypt($this->input->post("note")),
			'creation_date' => sql_datetime(date('Y-m-d H:i:s')),
			'edit_date'     => sql_datetime(date('Y-m-d H:i:s')),
			'registry_id'   => $this->session->userdata('registry_id'),
		);
		return $this->db->insert('app_items',$data);
	}

	public function update_item($id) {
		$data = array(
			'title'     => trim($this->input->post("title")),
			'url'       => trim($this->input->post("url")),
			'username'  => $this->encryption->encrypt($this->input->post("username")),
			'password'  => $this->encryption->encrypt($this->input->post("password")),
			'note'      => $this->encryption->encrypt($this->input->post("note")),
			'edit_date' => sql_datetime(date('Y-m-d H:i:s')),
		);

		$this->db->where('id', $id)
			->update('app_items', $data);
	}

	public function import_item($raw) {
		$data = array(
			'title'         => trim($raw['title']),
			'url'           => trim( $raw['url']),
			'username'      => $this->encryption->encrypt($raw['username']),
			'password'      => $this->encryption->encrypt($raw['password']),
			'note'          => $this->encryption->encrypt($raw['note']),
			'creation_date' => sql_datetime(date('Y-m-d H:i:s')),
			'edit_date'     => sql_datetime(date('Y-m-d H:i:s')),
		);
		return $this->db->insert('app_items',$data);
	}

}