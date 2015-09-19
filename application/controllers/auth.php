<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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

	public function cek_login()
	{
		$this->load->model('login_model');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->login_model->cek_user($username, $password);

		$akun = $this->session->userdata('akun');
		
		if($akun['level'] == 1)
		{
			redirect(base_url().'index.php/admin/datasiswa');
		}
		else if($akun['level'] == 2)
		{
			redirect(base_url().'index.php/home/datasiswa');
		}
		else
		{
			$data['error'] = "Password dan Username Salah";
			$this->load->view('login', $data);
		}
	}

	public function logout()
	{
		$this->session->unset_userdata(array('username'=>'','login'=>FALSE));
    	$this->session->sess_destroy();
    	$this->load->view('login');
	}
	
	
}