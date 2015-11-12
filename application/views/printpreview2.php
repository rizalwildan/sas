<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Invoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <link rel="stylesheet" href="<?= base_url(). 'asset/bootstrap/css/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?= base_url(). 'asset/bootstrap/css/daterangepicker.css';?>">
    <link rel="stylesheet" href="<?= base_url(). 'asset/bootstrap/css/datepicker.css';?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(). 'asset/fontawasome/css/font-awesome.min.css';?>">
    <link rel="stylesheet" href="<?= base_url(). 'asset/dist/css/AdminLTE.min.css'; ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
    function printDiv(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;

  window.print();

  document.body.innerHTML = originalContents;
  }
    </script>
  </head>
  <body onload="">
    <div class="wrapper">
      <!-- Main content -->
      <div id="print">
      <section class="invoice" style="margin-right:800px">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Nota SPP
            <small class="pull-right">Tanggal Transaksi: <?= date("j M Y") ?></small>
          </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
          <address>
            <?php foreach ($siswa as $data) { ?>
              <strong><?= $data['nama_siswa']; ?></strong><br>
              <b>NIS : <?= $data['nis']; ?> </b><br>
              <b>Kelas : <?= $data['nama_kelas']; ?> </b><br>
            <?php }?>
          </address>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table border="0" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Komponen</th>
                  <th>Iuran</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=1;
                if($komponen=="kosong"){
                  echo '<tr><div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Tidak ada komponen !
                        </div></tr>' ;
                }else{
                  foreach ($komponen as $key) { ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $key['nama_komponen']; ?></td>
                    <td><?= $key['iuran']; ?></td>
                  </tr>
                <?php } }?>
              </tbody>
            </table>
          </div><!-- /.col -->
        </div><!-- /.row -->

      <?php
        $jumlah = 0;
        if ($komponen=="kosong") {
          $jumlah = 0;
        }else{
          foreach ($komponen as $key) {
            $jumlah = $key['iuran'] + $jumlah;
          }
        }
      ?>

      <div class="" style="margin-left:260px">
        <table class="">
          <tbody>
            <tr>
              <th style="width:10%">Subtotal:</th>
              <td><b><?= $jumlah; ?></b></td>
            </tr>
            <tr>
              <td>
                Petugas</br></br></br>
                Rizal
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- this row will not appear when printing -->

      </section>
    </div>
    <button type="submit" onclick="printDiv('print')"><i class="fa fa-print"></i> Cetak Nota </button>
    <?php
    $akun = $this->session->userdata('akun');
    if($akun['level'] == 1){?>
      <a href="<?php echo base_url(); ?>admin/transaksi"> Kembali </a>
    <?php } else { ?>
      <a href="<?php echo base_url(); ?>home/transaksi"> Kembali </a>
    <?php } ?>

    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="<?= base_url(). 'asset/dist/js/app.min.js';?>"></script>
  </body>
</html>
