<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct() {
		parent::__construct();

	}

	public function insert_user()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');

		$datauser = array('username' => $username,
			'password' => $password,
			'level' => $level
			);

		$this->db->insert('user', $datauser);

		$this->session->set_flashdata('insert', 'Insert Berhasil');
		redirect(base_url().'Admin/user');

	}

	public function update_user()
	{
		$this->load->model('Login_model');

		$dataUser = array (
		'iduser' => $this->input->post('iduser'),
		'username' => $this->input->post('username'),
		'level' => $this->input->post('level')
		);
		$this->Login_model->edit_user($dataUser);
	}


}
