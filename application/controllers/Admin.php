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
			$this->load->model('Rekap_model');
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

		$data['siswa'] = $this->Transaksi_model->getSiswaByNim($nim, $tahun);
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
			$data['siswa'] = $this->Rekap_model->get_rekap_siswa_by_kelas($namakelas);
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
			redirect(base_url(). 'Admin/index');
		}
		else
		{

			$siswa = $this->Rekap_model->daftarSiswa();
			foreach ($siswa as $key) {
				$data[$key['nim']] = array('nim' => $key['nim'],
										 'nama' => $key['namasiswa'],
										 'namakelas' => $key['namakelas'],
										 'tahun_pelajaran' => $key['tahun_pelajaran'],
										 'januari' => $this->Rekap_model->getStatus($key['nim'],'januari', $key['tahun_pelajaran']),
										 'februari' => $this->Rekap_model->getStatus($key['nim'],'februari', $key['tahun_pelajaran']),
										 'maret' => $this->Rekap_model->getStatus($key['nim'],'maret', $key['tahun_pelajaran']),
										 'april' => $this->Rekap_model->getStatus($key['nim'],'april', $key['tahun_pelajaran']),
										 'mei' => $this->Rekap_model->getStatus($key['nim'],'mei', $key['tahun_pelajaran']),
										 'juni' => $this->Rekap_model->getStatus($key['nim'],'juni', $key['tahun_pelajaran']),
										 'juli' => $this->Rekap_model->getStatus($key['nim'],'juli', $key['tahun_pelajaran']),
										 'agustus' => $this->Rekap_model->getStatus($key['nim'],'agustus', $key['tahun_pelajaran']),
										 'september' => $this->Rekap_model->getStatus($key['nim'],'september', $key['tahun_pelajaran']),
										 'oktober' => $this->Rekap_model->getStatus($key['nim'],'oktober', $key['tahun_pelajaran']),
										 'november' => $this->Rekap_model->getStatus($key['nim'],'november', $key['tahun_pelajaran']),
										 'desember' => $this->Rekap_model->getStatus($key['nim'],'desember', $key['tahun_pelajaran']),
										 'total' => $this->Rekap_model->totalSPPByNim($key['nim'], $key['tahun_pelajaran'])
										 );
			}

			// print_r($data);
			// die();
			$rekap['spp'] =$data;
			$rekap['kelas'] = $this->Kelas_model->getData();

			$this->load->view('template/header');
			$this->load->view('template/sidebar2');
			$this->load->view('rekapsiswa', $rekap);
			$this->load->view('template/footer');
		}
	}

	public function print_rekap_siswa()
	{
		$kelas = $this->input->post('kelas');
		$siswa = $this->Rekap_model->daftarSiswaByKelas($kelas);
		foreach ($siswa as $key) {
			$data[$key['nim']] = array('nim' => $key['nim'],
									 'nama' => $key['namasiswa'],
									 'namakelas' => $key['namakelas'],
									 'tahun_pelajaran' => $key['tahun_pelajaran'],
									 'Januari' => $this->Rekap_model->getstatuskelas($key['nim'],'Januari', $key['tahun_pelajaran']),
									 'Februari' => $this->Rekap_model->getstatuskelas($key['nim'],'Februari', $key['tahun_pelajaran']),
									 'Maret' => $this->Rekap_model->getstatuskelas($key['nim'],'Maret', $key['tahun_pelajaran']),
									 'April' => $this->Rekap_model->getstatuskelas($key['nim'],'April', $key['tahun_pelajaran']),
									 'Mei' => $this->Rekap_model->getstatuskelas($key['nim'],'Mei', $key['tahun_pelajaran']),
									 'Juni' => $this->Rekap_model->getstatuskelas($key['nim'],'Juni', $key['tahun_pelajaran']),
									 'Juli' => $this->Rekap_model->getstatuskelas($key['nim'],'Juli', $key['tahun_pelajaran']),
									 'Agustus' => $this->Rekap_model->getstatuskelas($key['nim'],'Agustus', $key['tahun_pelajaran']),
									 'September' => $this->Rekap_model->getstatuskelas($key['nim'],'September', $key['tahun_pelajaran']),
									 'Oktober' => $this->Rekap_model->getstatuskelas($key['nim'],'Oktober', $key['tahun_pelajaran']),
									 'November' => $this->Rekap_model->getstatuskelas($key['nim'],'November', $key['tahun_pelajaran']),
									 'Desember' => $this->Rekap_model->getstatuskelas($key['nim'],'Desember', $key['tahun_pelajaran']),
									 'total' => $this->Rekap_model->totalSPPByNim($key['nim'], $key['tahun_pelajaran'])
									 );
	}
	//print_r($data);
	//die();
	$rekap['spp'] =$data;
	$this->load->view('printrekapsiswa', $rekap);
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
			$kelas = $this->Rekap_model->daftarKelas();
			foreach ($kelas as $key) {
				$data[$key['idkelas']] = array('idkelas' => $key['idkelas'],
										 'namakelas' => $key['namakelas'],
										 'januari' => $this->Rekap_model->totalSppKelas($key['namakelas'],'januari'),
										 'februari' => $this->Rekap_model->totalSppKelas($key['namakelas'],'februari'),
										 'maret' => $this->Rekap_model->totalSppKelas($key['namakelas'],'maret'),
										 'april' => $this->Rekap_model->totalSppKelas($key['namakelas'],'april'),
										 'mei' => $this->Rekap_model->totalSppKelas($key['namakelas'],'mei'),
										 'juni' => $this->Rekap_model->totalSppKelas($key['namakelas'],'juni'),
										 'juli' => $this->Rekap_model->totalSppKelas($key['namakelas'],'juli'),
										 'agustus' => $this->Rekap_model->totalSppKelas($key['namakelas'],'agustus'),
										 'september' => $this->Rekap_model->totalSppKelas($key['namakelas'],'september'),
										 'oktober' => $this->Rekap_model->totalSppKelas($key['namakelas'],'oktober'),
										 'november' => $this->Rekap_model->totalSppKelas($key['namakelas'],'november'),
										 'desember' => $this->Rekap_model->totalSppKelas($key['namakelas'],'desember')
										 // 'total' => $this->Rekap_model->totalSPPByNim($key['nim'])
										 );
			}

			$rekap['spp'] =$data;
			// print_r($rekap['spp']);
			// die();

			$this->load->view('template/header');
			$this->load->view('template/sidebar2');
			$this->load->view('rekapkelas',$rekap);
			$this->load->view('template/footer');
		}
	}

	public function filter_rekap_kelas()
	{
		$akun = $this->session->userdata('akun');
		if($akun['login'] == FALSE)
		{
			redirect(base_url(). 'Admin/index');
		}
		else
		{
			$jenis_kelas = $this->input->post('jeniskelas');
			$kelas = array('jenis_kelas' => $jenis_kelas);
			$this->session->set_userdata('kelas', $kelas);
			$kelas = $this->Rekap_model->daftarKelasByJenis($jenis_kelas);
			foreach ($kelas as $key) {
				$data[$key['idkelas']] = array('idkelas' => $key['idkelas'],
										 'namakelas' => $key['namakelas'],
										 'januari' => $this->Rekap_model->totalSppKelas($key['namakelas'],'januari'),
										 'februari' => $this->Rekap_model->totalSppKelas($key['namakelas'],'februari'),
										 'maret' => $this->Rekap_model->totalSppKelas($key['namakelas'],'maret'),
										 'april' => $this->Rekap_model->totalSppKelas($key['namakelas'],'april'),
										 'mei' => $this->Rekap_model->totalSppKelas($key['namakelas'],'mei'),
										 'juni' => $this->Rekap_model->totalSppKelas($key['namakelas'],'juni'),
										 'juli' => $this->Rekap_model->totalSppKelas($key['namakelas'],'juli'),
										 'agustus' => $this->Rekap_model->totalSppKelas($key['namakelas'],'agustus'),
										 'september' => $this->Rekap_model->totalSppKelas($key['namakelas'],'september'),
										 'oktober' => $this->Rekap_model->totalSppKelas($key['namakelas'],'oktober'),
										 'november' => $this->Rekap_model->totalSppKelas($key['namakelas'],'november'),
										 'desember' => $this->Rekap_model->totalSppKelas($key['namakelas'],'desember')
										 // 'total' => $this->Rekap_model->totalSPPByNim($key['nim'])
										 );
			}

			$total['index'] = array('januari' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'januari' ),
						   'februari' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'februari' ),
						   'maret' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'maret' ),
						   'april' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'april' ),
						   'mei' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'mei' ),
						   'juni' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'juni' ),
						   'juli' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'juli' ),
						   'agustus' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'agustus' ),
						   'september' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'september' ),
						   'oktober' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'oktober' ),
						   'november' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'november' ),
						   'desember' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'desember' ),
						 );
			
			$rekap['spp'] =$data;
			$rekap['jumlah'] = $total;
			// print_r($rekap['jumlah']);
			// die();

			$this->load->view('template/header');
			$this->load->view('template/sidebar2');
			$this->load->view('filterrekapkelas',$rekap);
			$this->load->view('template/footer');
		}
	}

	public function print_rekap_kelas()
	{
		$akun = $this->session->userdata('akun');
		if($akun['login'] == FALSE)
		{
			redirect(base_url(). 'Admin/index');
		}
		else
		{
			$isi = $this->session->userdata('kelas');
			$jenis_kelas = $isi['jenis_kelas'];
			$kelas = $this->Rekap_model->daftarKelasByJenis($jenis_kelas);
			foreach ($kelas as $key) {
				$data[$key['idkelas']] = array('idkelas' => $key['idkelas'],
										 'namakelas' => $key['namakelas'],
										 'januari' => $this->Rekap_model->totalSppKelas($key['namakelas'],'januari'),
										 'februari' => $this->Rekap_model->totalSppKelas($key['namakelas'],'februari'),
										 'maret' => $this->Rekap_model->totalSppKelas($key['namakelas'],'maret'),
										 'april' => $this->Rekap_model->totalSppKelas($key['namakelas'],'april'),
										 'mei' => $this->Rekap_model->totalSppKelas($key['namakelas'],'mei'),
										 'juni' => $this->Rekap_model->totalSppKelas($key['namakelas'],'juni'),
										 'juli' => $this->Rekap_model->totalSppKelas($key['namakelas'],'juli'),
										 'agustus' => $this->Rekap_model->totalSppKelas($key['namakelas'],'agustus'),
										 'september' => $this->Rekap_model->totalSppKelas($key['namakelas'],'september'),
										 'oktober' => $this->Rekap_model->totalSppKelas($key['namakelas'],'oktober'),
										 'november' => $this->Rekap_model->totalSppKelas($key['namakelas'],'november'),
										 'desember' => $this->Rekap_model->totalSppKelas($key['namakelas'],'desember')
										 // 'total' => $this->Rekap_model->totalSPPByNim($key['nim'])
										 );
			}

			$total['index'] = array('januari' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'januari' ),
						   'februari' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'februari' ),
						   'maret' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'maret' ),
						   'april' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'april' ),
						   'mei' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'mei' ),
						   'juni' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'juni' ),
						   'juli' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'juli' ),
						   'agustus' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'agustus' ),
						   'september' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'september' ),
						   'oktober' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'oktober' ),
						   'november' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'november' ),
						   'desember' => $this->Rekap_model->totalSppKelasPerBulan($jenis_kelas,'desember' ),
						 );
		}
			
			$rekap['spp'] = $data;
			$rekap['jumlah'] = $total;
			// print_r($rekap['spp']);
			// die();

			$this->load->view('printrekapkelas', $rekap);

	}

	public function rekap_bos()
	{

		$siswa = $this->Rekap_model->daftarSiswa();
			foreach ($siswa as $key) {
				// print_r($key['nim']);
				$data[$key['nim']] = array('nim' => $key['nim'],
										 'nama' => $key['namasiswa'],
										 'namakelas' => $key['namakelas'],
										 'Januari' => $this->Rekap_model->getBos($key['nim'],'Januari'),
										 'Februari' => $this->Rekap_model->getBos($key['nim'],'Februari'),
										 'Maret' => $this->Rekap_model->getBos($key['nim'],'Maret'),
										 'April' => $this->Rekap_model->getBos($key['nim'],'April'),
										 'Mei' => $this->Rekap_model->getBos($key['nim'],'Mei'),
										 'Juni' => $this->Rekap_model->getBos($key['nim'],'Juni'),
										 'Juli' => $this->Rekap_model->getBos($key['nim'],'Juli'),
										 'Agustus' => $this->Rekap_model->getBos($key['nim'],'Agustus'),
										 'September' => $this->Rekap_model->getBos($key['nim'],'September'),
										 'Oktober' => $this->Rekap_model->getBos($key['nim'],'Oktober'),
										 'November' => $this->Rekap_model->getBos($key['nim'],'November'),
										 'Desember' => $this->Rekap_model->getBos($key['nim'],'Desember'),
										 'total' => $this->Rekap_model->totalBosByNim($key['nim'])

										 );
			}

			// print_r($data);
			// die();
			$rekap['bos'] =$data;



		$this->load->view('template/header');
		$this->load->view('template/sidebar2');
		$this->load->view('rekapbos', $rekap);
		$this->load->view('template/footer');
	}

	
}
