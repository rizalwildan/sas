      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Rekap Keuangan Per Siswa
          </h1>
        </section>


        <!-- Main content -->
        <section class="content">
          <div class="row">
          <div class="col-xs-12">
            <?php
            $akun = $this->session->userdata('akun');
            if ($akun['level'] == 1) { ?>
              <form method="post" action="<?php echo base_url();?>Admin/filter_rekap">
            <?php } else { ?>
              <form method="post" action="<?php echo base_url();?>Home/filter_rekap">
            <?php } ?>
            <div class="row">
                   <div class="col-sm-12">
                     <div id="example1_length" class="dataTables_length">
                       <label>
                         Tahun Ajaran
                         <select class="form-control input-sm" aria-controls="example1" name="tahun">
                           <option value="">--Pilih Tahun--</option>
                           <?php foreach ($tahun->result() as $datatahun) {?>
                             <option value="<?php echo $datatahun->nama_tahun_pelajaran; ?>"><?php echo $datatahun->nama_tahun_pelajaran; ?></option>
                           <?php } ?>
                         </select>
                         </label>
                       </div>
                     </div>
             </div>

            <div class="row">
                   <div class="col-sm-12">
                     <div id="example1_length" class="dataTables_length">
                       <label>
                         Kelas
                         <select class="form-control input-sm" aria-controls="example1" name="kelas">
                           <option value="">--Pilih Kelas--</option>
                           <?php foreach($kelas->result() as $datakelas) { ?>
                           <option value="<?php echo $datakelas->id_kelas; ?>"><?php echo $datakelas->nama_kelas; ?></option>
                           <?php }?>
                         </select>
                         </label>
                       </div>
                       <button type="submit" class="btn btn-success pull-left">Go</button>
                     </div>
             </div>
             </form>

             <div class="row">
              <div class="col-sm-12">
                <?php $akun = $this->session->userdata('akun');
                if ($akun['level'] == 1) { ?>
                  <form action="<?php echo base_url(); ?>Admin/print_rekap">
                <?php } else { ?>
                  <form action="<?php echo base_url(); ?>Home/print_rekap">
                <?php }?>
                
                <button P class="btn btn-primary pull-right"><i class="fa fa-print"></i> Print</button>
                </form>              
              </div>
             </div>
           

            <div class="box box-info" style="margin-top:20px">
              <div class="box-body">
                <div class="row">
                <div class="col-md-12" style="overflow:auto;">
                  <div id="print">
                 <table id='' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>January</th>
                        <th>February</th>
                        <th>Maret</th>
                        <th>April</th>
                        <th>Mei</th>
                        <th>Juni</th>
                        <th>Juli</th>
                        <th>Agustus</th>
                        <th>September</th>
                        <th>Oktober</th>
                        <th>November</th>
                        <th>Desember</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($spp as $key){ ?>
                      <tr>
                        <td><?= $key['nis']?></td>
                        <td><?= $key['nama_siswa']?></td>
                        <td><?= $key['nama_kelas'] ?></td>
                        <td>
                          <?= $key['januari']?>
                        </td>
                        <td>
                          <?= $key['februari']?>
                        </td>
                        <td>
                          <?= $key['maret']?>
                        </td>
                        <td>
                          <?= $key['april']?>
                        </td>
                        <td>
                          <?= $key['mei']?>
                        </td>
                        <td>
                          <?= $key['juni']?>
                        </td>
                        <td>
                          <?= $key['juli']?>
                        </td>
                        <td>
                          <?= $key['agustus']?>
                        </td>
                        <td>
                          <?= $key['september']?>
                        </td>
                        <td>
                          <?= $key['oktober']?>
                        </td>
                        <td>
                          <?= $key['november']?>
                        </td>
                        <td>
                          <?= $key['desember']?>
                        </td>
                        <td><?= $key['total']?></td>
                      </tr>
                      <?php }?>
                    </tbody>
                </table>
                </div>
              </div><!-- /.box body-->
            </div>

                </div>
                </div>

              </div><!-- /.box body-->
            </div>

        </div>
      </div><!--Col-xs-12-->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<script type="text/javascript">
       $(document).ready(function() {
       $('#rekapsiswa').DataTable();
      } );
  </script>

  <script type="text/javascript">
  function printDiv(divName) {
var printContents = document.getElementById(divName).innerHTML;
var originalContents = document.body.innerHTML;

document.body.innerHTML = printContents;

window.print();

document.body.innerHTML = originalContents;
}
  </script>
