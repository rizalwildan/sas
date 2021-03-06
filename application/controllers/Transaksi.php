<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

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

	public function tambah_komponen()
	{

		$nama_komponen = $this->input->post('nama_komponen');
		$deskripsi = $this->input->post('deskripsi');
		$iuran = $this->input->post('iuran');

		$dataKomponen = array('nama_komp' =>$nama_komponen ,
			'deskripsi'=>$deskripsi,
			'iuran'=>$iuran
		);

		$config = array(
								 array(
									 'field'   => 'nama_komponen', //nama elemen form
									 'label'   => 'Nama Komponen', //keterangan form
									 'rules'   => 'required',//Harus Diisi
													 'errors' => array(
																 'required' => 'Data Harus Diisi'),//Custom Message
									),
								 array(
									 'field'   => 'deskripsi',
									 'label'   => 'Deskripsi',
									 'rules'   => 'required',
													 'errors' => array(
																 'required' => 'Deskripsi Komponen Harus Diisi'),
								 ),
								 array(
									 'field'   => 'iuran',
									 'label'   => 'Iuran',
									 'rules'   => 'required',
													 'errors' => array(
																 'required' => 'Jumlah Iuran Harus Diisi'),
								 )
							 );

							 $this->form_validation->set_rules($config);
					 		if ($this->form_validation->run() == FALSE) {
					 			$this->session->set_flashdata('error', validation_errors());
					 			redirect(base_url('index.php/admin/KomponenDetail'));
					 		}
							else {
								$this->db->insert('komponen', $dataKomponen);
								$this->session->set_flashdata('insert', 'Berhasil');
								redirect(base_url('index.php/admin/KomponenDetail'));
							}
	}

	public function update_komponen()
	{
		$idkomponen=$this->input->post('idkomponen');
		$nama_komponen=$this->input->post('nama_komp');
		$deskripsi=$this->input->post('deskripsi');
		$iuran=$this->input->post('iuran');

		$updateKomponen = array('idkomponen'=>$idkomponen,
			'nama_komp'=> $nama_komponen,
			'deskripsi'=> $deskripsi,
			'iuran'=>$iuran
			);
		$config = array(
									 array(
										 'field'   => 'nama_komp', //nama elemen form
										 'label'   => 'Nama Komponen', //keterangan form
										 'rules'   => 'required',//Harus Diisi
														 'errors' => array(
																	 'required' => 'Data Harus Diisi'),//Custom Message
										),
									 array(
										 'field'   => 'deskripsi',
										 'label'   => 'Deskripsi',
										 'rules'   => 'required',
														 'errors' => array(
																	 'required' => 'Deskripsi Komponen Harus Diisi'),
									 ),
									 array(
										 'field'   => 'iuran',
										 'label'   => 'Iuran',
										 'rules'   => 'required',
														 'errors' => array(
																	 'required' => 'Jumlah Iuran Harus Diisi'),
									 )
								 );

								$this->form_validation->set_rules($config);
								if ($this->form_validation->run() == FALSE) {
									$this->session->set_flashdata('error', validation_errors());
									redirect(base_url('index.php/admin/KomponenDetail'));
								}
								else {
									$this->load->model('transaksi_model');
									$this->transaksi_model->update_komponen($updateKomponen);
									$this->session->set_flashdata('update', 'berhasil');

									redirect(base_url('index.php/admin/KomponenDetail'));
								}
	}

	public function setting_komponen()
	{
		$this->load->model('transaksi_model');
		$jeniskelas = $this->input->post('jeniskelas');
		$idkomponen = $this->input->post('idkomponen');
		$idtahun = $this->input->post('idtahun');
		$periode =  $this->input->post('periode');

		$config = array(
									 array(
										 'field'   => 'jeniskelas', //nama elemen form
										 'label'   => 'Jenis Kelas', //keterangan form
										 'rules'   => 'required',//Harus Diisi
														 'errors' => array(
																	 'required' => 'Jenis Kelas Harus Dipilih'),//Custom Message
										),
									 array(
										 'field'   => 'periode',
										 'label'   => 'periode',
										 'rules'   => 'required',
														 'errors' => array(
																	 'required' => 'Periode Harus Dipilih'),
									 ),
									 array(
										 'field'   => 'idkomponen[]',
										 'label'   => 'idkomponen',
										 'rules'   => 'required',
														 'errors' => array(
																	 'required' => 'Komponen Harus Dipilih'),
									 )
								 );

								 $this->form_validation->set_rules($config);
						 		if ($this->form_validation->run() == FALSE) {
						 			$this->session->set_flashdata('error', validation_errors());
						 			redirect(base_url('admin/settingkomponen'));
						 		}
								else {
									$i = 0;
										foreach ($idkomponen as $banyak)
										{
											$i++;
										}
										for ($j=0; $j < $i; $j++) {
											$this->transaksi_model->insert_komponen_setting($jeniskelas, $idkomponen[$j],  $idtahun, $periode);
										}

										$this->session->set_flashdata('insert', 'Berhasil');

										//$akun = $this->session->userdata('akun');

									redirect(base_url('admin/settingkomponen'));
								}
	}

	public function delete_komponen()
	{
		$idkomponen = $this->input->post('idkomponen');
		$this->load->model('transaksi_model');
		$this->transaksi_model->delete_komponen($idkomponen);
		$this->session->set_flashdata('delete', 'Data Berhasil');

		redirect(base_url('admin/KomponenDetail'));
	}

	public function edit_rekap()
	{
		$idspp = $this->input->post('idspp');
		$nim = $this->input->post('nim');
		$namasiswa = $this->input->post('nama');
	  $namakelas = $this->input->post('namakelas');
		$periode = $this->input->post('periode');
		$nominalspp = $this->input->post('nominal');

		$data = array(
									'nim' => $this->input->post('nim'),
									'namasiswa' => $this->input->post('nama'),
									'namakelas' => $this->input->post('namakelas'),
									'periode' => $this->input->post('periode'),
									'nominalspp' => $this->input->post('nominal')
								);
		$this->load->model('Rekap_model');
		$this->Rekap_model->edit_rekap($data);
		$akun = $this->session->userdata('akun');
		if ($akun['level'] == 1) {
			redirect(base_url('Admin/rekap'));
		}
		else {
			$this->session->set_flashdata('gagal', 'Pesan');
			redirect(base_url('Home/rekap'));
		}

	}

	public function submitPayment()
{

	$nim = $this->input->post('nim');
	$kelas = $this->input->post('kelas');
	$tahun = $this->input->post('tahun');
	$bulan = $this->input->post('bulan');
	$nama = $this->input->post('nama');
	$tgltransaksi = $this->input->post('tgltransaksi');
	$nominalspp = $this->input->post('nominalspp');
	$namakelas = $this->input->post('namakelas');

	//Input Ke Print_preview
	$data['siswa'] = $this->Transaksi_model->getSiswaByNim($nim, $tahun);
	$data['komponen'] = $this->Transaksi_model->getKomponenByBulan($bulan,$tahun,$kelas);
	$data['totalpembayaran'] = $this->input->post('totalpembayaran');
	$data['bulanpembayaran'] = $this->input->post('bulanpembayaran');
	$data['danabos'] = $this->input->post('danabos');

	// tulis ke database
	$datapembayaran = array('tanggal' => $tgltransaksi,
							'periode' => $bulan,
							'tahun' => $tahun,
							'nim' => $nim,
							'namasiswa' => $nama,
							'jeniskelas' => $kelas,
							'namakelas' => $namakelas,
							// 'nominalspp' => $nominalspp,
							// coba rekap per siswa diganti
							'nominalspp' => $data['totalpembayaran'],
							'danabos' => $data['danabos'],
							'sppstatus' => "lunas"

	 );

	//Cek Pembayaran
	$this->db->WHERE('tahun', $datapembayaran['tahun']);
	$this->db->WHERE('periode', $datapembayaran['periode']);
	$this->db->WHERE('nim', $datapembayaran['nim']);
	$query = $this->db->get('spp');

	$count_row = $query->num_rows();
	if ($count_row > 0) {
		$this->session->set_flashdata('gagal', 'Pesan');
		$akun = $this->session->userdata('akun');
		if ($akun['level'] == 1) {
			redirect(base_url().'Admin/transaksi');
		}
		else {
			$this->session->set_flashdata('gagal', 'Pesan');
			redirect(base_url().'Home/transaksi');
		}
	}
	else {
		$this->db->insert('spp', $datapembayaran);
		// print_r($datapembayaran);
		// die();

		// Print and print preview
		$this->load->view('printpreview2',$data);
	}




	/**
	$HTML = $this->load->view('printpreview2',$data,true);
	$filename = $nim.'_NOTA_'.$bulan.'_'.$tahun;
	$this->pdf->pdf_create($HTML,$filename,'A4','potrait');
	**/
}

}
