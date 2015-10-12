<table id="siswa" class="table table-bordered table-striped">
 <thead>
   <tr>
     <th>Nis</th>
     <th>Nama</th>
     <th>Kelas</th>
     <th>Action</th>
   </tr>
 </thead>
 <tbody>
  <?php foreach ($siswa as $data) {?>
      <tr>
       <td><?= $data['nim']; ?></td>
       <td><?= $data['namasiswa']; ?></td>
       <td><?= $data['namakelas']; ?></td>
       <td><a href="<?= base_url('Admin/bayar'); ?>" class="btn btn-xs btn-success" ><i class="fa fa-dashboard"></i> Bayar</a></td>
     </tr>
 <?php } ?>
</tbody>
</table>

<!-- Data table / search / pagingnation -->
<script type="text/javascript">
      $(document).ready(function() {
        $('#siswa').DataTable();
      } );
  </script>
