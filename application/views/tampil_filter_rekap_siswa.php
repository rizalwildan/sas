
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
                foreach ($siswa as $key) { ?>
                <tr>
                  <td><?= $key['nim']?> <input type="disabled" value="<?= $key['nim'] ?>" name="nim"></input></td>
                  <td><?= $key['namasiswa']?><input type="disabled" value="<?= $key['nama'] ?>" name="nama"></td>
                  <td><?= $key['namakelas'] ?><input type="disabled" value="<?= $key['namakelas'] ?>" name="namakelas"></td>
                  <td><?= $key['Januari']?><input type="disabled" value="<?= $key['Januari'] ?>" name="Januari"></td>
                  <td><?= $key['Februari']?><input type="disabled" value="<?= $key['Februari'] ?>" name="Februari"></td>
                  <td><?= $key['Maret']?><input type="disabled" value="<?= $key['Maret'] ?>" name="Maret"></td>
                  <td><?= $key['April']?><input type="disabled" value="<?= $key['April'] ?>" name="April"></td>
                  <td><?= $key['Mei']?><input type="disabled" value="<?= $key['Mei'] ?>" name="Mei"></td>
                  <td><?= $key['Juni']?><input type="disabled" value="<?= $key['Juni'] ?>" name="Juni"></td>
                  <td><?= $key['Juli']?><input type="disabled" value="<?= $key['Juli'] ?>" name="Juli"></td>
                  <td><?= $key['Agustus']?><input type="disabled" value="<?= $key['Agustus'] ?>" name="Agustus"></td>
                  <td><?= $key['September']?><input type="disabled" value="<?= $key['September'] ?>" name="September"></td>
                  <td><?= $key['Oktober']?><input type="disabled" value="<?= $key['Oktober'] ?>" name="Oktober"></td>
                  <td><?= $key['November']?><input type="disabled" value="<?= $key['November'] ?>" name="November"></td>
                  <td><?= $key['Desember']?><input type="disabled" value="<?= $key['Desember'] ?>" name="Desember"></td>
                  <td><?= $key['total']?><input type="disabled" value="<?= $key['total'] ?>" name="total"></td>
                </tr>
                <?php }?>
              </tbody>
          </table>

<script type="text/javascript">
 //$(document).ready(function() {
 //$('#rekapsiswa').DataTable();
//} );
</script>
