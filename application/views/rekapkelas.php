      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Rekap Keuangan
          </h1>
        </section>


        <!-- Main content -->
        <section class="content">
          <div class="row">
          <div class="col-xs-12">

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
                        <td><?= $key['Januari']?></td>
                        <td><?= $key['Februari']?></td>
                        <td><?= $key['Maret']?></td>
                        <td><?= $key['April']?></td>
                        <td><?= $key['Mei']?></td>
                        <td><?= $key['Juni']?></td>
                        <td><?= $key['Juli']?></td>
                        <td><?= $key['Agustus']?></td>
                        <td><?= $key['September']?></td>
                        <td><?= $key['Oktober']?></td>
                        <td><?= $key['November']?></td>
                        <td><?= $key['Desember']?></td>
                        <td><?= $key['total']?></td>                        
                      </tr>
                      <?php }?>
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
