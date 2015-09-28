Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Setting Komponen
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

            <?php if ($komponen == 'kosong')
            {
              echo '<div class="callout callout-warning">
                    <h4>Tidak Ada Siswa yang Tidak Punya Kelas</h4>
                    <p>Semua siswa sudah punya kelas </p>
                    </div>';
            }
            else{
            ?>
            
            <form action="<?php echo base_url();?>Transaksi/setting_komponen" method="post">
             <div class="row">
                    <div class="col-sm-12">
                      <?php foreach($cek as $smt) { ?>
                      <input type="hidden" name="tahun" value="<?php echo $smt['idtahun']; ?>">
                      <?php }?>
                      <div id="example1_length" class="dataTables_length">
                        <label>
                          Kelas
                          <select class="form-control input-sm" aria-controls="example1" name="kelas">
                            <option value="">--Semua Kelas--</option>
                            <?php foreach($jenisKelas->result() as $datakelas) { ?>
                            <option value="<?php echo $datakelas->jenis_kelas; ?>"><?php echo $datakelas->jenis_kelas; ?></option>
                            <?php }?>
                          </select>
                          </label>
                          </br>
                          <label>
                          Periode
                          <select class="form-control input-sm" aria-controls="example1" name="periode">
                            <option value="">--Periode--</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                          </select>
                          </label>
                        </div>
                          <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Simpan</button>
                      </div>
              </div>

                <div class="row">

                </div>

            <div class="box box-info" style="margin-top:20px">
              <div class="box-body">
               <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama Komponen</th>
                        <th>Deskripsi</th>
                        <th>Jumlah Iuran</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($komponen as $isi) { ?>
                      <tr>
                        <td><?php echo $isi['nama_komp']; ?></td>
                        <td><?php echo $isi['deskripsi']; ?></td>
                        <td><?php echo $isi['iuran'];?></td>
                        <td>
                        <input type="checkbox" name="idkomponen[]" value="<?php echo $isi['idkomponen']; ?>">
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

                </form>
              </div><!-- /.box body-->
            </div>
            <?php }?>
          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper
