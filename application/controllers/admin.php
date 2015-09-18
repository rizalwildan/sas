<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	
	public function index()
	{
		$akun = $this->session->userdata('akun');
		if($akun['login'] == TRUE)
		{
			redirect(base_url(). 'index.php/admin/datasiswa');
		}
		else
		{
		$this->load->view('login');
		}
	}

	public function datasiswa()
	{
		$akun = $this->session->userdata('akun');
		if($akun['login'] == FALSE)
		{
			redirect(base_url(). 'index.php/admin/index');
		}
		else
		{
		$this->load->model('siswa_model');
		$this->load->model('kelas_model');
		$data['kelas'] = $this->kelas_model->getData();
		$data['siswa'] = $this->siswa_model->tampilSiswaall();
		$data['ceksmt'] = $this->siswa_model->cekSmester();
		$this->load->view('template/header');
		$this->load->view('template/sidebar2');
		$this->load->view('data', $data);
		$this->load->view('template/footer');
		}
	}

		public function transaksi()
	{
		$akun = $this->session->userdata('akun');
		if($akun['login'] == FALSE)
		{
			redirect(base_url(). 'index.php/admin/index');
		}
		else
		{
		$this->load->view('template/header');
		$this->load->view('template/sidebar2');
		$this->load->view('transaksi');
		$this->load->view('template/footer');
		}
	}

			public function komponenDetail()
	{
		$akun = $this->session->userdata('akun');
		if($akun['login'] == FALSE)
		{
			redirect(base_url(). 'index.php/admin/index');
		}
		else 
		{
		$this->load->view('template/header');
		$this->load->view('template/sidebar2');
		$this->load->view('komponen');
		$this->load->view('template/footer');
		}
	}

	public function kelas()
	{
		$akun = $this->session->userdata('akun');
		if($akun['login'] == FALSE)
		{
			redirect(base_url(). 'index.php/admin/index');
		}
		else
		{
		$data['p'] = $this->kelas_model->getData();

		$this->load->view('template/header');
		$this->load->view('template/sidebar2');
		$this->load->view('datkelas', $data);
		$this->load->view('template/footer');
		}
	}

	public function detailkelas()
	{
		$akun = $this->session->userdata('akun');
		if($akun['login'] == FALSE)
		{
			redirect(base_url(). 'index.php/admin/index');
		}
		else
		{
		$this->load->model('kelas_model');
		$this->load->model('siswa_model');
		$data['tsk'] = $this->kelas_model->tampil_siswa_kelas();
		$data['kelas'] = $this->kelas_model->getData();
		$data['cek'] = $this->siswa_model->cekSmester();
		$this->load->view('template/header');
		$this->load->view('template/sidebar2');
		$this->load->view('detailkelas', $data);
		$this->load->view('template/footer');
		}
	}
}
