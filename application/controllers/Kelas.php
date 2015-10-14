<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

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

	public function input()
	{
		$this->load->model('kelas_model');
		$kelas = $this->input->post('kelas');
		$base = $this->input->post('basekelas');

		//Pengaturan Form Validation
		$config = array(
								 array(
									 'field'   => 'kelas', //nama elemen form
									 'label'   => 'Nama Kelas', //keterangan form
									 'rules'   => 'required',//Harus Diisi
													 'errors' => array(
																 'required' => 'Nama Kelas Harus Disi'),//Custom Message
									),
								 array(
									 'field'   => 'basekelas',
									 'label'   => 'Base Kelas',
									 'rules'   => 'required',
													 'errors' => array(
																 'required' => 'Base Kelas Harus Dipilih'),
								 )
							);
			//Memanggil Pengaturan Form Validation
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('error', validation_errors());
					$akun = $this->session->userdata('akun');
					if ($akun['level'] == 1 ) {
							redirect('Admin/kelas/');
							}
				  else {
							  redirect('Home/kelas');
							}
			}
			else {
				$this->kelas_model->tambah($kelas, $base);

				$this->session->set_flashdata('insert', 'Berhasil');

				$akun = $this->session->userdata('akun');

				if($akun['level'] == 1)
				{
				redirect(base_url().'Admin/kelas');
				}
				else
				{
				redirect(base_url().'Home/kelas');
				}
			}

	}

	public function edit()
	{
		# code...
	}

	public function delete_kelas()
	{
		$idkelas = $this->input->post('idkelas');
		$this->load->model('kelas_model');
		$this->kelas_model->delete_kelas($idkelas);

		$this->session->set_flashdata('delete', 'Data Berhasil');

		$akun = $this->session->userdata('akun');

		if($akun['level'] == 1)
		{
		redirect(base_url().'Admin/Kelas');
		}
		else
		{
		redirect(base_url().'Home/Kelas');
		}
	}

}
