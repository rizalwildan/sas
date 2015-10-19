<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAS | SMAGA</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?= base_url(). 'asset/bootstrap/css/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?= base_url(). 'asset/bootstrap/css/daterangepicker.css';?>">
    <link rel="stylesheet" href="<?= base_url(). 'asset/bootstrap/css/datepicker.css';?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(). 'asset/fontawasome/css/font-awesome.min.css';?>">
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="<?= base_url(). 'asset/dist/css/AdminLTE.min.css'; ?>"> -->
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->

    <link rel="stylesheet" href="<?= base_url(). 'asset/dist/css/skins/skin-blue.min.css'; ?>">

    <link type="text/css" rel="stylesheet" href="<?php echo base_url('asset/development-bundle/themes/ui-lightness/ui.all.css');?>" />
    <script src="<?php echo base_url('asset/development-bundle/jquery-1.8.0.min.js');?>"></script>
    <script src="<?php echo base_url('asset/development-bundle/ui/ui.core.js');?>"></script>
    <script src="<?php echo base_url('asset/development-bundle/ui/ui.datepicker.js');?>"></script>
    <script src="<?php echo base_url('asset/development-bundle/ui/i18n/ui.datepicker-id.js');?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/jquery.bootstrap-growl.js');?>"></script>

  </head>




<div class="content-wrapper">
<section class="invoice">
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
        <strong><?= $data['namasiswa']; ?></strong><br>
        <b>NIS : <?= $data['nim']; ?> </b><br>
        <b>Kelas : <?= $data['namakelas']; ?> </b><br>
      <?php }?>
    </address>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Komponen</th>
            <th>Subtotal</th>
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
              <td><?= $key['nama_komp']; ?></td>
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

<div class="table-responsive" style="margin-left:370px">
  <table class="table">
    <tbody>
      <tr>
        <th style="width:50%">Subtotal:</th>
        <td><input class="form-control" id="jumlah" value="<?= $jumlah; ?>" type="text" disabled></td>
      </tr>
      <tr>
        <th>Untuk Pembayaran Bulan:</th>
        <td><input class="form-control" placeholder="periode" type="text" value="<?= $bulanpembayaran; ?>" disabled></td>
      </tr>
      <tr>
        <th>Dana Bos :</th>
        <td><input class="form-control" placeholder="Dana BOS" type="text" value="<?= $danabos; ?>" disabled></td>
      </tr>
      <tr>
        <th>Total:</th>
        <td><input class="form-control" id="total" value="<?= $totalpembayaran; ?>" type="text" disabled></td>
      </tr>
    </tbody>
  </table>
</div>

<!-- this row will not appear when printing -->

</section>
</div>
