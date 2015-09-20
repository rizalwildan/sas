<link type="text/css" rel="stylesheet" href="<?php echo base_url('asset/development-bundle/themes/ui-lightness/ui.all.css');?>" />
    <script src="<?php echo base_url('asset/development-bundle/jquery-1.8.0.min.js');?>"></script>
    <script src="<?php echo base_url('asset/development-bundle/ui/ui.core.js');?>"></script>
    <script src="<?php echo base_url('asset/development-bundle/ui/ui.datepicker.js');?>"></script>
    <script src="<?php echo base_url('asset/development-bundle/ui/i18n/ui.datepicker-id.js');?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?= base_url(). 'asset/bootstrap/js/bootstrap.min.js'; ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(). 'asset/dist/js/app.min.js'; ?>"></script>
    <!-- Slimscroll -->
    <script src="<?= base_url(). 'asset/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
    <!-- FastClick -->
    <script src="<?= base_url(). 'plugins/fastclick/fastclick.min.js'; ?>"></script>

<input type="text" id="tanggal">


<script type="text/javascript">
        $(function(){
            $("#tanggal").datepicker({
                dateFormat : "yy-mm-dd",
                changeMonth : true,
                changeYear : true,
                yearRange : '-66:+60'
            });
        });
    </script>