Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Siswa
          </h1>
        </section>

        <!--Notification-->
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

        <?php if($this->session->flashdata('update'))
        { ?>
              <script type="text/javascript">
              $.bootstrapGrowl("Update Data <strong>Berhasil !</strong>", // Messages
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

        <?php if($this->session->flashdata('delete'))
        { ?>
              <script type="text/javascript">
              $.bootstrapGrowl("Delete Data <strong>Berhasil !</strong>", // Messages
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

        <?php if($this->session->flashdata('import'))
        { ?>
              <script type="text/javascript">
              $.bootstrapGrowl("Import Data <strong>Berhasil !</strong> <br> Cek Menu <strong> Siswa Kelas </strong>", // Messages
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
            <!--Data Table-->
            <div class="box box-info">
              <div class="box-body">
                        <table id="dataSiswa" class="table table-bordered table-striped">
                             <thead>
                               <tr>
                                 <th>No</th>
                                 <th>No Hp</th>
                                 <th>Tanggal</th>
                                 <th>Isi Pesan</th>
                                 <th>Status</th>
                                 <th>Aksi</th>
                               </tr>
                             </thead>
                             <tbody>
                                 <?php $no=1; foreach ($sent->result() as $row) { ?>
                                   <tr>
                                   <td><?= $no++; ?></td>
                                   <td><?= $row->DestinationNumber; ?></td>
                                   <td><?= $row->SendingDateTime; ?></td>
                                   <td><?= $row->TextDecoded; ?></td>
                                   <td><?= $row->Status; ?></td>
                                   <td></td>
                                   </tr>
                                 <?php } ?>
                             </tbody>
                         </table>

              </div><!-- /.box body-->
            </div>

          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper-->

      <script type="text/javascript">
          $(document).ready(function() {
            $('#dataSiswa').DataTable();
          } );
      </script>
