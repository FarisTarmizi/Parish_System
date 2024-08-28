<?php include 'config/app.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administration Masjid Ali-Imran </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets_template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="assets_template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets_template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets_template/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets_template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets_template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets_template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets_template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <style>
    .footer {
          text-align: center;
          padding: 10px;
          background-color: #333;
          color: #fff;
          position:absolute;
          bottom: 0;
          width: 100%;
        }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="assets_template/dist/img/Ali.png" alt="Masjid Ali-Imran" height="150" width="150">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
<!--       <li class="nav-item d-none d-sm-inline-block">
        <a href="admin.php" class="nav-link">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Contact</a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
  
    <!-- Brand Logo -->
    <a href="admin.php" class="brand-link">
      <img src="assets_template/dist/img/Masjid_Ali-Imran.png" alt="Masjid Ali-Imran" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">Masjid Ali-Imran</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets_template/dist/img/Ali.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">AJK MASJID</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Menu</li>
          <li class="nav-item">
            <a href="admin.php" class="nav-link">
              <i class="nav-icon fab fa-elementor"></i>
              <p>
                PERMOHONAN  BARU
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Info_masjid.php" class="nav-link">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
                JAWATAN KUASA
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Borang.php" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                BORANG PENDAFTARAN
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Senarai_kariah.php" class="nav-link">
            <i class="nav-icon fas fa-list-alt"></i>
              <p>
                SENARAI DATA  KARIAH
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Kariah_masjid/Halaman_Utama.php" onclick="return confirm('Adakah Anda Pasti Untuk Keluar?')" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                KELUAR
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>