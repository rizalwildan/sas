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
		$tahunpel = $this->input->post('tahunpel');
    $awaltahun = $this->input->post('awaltahun');
    $akhirtahun = $this->input->post('akhirtahun');
    $data = array(
						'tahun_pelajaran' => $tahunpel,
            'awal_tahun_pelajaran' => $awaltahun,
            'akhir_tahun_pelajaran' => $akhirtahun,
          );

    $config = array(
			array(
				'field'   => 'tahunpel',
				'label'   => 'tahun pelajaran',
				'rules'   => 'required',
				'errors' => array(
							'required' => 'Tahun Pelajaran harus diisi'),
		 ),
						   array(
								 'field'   => 'awaltahun',
								 'label'   => 'Awal Tahun',
								 'rules'   => 'required',
                 'errors' => array(
                       'required' => 'Awal Tahun harus diisi'),
               ),
              array(
 								 'field'   => 'akhirtahun',
 								 'label'   => 'Akhir Tahun',
 								 'rules'   => 'required',
                 'errors' => array(
                       'required' => 'Akhir Tahun harus diisi'),
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

	public function edit_smester()
	{
		$idtahun = $this->input->post('idtahun');
		$tahunpel = $this->input->post('tahunpel');
    $awaltahun = $this->input->post('awaltahun');
    $akhirtahun = $this->input->post('akhirtahun');

		$data = array(
						'idtahun' => $idtahun,
						'tahun_pelajaran' => $tahunpel,
            'awal_tahun_pelajaran' => $awaltahun,
            'akhir_tahun_pelajaran' => $akhirtahun,
          );

					$config = array(
						array(
							'field'   => 'tahunpel',
							'label'   => 'tahun pelajaran',
							'rules'   => 'required',
							'errors' => array(
										'required' => 'Tahun Pelajaran harus diisi'),
					 ),
									   array(
											 'field'   => 'awaltahun',
											 'label'   => 'Awal Tahun',
											 'rules'   => 'required',
			                 'errors' => array(
			                       'required' => 'Awal Tahun harus diisi'),
			               ),
			              array(
			 								 'field'   => 'akhirtahun',
			 								 'label'   => 'Akhir Tahun',
			 								 'rules'   => 'required',
			                 'errors' => array(
			                       'required' => 'Akhir Tahun harus diisi'),
			               )
					        );
			    $this->form_validation->set_rules($config);
			    if ($this->form_validation->run() == FALSE)
			    {
			      $this->session->set_flashdata('error', validation_errors());
			      redirect('Admin/dataSmester/');
			    }
					else {
						$this->load->model('Smester_model');
						$this->Smester_model->edit_smester($data);
						$this->session->set_flashdata('update', 'berhasil');

						redirect('Admin/dataSmester/');
					}
	}

	public function delete_smester()
	{
		$idtahun = $this->input->post('idtahun');
		$this->load->model('Smester_model');
		$this->Smester_model->delete_smester($idtahun);
		$this->session->set_flashdata('delete', 'Berhasil');

		redirect('Admin/dataSmester');
	}

}
