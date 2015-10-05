<?php 
// foreach ($siswa as $key) {
//   print_r($key);
//   die();
// }

?>


Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Transaksi SPP
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
                          Tahun Ajaran
                          <p> <?= $tahunajaran; ?></p>
                          
                          </label>
                        </div>
                      </div>
              </div>

              <div class="row">
                    <div class="col-sm-6">
                      <div id="example1_length" class="dataTables_length">
                        <label>
                          Transaksi Bulan
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
                      </div>
              </div>

              <div class="row">
                    <div class="col-sm-6">
                      <div id="example1_length" class="dataTables_length">
                        <label>
                          Kelas
                          <select class="form-control input-sm" aria-controls="example1" name="example1_length">
                            <option value="">--Pilih Kelas--</option>
                            <option value="">X1</option>
                            <option value="">X2</option>
                          </select>
                          </label>
                        </div>
                      </div>
              </div>

                <div class="row">
                     <div class="col-sm-4">
                       <label>
                         Cari Berdasarkan
                       </label>
                      <div class="form-group">
                        <input class="form-control" type="text" placeholder="Nim atau Nama"></input>
                      </div>
                        <button class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                    </div>
                </div>

            <div class="box box-info" style="margin-top:20px">
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                     <thead>
                       <tr>
                         <th>Nis</th>
                         <th>Nama</th>
                         <th>Kelas</th>
                         <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                      <?php foreach ($siswa as $data) { ?>
                         <tr>
                           <td><?= $data['nim']; ?></td>
                           <td><?= $data['namasiswa']; ?></td>
                           <td><?= $data['namakelas']; ?></td>
                           <td><button class="btn btn-xs btn-success" href="#"><i class="fa fa-dashboard"></i> Bayar</button></td>
                         </tr>
                       <?php } ?>
                     </tbody>
                 </table>
              </div><!-- /.box body-->
            </div>
          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper
