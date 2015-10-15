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

		//Pengaturan Form Validation
		$config = array(
							   array(
									 'field'   => 'nim', //nama elemen form
									 'label'   => 'Nim', //keterangan form
									 'rules'   => 'required',//Harus Diisi
					                 'errors' => array(
					                       'required' => 'Data Harus Dipilih'),//Custom Message
								  ),
							   array(
									 'field'   => 'nama',
									 'label'   => 'Nama Siswa',
									 'rules'   => 'required',
					                 'errors' => array(
					                       'required' => 'Nama Siswa Harus Diisi'),
	               ),
								 array(
									'field'   => 'kelas',
									'label'   => 'Kelas',
									'rules'   => 'required',
													'errors' => array(
																'required' => 'Kelas Harus Diisi'),
								),
								 array(
									 'field'   => 'jenis',
									 'label'   => 'Gender',
									 'rules'   => 'required',
					                 'errors' => array(
					                       'required' => 'Gender Harus Diisi'),
	               ),
								 array(
									 'field'   => 'alamat',
									 'label'   => 'Alamat',
									 'rules'   => 'required',
					                 'errors' => array(
					                       'required' => 'Alamat Harus Diisi'),
	               ),
								 array(
									 'field'   => 'tempat',
									 'label'   => 'Tempat Lahir',
									 'rules'   => 'required',
					                 'errors' => array(
					                       'required' => 'Tempat Lahir Harus Diisi'),
	               ),
								 array(
									 'field'   => 'tgl',
									 'label'   => 'Tanggal Lahir',
									 'rules'   => 'required',
					                 'errors' => array(
					                       'required' => 'Tanggal Lahir Harus Diisi'),
	               ),
								 array(
									 'field'   => 'wali',
									 'label'   => 'Nama Wali',
									 'rules'   => 'required',
					                 'errors' => array(
					                       'required' => 'Nama Wali Harus Diisi'),
	               )
			        );
		//Memanggil Pengaturan Form Validation
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			$akun = $this->session->userdata('akun');
			if ($akun['level'] == 1 ) {
				redirect('Admin/datasiswa');
			}
			else {
				redirect('Home/datasiswa');
			}
		}
		else {
			$this->db->insert('siswa', $datasiswa);

			$this->load->model('Siswa_model');

			//insert satu siswa ke kelas
			$this->Siswa_model->insert_siswa($kelas);

			$this->session->set_flashdata('insert', 'Data Berhasil');

			$akun = $this->session->userdata('akun');

			if($akun['level'] == 1)
			{
			redirect(base_url().'Admin/datasiswa');
			}
			else
			{
			redirect(base_url().'Home/datasiswa');
			}
		}
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
		$tahun = $this->input->post('idtahun');
		$wali = $this->input->post('wali');

		$datasiswa = array('idsiswa' => $idsiswa,
			'nim' => $nim,
			'namasiswa' => $nama,
			'gender' => $jenis,
			'alamat' => $alamat,
			'tmlahir' => $tempat,
			'tgllahir' => $tgl,
			'namawali' => $wali,
			);

		$dataSiswaKelas = array(
			'idkelas' => $kelas,
			'idtahun' => $tahun
			);

			//Pengaturan Form Validation
			$config = array(
				array(
					'field'   => 'kelas', //nama elemen form
					'label'   => 'Kelas', //keterangan form
					'rules'   => 'required',//Harus Diisi
									'errors' => array(
												'required' => 'Kelas Harus Dipilih'),//Custom Message
				 ),
								   array(
										 'field'   => 'nim', //nama elemen form
										 'label'   => 'Nim', //keterangan form
										 'rules'   => 'required',//Harus Diisi
						                 'errors' => array(
						                       'required' => 'Data Harus Dipilih'),//Custom Message
									  ),
								   array(
										 'field'   => 'nama',
										 'label'   => 'Nama Siswa',
										 'rules'   => 'required',
						                 'errors' => array(
						                       'required' => 'Nama Siswa Harus Diisi'),
		               ),
									 array(
										 'field'   => 'jenis',
										 'label'   => 'Gender',
										 'rules'   => 'required',
						                 'errors' => array(
						                       'required' => 'Gender Harus Diisi'),
		               ),
									 array(
										 'field'   => 'alamat',
										 'label'   => 'Alamat',
										 'rules'   => 'required',
						                 'errors' => array(
						                       'required' => 'Alamat Harus Diisi'),
		               ),
									 array(
										 'field'   => 'tempat',
										 'label'   => 'Tempat Lahir',
										 'rules'   => 'required',
						                 'errors' => array(
						                       'required' => 'Tempat Lahir Harus Diisi'),
		               ),
									 array(
										 'field'   => 'tgl',
										 'label'   => 'Tanggal Lahir',
										 'rules'   => 'required',
						                 'errors' => array(
						                       'required' => 'Tanggal Lahir Harus Diisi'),
		               ),
									 array(
										 'field'   => 'wali',
										 'label'   => 'Nama Wali',
										 'rules'   => 'required',
						                 'errors' => array(
						                       'required' => 'Nama Wali Harus Diisi'),
		               )
				        );
		//Memanggil Pengaturan Form Validation
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			$akun = $this->session->userdata('akun');
			if ($akun['level'] == 1 ) {
				redirect('Admin/datasiswa');
			}
			else {
				redirect('Home/datasiswa');
			}
		}
		else {
			$this->load->model('Siswa_model');

			$this->Siswa_model->update_siswa($datasiswa, $dataSiswaKelas);

			$this->session->set_flashdata('update', 'Data Berhasil');

			$akun = $this->session->userdata('akun');

			if($akun['level'] == 1)
			{
			redirect(base_url().'Admin/datasiswa');
			}
			else
			{
			redirect(base_url().'Home/datasiswa');
			}
		}
	}

	public function insert_siswa_kelas()
	{
		$this->load->model('kelas_model');
		$kelas = $this->input->post('kelas');
		$nis = $this->input->post('nis');
		$tahun = $this->input->post('tahun');

		$config = array(
						   array(
								 'field'   => 'nis[]', //nama elemen form
								 'label'   => 'Nis', //keterangan form
								 'rules'   => 'required',//Harus Diisi
				                 'errors' => array(
				                       'required' => 'Data Harus Dipilih'),//Custom Message
							  ),
						   array(
								 'field'   => 'kelas',
								 'label'   => 'Kelas',
								 'rules'   => 'required',
				                 'errors' => array(
				                       'required' => 'Kelas Harus Dipilih'),
               )
		        );

		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error', validation_errors());
			$akun = $this->session->userdata('akun');
			if ($akun['level'] == 1 ) {
				redirect('Admin/detailkelas/');
			}
			else {
				redirect('Home/detailkelas');
			}

		}
		else
		{
			$i = 0;
			foreach ($nis as $banyak)
			{
				$i++;
			}
			for ($j=0; $j < $i; $j++) {
				$this->kelas_model->input_kelas_siswa($nis[$j], $kelas, $tahun);
			}

			$this->session->set_flashdata('insert', 'Berhasil');

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

	public function delete_siswa()
	{
		$idsiswa = $this->input->post('idsiswa');
		$this->load->model('Siswa_model');
		$this->Siswa_model->delete($idsiswa);

		$this->session->set_flashdata('delete', 'Data Berhasil');

		$akun = $this->session->userdata('akun');

		if($akun['level'] == 1)
		{
		redirect(base_url().'Admin/datasiswa');
		}
		else
		{
		redirect(base_url().'Home/datasiswa');
		}
	}
}
