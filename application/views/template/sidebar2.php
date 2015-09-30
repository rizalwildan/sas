<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?= base_url(). 'asset/dist/img/user2-160x160.jpg" class="img-circle'; ?>" alt="User Image">
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
            <li><a href="<?php echo base_url(); ?>admin/datasiswa"><i class="fa fa-users"></i> <span>Data Siswa</span> </a></li>
            <li><a href="<?php echo base_url(); ?>index.php/admin/transaksi"><i class="fa fa-money"></i><span>Transaksi SPP</span></a></li>
            <li><a href="<?php echo base_url(); ?>index.php/admin/KomponenDetail"><i class="fa fa-money"></i><span>Data Komponen Keuangan</span></a></li>
            <li><a href="<?php echo base_url(); ?>index.php/admin/settingkomponen"><i class="fa fa-money"></i><span>Setting Komponen Keuangan</span></a></li>
            <li><a href="<?php echo base_url(); ?>admin/kelas"><i class="fa fa-users"></i> <span>Data Kelas</span> </a></li>
            <li><a href="<?php echo base_url(); ?>admin/KomponenDetail"><i class="fa fa-money"></i><span>Data Komponen Keuangan</span></a></li>
            <li><a href="<?php echo base_url(); ?>admin/dataSmester"><i class="fa fa-calendar"></i><span>Data Smester</span></a></li>
            <li><a href="<?php echo base_url(); ?>admin/user"><i class="fa fa-user"></i> <span>Data User</span> </a></li>
            <li><a href="<?php echo base_url(); ?>admin/transaksi"><i class="fa fa-money"></i><span>Transaksi SPP</span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-inbox"></i> <span>Pengaturan</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>admin/detailkelas">Siswa Kelas</a></li>
                <li><a href="<?php echo base_url(); ?>admin/setting_komponen">Komponen Kelas</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-inbox"></i> <span>Rekap Keuangan</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#">Per Siswa</a></li>
                <li><a href="#">Per Kelas</a></li>
              </ul>
            </li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
