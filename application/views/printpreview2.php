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
  <body>
    <div class="wrapper">
      <!-- Main content -->
      <div id="print">
      <section class="invoice" style="margin-right:900px">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
           
             Nota SPP SMAN 3 MAGETAN
            <small class="pull-right">Transaksi: <?= date("j M Y") ?></small>
          <hr>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
          <address>
            <?php foreach ($siswa as $data) { ?>
              <strong><?= $data['namasiswa']; ?></strong><br>
              NIS : <?= $data['nim']; ?><br>
              Kelas : <?= $data['namakelas']; ?><br>
            <?php }?>
          </address>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table border="0" style="width:75%">
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

      <div class="table-responsive" style="margin-left:90px">
        <table border="0">
          <tbody>
            <tr>
              <th>Subtotal:</th>
              <td><?= $jumlah; ?></td>
            </tr>
            <tr>
              <th>Pembayaran Bulan:</th>
              <td><?= $bulanpembayaran; ?></td>
            </tr>
            <tr>
              <th>Dana Bos :</th>
              <td><?= $danabos; ?></td>
            </tr>
            <tr>
              <th>Total:</th>
              <td><?= $totalpembayaran; ?></td>
            </tr>
	    <tr>
              <td>
		<br/><br/><br/>
		(Sri Wahyuni)
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
