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
      <table class="table table-striped">
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

<div class="table-responsive" style="margin-left:630px">
  <table class="table">
    <tbody>
      <tr>
        <th style="margin-left:50px">Total:</th>
        <td><input class="form-control" id="jumlah" value="<?= $jumlah; ?>" type="text" disabled></td>
      </tr>
    </tbody>
  </table>
</div>

<!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-xs-12">

      <!-- data untuk print -->
      <form action="<?= base_url('Transaksi/submitPayment');?>" method="post">
        <input type="" name="tgltransaksi" value="<?= date("j M Y") ?>">
        <input type="" name="idsiswa" value="<?= $data['id_siswa']; ?>">
        <input type="" name="bulan" value="<?= $key['periode']; ?>">
        <input type="" name="idtahun" value="<?= $key['id_tahun']; ?>">
        <input type="" name="idkelas" value="<?= $data['id_kelas']; ?>">
        <input type="" name="jeniskelas" value="<?= $data['jenis_kelas']; ?>">
        <input type="" name="nominalspp" value="<?= $jumlah; ?>">
        <?php
        $akun = $this->session->userdata('akun');
        ?>
        <input type="" name="iduser" value="<?= $akun['iduser']; ?>">
        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Input Pembayaran</button>
      </form>

    </div>
  </div>
</section>
</div>
