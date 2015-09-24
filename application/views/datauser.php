Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

          <h1>
            Data User
          </h1>
        </section>

    <?php if($this->session->flashdata('insert'))
    { ?>
          <script type="text/javascript">
          $.bootstrapGrowl("Manipulasi Data <strong>Berhasil !</strong>", // Messages
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

                <div class="row">
                    <div class="col-sm-12">
                      <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalUser"><i class="fa fa-plus"></i> Tambah User</button>
                    </div>
                </div>

                       <!-- Modal Tambah User -->
<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data User</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>User/insert_user">
          <div class="form-group">
              <label class="col-sm-4 control-label">Username</label>
                <div class="col-sm-4">
                  <input class="form-control" type="text" placeholder="Username" name="username">
                </div>
          </div>
          <div class="form-group">
              <label class="col-sm-4 control-label">Password</label>
                <div class="col-sm-4">
                  <input class="form-control" type="password" placeholder="Password" name="password">
                </div>
          </div>
          <div class="form-group">
                    <label class="col-sm-4 control-label">Level</label>
                    <div class="col-sm-4">
                    <select class="form-control input-sm" aria-controls="example1" name="level">
                        <option value="">Pilih Level Akses</option>
                        <option value="1">Root</option>
                        <option value="2">Admin</option>
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


            <div class="box box-info" style="margin-top:20px">
              <div class="box-body">
                <div class="row">
                <div class="col-md-5">
               <table id='example1' class='table table-bordered table-striped' style='margin-right:600px'>
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($user as $row)
                      {
                      ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['namalevel']; ?></td>
                        <td>
                        <?php if($row['username'] == 'root') { ?>
                        <button class='btn btn-primary btn-xs' data-toggle='modal' data-target='#editUser'
                                        data-iduser="<?php echo $row['iduser']; ?>"
                                        data-username="<?php echo $row['username']; ?>"><i class='fa fa-edit'></i> Edit</button>
                        <?php } else {?>
                        <button class="btn btn-primary btn-xs" data-toggle='modal' data-target='#editUser'
                                        data-iduser="<?php echo $row['iduser']; ?>"
                                        data-username="<?php echo $row['username']; ?>"><i class='fa fa-edit'></i> Edit</button>
                        <button class="btn btn-danger btn-xs"><i class='fa fa-trash'></i> Hapus</button>
                        <?php } ?>
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

            <!--Modal Edit User-->
            <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Data User</h4>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>User/update_user">
                      <div class="form-group">
                          <label class="col-sm-4 control-label">Username</label>
                            <div class="col-sm-4">
                              <input class="form-control" type="text" placeholder="Username" name="username">
                              <input class="form-control" type="hidden" name="iduser">
                            </div>
                      </div>
                      <div class="form-group">
                                <label class="col-sm-4 control-label">Level</label>
                                <div class="col-sm-4">
                                <select class="form-control input-sm" aria-controls="example1" name="level">
                                    <option value="">Pilih Level Akses</option>
                                    <option value="1">Root</option>
                                    <option value="2">Admin</option>
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
            </div>
            </div><!--End Modal-->
            </div>

        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper
