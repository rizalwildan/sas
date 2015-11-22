<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?= base_url(). 'asset/dist/img/logo2.jpg" class="img-circle'; ?>" alt="User Image">
            </div>
            <div class="pull-left info">
              <?php $akun = $this->session->userdata('akun'); ?>
              <p><?php echo $akun['username']; ?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $akun['username']; ?></a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li>
              <a href="<?php echo base_url(); ?>Home/datasiswa"><i class="fa fa-graduation-cap"></i> <span>Data Siswa</span> </a>
            </li>
            <li><a href="<?php echo base_url(); ?>Home/kelas"><i class="fa fa-users"></i> <span>Data Kelas</span> </a></li>
            <li><a href="<?php echo base_url(); ?>Home/transaksi"><i class="fa fa-credit-card"></i><span>Transaksi SPP</span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-inbox"></i> <span>Rekap Keuangan</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>Home/rekap">Per Siswa Kelas</a></li>
                <li><a href="<?php echo base_url(); ?>Home/rekap_kelas">Per Tingkat Kelas</a></li>
                <li><a href="<?php echo base_url(); ?>Home/rekap_bos">Bos</a></li>
              </ul>
            </li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
