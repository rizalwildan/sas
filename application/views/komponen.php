<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Detail Komponen
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

         <div class="box box-info" style="margin-top:20px">
              <div class="box-body">
               <table id="example1" class="table table-bordered table-striped">
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
                        <a class="btn btn-small" data-toggle="modal" data-target="#editKomponen"
                        data-idkomponen="<?php echo $row['idkomponen']; ?>"
                        data-nama_komp="<?php echo $row['nama_komp']; ?>"
                        data-deskripsi="<?php echo $row['deskripsi']; ?>"
                        data-iuran="<?php echo $row['iuran']; ?>"><i class="fa fa-edit" ></i> Edit</a>
                        <a class="btn btn-small" href="#"><i class="fa fa-trash"></i> Hapus</a>
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

                <!--Pagination-->
                <div class="row">
                  <div class="col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers">
                      <ul class="pagination">
                        <li class="paginate_button provious disabled">
                          <a tabindex="0" data-dt-idx="0" aria-controls="example2" href="#">Previous</a>
                        </li>
                        <li class="paginate_button active">
                          <a tabindex="0" data-dt-idx="1" aria-controls="example2" href="#">1</a>
                        </li>
                         <li class="paginate_button">
                          <a tabindex="0" data-dt-idx="2" aria-controls="example2" href="#">2</a>
                        </li>
                         <li class="paginate_button">
                          <a tabindex="0" data-dt-idx="3" aria-controls="example2" href="#">3</a>
                        </li>
                         <li class="paginate_button next">
                          <a tabindex="0" data-dt-idx="4" aria-controls="example2" href="#">Next</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div><!--</pagination-->

              </div><!-- /.box body-->
            </div>
            </div>
          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
