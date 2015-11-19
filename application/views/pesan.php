<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kirim Pesan
      </h1>
    </section>

    <!--Notification-->
    <?php if($this->session->flashdata('insert'))
    { ?>
          <script type="text/javascript">
          $.bootstrapGrowl("Pesan Sedang di Proses Cek <strong>Menu Pesan Terkirim</strong> Untuk Melihat Status", // Messages
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


    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-info">
            <div class="box-body">
              <form method="post" action="<?php echo base_url(); ?>Pesan/cek_no">
                <div class="row">
                       <div class="col-sm-12">
                         <div id="example1_length" class="dataTables_length">
                           <label>
                             Pilih Bulan
                             <select class="form-control input-sm" aria-controls="example1" name="bulan">
                               <option value="">--Pilih Bulan--</option>
                               <option>Januari</option>
                               <option>Februari</option>
                               <option>Maret</option>
                               <option>April</option>
                               <option>Mei</option>
                               <option>Juni</option>
                               <option>Juli</option>
                               <option>Agustus</option>
                               <option>September</option>
                               <option>Oktober</option>
                               <option>November</option>
                               <option>Desember</option>
                             </select>
                             </label>
                           </div>
                           <button type="submit">Cek</button>
                         </div>
                 </div>
                </form>

                <form method="post" action="<?php echo base_url(); ?>Pesan/kirim_pesan">
                <div class="row">
                <div class="form-group">
                          <label class="col-sm-3 control-label">No Hp</label>
                          <div class="col-sm-12">
                            <textarea style="resize:none" rows="4" cols="50" name="no"><?php
                            for ($i = 1; $i < $no['banyak'] + 1; $i++) {
                              echo $no['no'][$i];
                              if ($i == $no['banyak']) {

                              } else {
                                echo "\n";}
                              }
                              ?></textarea>
                          </div>
                </div>
                <div class="form-group">
                          <label class="col-sm-3 control-label">Isi Pesan</label>
                          <div class="col-md-12">
                            <textarea rows="4" cols="50" name="isi">Putra/putri anda belum melakukan pembayaran pada periode ...</textarea>
                          </div>
                </div>
                <div class="form-group">
                          <div class="col-sm-12">
                            <button>Kirim</button>
                          </div>
                </div>
              </div>
            </form>

            </div>
          </div>
        </div>
      </div>
    </section>
</div>
