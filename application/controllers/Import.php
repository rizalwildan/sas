<?php
/**
 *
 */
class Import extends CI_Controller
{

  public function import_csv()
  {
    $this->load->library('Csvimport');
    $this->load->model('Siswa_model');
    $config['upload_path'] = './upload_siswa_csv/';
    $config['allowed_types'] = 'csv';
    $config['max_size'] = '10000';

    //load library upload
    $this->load->library('upload', $config);
    if (! $this->upload->do_upload('userfile')) {
      $message = $this->upload->display_errors();
      $this->session->set_flashdata('upload_error', $message);
      $akun = $this->session->userdata('akun');
			if ($akun['level'] == 1 ) {
				redirect('Admin/datasiswa/');
			}
			else {
				redirect('Home/datasiswa');
			}
    }
    else {
      $file_data = $this->upload->data();
      $file_path = './upload_siswa_csv/'.$file_data['file_name'];
      if ($this->csvimport->get_array($file_path))
      {
        $csv_array = $this->csvimport->get_array($file_path);
        foreach ($csv_array as $row)
        {
          if (isset($row['nim']))
          {
            $insert_data = array(
              'nim' => $row['nim'],
              'namasiswa' => $row ['nama_siswa'],
              'gender' => $row['gender'],
              'alamat' => $row['alamat'],
              'tmlahir' => $row['tempat_lahir'],
              'tgllahir' => $row['tgl_lahir'],
              'namawali' => $row['nama_wali'],
            );
            $this->Siswa_model->insert_csv($insert_data);
          }
        }
      }
      $this->session->set_flashdata('import', 'sucess');
      $akun = $this->session->userdata('akun');
			if ($akun['level'] == 1 ) {
				redirect('Admin/datasiswa/');
			}
			else {
				redirect('Home/datasiswa');
			}
    }
  }

}

?>
