Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Siswa
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
                    <div class="col-sm-6">
                      <div id="example1_length" class="dataTables_length">
                        <label>
                          Kelas
                          <select class="form-control input-sm" aria-controls="example1" name="kelas">
                            <option value="">--Semua Kelas--</option>
                            <?php foreach($kelas->result() as $datakelas) { ?>
                            <option value="<?php echo $datakelas->namakelas; ?>"><?php echo $datakelas->namakelas; ?></option>
                            <?php }?>
                          </select>
                          </label>
                        </div>
                      </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <h4>Cari berdasarkan</h4>
                </div>
              </div>

                <div class="row">
                     <div class="col-sm-4">
                      <div class="form-group">
                        <input class="form-control" type="text" placeholder="NIM"></input>
                      </div>
                      <div class="form-group">
                        <input class="form-control" type="text" placeholder="Nama"></input>
                      </div>
                        <button class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                    </div>
                </div>

            <div class="box box-info" style="margin-top:20px">
              <div class="box-body">
                 <a href="<?php echo base_url(); ?>index.php/home/input" >
                      <button class="btn btn-success pull-right"><i class="fa fa-plus"></i> Import Data</button>
                      </a>


                      <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalTambah" style="margin-right:10px"><i class="fa fa-plus"></i> Tambah Data</button>

               <table id="example1" class="table table-bordered table-striped" style="margin-top:50px">
                    <thead>
                      <tr>
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>Nama Orang Tua</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($siswa as $isi) { ?>
                      <tr>
                        <td><?php echo $isi['nim']; ?></td>
                        <td><button type="button" class="btn btn-link" data-toggle="modal" data-target="#detailSiswa"
                          data-namakelas="<?php echo $isi['namakelas']; ?>"
                          data-nim="<?php echo $isi['nim']; ?>"
                          data-namasiswa="<?php echo $isi['namasiswa']; ?>"
                          data-gender="<?php echo $isi['gender']; ?>"
                          data-alamat="<?php echo $isi['alamat']; ?>"
                          data-tmlahir="<?php echo $isi['tmlahir']; ?>"
                          data-tgllahir="<?php echo $isi['tgllahir']; ?>"
                          data-namawali="<?php echo $isi['namawali']; ?>"><?php echo $isi['namasiswa']; ?></button></td>

                        <td><?php echo $isi['namakelas']; ?></td>
                        <td><?php echo $isi['alamat']; ?></td>
                        <td><?php echo $isi['namawali']; ?></td>
                        <td>
                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editSiswa"
                        data-idsiswa="<?php echo $isi['idsiswa']; ?>"
                        data-nim="<?php echo $isi['nim']; ?>"
                        data-namasiswa="<?php echo $isi['namasiswa']; ?>"
                        data-namawali="<?php echo $isi['namawali']; ?>"
                        data-alamat="<?php echo $isi['alamat']; ?>"
                        data-tmlahir="<?php echo $isi['tmlahir']; ?>"
                        data-tgllahir="<?php echo $isi['tgllahir']; ?>"><i class="fa fa-edit"></i> Edit</button>
                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a></button>
                        </td>
                      </tr>
                      <?php }?>

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

              <!--Modal Tambah Data Siswa-->
              <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Siswa</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Siswa/insert_siswa">

          <div class="form-group">
                    <label class="col-sm-3 control-label">Nis</label>
                    <div class="col-sm-4">
                      <input class="form-control" id="inputEmail3" placeholder="Nis" name="nim">
                    </div>
          </div>

          <div class="form-group">
                    <label class="col-sm-3 control-label">Nama</label>
                    <div class="col-sm-4">
                      <input class="form-control" id="inputEmail3" placeholder="Nama" name="nama">
                    </div>
          </div>

           <div class="form-group">
                    <label class="col-sm-3 control-label">Jenis Kelamin</label>
                    <div class="col-sm-4">
                    <select class="form-control input-sm" aria-controls="example1" name="jenis">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L">L</option>
                        <option value="P">P</option>
                    </select>
                    </div>
          </div>

           <div class="form-group">
                    <label class="col-sm-3 control-label">Alamat</label>
                    <div class="col-sm-4">
                      <textarea style="width: 299px; height: 105px;"class="form-control" rows="3" placeholder="Enter ..." name="alamat"></textarea>
                    </div>
            </div>

             <div class="form-group">
                    <label class="col-sm-3 control-label">Tempat Lahir</label>
                    <div class="col-sm-4">
                    <input class="form-control" id="inputEmail3" placeholder="Tempat Lahir" name="tempat">
                    </div>
            </div>

             <div class="form-group">
                    <label class="col-sm-3 control-label">Tanggal Lahir</label>
                    <div class="input-group date col-sm-4" data-date-format="yyyy/mm/dd">
                      <input class="form-control" id="startDate" placeholder="Tanggal Lahir" name="tgl" style="margin-left:14px">
                      <span class="input-group-addon" ><i class="fa fa-calendar" style="margin-left:13px"></i></span>
                    </div>
              </div>

              <div class="form-group">
                    <label class="col-sm-3 control-label">Nama Wali</label>
                    <div class="col-sm-4">
                      <input class="form-control" id="inputEmail3" placeholder="Nama Wali" name="wali">
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

<!--Modal Edit Data Siswa-->
              <div class="modal fade" id="editSiswa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Data Siswa</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Siswa/update_siswa">

          <input class="form-control" id="inputEmail3" type="hidden" name="idsiswa">

          <div class="form-group">
                    <label class="col-sm-3 control-label">Kelas</label>
                    <div class="col-sm-4">
                    <select class="form-control input-sm" aria-controls="example1" name="kelas">
                        <option value="">--Pilih Kelas--</option>
                      <?php foreach($kelas->result() as $isikelas){ ?>
                        <option value="<?php echo $isikelas->idkelas; ?>"><?php echo $isikelas->namakelas; ?></option>
                      <?php } ?>
                    </select>
                    </div>
          </div>

          <div class="form-group">
                    <label class="col-sm-3 control-label">Nis</label>
                    <div class="col-sm-4">
                      <input class="form-control" id="inputEmail3" placeholder="Nim" name="nim">
                    </div>
          </div>

          <div class="form-group">
                    <label class="col-sm-3 control-label">Nama</label>
                    <div class="col-sm-4">
                      <input class="form-control" id="inputEmail3" placeholder="Nama" name="nama">
                    </div>
          </div>

           <div class="form-group">
                    <label class="col-sm-3 control-label">Jenis Kelamin</label>
                    <div class="col-sm-4">
                    <select class="form-control input-sm" aria-controls="example1" name="jenis">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L">L</option>
                        <option value="P">P</option>
                    </select>
                    </div>
          </div>

           <div class="form-group">
                    <label class="col-sm-3 control-label">Alamat</label>
                    <div class="col-sm-4">
                      <textarea style="width: 299px; height: 105px;"class="form-control" rows="3" placeholder="Enter ..." name="alamat"></textarea>
                    </div>
            </div>

             <div class="form-group">
                    <label class="col-sm-3 control-label">Tempat Lahir</label>
                    <div class="col-sm-4">
                    <input class="form-control" id="inputEmail3" placeholder="Tempat Lahir" name="tempat">
                    </div>
            </div>

             <div class="form-group">
                    <label class="col-sm-3 control-label">Tanggal Lahir</label>
                    <div class="input-group date col-sm-4" data-date-format="yyyy/mm/dd">
                      <input class="form-control" id="startDate" placeholder="Tanggal Lahir" name="tgl" style="margin-left:14px">
                      <span class="input-group-addon" ><i class="fa fa-calendar" style="margin-left:13px"></i></span>
                    </div>
              </div>

              <div class="form-group">
                    <label class="col-sm-3 control-label">Nama Wali</label>
                    <div class="col-sm-4">
                      <input class="form-control" id="inputEmail3" placeholder="Nama Wali" name="wali" value="wali 9">
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

<!--Modal Detail Data Siswa-->
              <div class="modal fade" id="detailSiswa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detail Data Siswa</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal" method="POST" action="#">

          <input class="form-control" id="inputEmail3" type="hidden" name="idsiswa">

          <div class="form-group">
                    <label class="col-sm-3 control-label">Kelas :</label>
                    <div class="col-sm-4">
                    <input class="form-control" type="text" disabled="" name="kelas">
                    </div>
          </div>

          <div class="form-group">
                    <label class="col-sm-3 control-label">Nis :</label>
                    <div class="col-sm-4">
                      <input class="form-control" type="text" disabled="" name="nim">
                    </div>
          </div>

          <div class="form-group">
                    <label class="col-sm-3 control-label">Nama :</label>
                    <div class="col-sm-4">
                      <input class="form-control" type="text" disabled="" name="nama">
                    </div>
          </div>

           <div class="form-group">
                    <label class="col-sm-3 control-label">Jenis Kelamin :</label>
                    <div class="col-sm-4">
                    <input class="form-control" type="text" disabled="" name="jenis">
                    </div>
          </div>

           <div class="form-group">
                    <label class="col-sm-3 control-label">Alamat :</label>
                    <div class="col-sm-4">
                      <textarea class="form-control" type="text" disabled="" name="alamat"></textarea>
                    </div>
            </div>

             <div class="form-group">
                    <label class="col-sm-3 control-label">Tempat Lahir :</label>
                    <div class="col-sm-4">
                    <input class="form-control" type="text" disabled="" name="tempat">
                    </div>
            </div>

             <div class="form-group">
                    <label class="col-sm-3 control-label">Tanggal Lahir :</label>
                    <div class="col-sm-4">
                     <input class="form-control" type="text" disabled="" name="tgl">
                    </div>
              </div>

              <div class="form-group">
                    <label class="col-sm-3 control-label">Nama Wali :</label>
                    <div class="col-sm-4">
                     <input class="form-control" type="text" disabled="" name="wali">
                    </div>
              </div>
      </div>
      <div class="modal-footer">

      </div>
      </form>
    </div>
  </div>
</div>
</div><!--End Modal-->

          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper-->
