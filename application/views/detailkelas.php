Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Detail Kelas
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

            <?php if ($tsk == 'kosong') 
            {
              echo '<div class="callout callout-warning"> 
                    <h4>Tidak Ada Siswa yang Tidak Punya Kelas</h4>
                    <p>Semua siswa sudah punya kelas </p>
                    </div>';
            }
            else{
            ?>

            <form action="<?php echo base_url();?>index.php/siswa/insert_siswa_kelas" method="post">
             <div class="row">
                    <div class="col-sm-6">
                      <?php foreach($cek as $smt) { ?>
                      <input type="hidden" name="tahun" value="<?php echo $smt['idtahun']; ?>">
                      <?php }?>
                      <div id="example1_length" class="dataTables_length">
                        <label>
                          Kelas 
                          <select class="form-control input-sm" aria-controls="example1" name="kelas">
                            <option value="">--Semua Kelas--</option>
                            <?php foreach($kelas->result() as $datakelas) { ?>
                            <option value="<?php echo $datakelas->idkelas; ?>"><?php echo $datakelas->namakelas; ?></option>
                            <?php }?>
                          </select>
                          </label>
                        </div>
                      </div>
              </div>

                <div class="row">
                      <button type="submit" class="btn btn-primary" style="margin-left:1000px"><i class="fa fa-plus"></i> Simpan</button>
                </div>

            <div class="box box-info" style="margin-top:20px">
              <div class="box-body">
               <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($tsk as $isi) { ?>
                      <tr>
                        <td><?php echo $isi['nim']; ?></td>
                        <td><?php echo $isi['namasiswa']; ?></td>
                        <td>
                        <input type="checkbox" name="nis[]" value="<?php echo $isi['idsiswa']; ?>">
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