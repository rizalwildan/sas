<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smester extends CI_Controller {

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

	public function insert_smester()
	{
		$smester = $this->input->post('smester');
    $awalsmt = $this->input->post('awalsmt');
    $akhirsmt = $this->input->post('akhirsmt');
    $jenisSmt = $this->input->post('jenisSmt');
    $tahunpel = $this->input->post('tahunpel');
    $data = array('nama_smester' => $smester,
            'awal_smester' => $awalsmt,
            'akhir_smester' => $akhirsmt,
            'jenis_smester' => $jenisSmt,
            'tahun_pelajaran' => $tahunpel
          );

    $config = array(
						   array(
								 'field'   => 'smester', //nama elemen form
								 'label'   => 'Nama Smester', //keterangan form
								 'rules'   => 'required',//Harus Diisi
                 'errors' => array(
                       'required' => 'Nama Smseter harus diisi'),//Custom Message
							  ),
						   array(
								 'field'   => 'awalsmt',
								 'label'   => 'Awal Smester',
								 'rules'   => 'required',
                 'errors' => array(
                       'required' => 'Awal Smseter harus diisi'),
               ),
              array(
 								 'field'   => 'akhirsmt',
 								 'label'   => 'Akhir Smester',
 								 'rules'   => 'required',
                 'errors' => array(
                       'required' => 'Akhir Smseter harus diisi'),
               ),
              array(
								 'field'   => 'jenisSmt',
								 'label'   => 'jenis smester',
								 'rules'   => 'required',
                 'errors' => array(
                       'required' => 'Jenis Smseter harus diisi'),
               ),
               array(
								 'field'   => 'tahunpel',
								 'label'   => 'tahun pelajaran',
								 'rules'   => 'required',
                 'errors' => array(
                       'required' => 'Tahun Pelajaran harus diisi'),
							)
		        );
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() == FALSE)
    {
      $this->session->set_flashdata('error', validation_errors());
      redirect('Admin/dataSmester/');
    }
    else
    {
      $this->load->model('Smester_model');
      $this->Smester_model->insert_smester($data);

      $this->session->set_flashdata('insert', 'Insert Berhasil');
      redirect('Admin/dataSmester/');
    }
  }
}
