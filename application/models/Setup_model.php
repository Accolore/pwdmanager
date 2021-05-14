<?php
class Setup_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function check_db() {
		if ($this->db->query("SHOW TABLES LIKE 'app_items';")->row_array() != NULL && $this->db->query("SHOW TABLES LIKE 'app_users';")->row_array() != NULL) redirect("login/access",'location');
	}

	public function set_password() {
		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
		);
		
		$this->db->insert('app_users', $data);
	}

	public function create_db_tables() {
		$this->load->dbforge();

		$this->dbforge->create_table('app_items');

		$fields = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			),
			'blog_title' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
			),
			'blog_author' => array(
					'type' =>'VARCHAR',
					'constraint' => '100',
					'default' => 'King of Town',
			),
			'blog_description' => array(
					'type' => 'TEXT',
					'null' => TRUE,
			),
		);
		$this->dbforge->add_field($fields);

		$sql = "CREATE TABLE IF NOT EXISTS `app_items` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`title` varchar(50) DEFAULT NULL,
			`username` varbinary(512) DEFAULT NULL,
			`password` varbinary(512) DEFAULT NULL,
			`url` varchar(512) DEFAULT NULL,
			`note` blob,
			`creation_date` datetime DEFAULT CURRENT_TIMESTAMP,
			`edit_date` datetime DEFAULT CURRENT_TIMESTAMP,
			`registry_id` tinyint(4) DEFAULT NULL,
			PRIMARY KEY (`id`)
		  ) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8mb4;
		  
		  CREATE TABLE IF NOT EXISTS `app_users` (
			`id` int(11) NOT NULL,
			`username` varchar(50) CHARACTER SET utf8 NOT NULL,
			`password` varchar(512) CHARACTER SET utf8 NOT NULL,
			`registry_id` tinyint(4) NOT NULL DEFAULT '0',
			PRIMARY KEY (`id`)
		  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

		$this->db->query($sql);
	}
}