<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('login_model');

		//$this->output->enable_profiler(TRUE);
    }

	public function index() {
    	if ($this->login_model->check_login()) redirect(base_url('items/list'));
		redirect(base_url("login/access"),'location');
	}

    public function access() {
    	$this->form_validation->set_message('required', 'Il campo {field} &egrave; obbligatorio');

		$this->form_validation->set_rules('username', 'Utente', 'required');  
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if( $this->form_validation->run() ) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user_id = $this->login_model->login($username, $password);
			if( $user_id == true ) {
				redirect(base_url('items/list')); 
			} else {  
				$this->session->set_flashdata('error', 'Utente o Password errati');
				redirect(base_url('login/access'));
			}
		} else {
			$this->load->view('login');
		}  
	}

	public function logout() {
		$this->login_model->logout();
		$this->session->set_flashdata('error', 'Logout effettuato con successo');
		redirect(base_url("login/access"),'location');

	}
}
