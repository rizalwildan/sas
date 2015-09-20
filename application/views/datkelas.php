Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Kelas
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
          <div class="col-xs-12">

                <div class="row">
                      <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Kelas</button>
                </div>

                       <!-- Modal Komponen -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Kelas</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/kelas/input">
          <div class="form-group">
              <label class="col-sm-4 control-label">Nama Kelas</label>
                <div class="col-sm-4">
                  <input class="form-control" type="text" placeholder="Nama Komponen" name="kelas">
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
</div>
</div><!--End Modal-->

            <div class="box box-info" style="margin-top:50px">
              <div class="box-body">
                <div class="row">
                <div class="col-md-5">
                  <?php
                    foreach ($p->result() as $row)
                    {

                    }
                 ?>
               <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($p->result() as $row)
                      {
                      ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row->namakelas; ?></td>
                        <td>
                        <button class="btn btn-primary btn-xs"><i class='fa fa-edit'></i> Edit</button>
                        <button class="btn btn-danger btn-xs"><i class='fa fa-trash'></i> Hapus</button>
                        </td>
                      </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                </table>

                </div>
                </div>

              </div><!-- /.box body-->
            </div>

        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper
