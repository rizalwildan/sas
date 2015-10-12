Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Smester Aktif
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
            <!--Pesan Insert sukses-->
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

            <!--Alert Form Validation-->
            <?php if(isset($error)){ ?>
            <div class="alert alert-danger alert-dismissible"> <!--bootstrap error div-->
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $error; ?>
            </div>
            <?php } ?>
                <div class="row">
                  <div class="col-md-12">
                      <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#tambahSmt"><i class="fa fa-plus"></i> Tambah Smester</button>
                  </div>
                </div>

                       <!-- Modal Tambah Smester -->
<div class="modal fade" id="tambahSmt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Smester</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Smester/insert_smester">
          <div class="form-group">
              <label class="col-sm-4 control-label">Tahun Pelajaran</label>
                <div class="col-sm-4">
                  <input class="form-control" type="text" placeholder="Tahun Pelajaran" name="tahunpel">
                </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Awal Tahun Pelajaran</label>
            <div class="input-group date col-sm-4" data-date-format="yyyy/mm/dd">
              <input class="form-control" id="startDate" placeholder="Awal Smester" name="awaltahun" style="margin-left:14px">
              <span class="input-group-addon" ><i class="fa fa-calendar" style="margin-left:13px"></i></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Akhir Tahun Pelajaran</label>
            <div class="input-group date col-sm-4" data-date-format="yyyy/mm/dd">
              <input class="form-control" id="startDate" placeholder="Akhir Smester" name="akhirtahun" style="margin-left:14px">
              <span class="input-group-addon" ><i class="fa fa-calendar" style="margin-left:13px"></i></span>
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

           <div class="box box-info" style="margin-top:30px">
              <div class="box-body">
                <div class="row">
                <div class="col-md-12">
               <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tahun Pelajaran</th>
                        <th>Awal Tahun Pelajaran</th>
                        <th>Akhir Tahun Pelajaran</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($smt as $row) { ?>
                      <tr>
                        <td><?php echo $no=1; ?></td>
                          <td><?php echo $row['tahun_pelajaran']; ?></td>
                        <td><?php echo $row['awal_tahun']; ?></td>
                        <td><?php echo $row['akhir_tahun']; ?></td>
                        <td>
                        <button class="btn btn-primary btn-xs"><i class='fa fa-edit'></i> Edit</button>
                        <button class="btn btn-danger btn-xs"><i class='fa fa-trash'></i> Hapus</button>
                        </td>
                      </tr>
                      <?php }?>
                    </tbody>
                </table>

                </div>
                </div>

              </div><!-- /.box body-->
            </div>
            </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper
