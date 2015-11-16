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
            <?php
            $akun = $this->session->userdata('akun');
            if ($akun['level'] == 1) { ?>
              <form method="post" action="<?php echo base_url();?>Admin/filter_rekap">
            <?php } else { ?>
              <form method="post" action="<?php echo base_url();?>Home/filter_rekap">
            <?php } ?>
            <div class="row">
                   <div class="col-sm-12">
                     <div id="example1_length" class="dataTables_length">
                       <label>
                         Tahun Ajaran
                         <select class="form-control input-sm" aria-controls="example1" name="tahun">
                           <option value="">--Pilih Tahun--</option>
                           <?php foreach ($tahun->result() as $datatahun) {?>
                             <option value="<?php echo $datatahun->id_tahun; ?>"><?php echo $datatahun->nama_tahun_pelajaran; ?></option>
                           <?php } ?>
                         </select>
                         </label>
                       </div>
                     </div>
             </div>

            <div class="row">
                   <div class="col-sm-12">
                     <div id="example1_length" class="dataTables_length">
                       <label>
                         Kelas
                         <select class="form-control input-sm" aria-controls="example1" name="kelas">
                           <option value="">--Pilih Kelas--</option>
                           <?php foreach($kelas->result() as $datakelas) { ?>
                           <option value="<?php echo $datakelas->id_kelas; ?>"><?php echo $datakelas->nama_kelas; ?></option>
                           <?php }?>
                         </select>
                         </label>
                       </div>
                       <button type="submit" class="btn btn-success pull-left">Go</button>
                     </div>
             </div>
           </form>

            <div class="box box-info" style="margin-top:20px">
              <div class="box-body">
                <div class="row">
                <div class="col-md-12" style="overflow:auto;">
                 <table id='' class='table table-bordered table-striped'>
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

  <script type="text/javascript">
  function printDiv(divName) {
var printContents = document.getElementById(divName).innerHTML;
var originalContents = document.body.innerHTML;

document.body.innerHTML = printContents;

window.print();

document.body.innerHTML = originalContents;
}
  </script>
