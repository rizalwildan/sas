      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Rekap Keuangan Per Siswa
          </h1>
        </section>


        <!-- Main content -->
        <section class="content">
          <div class="row">
          <div class="col-xs-12">
          <div class="row">
              <?php $akun = $this->session->userdata('akun');
              if ($akun['level'] == 1) { ?>
                <form method="post" action="<?= base_url('Admin/print_rekap_siswa');?>">
              <?php } else { ?> 
                <form method="post" action="<?= base_url('Home/print_rekap_siswa');?>">
              <?php } ?>
                  
                  <div class="col-sm-6">
                    <div id="example1_length" class="dataTables_length">
                      <label>
                        Kelas
                        <select class="form-control input-sm" aria-controls="example1" name="kelas" >
                            <option value="">--Pilih Kelas--</option>
                              <?php foreach($kelas->result() as $isikelas){ ?>
                            <option value="<?php echo $isikelas->namakelas; ?>"><?php echo $isikelas->namakelas; ?></option>
                          <?php } ?>
                        </select>
                        </label>
                      </div>
                    </div>
            </div>

          <div class="row">
            <div class="col-xs-12">
            <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-print"></i> Print</button>
            </div>
          </div>
          </form>
            <div class="box box-info" style="margin-top:20px">
              <div class="box-body">
                <div class="row">
                <div class="col-md-12" style="overflow:auto;">
                 <table id='rekapsiswa' class='table table-bordered table-striped'>
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
                      foreach ($spp as $key) { ?>
                      <tr>
                        <td><?= $key['nim']?></td>
                        <td><?= $key['nama']?></td>
                        <td><?= $key['namakelas'] ?></td>
                        <td>
                          <button class="btn btn-link" data-toggle="modal" data-target="#editRekapJanuari"
                          data-nim="<?=$key['nim'] ?>"
                          data-namasiswa="<?=$key['nama'] ?>"
                          data-namakelas="<?=$key['namakelas'] ?>"
                          data-periode="Januari"
                          data-januari="<?=$key['januari'] ?>">
                          <?= $key['januari']?>
                          </button>
                        </td>
                        <td>
                          <button class="btn btn-link" data-toggle="modal" data-target="#editRekapFebruari"
                          data-nim="<?=$key['nim'] ?>"
                          data-namasiswa="<?=$key['nama'] ?>"
                          data-namakelas="<?=$key['namakelas'] ?>"
                          data-periode="Februari"
                          data-februari="<?=$key['februari'] ?>">
                          <?= $key['februari']?>
                          </button>
                        </td>
                        <td>
                          <button class="btn btn-link" data-toggle="modal" data-target="#editRekapMaret"
                          data-nim="<?=$key['nim'] ?>"
                          data-namasiswa="<?=$key['nama'] ?>"
                          data-namakelas="<?=$key['namakelas'] ?>"
                          data-periode="Maret"
                          data-maret="<?=$key['maret'] ?>">
                          <?= $key['maret']?>
                          </button>
                        </td>
                        <td>
                          <button class="btn btn-link" data-toggle="modal" data-target="#editRekapApril"
                          data-nim="<?=$key['nim'] ?>"
                          data-namasiswa="<?=$key['nama'] ?>"
                          data-namakelas="<?=$key['namakelas'] ?>"
                          data-periode="April"
                          data-april="<?=$key['april'] ?>">
                          <?= $key['april']?>
                          </button>
                        </td>
                        <td>
                          <button class="btn btn-link" data-toggle="modal" data-target="#editRekapMei"
                          data-nim="<?=$key['nim'] ?>"
                          data-namasiswa="<?=$key['nama'] ?>"
                          data-namakelas="<?=$key['namakelas'] ?>"
                          data-periode="Mei"
                          data-mei="<?=$key['mei'] ?>">
                          <?= $key['mei']?>
                          </button>
                        </td>
                        <td>
                          <button class="btn btn-link" data-toggle="modal" data-target="#editRekapJuni"
                          data-nim="<?=$key['nim'] ?>"
                          data-namasiswa="<?=$key['nama'] ?>"
                          data-namakelas="<?=$key['namakelas'] ?>"
                          data-periode="Juni"
                          data-juni="<?=$key['juni'] ?>">
                          <?= $key['juni']?>
                          </button>
                        </td>
                        <td>
                          <button class="btn btn-link" data-toggle="modal" data-target="#editRekapJuli"
                          data-nim="<?=$key['nim'] ?>"
                          data-namasiswa="<?=$key['nama'] ?>"
                          data-namakelas="<?=$key['namakelas'] ?>"
                          data-periode="Juli"
                          data-juli="<?=$key['juli'] ?>">
                          <?= $key['juli']?>
                          </button>
                        </td>
                        <td>
                          <button class="btn btn-link" data-toggle="modal" data-target="#editRekapAgustus"
                          data-nim="<?=$key['nim'] ?>"
                          data-namasiswa="<?=$key['nama'] ?>"
                          data-namakelas="<?=$key['namakelas'] ?>"
                          data-periode="Agustus"
                          data-agustus="<?=$key['agustus'] ?>">
                          <?= $key['agustus']?>
                          </button>
                        </td>
                        <td>
                          <button class="btn btn-link" data-toggle="modal" data-target="#editRekapSeptember"
                          data-nim="<?=$key['nim'] ?>"
                          data-namasiswa="<?=$key['nama'] ?>"
                          data-namakelas="<?=$key['namakelas'] ?>"
                          data-periode="September"
                          data-september="<?=$key['september'] ?>">
                          <?= $key['september']?>
                          </button>
                        </td>
                        <td>
                          <button class="btn btn-link" data-toggle="modal" data-target="#editRekapOktober"
                          data-nim="<?=$key['nim'] ?>"
                          data-namasiswa="<?=$key['nama'] ?>"
                          data-namakelas="<?=$key['namakelas'] ?>"
                          data-periode="Oktober"
                          data-oktober="<?=$key['oktober'] ?>">
                          <?= $key['oktober']?>
                          </button>
                        </td>
                        <td>
                          <button class="btn btn-link" data-toggle="modal" data-target="#editRekapNovember"
                          data-nim="<?=$key['nim'] ?>"
                          data-namasiswa="<?=$key['nama'] ?>"
                          data-namakelas="<?=$key['namakelas'] ?>"
                          data-periode="November"
                          data-november="<?=$key['november'] ?>">
                          <?= $key['november']?>
                          </button>
                        </td>
                        <td>
                          <button class="btn btn-link" data-toggle="modal" data-target="#editRekapDesember"
                          data-nim="<?=$key['nim'] ?>"
                          data-namasiswa="<?=$key['nama'] ?>"
                          data-namakelas="<?=$key['namakelas'] ?>"
                          data-periode="Desember"
                          data-desember="<?=$key['desember'] ?>">
                          <?= $key['desember']?>
                          </button>
                        </td>
                        <td><?= $key['total']?></td>
                      </tr>
                      <?php }?>
                    </tbody>
                </table>
              </div><!-- /.box body-->
            </div>

                </div>
                </div>

  <!--Modal Edit Rekap Januari-->
  <div class="modal fade" id="editRekapJanuari" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Edit Rekap</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Transaksi/edit_rekap">


          <input class="form-control" id="inputEmail3" type="hidden"  name="periode">


          <input class="form-control" id="inputEmail3" type="hidden"  name="nim">

          <input class="form-control" id="inputEmail3" type="hidden"  name="nama">

          <input class="form-control" id="inputEmail3" type="hidden" name="namakelas">



<div class="form-group">
        <label class="col-sm-3 control-label">Nominal</label>
        <div class="col-sm-4">
          <input class="form-control" id="inputEmail3" name="nominal">
        </div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
<button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>
</div>
</div>
</div><!--End Modal-->

<!--Modal Edit Rekap Februari-->
<div class="modal fade" id="editRekapFebruari" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Edit Rekap</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Transaksi/edit_rekap">

  <input class="form-control" id="inputEmail3" type="hidden"  name="periode">


  <input class="form-control" id="inputEmail3" type="hidden"  name="nim">

  <input class="form-control" id="inputEmail3" type="hidden"  name="nama">

  <input class="form-control" id="inputEmail3" type="hidden" name="namakelas">

<div class="form-group">
      <label class="col-sm-3 control-label">Nominal</label>
      <div class="col-sm-4">
        <input class="form-control" id="inputEmail3" name="nominal">
      </div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
<button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>
</div>
</div>
</div><!--End Modal-->

<!--Modal Edit Rekap Maret-->
<div class="modal fade" id="editRekapMaret" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Edit Rekap</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Transaksi/edit_rekap">

  <input class="form-control" id="inputEmail3" type="hidden"  name="periode">


  <input class="form-control" id="inputEmail3" type="hidden"  name="nim">

  <input class="form-control" id="inputEmail3" type="hidden"  name="nama">

  <input class="form-control" id="inputEmail3" type="hidden" name="namakelas">
<div class="form-group">
      <label class="col-sm-3 control-label">Nominal</label>
      <div class="col-sm-4">
        <input class="form-control" id="inputEmail3" name="nominal">
      </div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
<button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>
</div>
</div>
</div><!--End Modal-->

<!--Modal Edit Rekap April-->
<div class="modal fade" id="editRekapApril" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Edit Rekap</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Transaksi/edit_rekap">

  <input class="form-control" id="inputEmail3" type="hidden"  name="periode">


  <input class="form-control" id="inputEmail3" type="hidden"  name="nim">

  <input class="form-control" id="inputEmail3" type="hidden"  name="nama">

  <input class="form-control" id="inputEmail3" type="hidden" name="namakelas">

<div class="form-group">
      <label class="col-sm-3 control-label">Nominal</label>
      <div class="col-sm-4">
        <input class="form-control" id="inputEmail3" name="nominal">
      </div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
<button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>
</div>
</div>
</div><!--End Modal-->

<!--Modal Edit Rekap Mei-->
<div class="modal fade" id="editRekapMei" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Edit Rekap</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Transaksi/edit_rekap">

  <input class="form-control" id="inputEmail3" type="hidden"  name="periode">


  <input class="form-control" id="inputEmail3" type="hidden"  name="nim">

  <input class="form-control" id="inputEmail3" type="hidden"  name="nama">

  <input class="form-control" id="inputEmail3" type="hidden" name="namakelas">
<div class="form-group">
      <label class="col-sm-3 control-label">Nominal</label>
      <div class="col-sm-4">
        <input class="form-control" id="inputEmail3" name="nominal">
      </div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
<button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>
</div>
</div>
</div><!--End Modal-->

<!--Modal Edit Rekap Juni-->
<div class="modal fade" id="editRekapJuni" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Edit Rekap</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Transaksi/edit_rekap">

  <input class="form-control" id="inputEmail3" type="hidden"  name="periode">


  <input class="form-control" id="inputEmail3" type="hidden"  name="nim">

  <input class="form-control" id="inputEmail3" type="hidden"  name="nama">

  <input class="form-control" id="inputEmail3" type="hidden" name="namakelas">

<div class="form-group">
      <label class="col-sm-3 control-label">Nominal</label>
      <div class="col-sm-4">
        <input class="form-control" id="inputEmail3" name="nominal">
      </div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
<button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>
</div>
</div>
</div><!--End Modal-->

<!--Modal Edit Rekap Juli-->
<div class="modal fade" id="editRekapJuli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Edit Rekap</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Transaksi/edit_rekap">

  <input class="form-control" id="inputEmail3" type="hidden"  name="periode">


  <input class="form-control" id="inputEmail3" type="hidden"  name="nim">

  <input class="form-control" id="inputEmail3" type="hidden"  name="nama">

  <input class="form-control" id="inputEmail3" type="hidden" name="namakelas">
<div class="form-group">
      <label class="col-sm-3 control-label">Nominal</label>
      <div class="col-sm-4">
        <input class="form-control" id="inputEmail3" name="nominal">
      </div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
<button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>
</div>
</div>
</div><!--End Modal-->

<!--Modal Edit Rekap Agustus-->
<div class="modal fade" id="editRekapAgustus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Edit Rekap</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Transaksi/edit_rekap">

  <input class="form-control" id="inputEmail3" type="hidden"  name="periode">


  <input class="form-control" id="inputEmail3" type="hidden"  name="nim">

  <input class="form-control" id="inputEmail3" type="hidden"  name="nama">

  <input class="form-control" id="inputEmail3" type="hidden" name="namakelas">
<div class="form-group">
      <label class="col-sm-3 control-label">Nominal</label>
      <div class="col-sm-4">
        <input class="form-control" id="inputEmail3" name="nominal">
      </div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
<button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>
</div>
</div>
</div><!--End Modal-->

<!--Modal Edit Rekap September-->
<div class="modal fade" id="editRekapSeptember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Edit Rekap</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Transaksi/edit_rekap">

  <input class="form-control" id="inputEmail3" type="hidden"  name="periode">


  <input class="form-control" id="inputEmail3" type="hidden"  name="nim">

  <input class="form-control" id="inputEmail3" type="hidden"  name="nama">

  <input class="form-control" id="inputEmail3" type="hidden" name="namakelas">

<div class="form-group">
      <label class="col-sm-3 control-label">Nominal</label>
      <div class="col-sm-4">
        <input class="form-control" id="inputEmail3" name="nominal">
      </div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
<button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>
</div>
</div>
</div><!--End Modal-->

<!--Modal Edit Rekap Oktober-->
<div class="modal fade" id="editRekapOktober" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Edit Rekap</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Transaksi/edit_rekap">

  <input class="form-control" id="inputEmail3" type="hidden"  name="periode">


  <input class="form-control" id="inputEmail3" type="hidden"  name="nim">

  <input class="form-control" id="inputEmail3" type="hidden"  name="nama">

  <input class="form-control" id="inputEmail3" type="hidden" name="namakelas">

<div class="form-group">
      <label class="col-sm-3 control-label">Nominal</label>
      <div class="col-sm-4">
        <input class="form-control" id="inputEmail3" name="nominal">
      </div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
<button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>
</div>
</div>
</div><!--End Modal-->

<!--Modal Edit Rekap November-->
<div class="modal fade" id="editRekapNovember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Edit Rekap</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Transaksi/edit_rekap">

  <input class="form-control" id="inputEmail3" type="hidden"  name="periode">


  <input class="form-control" id="inputEmail3" type="hidden"  name="nim">

  <input class="form-control" id="inputEmail3" type="hidden"  name="nama">

  <input class="form-control" id="inputEmail3" type="hidden" name="namakelas">

<div class="form-group">
      <label class="col-sm-3 control-label">Nominal</label>
      <div class="col-sm-4">
        <input class="form-control" id="inputEmail3" name="nominal">
      </div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
<button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>
</div>
</div>
</div><!--End Modal-->

<!--Modal Edit Rekap Desember-->
<div class="modal fade" id="editRekapDesember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Edit Rekap</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Transaksi/edit_rekap">

  <input class="form-control" id="inputEmail3" type="hidden"  name="periode">


  <input class="form-control" id="inputEmail3" type="hidden"  name="nim">

  <input class="form-control" id="inputEmail3" type="hidden"  name="nama">

  <input class="form-control" id="inputEmail3" type="hidden" name="namakelas">
<div class="form-group">
      <label class="col-sm-3 control-label">Nominal</label>
      <div class="col-sm-4">
        <input class="form-control" id="inputEmail3" name="nominal">
      </div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
<button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>
</div>
</div>
</div><!--End Modal-->
              </div><!-- /.box body-->
            </div>

        </div>
      </div><!--Col-xs-12-->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<script type="text/javascript">
      $(document).ready(function() {
      $('#rekapsiswa').DataTable();
      } );
  </script>
