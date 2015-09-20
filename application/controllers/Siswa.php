<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

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

	public function insert_siswa()
	{
		$kelas = $this->input->post('kelas');
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$jenis = $this->input->post('jenis');
		$alamat = $this->input->post('alamat');
		$tempat = $this->input->post('tempat');
		$tgl = $this->input->post('tgl');
		$wali = $this->input->post('wali');

		$datasiswa = array('nim' => $nim,
			'namasiswa' => $nama,
			'gender' => $jenis,
			'alamat' => $alamat,
			'tmlahir' => $tempat,
			'tgllahir' => $tgl,
			'namawali' => $wali,
			);

		$this->db->insert('siswa', $datasiswa);
		redirect(base_url().'Auth/cek_login');
	}


	public function detail($dataSis)
	{
		$this->load->model('siswa_model');
		$this->siswa_model->detail_siswa($dataSis);
		$this->load->view('detailsiswa');
	}

	public function update_siswa()
	{
		$idsiswa = $this->input->post('idsiswa');
		$kelas = $this->input->post('kelas');
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$jenis = $this->input->post('jenis');
		$alamat = $this->input->post('alamat');
		$tempat = $this->input->post('tempat');
		$tgl = $this->input->post('tgl');
		$tahun = $this->input->post('tahun');
		$wali = $this->input->post('wali');

		$datasiswa = array('idsiswa' => $idsiswa,
			'nim' => $nim,
			'namasiswa' => $nama,
			'gender' => $jenis,
			'alamat' => $alamat,
			'tmlahir' => $tempat,
			'tgllahir' => $tgl,
			'idtahun' => $tahun,
			'namawali' => $wali,
			);

		$dataSiswaKelas = array(
			'idkelas' => $kelas,
			'idtahun' => $tahun
			);

		$this->load->model('siswa_model');

		$this->siswa_model->update_siswa($datasiswa, $dataSiswaKelas);
		redirect(base_url().'Auth/cek_login');

	}

	public function insert_siswa_kelas()
	{
		$this->load->model('kelas_model');
		$kelas = $this->input->post('kelas');
		$nis = $this->input->post('nis');
		$tahun = $this->input->post('tahun');

		$i = 0;
		foreach ($nis as $banyak)
		{
			$i++;
		}
		for ($j=0; $j < $i; $j++) {
			$this->kelas_model->input_kelas_siswa($nis[$j], $kelas, $tahun);
		}

		$akun = $this->session->userdata('akun');

		if($akun['level'] == 1)
		{
		redirect(base_url().'Admin/detailkelas');
		}
		else
		{
		redirect(base_url().'Home/detailkelas');
		}
	}
}
