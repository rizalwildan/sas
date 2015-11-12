<!-- REQUIRED JS SCRIPTS -->
 <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2015 <a href="#">Imagine Studio</a>.</strong> Powered By <a href="http://almsaeedstudio.com">AdminLTE</a> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?= base_url(). 'asset/plugins/jQuery/jQuery-2.1.4.min.js'; ?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?= base_url(). 'asset/bootstrap/js/bootstrap.min.js'; ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(). 'asset/dist/js/app.min.js'; ?>"></script>
    <!-- Slimscroll -->
    <script src="<?= base_url(). 'asset/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
    <!-- FastClick -->
    <script src="<?= base_url(). 'plugins/fastclick/fastclick.min.js'; ?>"></script>
    <!--Date Picker-->
    <script src="<?= base_url(). 'asset/bootstrap/js/daterangepicker.js'; ?>"></script>
    <script src="<?= base_url(). 'asset/bootstrap/js/moment.js'; ?>"></script>
    <script src="<?= base_url(). 'asset/bootstrap/js/moment.min.js'; ?>"></script>
    <script src="<?= base_url(). 'asset/bootstrap/js/bootstrap-datepicker.js'; ?>"></script>


    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url().'asset/DataTables-1.10.9/media/css/jquery.dataTables.css';?>">
    <!-- jQuery -->

    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="<?= base_url().'asset/DataTables-1.10.9/media/js/jquery.dataTables.js'; ?>"></script>


    <!--JS Edit Siswa-->
    <SCRIPT TYPE="text/javascript">
      $('#editSiswa').on('shown.bs.modal', function(e) {
              var idsiswa = $(e.relatedTarget).data('idsiswa');
              $(e.currentTarget).find('input[name="idsiswa"]').val(idsiswa);
              var nim = $(e.relatedTarget).data('nim');
              $(e.currentTarget).find('input[name="nim"]').val(nim);
              var namasiswa = $(e.relatedTarget).data('namasiswa');
              $(e.currentTarget).find('input[name="nama"]').val(namasiswa);
              var namawali = $(e.relatedTarget).data('namawali');
              $(e.currentTarget).find('input[name="wali"]').val(namawali);
              var alamat = $(e.relatedTarget).data('alamat');
              $(e.currentTarget).find('textarea[name="alamat"]').val(alamat);
              var tmlahir = $(e.relatedTarget).data('tmlahir');
              $(e.currentTarget).find('input[name="tempat"]').val(tmlahir);
              var tgllahir = $(e.relatedTarget).data('tgllahir');
              $(e.currentTarget).find('input[name="tgl"]').val(tgllahir);
              var idtahun = $(e.relatedTarget).data('idtahun');
              $(e.currentTarget).find('input[name="idtahun"]').val(idtahun);
              var nohp = $(e.relatedTarget).data('nohp');
              $(e.currentTarget).find('input[name="nohp"]').val(nohp);
              });
    </SCRIPT>

    <!--JS Detail Siswa-->
    <SCRIPT TYPE="text/javascript">
      $('#detailSiswa').on('shown.bs.modal', function(e) {
              var namakelas = $(e.relatedTarget).data('namakelas');
              $(e.currentTarget).find('input[name="kelas"]').val(namakelas);
              var nim = $(e.relatedTarget).data('nim');
              $(e.currentTarget).find('input[name="nim"]').val(nim);
              var namasiswa = $(e.relatedTarget).data('namasiswa');
              $(e.currentTarget).find('input[name="nama"]').val(namasiswa);
              var namawali = $(e.relatedTarget).data('namawali');
              $(e.currentTarget).find('input[name="wali"]').val(namawali);
              var alamat = $(e.relatedTarget).data('alamat');
              $(e.currentTarget).find('textarea[name="alamat"]').val(alamat);
              var tmlahir = $(e.relatedTarget).data('tmlahir');
              $(e.currentTarget).find('input[name="tempat"]').val(tmlahir);
              var tgllahir = $(e.relatedTarget).data('tgllahir');
              $(e.currentTarget).find('input[name="tgl"]').val(tgllahir);
              var gender = $(e.relatedTarget).data('gender');
              $(e.currentTarget).find('input[name="jenis"]').val(gender);
              var nohp = $(e.relatedTarget).data('nohp');
              $(e.currentTarget).find('input[name="nohp"]').val(nohp);
              });
    </SCRIPT>

    <!--JS DELETE DATA SISWA-->
    <SCRIPT TYPE="text/javascript">
      $('#deleteSiswa').on('shown.bs.modal', function(e) {
              var idsiswa = $(e.relatedTarget).data('idsiswa');
              $(e.currentTarget).find('input[name="idsiswa"]').val(idsiswa);
      });
    </script>

    <!--JS DELETE DATA KOMPONEN-->
    <SCRIPT TYPE="text/javascript">
      $('#deleteKomponen').on('shown.bs.modal', function(e) {
              var idkomponen = $(e.relatedTarget).data('idkomponen');
              $(e.currentTarget).find('input[name="idkomponen"]').val(idkomponen);
      });
    </script>

    <!--JS DELETE KELAS-->
    <SCRIPT TYPE="text/javascript">
      $('#deleteKelas').on('shown.bs.modal', function(e) {
              var idkelas = $(e.relatedTarget).data('idkelas');
              $(e.currentTarget).find('input[name="idkelas"]').val(idkelas);
      });
    </script>

      <!--JS Edit Komponen-->
    <SCRIPT TYPE="text/javascript">
      $('#editKomponen').on('shown.bs.modal', function(e) {
              var idkomponen = $(e.relatedTarget).data('idkomponen');
              $(e.currentTarget).find('input[name="idkomponen"]').val(idkomponen);
              var nama_komp = $(e.relatedTarget).data('nama_komp');
              $(e.currentTarget).find('input[name="nama_komp"]').val(nama_komp);
              var deskripsi = $(e.relatedTarget).data('deskripsi');
              $(e.currentTarget).find('input[name="deskripsi"]').val(deskripsi);
              var iuran = $(e.relatedTarget).data('iuran');
              $(e.currentTarget).find('input[name="iuran"]').val(iuran);
              });
    </SCRIPT>

    <!--JS Edit User-->
    <SCRIPT TYPE="text/javascript">
      $('#editUser').on('shown.bs.modal', function(e) {
              var iduser = $(e.relatedTarget).data('iduser');
              $(e.currentTarget).find('input[name="iduser"]').val(iduser);
              var username = $(e.relatedTarget).data('username');
              $(e.currentTarget).find('input[name="username"]').val(username);
              });
    </SCRIPT>

    <!--JS Edit Smester-->
    <SCRIPT TYPE="text/javascript">
      $('#editSmt').on('shown.bs.modal', function(e) {
              var idtahun = $(e.relatedTarget).data('idtahun');
              $(e.currentTarget).find('input[name="idtahun"]').val(idtahun);
              var tahun_pelajaran = $(e.relatedTarget).data('tahun_pelajaran');
              $(e.currentTarget).find('input[name="tahunpel"]').val(tahun_pelajaran);
              var awal_tahun = $(e.relatedTarget).data('awal_tahun');
              $(e.currentTarget).find('input[name="awaltahun"]').val(awal_tahun);
              var akhir_tahun = $(e.relatedTarget).data('akhir_tahun');
              $(e.currentTarget).find('input[name="akhirtahun"]').val(akhir_tahun);
              });
    </SCRIPT>

    <!--JS Delete Smester-->
    <SCRIPT TYPE="text/javascript">
      $('#deleteSmt').on('shown.bs.modal', function(e) {
              var idtahun = $(e.relatedTarget).data('idtahun');
              $(e.currentTarget).find('input[name="idtahun"]').val(idtahun);
              });
    </SCRIPT>

    <!--JS Edit Rekap Januari-->
    <SCRIPT TYPE="text/javascript">
      $('#editRekapJanuari').on('shown.bs.modal', function(e) {
              var idspp = $(e.relatedTarget).data('idspp');
              $(e.currentTarget).find('input[name="idspp"]').val(idspp);

              var nim = $(e.relatedTarget).data('nim');
              $(e.currentTarget).find('input[name="nim"]').val(nim);

              var namasiswa = $(e.relatedTarget).data('namasiswa');
              $(e.currentTarget).find('input[name="nama"]').val(namasiswa);

              var namakelas = $(e.relatedTarget).data('namakelas');
              $(e.currentTarget).find('input[name="namakelas"]').val(namakelas);

              var periode = $(e.relatedTarget).data('periode');
              $(e.currentTarget).find('input[name="periode"]').val(periode);

              var januari = $(e.relatedTarget).data('januari');
              $(e.currentTarget).find('input[name="nominal"]').val(januari);

              });
    </SCRIPT>

    <!--JS Edit Rekap Februari-->
    <SCRIPT TYPE="text/javascript">
      $('#editRekapFebruari').on('shown.bs.modal', function(e) {
              var idspp = $(e.relatedTarget).data('idspp');
              $(e.currentTarget).find('input[name="idspp"]').val(idspp);

              var nim = $(e.relatedTarget).data('nim');
              $(e.currentTarget).find('input[name="nim"]').val(nim);

              var namasiswa = $(e.relatedTarget).data('namasiswa');
              $(e.currentTarget).find('input[name="nama"]').val(namasiswa);

              var namakelas = $(e.relatedTarget).data('namakelas');
              $(e.currentTarget).find('input[name="namakelas"]').val(namakelas);

              var periode = $(e.relatedTarget).data('periode');
              $(e.currentTarget).find('input[name="periode"]').val(periode);

              var februari = $(e.relatedTarget).data('februari');
              $(e.currentTarget).find('input[name="nominal"]').val(februari);

              });
    </SCRIPT>

    <!--JS Edit Rekap Maret-->
    <SCRIPT TYPE="text/javascript">
      $('#editRekapMaret').on('shown.bs.modal', function(e) {
              var idspp = $(e.relatedTarget).data('idspp');
              $(e.currentTarget).find('input[name="idspp"]').val(idspp);

              var nim = $(e.relatedTarget).data('nim');
              $(e.currentTarget).find('input[name="nim"]').val(nim);

              var namasiswa = $(e.relatedTarget).data('namasiswa');
              $(e.currentTarget).find('input[name="nama"]').val(namasiswa);

              var namakelas = $(e.relatedTarget).data('namakelas');
              $(e.currentTarget).find('input[name="namakelas"]').val(namakelas);

              var periode = $(e.relatedTarget).data('periode');
              $(e.currentTarget).find('input[name="periode"]').val(periode);

              var maret = $(e.relatedTarget).data('maret');
              $(e.currentTarget).find('input[name="nominal"]').val(maret);

              });
    </SCRIPT>

    <!--JS Edit Rekap April-->
    <SCRIPT TYPE="text/javascript">
      $('#editRekapApril').on('shown.bs.modal', function(e) {
              var idspp = $(e.relatedTarget).data('idspp');
              $(e.currentTarget).find('input[name="idspp"]').val(idspp);

              var nim = $(e.relatedTarget).data('nim');
              $(e.currentTarget).find('input[name="nim"]').val(nim);

              var namasiswa = $(e.relatedTarget).data('namasiswa');
              $(e.currentTarget).find('input[name="nama"]').val(namasiswa);

              var namakelas = $(e.relatedTarget).data('namakelas');
              $(e.currentTarget).find('input[name="namakelas"]').val(namakelas);

              var periode = $(e.relatedTarget).data('periode');
              $(e.currentTarget).find('input[name="periode"]').val(periode);

              var april = $(e.relatedTarget).data('april');
              $(e.currentTarget).find('input[name="nominal"]').val(april);

              });
    </SCRIPT>

    <!--JS Edit Rekap Mei-->
    <SCRIPT TYPE="text/javascript">
      $('#editRekapMei').on('shown.bs.modal', function(e) {
              var idspp = $(e.relatedTarget).data('idspp');
              $(e.currentTarget).find('input[name="idspp"]').val(idspp);

              var nim = $(e.relatedTarget).data('nim');
              $(e.currentTarget).find('input[name="nim"]').val(nim);

              var namasiswa = $(e.relatedTarget).data('namasiswa');
              $(e.currentTarget).find('input[name="nama"]').val(namasiswa);

              var namakelas = $(e.relatedTarget).data('namakelas');
              $(e.currentTarget).find('input[name="namakelas"]').val(namakelas);

              var periode = $(e.relatedTarget).data('periode');
              $(e.currentTarget).find('input[name="periode"]').val(periode);

              var mei = $(e.relatedTarget).data('mei');
              $(e.currentTarget).find('input[name="nominal"]').val(mei);

              });
    </SCRIPT>

    <!--JS Edit Rekap Juni-->
    <SCRIPT TYPE="text/javascript">
      $('#editRekapJuni').on('shown.bs.modal', function(e) {
              var idspp = $(e.relatedTarget).data('idspp');
              $(e.currentTarget).find('input[name="idspp"]').val(idspp);

              var nim = $(e.relatedTarget).data('nim');
              $(e.currentTarget).find('input[name="nim"]').val(nim);

              var namasiswa = $(e.relatedTarget).data('namasiswa');
              $(e.currentTarget).find('input[name="nama"]').val(namasiswa);

              var namakelas = $(e.relatedTarget).data('namakelas');
              $(e.currentTarget).find('input[name="namakelas"]').val(namakelas);

              var periode = $(e.relatedTarget).data('periode');
              $(e.currentTarget).find('input[name="periode"]').val(periode);

              var juni = $(e.relatedTarget).data('juni');
              $(e.currentTarget).find('input[name="nominal"]').val(juni);

              });
    </SCRIPT>

    <!--JS Edit Rekap Juli-->
    <SCRIPT TYPE="text/javascript">
      $('#editRekapJuli').on('shown.bs.modal', function(e) {
              var idspp = $(e.relatedTarget).data('idspp');
              $(e.currentTarget).find('input[name="idspp"]').val(idspp);

              var nim = $(e.relatedTarget).data('nim');
              $(e.currentTarget).find('input[name="nim"]').val(nim);

              var namasiswa = $(e.relatedTarget).data('namasiswa');
              $(e.currentTarget).find('input[name="nama"]').val(namasiswa);

              var namakelas = $(e.relatedTarget).data('namakelas');
              $(e.currentTarget).find('input[name="namakelas"]').val(namakelas);

              var periode = $(e.relatedTarget).data('periode');
              $(e.currentTarget).find('input[name="periode"]').val(periode);

              var juli = $(e.relatedTarget).data('juli');
              $(e.currentTarget).find('input[name="nominal"]').val(juli);

              });
    </SCRIPT>

    <!--JS Edit Rekap Agustus-->
    <SCRIPT TYPE="text/javascript">
      $('#editRekapAgustus').on('shown.bs.modal', function(e) {
              var idspp = $(e.relatedTarget).data('idspp');
              $(e.currentTarget).find('input[name="idspp"]').val(idspp);

              var nim = $(e.relatedTarget).data('nim');
              $(e.currentTarget).find('input[name="nim"]').val(nim);

              var namasiswa = $(e.relatedTarget).data('namasiswa');
              $(e.currentTarget).find('input[name="nama"]').val(namasiswa);

              var namakelas = $(e.relatedTarget).data('namakelas');
              $(e.currentTarget).find('input[name="namakelas"]').val(namakelas);

              var periode = $(e.relatedTarget).data('periode');
              $(e.currentTarget).find('input[name="periode"]').val(periode);

              var agustus = $(e.relatedTarget).data('agustus');
              $(e.currentTarget).find('input[name="nominal"]').val(agustus);

              });
    </SCRIPT>

    <!--JS Edit Rekap September-->
    <SCRIPT TYPE="text/javascript">
      $('#editRekapSeptember').on('shown.bs.modal', function(e) {
              var idspp = $(e.relatedTarget).data('idspp');
              $(e.currentTarget).find('input[name="idspp"]').val(idspp);

              var nim = $(e.relatedTarget).data('nim');
              $(e.currentTarget).find('input[name="nim"]').val(nim);

              var namasiswa = $(e.relatedTarget).data('namasiswa');
              $(e.currentTarget).find('input[name="nama"]').val(namasiswa);

              var namakelas = $(e.relatedTarget).data('namakelas');
              $(e.currentTarget).find('input[name="namakelas"]').val(namakelas);

              var periode = $(e.relatedTarget).data('periode');
              $(e.currentTarget).find('input[name="periode"]').val(periode);

              var september = $(e.relatedTarget).data('september');
              $(e.currentTarget).find('input[name="nominal"]').val(september);

              });
    </SCRIPT>

    <!--JS Edit Rekap Oktober-->
    <SCRIPT TYPE="text/javascript">
      $('#editRekapOktober').on('shown.bs.modal', function(e) {
              var idspp = $(e.relatedTarget).data('idspp');
              $(e.currentTarget).find('input[name="idspp"]').val(idspp);

              var nim = $(e.relatedTarget).data('nim');
              $(e.currentTarget).find('input[name="nim"]').val(nim);

              var namasiswa = $(e.relatedTarget).data('namasiswa');
              $(e.currentTarget).find('input[name="nama"]').val(namasiswa);

              var namakelas = $(e.relatedTarget).data('namakelas');
              $(e.currentTarget).find('input[name="namakelas"]').val(namakelas);

              var periode = $(e.relatedTarget).data('periode');
              $(e.currentTarget).find('input[name="periode"]').val(periode);

              var oktober = $(e.relatedTarget).data('oktober');
              $(e.currentTarget).find('input[name="nominal"]').val(oktober);

              });
    </SCRIPT>

    <!--JS Edit Rekap November-->
    <SCRIPT TYPE="text/javascript">
      $('#editRekapNovember').on('shown.bs.modal', function(e) {
              var idspp = $(e.relatedTarget).data('idspp');
              $(e.currentTarget).find('input[name="idspp"]').val(idspp);

              var nim = $(e.relatedTarget).data('nim');
              $(e.currentTarget).find('input[name="nim"]').val(nim);

              var namasiswa = $(e.relatedTarget).data('namasiswa');
              $(e.currentTarget).find('input[name="nama"]').val(namasiswa);

              var namakelas = $(e.relatedTarget).data('namakelas');
              $(e.currentTarget).find('input[name="namakelas"]').val(namakelas);

              var periode = $(e.relatedTarget).data('periode');
              $(e.currentTarget).find('input[name="periode"]').val(periode);

              var november = $(e.relatedTarget).data('november');
              $(e.currentTarget).find('input[name="nominal"]').val(november);

              });
    </SCRIPT>

    <!--JS Edit Rekap Desember-->
    <SCRIPT TYPE="text/javascript">
      $('#editRekapDesember').on('shown.bs.modal', function(e) {
              var idspp = $(e.relatedTarget).data('idspp');
              $(e.currentTarget).find('input[name="idspp"]').val(idspp);

              var nim = $(e.relatedTarget).data('nim');
              $(e.currentTarget).find('input[name="nim"]').val(nim);

              var namasiswa = $(e.relatedTarget).data('namasiswa');
              $(e.currentTarget).find('input[name="nama"]').val(namasiswa);

              var namakelas = $(e.relatedTarget).data('namakelas');
              $(e.currentTarget).find('input[name="namakelas"]').val(namakelas);

              var periode = $(e.relatedTarget).data('periode');
              $(e.currentTarget).find('input[name="periode"]').val(periode);

              var desember = $(e.relatedTarget).data('desember');
              $(e.currentTarget).find('input[name="nominal"]').val(desember);

              });
    </SCRIPT>


    <!--Js Date Time Picker-->
    <script type="text/javascript">
    $(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
    </script>



    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  </body>
</html>
