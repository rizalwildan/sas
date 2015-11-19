<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

  function __construct()
  {
   parent::__construct();
   $this->load->model('Pesan_model');
  }

  public function cek_no()
  {
    $bulan = $this->input->post('bulan');
    $data['no'] = $this->Pesan_model->cek_no($bulan);

    $this->load->view('template/header');
		$this->load->view('template/sidebar2');
		$this->load->view('pesan', $data);
		$this->load->view('template/footer');

  }

  public function kirim_pesan()
  {
    //tgl
    $date = date('Y-m-d H:i:s');

    $dest = array();
    $no = $this->input->post('no');
    $dest = preg_split("/[\s]+/", $no);

    //ambil isi pesan
    $pesan = $this->input->post('isi');
    $panjang = strlen($pesan);

    if (is_array($dest)) {
      foreach ($dest as $dest1):
        if ($panjang > 160) {
          //split string
          $tmpmsg = str_split($pesan, 150);
          $jumlah = count($tmpmsg);
          $jumlah = sprintf('%02s', $jumlah);

          //insert first part to outbox
          $this->Pesan_model->insertOutbox($dest1, $date, $tmpmsg[0], $jumlah);

          //get last outbox ID
          $outboxid = $this->Pesan_model->getLastOutboxID();
          $outboxid = $outboxid->row('value');

          //insert the rest part to outbox multipart
          for($i=1; $i<count($tmpmsg); $i++)
          $this->Pesan_model->insertOutboxMultipart($outboxid, $tmpmsg[$i], $i, $jumlah);
        }
        else {
          $this->Pesan_model->sendMessage($dest1, $date, $pesan);
        }
      endforeach;
      $this->session->set_flashdata('insert', 'berhasil');

      $akun = $this->session->userdata('akun');

			if($akun['level'] == 1)
			{
			redirect(base_url().'Admin/pesan');
			}
			else
			{
			redirect(base_url().'Home/pesan');
			}
          }
  }
}
