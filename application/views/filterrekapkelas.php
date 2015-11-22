        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Rekap Keuangan Per Kelas
            </h1>
          </section>


          <!-- Main content -->
          <section class="content">
            <div class="row">
            <div class="col-xs-12">

              <div class="row">
                    <?php $akun = $this->session->userdata('akun'); ?>
                    <?php if ($akun['level'] == 1) { ?>
                      <form method="post" action="<?= base_url('Admin/filter_rekap_kelas');?>">
                    <?php } else { ?>
                      <form method="post" action="<?= base_url('Home/filter_rekap_kelas');?>">
                    <?php } ?>
                    
                    <div class="col-sm-6">
                      <div id="example1_length" class="dataTables_length">
                        <label>
                          Kelas
                          <select class="form-control input-sm" aria-controls="example1" name="jeniskelas" >
                              <option value="">--Pilih Kelas--</option>
                              <option value="1">X</option>
                              <option value="2">XI</option>
                              <option value="3">XII</option>
                          </select>
                          </label>
                        </div>
                        <button class="btn btn-success" type="submit">Go</button>
                      </div>
                      </form>
              </div>

              <!-- Print rekap kelas -->
              <div class="row">
                <?php $akun = $this->session->userdata('akun'); ?>
                    <?php if ($akun['level'] == 1) { ?>
                      <form method="" action="<?= base_url('Admin/print_rekap_kelas');?>">
                    <?php } else { ?>
                      <form method="" action="<?= base_url('Home/print_rekap_kelas');?>">
                    <?php } ?>
                <div class="col-xs-12">
                  <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-print"></i> Print</button>
                </div>
              </form>
              </div>

              <div class="box box-info" style="margin-top:20px">
                <div class="box-body">
                  <div class="row">
                  <div class="col-md-12">
                   <table id='rekapkelas' class='table table-bordered table-striped'>
                      <thead>
                        <tr>
                          <th>Nama Kelas</th>
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
                        <?php foreach ($spp as $key) { ?>
                        <tr>
                          <td><?= $key['namakelas']?></td>
                          <td><?= $key['januari']?></td>
                          <td><?= $key['februari']?></td>
                          <td><?= $key['maret']?></td>
                          <td><?= $key['april']?></td>
                          <td><?= $key['mei']?></td>
                          <td><?= $key['juni']?></td>
                          <td><?= $key['juli']?></td>
                          <td><?= $key['agustus']?></td>
                          <td><?= $key['september']?></td>
                          <td><?= $key['oktober']?></td>
                          <td><?= $key['november']?></td>
                          <td><?= $key['desember']?></td>
                          <td><?= $key['januari'] + $key['februari'] + $key['maret'] + $key['april'] + $key['mei']
                          + $key['juni'] + $key['juli'] + $key['agustus'] + $key['september'] + $key['oktober'] + $key['november']
                          + $key['desember'] ?></td>
                        </tr>
                        <?php }?>

                        <thead>
                          <tr>
                          <th>Total</th>
                          <?php 
                           foreach ($jumlah as $data) { ?>
                            <th><?= $data['januari']?></th>
                            <th><?= $data['februari']?></th>
                            <th><?= $data['maret']?></th>
                            <th><?= $data['april']?></th>
                            <th><?= $data['mei']?></th>
                            <th><?= $data['juni']?></th>
                            <th><?= $data['juli']?></th>
                            <th><?= $data['agustus']?></th>
                            <th><?= $data['september']?></th>
                            <th><?= $data['oktober']?></th>
                            <th><?= $data['november']?></th>
                            <th><?= $data['desember']?></th>
                            <?php $total = $data['januari'] + $data['februari'] + $data['maret'] + $data['april']
                            + $data['mei'] + $data['juni'] + $data['juli'] + $data['agustus'] + $data['september']
                            + $data['oktober'] + $data['november'] + $data['desember']; ?>
                            <th><?= $total ?></th>
                           <?php } ?>
                          </tr>
                        </thead>
                      </tbody>
                        
                  </table>

                  <!--Pagination-->
                  <div class="row">
                    <div class="col-md-7">

                    </div>
                  </div><!--</pagination-->

                </div><!-- /.box body-->
              </div>

                  </div>
                  </div>

                </div><!-- /.box body-->
              </div>

          </div>
        </div><!--Col-xs-12-->
          </section><!-- /.content -->
        </div><!-- /.content-wrapper-->

  <script type="text/javascript">
        // $(document).ready(function() {
        //   $('#rekapkelas').DataTable();
        // } );
    </script>
