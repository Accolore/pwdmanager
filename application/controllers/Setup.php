<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('common');
		$this->load->library('session');
		$this->load->model('setup_model');
		$this->load->model('login_model');
		//$this->load->library('form_validation');

		date_default_timezone_set('Europe/Rome');

		//$this->output->enable_profiler(TRUE);
	}
	
	public function index() {
	}

	public function user_create() {
		$this->login_model->check_login();

		$this->load->view('setup/user_create');
	}

	public function export() {
		$this->login_model->check_login();

		$data['fields']    = $this->setup_model->get_items_fields();
		$data['items']     = $this->setup_model->get_items();
		$data['delimiter'] = ';';
		$data['new_line']  = '<br/>';

		$this->load->view('items_export', $data);
	} 

	public function import() {
		$this->login_model->check_login();
		
		$csv = $this->csv_to_array('dati.csv', ';');
		foreach ($csv as $key => $value) {
			//if ($key > 1) return;
			$this->setup_model->import_item($value);
		}
	}

	/**
	* @link http://gist.github.com/385876
	*/
	private function csv_to_array($filename='', $delimiter=',') {
		if(!file_exists($filename) || !is_readable($filename))
			return FALSE;

		$header = NULL;
		$data = array();
		if (($handle = fopen($filename, 'r')) !== FALSE) {
			while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
				if(!$header) {
					// pulisco eventuali caratteri speciali
					$header = $this->clean_array($row);
				} else {
					$data[] = array_combine($header, $row);
				}
			}
			fclose($handle);
		}
		return $data;
	}

	private function clean_array($arr) {
		$cols = count($arr);
		for($i = 0; $i < $cols; $i++) {
			$result[$i] = preg_replace("/[^\w\d]/","",$arr[$i]);
		}
		return $result;
	}
}