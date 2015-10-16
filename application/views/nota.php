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
        <td><input class="form-control" placeholder="periode" type="text"></td>
      </tr>
      <tr>
        <th>Dana Bos :</th>
        <td><input class="form-control" id="bos" placeholder="Dana BOS" type="text" onChange="penjumlahan();"></td>
      </tr>
      <tr>
        <th>Total:</th>
        <td><input class="form-control" id="total" value="0" type="text" disabled></td>
      </tr>
    </tbody>
  </table>
</div>

<!-- this row will not appear when printing -->
  <div class="row no-print">
    <div class="col-xs-12">
      <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
      <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
      <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
    </div>
  </div>
</section>
</div>

<script type="text/javascript">
  function penjumlahan(){
    var spp = $('#jumlah').val();
    var bos = $('#bos').val();

    document.getElementById('total').value = bos-spp;
  }
</script>