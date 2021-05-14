<?php
class Setup_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}



	public function set_user() {
		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
		);
		
		$this->db->insert('app_users', $data);
	}

}