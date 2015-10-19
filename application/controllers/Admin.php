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

	public function __construct()
		{
			parent::__construct();

			// load library
			$this->load->library('Pdf');

			// load all model used
			$this->load->model('Siswa_model');
			$this->load->model('Kelas_model');
			$this->load->model('Transaksi_model');
			$this->load->model('Login_model');
		}


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

	public function datasiswa($page = 0)
	{
		$akun = $this->session->userdata('akun');
		if($akun['login'] == FALSE)
		{
			redirect(base_url(). 'Admin/index');
		}
		else
		{
		$data['kelas'] = $this->Kelas_model->getData();
		$data['siswa'] = $this->Siswa_model->tampilSiswaall();
		$data['ceksmt'] = $this->Siswa_model->cekSmester();
		//Form Validation
		$data['error'] = $this->session->flashdata('error');
		//Pesan upload error
		$data['upload_error'] = $this->session->flashdata('upload_error');
		//pesan Import Suksess
		$data['import'] = $this->session->flashdata('import');
		//panggil pagination
		$this->load->view('template/header');
		$this->load->view('template/sidebar2');
		$this->load->view('data', $data);
		$this->load->view('template/footer');
		}
	}

// functions modul transaksi spp

		public function transaksi()
	{
		$akun = $this->session->userdata('akun');
		if($akun['login'] == FALSE)
		{
			redirect(base_url(). 'Admin/index');
		}
		else
		{

		$datakelas = $this->Transaksi_model->getAllKelas();
		foreach ($datakelas as $key) {
			$kelas['kelas'][0] = "-Pilih kelas-";
			$kelas['kelas'][$key['namakelas']] = $key['namakelas'];

		}

		$data['kelas'] = $kelas;
		$data['tahunajaran'] = $this->Transaksi_model->getTahunAjaranSekarang();
		$data['siswa'] = $this->Transaksi_model->getAllSiswa();

		$this->load->view('template/header');
		$this->load->view('template/sidebar2');
		$this->load->view('transaksi',$data);
		$this->load->view('template/footer');
		}
	}
		public function bayar()
	{

		$nim = $this->input->post('nim');
		$kelas = $this->input->post('jenis');
		$tahun = $this->input->post('tahun');
		$bulan = $this->input->post('bulan');

		$data['siswa'] = $this->Transaksi_model->getSiswaByNim($nim);
		$data['komponen'] = $this->Transaksi_model->getKomponenByBulan($bulan,$tahun,$kelas);

		// print_r($data['komponen']);
		// die();

		$this->load->view('template/header');
		$this->load->view('template/sidebar2');
		$this->load->view('nota',$data);
		$this->load->view('template/footer');
	}

		public function filterkelas()
	{

			$namakelas = $this->input->post('namakelas');
			$data['siswa'] = $this->Transaksi_model->getSiswaByKelas($namakelas);
			// $siswa = $this->Transaksi_model->getSiswaByKelas($namakelas);
			if($data['siswa']=="kosong"){
				echo '<div class="alert alert-danger alert-dismissible" role="alert">
          				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          				Tidak ada siswa !
        			  </div>'	;
			}else{
				$this->load->view('siswaperkelas',$data);
			}

	}

	public function submitPayment()
	{

		$nim = $this->input->post('nim');
		$kelas = $this->input->post('kelas');
		$tahun = $this->input->post('tahun');
		$bulan = $this->input->post('bulan');

		$data['siswa'] = $this->Transaksi_model->getSiswaByNim($nim);
		$data['komponen'] = $this->Transaksi_model->getKomponenByBulan($bulan,$tahun,$kelas);
		$data['totalpembayaran'] = $this->input->post('totalpembayaran');
		$data['danabos'] = $this->input->post('danabos');
		$data['bulanpembayaran'] = $this->input->post('bulanpembayaran');

		// tulis ke database
		$this->load->view('printpreview2',$data);

		// Print and print preview
		/**
		$HTML = $this->load->view('printpreview2',$data,true);
		$filename = $nim.'_NOTA_'.$bulan.'_'.$tahun;
		$this->pdf->pdf_create($HTML,$filename,'A4','potrait');
		**/
	}

// end functions modul transaksi spp

			public function komponenDetail()
	{
		$akun = $this->session->userdata('akun');
		if($akun['login'] == FALSE)
		{
			redirect(base_url(). 'Admin/index');
		}
		else
		{

		$data['komponen'] = $this->Transaksi_model->getKomponen();
		$data['error'] = $this->session->flashdata('error');
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

			//Config Paggination
		$config["base_url"] = base_url()."Admin/kelas";
		$config["total_rows"] = $this->Kelas_model->count_data();
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;

		//config for bootstrap pagination class integration
			 $config['full_tag_open'] = '<ul class="pagination">';
			 $config['full_tag_close'] = '</ul>';
			 $config['first_link'] = false;
			 $config['last_link'] = false;
			 $config['first_tag_open'] = '<li>';
			 $config['first_tag_close'] = '</li>';
			 $config['prev_link'] = 'Previous';
			 $config['prev_tag_open'] = '<li class="paginate_button provious">';
			 $config['prev_tag_close'] = '</li>';
			 $config['next_link'] = 'Next';
			 $config['next_tag_open'] = '<li class="paginate_button next">';
			 $config['next_tag_close'] = '</li>';
			 $config['last_tag_open'] = '<li>';
			 $config['last_tag_close'] = '</li>';
			 $config['cur_tag_open'] = '<li class="active"><a href="#">';
			 $config['cur_tag_close'] = '</a></li>';
			 $config['num_tag_open'] = '<li>';
			 $config['num_tag_close'] = '</li>';


		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['p'] = $this->db->get("kelas", $config["per_page"], $page);
		$data['paging'] = $this->pagination->create_links();
		$data['error'] = $this->session->flashdata('error');
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

		$data['error'] = $this->session->flashdata('error');
		$data['insert'] = $this->session->flashdata('insert');
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

			$data['user'] = $this->Login_model->tampil_user();
			$this->load->view('template/header');
			$this->load->view('template/sidebar2');
			$this->load->view('datauser', $data);
			$this->load->view('template/footer');
		}
	}


	public function settingkomponen()
	{

		//$data['kelas'] = $this->Kelas_model->getData();
		$data['jenisKelas'] = $this->Kelas_model->jenis_kelas();
		$data['komponen']=$this->Transaksi_model->getKomponen();
		$data['cek']=$this->Siswa_model->cekSmester();
		$data['error'] = $this->session->flashdata('error');
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

	public function rekap()
	{
		$akun = $this->session->userdata('akun');
		if($akun['login'] == FALSE)
		{
			redirect(base_url(). 'Home/index');
		}
		else
		{
		$this->load->view('template/header');
		$this->load->view('template/sidebar2');
		$this->load->view('rekapsiswa');
		$this->load->view('template/footer');
		}
	}

	public function rekap_kelas()
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
		$this->load->view('rekapkelas');
		$this->load->view('template/footer');
		}
	}
}
