Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Kelas
          </h1>
        </section>

        <?php if($this->session->flashdata('insert'))
        { ?>
              <script type="text/javascript">
              $.bootstrapGrowl("Insert Data <strong>Berhasil !</strong>", // Messages
                { // options
                  type: "success", // info, success, warning and danger
                  ele: "body", // parent container
                  offset: {
                  from: "top",
                  amount: 70
                },
                  align: "right", // right, left or center
                  width: 350,
                  delay: 3000,
                  allow_dismiss: true, // add a close button to the message
                  stackup_spacing: 10
                });
              </script>
        <?php } ?>

        <?php if($this->session->flashdata('delete'))
        { ?>
              <script type="text/javascript">
              $.bootstrapGrowl("Delete Data <strong>Berhasil !</strong>", // Messages
                { // options
                  type: "success", // info, success, warning and danger
                  ele: "body", // parent container
                  offset: {
                  from: "top",
                  amount: 70
                },
                  align: "right", // right, left or center
                  width: 350,
                  delay: 3000,
                  allow_dismiss: true, // add a close button to the message
                  stackup_spacing: 10
                });
              </script>
        <?php } ?>

        <!-- Main content -->
        <section class="content">
          <div class="row">
          <div class="col-xs-12">

            <!--Alert Form Validation -->
            <?php if(isset($error)){ ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $error; ?>
            </div>
            <?php } ?>

                <div class="row">
                  <div class="col-xs-12">
                      <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Kelas</button>
                  </div>
                </div>

                       <!-- Modal Tambah Kelas -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Kelas</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Kelas/input">
          <div class="form-group">
              <label class="col-sm-4 control-label">Nama Kelas</label>
                <div class="col-sm-4">
                  <input class="form-control" type="text" placeholder="Nama Kelas" name="kelas">
                </div>
          </div>

          <div class="form-group">
                    <label class="col-sm-4 control-label">Base Kelas</label>
                    <div class="col-sm-4">
                    <select class="form-control input-sm" aria-controls="example1" name="basekelas">
                        <option value="">--Pilih Base Kelas--</option>
                        <option value="1">X</option>
                        <option value="2">XI</option>
                        <option value="3">XII</option>
                    </select>
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

<!--Modal Delete Kelas-->
              <div class="modal fade" id="deleteKelas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Data Siswa</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="<?php echo base_url() ?>Kelas/delete_kelas">
          <input class="form-control" id="inputEmail3" type="hidden" name="idkelas">
          <h5>Anda Yakin Ingin Menghapus Data Ini ? </h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Ya</button>
      </div>
      </form>
    </div>
  </div>
</div><!--End Modal-->


            <div class="box box-info" style="margin-top:20px">
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
                        <th>Jenjang Kelas</th>
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
                        <td><?php echo $row->jenis_kelas;?></td>
                        <td>
                        <!--<button class="btn btn-primary btn-xs"><i class='fa fa-edit'></i> Edit</button>-->
                        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteKelas" data-idkelas="<?php echo $row->idkelas;?>"><i class="fa fa-trash"></i>Hapus</button>
                        </td>
                      </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                </table>

                <!--Pagination-->
                <div class="row">
                  <div class="col-md-7">
                    <?php echo $paging; ?>
                  </div>
                </div><!--</pagination-->

              </div><!-- /.box body-->
            </div>

                </div>
                </div>

              </div><!-- /.box body-->
            </div>

        </div>
      </div><!--Col-xs-12-->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper
