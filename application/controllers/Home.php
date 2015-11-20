<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

			// load all model used
			$this->load->model('Siswa_model');
			$this->load->model('Kelas_model');
			$this->load->model('Transaksi_model');
			$this->load->model('Login_model');
			$this->load->model('Rekap_model');
			$this->load->model('Smester_model');

	}

	public function index()
	{
		$akun = $this->session->userdata('akun');
		if($akun['level'] == 2)
		{
			redirect(base_url(). 'Home/datasiswa');
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
		//Upload Validation
		$data['upload_error'] = $this->session->flashdata('upload_error');
		//Import Suksess
		$data['import'] = $this->session->flashdata('import');
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('data', $data);
		$this->load->view('template/footer');
		}
	}

	// 	public function transaksi()
	// {
	// 	$akun = $this->session->userdata('akun');
	// 	if($akun['login'] == FALSE)
	// 	{
	// 		redirect(base_url(). 'Home/index');
	// 	}
	// 	else
	// 	{
	// 	$this->load->view('template/header');
	// 	$this->load->view('template/sidebar');
	// 	$this->load->view('transaksi');
	// 	$this->load->view('template/footer');
	// 	}
	// }

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
		$data['tahunajaran'] = $this->Transaksi_model->getTahunAjaranSekarang();
		$data['siswa'] = $this->Transaksi_model->getAllSiswa();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
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
		$this->load->view('template/sidebar');
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
		$this->load->view('template/sidebar');
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
			//Config Paggination
		$config["base_url"] = base_url()."Home/kelas";
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
		$this->db->order_by("namakelas", "ASC");
		$data['p'] = $this->db->get("kelas", $config["per_page"], $page);
		$data['paging'] = $this->pagination->create_links();
		$data['error'] = $this->session->flashdata('error');
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('datkelas', $data);
		$this->load->view('template/footer');
		}
	}


	public function detailkelas()
	{
		$akun = $this->session->userdata('akun');
		if($akun['login'] == FALSE)
		{
			redirect(base_url(). 'Home/index');
		}
		else
		{
		$this->load->model('Kelas_model');
		$this->load->model('Siswa_model');
		$data['error'] = $this->session->flashdata('error');
		$data['insert'] = $this->session->flashdata('insert');
		$data['tsk'] = $this->Kelas_model->tampil_siswa_kelas();
		$data['kelas'] = $this->Kelas_model->getData();
		$data['cek'] = $this->Siswa_model->cekSmester();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('detailkelas', $data);
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

			$siswa = $this->Rekap_model->daftarSiswa();
			foreach ($siswa as $key) {
				$data[$key['id_siswa']] = array('id_siswa' => $key['id_siswa'],
										 'nis' => $key['nis'],
										 'nama_siswa' => $key['nama_siswa'],
										 'nama_kelas' => $key['nama_kelas'],
										 'januari' => $this->Rekap_model->getStatus($key['id_siswa'],'januari'),
										 'februari' => $this->Rekap_model->getStatus($key['id_siswa'],'februari'),
										 'maret' => $this->Rekap_model->getStatus($key['id_siswa'],'maret'),
										 'april' => $this->Rekap_model->getStatus($key['id_siswa'],'april'),
										 'mei' => $this->Rekap_model->getStatus($key['id_siswa'],'mei'),
										 'juni' => $this->Rekap_model->getStatus($key['id_siswa'],'juni'),
										 'juli' => $this->Rekap_model->getStatus($key['id_siswa'],'juli'),
										 'agustus' => $this->Rekap_model->getStatus($key['id_siswa'],'agustus'),
										 'september' => $this->Rekap_model->getStatus($key['id_siswa'],'september'),
										 'oktober' => $this->Rekap_model->getStatus($key['id_siswa'],'oktober'),
										 'november' => $this->Rekap_model->getStatus($key['id_siswa'],'november'),
										 'desember' => $this->Rekap_model->getStatus($key['id_siswa'],'desember'),
										 'total' => $this->Rekap_model->totalSPPByNim($key['id_siswa'])
										 );
			}

			// print_r($data);
			// die();
			$rekap['spp'] =$data;
			$rekap['kelas'] = $this->Kelas_model->getData();
			$rekap['tahun'] = $this->Smester_model->getDataTahun();

			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('rekapsiswa', $rekap);
			$this->load->view('template/footer');
		}
	}


	public function filter_rekap() {

		$kelas = $this->input->post('kelas');
		$tahun = $this->input->post('tahun');
		$isi = array('namakelas' => $kelas , 'tahun' => $tahun );
		$this->session->set_userdata('siswa', $isi);

		$siswa = $this->Rekap_model->filter_rekap($kelas, $tahun);
		foreach ($siswa as $key) {
			$data[$key['id_siswa']] = array('id_siswa' => $key['id_siswa'],
									 'nis' => $key['nis'],
									 'nama_siswa' => $key['nama_siswa'],
									 'nama_kelas' => $key['nama_kelas'],
									 'januari' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'Januari'),
									 'februari' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'Februari'),
									 'maret' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'Maret'),
									 'april' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'April'),
									 'mei' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'Mei'),
									 'juni' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'Juni'),
									 'juli' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'Juli'),
									 'agustus' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'Agustus'),
									 'september' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'September'),
									 'oktober' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'Oktober'),
									 'november' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'November'),
									 'desember' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'Desember'),
									 'total' => $this->Rekap_model->totalSPPByNim($key['id_siswa'])
									 );
	}

	$rekap['spp'] =$data;
	$rekap['kelas'] = $this->Kelas_model->getData();
	$rekap['tahun'] = $this->Smester_model->getDataTahun();

	$this->load->view('template/header');
	$this->load->view('template/sidebar');
	$this->load->view('filterrekap', $rekap);
	$this->load->view('template/footer');
}

public function print_rekap()
{
	$isi = $this->session->userdata('siswa');

	$siswa = $this->Rekap_model->print_rekap($isi);
		foreach ($siswa as $key) {
			$data[$key['id_siswa']] = array('id_siswa' => $key['id_siswa'],
									 'nis' => $key['nis'],
									 'nama_siswa' => $key['nama_siswa'],
									 'nama_kelas' => $key['nama_kelas'],
									 'januari' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'Januari'),
									 'februari' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'Februari'),
									 'maret' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'Maret'),
									 'april' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'April'),
									 'mei' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'Mei'),
									 'juni' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'Juni'),
									 'juli' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'Juli'),
									 'agustus' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'Agustus'),
									 'september' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'September'),
									 'oktober' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'Oktober'),
									 'november' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'November'),
									 'desember' => $this->Rekap_model->getstatuskelas($key['id_siswa'],'Desember'),
									 'total' => $this->Rekap_model->totalSPPByNim($key['id_siswa'])
									 );
	}

	$rekap['spp'] =$data;

	$this->load->view('printrekapsiswa', $rekap);
}



}
