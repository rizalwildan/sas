<html>
	<head>
		<title>Print Nota</title>

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
		<div id="print">
		<table border="0" style="width:30%">
			<tr>
				<td>
					Nota SPP SMAN 3 MAGETAN 
				</td>
				<td>
					Tgl Cetak : <?= date("j M Y") ?> <br>
				</td>
			</tr>
		</table>
		-------------------------------------------------------------------------
		<br>
		<table border="0" style="width:40%">
			<?php foreach ($siswa as $data) { ?>
			<tr>
				<td>Nama : <?= $data['namasiswa']; ?></td>
			</tr>
			<tr>
				<td>Nis : <?= $data['nim']; ?></td>
			</tr>
			<tr>
				<td>Kelas : <?= $data['namakelas']; ?></td>
			</tr>
			<?php }?>
		</table>
		<br>
		-------------------------------------------------------------------------
		<table border="0" style="width:40%">									 
  		<tr>
    		<td><b>No</b></td>
    		<td><b>Komponen</b></td>		
    		<td><b>Iuran</b></td>
  		</tr>
  		<?php
  		$no = 1;
  		foreach ($komponen as $key) { ?>
  			<tr>														 
    		<td><?= $no++; ?></td>
    		<td><?= $key['nama_komp']; ?></td>		
    		<td><?= $key['iuran']; ?></td>
  			</tr>
  		<?php } ?>
		</table>
		<br>
		-------------------------------------------------------------------------

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


		<table border="0" style="margin-left:50px">									 
  		<tr>
    		<td>Subtotal </td>
    		<td>:</td>
    		<td><?= $jumlah; ?></td>		
  		</tr>
  		<tr>
    		<td>Pembayaran bulan </td>
    		<td>:</td>
    		<td><?= $bulanpembayaran; ?></td>		
  		</tr>
  		<tr>
    		<td>Dana BOS </td>
    		<td>:</td>
    		<td><?= $danabos; ?></td>		
  		</tr>
  		<tr>
    		<td>Total </td>
    		<td>:</td>
    		<td><?= $totalpembayaran; ?></td>		
  		</tr>
  		</table>
  		<br>
  		------------------------------------------------------------------------
  		<br><br><br>
  		<table style="margin-left:50px">
  		<tr>
  		<td>(Sri wahyuni)</td>
  		</tr>
  		</table>
  		</div>
  		<button type="submit" onclick="printDiv('print')"><i class="fa fa-print"></i> Cetak Nota </button>
    <?php
    $akun = $this->session->userdata('akun');
    if($akun['level'] == 1){?>
      <a href="<?php echo base_url(); ?>admin/transaksi"> Kembali </a>
    <?php } else { ?>
      <a href="<?php echo base_url(); ?>home/transaksi"> Kembali </a>
    <?php } ?>

	</body>
</html>
