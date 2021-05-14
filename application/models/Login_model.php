<?php
class Login_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function check_db() {
		if ($this->db->query("SHOW TABLES LIKE 'app_items';")->row_array() == NULL || $this->db->query("SHOW TABLES LIKE 'app_users';")->row_array() == NULL) redirect(base_url('login/db_error'));
	}

	public function login( $username, $password ) {
		//$this->set_pwd($username, $password);
		$query = $this->db->select('id, registry_id')
			->where('username', $username)
			->where('password', md5($password))
			->get('app_users');

		if($query->num_rows() > 0) {
			$result = $query->row_array();

			$this->session->set_userdata('user_id', $result['id']); 
			$this->session->set_userdata('registry_id', $result['registry_id']);

			return true;
		} else {
			return false;
		}
	}

	public function logout() {
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('registry_id');
		return true;
	}

	public function set_pwd($username, $password) {
		$this->db->set('password', md5($password))
			->where('username' , $username)
			->update('app_users');
	}

	public function check_login() {
		if ($this->session->userdata('user_id') != NULL) return true;

		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('registry_id');
		//$this->session->set_flashdata('error', 'Accesso non autorizzato. Effettuare nuovamente il login');
		//redirect(base_url("login/access"),'location');
		redirect(base_url('login/access'));
	}
}