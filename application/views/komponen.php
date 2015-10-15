<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Detail Komponen
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

        <?php if($this->session->flashdata('update'))
        { ?>
              <script type="text/javascript">
              $.bootstrapGrowl("Update Data <strong>Berhasil !</strong>", // Messages
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

              <!--Alert Form Validation-->
              <?php if(isset($error)){ ?>
              <div class="alert alert-danger alert-dismissible"> <!--bootstrap error div-->
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $error; ?>
              </div>
              <?php } ?>

        <div class="row">
          <div class="col-sm-4">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahKomponen"><i class="fa fa-plus"></i> Tambah Data Komponen</button>
          </div>
        </div>

        <!-- Modal Komponen -->
<div class="modal fade" id="tambahKomponen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Komponen</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?php echo base_url() ;?>Transaksi/tambah_komponen" method="POST">
          <div class="form-group">
              <label class="col-sm-4 control-label">Nama Komponen</label>
                <div class="col-sm-4">
                  <input class="form-control" id="inputEmail3" placeholder="Nama Komponen" name="nama_komponen">
                </div>
          </div>
           <div class="form-group">
              <label class="col-sm-4 control-label">Deskripsi Komponen</label>
                <div class="col-sm-4">
                  <input class="form-control" id="inputEmail3" placeholder="Deskripsi Komponen" name="deskripsi">
                </div>
          </div>
          <div class="form-group">
              <label class="col-sm-4 control-label">Jumlah Iuran</label>
                <div class="col-sm-4">
                  <input class="form-control" id="inputEmail3" placeholder="Jumlah Iuran" name="iuran">
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
<!--Modal Delete Data Siswa-->
              <div class="modal fade" id="deleteKomponen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Komponen</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="<?php echo base_url() ?>Transaksi/delete_komponen">
          <input class="form-control" id="inputEmail3" type="hidden" name="idkomponen">
          <h5>Anda Yakin Ingin Menghapus Data Ini ? </h5>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Ya</button>
      </div>
      </form>
    </div>
    </div>
  </div>
</div><!--End Modal-->

         <div class="box box-info" style="margin-top:20px">
              <div class="box-body">
               <table id="komponen" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Komponen</th>
                        <th>Deskripsi Komponen</th>
                        <th>Jumlah Iuran</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no=1;
                        foreach ($komponen as $row) {
                           ?>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $row['nama_komp'];?></td>
                        <td><?php echo $row['deskripsi'];?></td>
                        <td><?php echo $row['iuran'];?></td>
                        <td>
                        <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editKomponen"
                        data-idkomponen="<?php echo $row['idkomponen']; ?>"
                        data-nama_komp="<?php echo $row['nama_komp']; ?>"
                        data-deskripsi="<?php echo $row['deskripsi']; ?>"
                        data-iuran="<?php echo $row['iuran']; ?>"><i class="fa fa-edit" ></i> Edit</button>
                        <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteKomponen" data-idkomponen="<?php echo $row['idkomponen'];?>"><i class="fa fa-trash"></i>Hapus</button>
                        </td>
                      </tr>
                      <?php
                         }
                       ?>
                    </tbody>
                </table>

<!--Modal Edit Data Komponen-->
              <div class="modal fade" id="editKomponen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Komponen</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Transaksi/update_komponen">

          <input class="form-control" id="inputEmail3" type="hidden" name="idkomponen">

          <div class="form-group">
                    <label class="col-sm-3 control-label">Nama Komponen</label>
                    <div class="col-sm-4">
                      <input class="form-control" id="inputEmail3" placeholder="Nama Komponen" name="nama_komp">
                    </div>
          </div>

          <div class="form-group">
                  <label class="col-sm-3 control-label">Deskripsi</label>
                  <div class="col-sm-4">
                    <input class="form-control" id="inputEmail3" placeholder="Deskripsi" name="deskripsi">
                  </div>
            </div>

          <div class="form-group">
                  <label class="col-sm-3 control-label">Iuran</label>
                  <div class="col-sm-4">
                    <input class="form-control" id="inputEmail3" placeholder="Iuran" name="iuran">
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

              </div><!-- /.box body-->
            </div>
            </div>
          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <script type="text/javascript">
          $(document).ready(function() {
            $('#komponen').DataTable();
          } );
      </script>
