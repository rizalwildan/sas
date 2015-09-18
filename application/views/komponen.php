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
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Data Komponen</button>
          </div>
        </div>

        <!-- Modal Komponen -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Komponen</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="form-group">
              <label class="col-sm-4 control-label">Nama Komponen</label>
                <div class="col-sm-4">
                  <input class="form-control" id="inputEmail3" placeholder="Nama Komponen">
                </div>
          </div>
           <div class="form-group">
              <label class="col-sm-4 control-label">Deskripsi Komponen</label>
                <div class="col-sm-4">
                  <input class="form-control" id="inputEmail3" placeholder="Deskripsi Komponen">
                </div>
          </div>
          <div class="form-group">
              <label class="col-sm-4 control-label">Jumlah Iuran</label>
                <div class="col-sm-4">
                  <input class="form-control" id="inputEmail3" placeholder="Jumlah Iuran">
                </div>
          </div>
          <div class="form-group">
                    <label class="col-sm-4 control-label">Status</label>
                    <div class="col-sm-4">
                    <select class="form-control input-sm" aria-controls="example1" name="example1_length">
                        <option value="--pilih kelas--">--Pilih Status--</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                    </div>
                  </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
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
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Uang Sumbangan Gedung</td>
                        <td>Iuran uang sumbangan gedung sekolah</td>
                        <td>Rp 50.000</td>
                        <td>Aktif</td>
                        <td>
                        <a class="btn btn-small" href="#"><i class="fa fa-edit"></i> Edit</a>
                        <a class="btn btn-small" href="#"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Tabungan Wisata</td>
                        <td>Tabungan Wisata Kebali</td>
                        <td>Rp 10.000</td>
                        <td>Aktif</td>
                        <td>
                        <a class="btn btn-small" href="#"><i class="fa fa-edit"></i> Edit</a>
                        <a class="btn btn-small" href="#"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Iuran Internet</td>
                        <td>Iuran Internet Sekolah</td>
                        <td>Rp 20.000</td>
                        <td>Aktif</td>
                        <td>
                        <a class="btn btn-small" href="#"><i class="fa fa-edit"></i> Edit</a>
                        <a class="btn btn-small" href="#"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                      </tr>
        
                    </tbody>
                </table>

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