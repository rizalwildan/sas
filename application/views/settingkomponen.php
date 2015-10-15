Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Setting Komponen
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

            <?php if ($komponen == 'kosong')
            {
              echo '<div class="callout callout-warning">
                    <h4>Tidak Ada Siswa yang Tidak Punya Kelas</h4>
                    <p>Semua siswa sudah punya kelas </p>
                    </div>';
            }
            elseif ($cek == 'kosong') {
              echo '<div class="callout callout-warning">
                    <h4>Data Tahun Pelajaran Belum Ditambahkan</h4>
                    <p>Tambahkan Data Tahun Pelajaran Terlebih Dahulu.</p>
                    </div>';
            }
            else{
            ?>

            <form action="<?php echo base_url();?>Transaksi/setting_komponen" method="post">
             <div class="row">
                    <div class="col-sm-12">
                      <?php foreach($cek as $smt) { ?>
                      <input type="hidden" name="idtahun" value="<?php echo $smt['idtahun']; ?>">
                      <?php }?>
                      <div id="example1_length" class="dataTables_length">
                        <label>
                          Jenis Kelas
                          <select class="form-control input-sm" aria-controls="example1" name="jeniskelas">
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
                </form>
              </div><!-- /.box body-->
            </div>
            <?php }?>
          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper
