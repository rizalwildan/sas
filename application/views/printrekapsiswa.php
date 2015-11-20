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
          <div class="col-sm-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i>Rekap Keuangan Siswa Per Kelas
            <small class="pull-right">Tanggal Cetak: <?= date("j M Y") ?></small>
          </h2>
          </div><!-- /.col -->
        </div>
       
        <!-- Table row -->
        <div class="row">
          <div class="col-sm-12 table-responsive">
            <table class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
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
                      <?php
                      foreach ($spp as $key){ ?>
                      <tr>
                        <td><?= $key['nis']?></td>
                        <td><?= $key['nama_siswa']?></td>
                        <td><?= $key['nama_kelas'] ?></td>
                        <td>
                          <?= $key['januari']?>
                        </td>
                        <td>
                          <?= $key['februari']?>
                        </td>
                        <td>
                          <?= $key['maret']?>
                        </td>
                        <td>
                          <?= $key['april']?>
                        </td>
                        <td>
                          <?= $key['mei']?>
                        </td>
                        <td>
                          <?= $key['juni']?>
                        </td>
                        <td>
                          <?= $key['juli']?>
                        </td>
                        <td>
                          <?= $key['agustus']?>
                        </td>
                        <td>
                          <?= $key['september']?>
                        </td>
                        <td>
                          <?= $key['oktober']?>
                        </td>
                        <td>
                          <?= $key['november']?>
                        </td>
                        <td>
                          <?= $key['desember']?>
                        </td>
                        <td><?= $key['total']?></td>
                      </tr>
                      <?php }?>
                    </tbody>
                </table>
          </div><!-- /.col -->
        </div><!-- /.row -->
      
      </section>
    </div>
    <button type="submit" onclick="printDiv('print')"><i class="fa fa-print"></i> Cetak Rekap </button>
    <?php
    $akun = $this->session->userdata('akun');
    if($akun['level'] == 1){?>
      <a href="<?php echo base_url(); ?>admin/rekap"> Kembali </a>
    <?php } else { ?>
      <a href="<?php echo base_url(); ?>home/rekap"> Kembali </a>
    <?php } ?>

    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="<?= base_url(). 'asset/dist/js/app.min.js';?>"></script>
  </body>
</html>
