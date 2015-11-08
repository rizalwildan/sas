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

      <div class="row">
              <form method="post" action="<?= base_url('Home/print_rekap_siswa');?>">
              <div class="col-sm-6">
                <div id="example1_length" class="dataTables_length">
                  <label>
                    Tahun Pelajaran
                    <select class="form-control input-sm" aria-controls="example1" name="kelas" >
                        <option value="">--Pilih Kelas--</option>
                          <?php foreach($kelas->result() as $isikelas){ ?>
                        <option value="<?php echo $isikelas->namakelas; ?>"><?php echo $isikelas->namakelas; ?></option>
                      <?php } ?>
                    </select>
                    </label>
                  </div>
                  <button class="btn btn-success pull-left" type="submit" id="filter" name="filter"> Go</button>
                </div>
        </div>


    <div class="row">
      <div class="col-xs-12">
      <button class="btn btn-primary pull-right" type="submit" id="print" name="print"><i class="fa fa-print"></i> Print</button>
      </div>
    </div>
    </form>
      <div class="box box-info" style="margin-top:20px">
        <div class="box-body">
          <div class="row">
          <div class="col-md-12" style="overflow:auto;">
           <table id='rekapsiswa' class='table table-bordered table-striped'>
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
                foreach ($spp as $key) { ?>
                <tr>
                  <td><?= $key['nim']?></td>
                  <td><?= $key['nama']?></td>
                  <td><?= $key['namakelas'] ?></td>
                  <td>
                    <?= $key['Januari'] ?>
                  </td>
                  <td>
                    <?= $key['Februari']?>
                  </td>
                  <td>
                    <?= $key['Maret']?>
                  </td>
                  <td>
                    <?= $key['April']?>
                  </td>
                  <td>
                    <?= $key['Mei']?>
                  </td>
                  <td>
                    <?= $key['Juni']?>
                  </td>
                  <td>
                    <?= $key['Juli']?>
                  </td>
                  <td>
                    <?= $key['Agustus']?>
                  </td>
                  <td>
                    <?= $key['September']?>
                  </td>
                  <td>
                    <?= $key['Oktober']?>
                  </td>
                  <td>
                    <?= $key['November']?>
                  </td>
                  <td>
                    <?= $key['Desember']?>
                  </td>
                  <td><?= $key['total']?></td>
                </tr>
                <?php }?>
              </tbody>
          </table>

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
