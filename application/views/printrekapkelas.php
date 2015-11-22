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
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Laporan Keuangan Per Kelas
            <small class="pull-right">Tanggal Cetak: <?= date("j M Y") ?></small>
          </h2>
          </div><!-- /.col -->
        </div>

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table id='rekapkelas' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                        <th>Nama Kelas</th>
                        <th>January</th>
                        <th>February</th>
                        <th>Maret</th>
                        <th>April</th>
                        <th>Mei</th>
                        <th>Juni</th>
                        <th>Juli</th>
                        <th>Agustus</th>
                        <th>September</th>
                        <th>Oktober</th>
                        <th>November</th>
                        <th>Desember</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($spp as $key) { ?>
                      <tr>
                        <td><?= $key['namakelas']?></td>
                        <td><?= $key['januari']?></td>
                        <td><?= $key['februari']?></td>
                        <td><?= $key['maret']?></td>
                        <td><?= $key['april']?></td>
                        <td><?= $key['mei']?></td>
                        <td><?= $key['juni']?></td>
                        <td><?= $key['juli']?></td>
                        <td><?= $key['agustus']?></td>
                        <td><?= $key['september']?></td>
                        <td><?= $key['oktober']?></td>
                        <td><?= $key['november']?></td>
                        <td><?= $key['desember']?></td>
                        <td><?= $key['januari'] + $key['februari'] + $key['maret'] + $key['april'] + $key['mei']
                        + $key['juni'] + $key['juli'] + $key['agustus'] + $key['september'] + $key['oktober'] + $key['november']
                        + $key['desember']?></td>
                      </tr>
                      <?php }?>

                      <thead>
                        <tr>
                        <th>Total</th>
                        <?php 
                         foreach ($jumlah as $data) { ?>
                          <th><?= $data['januari']?></th>
                          <th><?= $data['februari']?></th>
                          <th><?= $data['maret']?></th>
                          <th><?= $data['april']?></th>
                          <th><?= $data['mei']?></th>
                          <th><?= $data['juni']?></th>
                          <th><?= $data['juli']?></th>
                          <th><?= $data['agustus']?></th>
                          <th><?= $data['september']?></th>
                          <th><?= $data['oktober']?></th>
                          <th><?= $data['november']?></th>
                          <th><?= $data['desember']?></th>
                          <?php $total = $data['januari'] + $data['februari'] + $data['maret'] + $data['april']
                          + $data['mei'] + $data['juni'] + $data['juli'] + $data['agustus'] + $data['september']
                          + $data['oktober'] + $data['november'] + $data['desember']; ?>
                          <th><?= $total ?></th>
                         <?php } ?>
                        </tr>
                      </thead>
                    </tbody>
                      
                </table>
          </div><!-- /.col -->
        </div><!-- /.row -->

      <!-- this row will not appear when printing -->

      </section>
      </div>
      
      <button type="submit" onclick="printDiv('print')"><i class="fa fa-print"></i> Cetak Laporan </button>
    <?php
    $akun = $this->session->userdata('akun');
    if($akun['level'] == 1){?>
      <a href="<?php echo base_url(); ?>admin/rekap_kelas"> Kembali </a>
    <?php } else { ?>
      <a href="<?php echo base_url(); ?>home/rekap_kelas"> Kembali </a>
    <?php } ?>
    

    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="<?= base_url(). 'asset/dist/js/app.min.js';?>"></script>
  </body>
</html>
