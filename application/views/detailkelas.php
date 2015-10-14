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
