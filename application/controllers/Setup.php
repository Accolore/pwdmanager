<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('common');
		$this->load->model('items_model');
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->library('form_validation');

		date_default_timezone_set('Europe/Rome');

		//$this->output->enable_profiler(TRUE);
	}
	
	public function index() {
		echo "test";
		//redirect("items_list",'location');
	}

	public function list($page = 1) {
		$this->login_model->check_login();

		//configurazione paginazione
		/*
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url('items/list/');
		$config['total_rows'] = $this->items_model->get_items_rows();
		$config['per_page'] = 10;
		$config['use_page_numbers'] = true;
		$config['display_pages'] = false;
		//$config['first_link'] = false;
		//$config['last_link'] = false;
		//$config['prev_link'] = true;
		//$config['next_link'] = true;
		$config['next_tag_open'] = '<div class="pagination-next">';
		$config['next_tag_close'] = '</div>';
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';

		//$config['num_links'] = $config['total_rows'];
		$this->pagination->initialize($config);//caricamento paginazione

		$data['items'] = $this->items_model->get_items($page, $config['per_page']);
		*/
		$data['items'] = $this->items_model->get_items();


		$this->load->view('header');
		$this->load->view('items_list', $data);
		$this->load->view('footer');
	}

	public function delete($id) { 
		$this->login_model->check_login();

		$this->items_model->delete_item($id);
		redirect("items/list",'location');
	}

	public function edit($eid = false) {
		$this->login_model->check_login();

		if ($eid == false) {
			$id = false;
			$data['title'] = "Aggiungi";
			$data['item'] = array(
				'title'       => '',
				'description' => '',
				'url'         => '',
				'username'    => '',
				'password'    => '',
			);
		} else {
			//$id = $this->encrypt->decode($eid);
			$id = $eid;
			$data['title'] = "Modifica";
			$data['item'] = $this->items_model->get_item($id);
		}

		$data['id'] = $id;

		$this->form_validation->set_message('required', 'Il campo {field} &egrave; obbligatorio');

		$this->form_validation->set_rules('title', 'Titolo', 'required');  
		
		if( $this->form_validation->run() ) {
			if ($id == false) {
				$this->items_model->insert_item();
			} else {
				$this->items_model->update_item($id);
			}
		}
		redirect("items/list",'location');
	}

	public function export() {
		$this->login_model->check_login();

		$data['fields']    = $this->items_model->get_items_fields();
		$data['items']     = $this->items_model->get_items();
		$data['delimiter'] = ';';
		$data['new_line']  = '<br/>';

		$this->load->view('items_export', $data);
	} 

	public function import() {
		$this->login_model->check_login();
		
		$csv = $this->csv_to_array('dati.csv', ';');
		foreach ($csv as $key => $value) {
			//if ($key > 1) return;
			$this->items_model->import_item($value);
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