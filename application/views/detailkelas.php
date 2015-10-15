Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Detail Kelas
          </h1>
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

            <form action="<?php echo base_url();?>Siswa/insert_siswa_kelas" method="post">
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
                            <?php foreach($kelas->result() as $datakelas) { ?>
                            <option value="<?php echo $datakelas->idkelas; ?>"><?php echo $datakelas->namakelas; ?></option>
                            <?php }?>
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
               <table id="siswakelas" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nis</th>
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
                </form>
              </div><!-- /.box body-->
            </div>
            <?php }?>
          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper-->
      <script type="text/javascript">
          $(document).ready(function() {
            $('#siswakelas').DataTable();
          } );
      </script>
