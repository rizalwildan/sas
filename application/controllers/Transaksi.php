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
	public function tambah_komponen()
	{

		$nama_komponen = $this->input->post('nama_komponen');
		$deskripsi = $this->input->post('deskripsi');
		$iuran = $this->input->post('iuran');

		$dataKomponen = array('nama_komp' =>$nama_komponen ,
			'deskripsi'=>$deskripsi,
			'iuran'=>$iuran
		);

		$this->db->insert('komponen', $dataKomponen);

		redirect(base_url('index.php/admin/KomponenDetail'));
		
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

		$this->load->model('transaksi_model');

		$this->transaksi_model->update_komponen($updateKomponen);

		redirect(base_url('index.php/admin/KomponenDetail'));
	}

	public function setting_komponen()
	{
		$this->load->model('transaksi_model');
		$idkelas = $this->input->post('idkelas');
		$idkomponen = $this->input->post('idkomponen');
		$idtahun = $this->input->post('idtahun');
		$periode =  $this->input->post('periode');

		

	}
	
}