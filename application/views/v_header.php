<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PT. X | Dashboard 3</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
   <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">

  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('css/adminlte.min.css'); ?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/select2/css/select2.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">

  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css'); ?>">

  <style type="text/css">
    input, textarea {
      text-transform: uppercase;
    }

    table {
      font-size: 12px;
    }
    table td {
      padding: 5px !important;
    }
  </style>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('dashboard'); ?>" class="nav-link">Home</a>
      </li> 
    </ul>
  </nav>
  <!-- /.navbar -->