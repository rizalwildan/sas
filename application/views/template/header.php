<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAS | SMAGA</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?= base_url(). 'asset/bootstrap/css/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?= base_url(). 'asset/bootstrap/css/daterangepicker.css';?>">
    <link rel="stylesheet" href="<?= base_url(). 'asset/bootstrap/css/datepicker.css';?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(). 'asset/fontawasome/css/font-awesome.min.css';?>">
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(). 'asset/dist/css/AdminLTE.min.css'; ?>">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->

    <link rel="stylesheet" href="<?= base_url(). 'asset/dist/css/skins/skin-blue.min.css'; ?>">

    <link type="text/css" rel="stylesheet" href="<?php echo base_url('asset/development-bundle/themes/ui-lightness/ui.all.css');?>" />
    <script src="<?php echo base_url('asset/development-bundle/jquery-1.8.0.min.js');?>"></script>
    <script src="<?php echo base_url('asset/development-bundle/ui/ui.core.js');?>"></script>
    <script src="<?php echo base_url('asset/development-bundle/ui/ui.datepicker.js');?>"></script>
    <script src="<?php echo base_url('asset/development-bundle/ui/i18n/ui.datepicker-id.js');?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/jquery.bootstrap-growl.js');?>"></script>




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="hold-transition skin-blue fixed">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SAS</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->

          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              </li><!-- /.messages-menu -->

              <!-- Notifications Menu -->
              <li class="dropdown notifications-menu">

              </li>
              <!-- Tasks Menu -->
              <li class="dropdown tasks-menu">
                <!-- Menu Toggle Button -->
                <a href="<?php echo base_url() ?>index.php/auth/logout" >
                  <i class="fa fa-sign-out"></i>
                  <span>Log Out</span>
                </a>
              </li>
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->

                  <!-- The user image in the menu -->
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>

              </li>
            </ul>
          </div>
        </nav>
      </header>
