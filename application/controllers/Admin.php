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
			redirect(base_url(). 'Admin/datasiswa');
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
			redirect(base_url(). 'Admin/index');
		}
		else
		{
		$this->load->model('Siswa_model');
		$this->load->model('Kelas_model');
		$data['kelas'] = $this->Kelas_model->getData();
		$data['siswa'] = $this->Siswa_model->tampilSiswaall();
		$data['ceksmt'] = $this->Siswa_model->cekSmester();
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
			redirect(base_url(). 'Admin/index');
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
			redirect(base_url(). 'Admin/index');
		}
		else
		{
		$this->load->model('Transaksi_model');
		$data['komponen'] = $this->Transaksi_model->getKomponen();
		$this->load->view('template/header');
		$this->load->view('template/sidebar2');
		$this->load->view('komponen', $data);
		$this->load->view('template/footer');
		}
	}

	public function kelas()
	{
		$akun = $this->session->userdata('akun');
		if($akun['login'] == FALSE)
		{
			redirect(base_url(). 'Admin/index');
		}
		else
		{
		$this->load->model('Kelas_model');
		$data['p'] = $this->Kelas_model->getData();

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
			redirect(base_url(). 'Admin/index');
		}
		else
		{
		$this->load->model('Kelas_model');
		$this->load->model('Siswa_model');
		$data['error'] = $this->session->flashdata('error');
		$data['tsk'] = $this->Kelas_model->tampil_siswa_kelas();
		$data['kelas'] = $this->Kelas_model->getData();
		$data['cek'] = $this->Siswa_model->cekSmester();
		$this->load->view('template/header');
		$this->load->view('template/sidebar2');
		$this->load->view('detailkelas', $data);
		$this->load->view('template/footer');
		}
	}

	public function user()
	{
		$akun = $this->session->userdata('akun');
		if ($akun['login'] == FALSE)
		{
			redirect(base_url(). 'Admin/index');
		}
		else
		{
			$this->load->model('Login_model');
			$data['user'] = $this->Login_model->tampil_user();
			$this->load->view('template/header');
			$this->load->view('template/sidebar2');
			$this->load->view('datauser', $data);
			$this->load->view('template/footer');
		}
	}


	public function settingkomponen()
	{
		$this->load->model('Kelas_model');
		$this->load->model('Transaksi_model');
		$this->load->model('Siswa_model');
		//$data['kelas'] = $this->Kelas_model->getData();
		$data['jenisKelas'] = $this->Kelas_model->jenis_kelas();
		$data['komponen']=$this->Transaksi_model->getKomponen();
		$data['cek']=$this->Siswa_model->cekSmester();
		$this->load->view('template/header');
		$this->load->view('template/sidebar2');
		$this->load->view('settingkomponen', $data);
		$this->load->view('template/footer');
	}

	public function dataSmester()
	{
		$akun = $this->session->userdata('akun');
		if ($akun['login'] == FALSE)
		{
			redirect(base_url().'Admin/index');
		}
		else
		{
			$this->load->model('Siswa_model');
			$data['smt'] = $this->Siswa_model->cekSmester();
			$data['error'] = $this->session->flashdata('error');
			$this->load->view('template/header');
			$this->load->view('template/sidebar2');
			$this->load->view('smester', $data);
			$this->load->view('template/footer');
		}
	}

	public function setting_komponen()
	{
		$akun = $this->session->userdata('akun');
		if ($akun['login'] == FALSE)
		{
			redirect(base_url().'Admin/index');
		}
		else
		{
			$data['error'] = $this->session->flashdata('error');
			$this->load->view('template/header');
			$this->load->view('template/sidebar2');
			$this->load->view('kelaskomponen', $data);
			$this->load->view('template/footer');
		}
	}
}
