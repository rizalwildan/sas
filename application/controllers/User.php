<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();

	}

	public function insert_user()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$pas_enkrip = md5($password);

		$datauser = array('username' => $username,
			'password' => $pas_enkrip,
			'idlevel' => $level
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
		'idlevel' => $this->input->post('level')
		);
		$this->Login_model->edit_user($dataUser);
	}


}
