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

		$preb = $this->db->insert('user', $datauser);
		if($preb == 1)
		{
			$this->session->set_flashdata('success', 'sukses input');
		}
		else
		{
			$this->session->set_flashdata('error', 'gagal input');
		}

		redirect(base_url().'Admin/user');

	}

	public function update_user()
	{
		$dataUser = array (
		'username' => $this->input->post('username'),
		'password' => $this->input->post('password'),
		'old_password' => $this->input->post('old_password'),
		'level' => $this->input->post('level')
		);
		$this->load->model('Login_model');
		$this->Login_model->update_user($dataUser);
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
}
