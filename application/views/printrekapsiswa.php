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
  </head>
  <body onload="window.print();">
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Laporan Keuangan Siswa Kelas
            <small class="pull-right">Tanggal Cetak: <?= date("j M Y") ?></small>
          </h2>
          </div><!-- /.col -->
        </div>

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table id='rekapsiswa' class='table table-bordered table-striped'>
               <thead>
                 <tr>
                   <th>Nis</th>
                   <th>Nama Siswa</th>
                   <th>Kelas</th>
                   <th>Jan</th>
                   <th>Feb</th>
                   <th>Mar</th>
                   <th>Apr</th>
                   <th>Mei</th>
                   <th>Juni</th>
                   <th>Juli</th>
                   <th>Agus</th>
                   <th>Sept</th>
                   <th>Okto</th>
                   <th>Nov</th>
                   <th>Des</th>
                   <th>Total</th>
                 </tr>
               </thead>
               <tbody>
                 <?php
                 foreach ($spp as $key) { ?>
                 <tr>
                   <td><?= $key['nim']?> </td>
                   <td><?= $key['nama']?></td>
                   <td><?= $key['namakelas'] ?></td>
                   <td><?= $key['Januari']?></td>
                   <td><?= $key['Februari']?></td>
                   <td><?= $key['Maret']?></td>
                   <td><?= $key['April']?></td>
                   <td><?= $key['Mei']?></td>
                   <td><?= $key['Juni']?></td>
                   <td><?= $key['Juli']?></td>
                   <td><?= $key['Agustus']?></td>
                   <td><?= $key['September']?></td>
                   <td><?= $key['Oktober']?></td>
                   <td><?= $key['November']?></td>
                   <td><?= $key['Desember']?></td>
                   <td><?= $key['total']?></td>
                 </tr>
                 <?php }?>
               </tbody>
           </table>
          </div><!-- /.col -->
        </div><!-- /.row -->

      <!-- this row will not appear when printing -->

      </section>
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="<?= base_url(). 'asset/dist/js/app.min.js';?>"></script>
  </body>
</html>
