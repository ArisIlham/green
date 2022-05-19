<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title; ?></title>
    <link href="<?php echo base_url('/asset/assets/'); ?>assets/img/home/logo.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="<?php echo base_url('/asset/assets/'); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- <link href="<?php echo base_url('/asset/assets/'); ?>assets/css/sb-admin-2.min.css" rel="stylesheet"> -->
    <link href="<?php echo base_url('/asset/assets/'); ?>assets/css/styles.css" rel="stylesheet" />
    <link href="<?php echo base_url('/asset/assets/'); ?>assets/css/profile_member_style.css" rel="stylesheet" />
    <link href="<?php echo base_url('/asset/assets/'); ?>assets/css/validation.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="<?php echo base_url('/asset/assets/'); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('/asset/assets/'); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <div id="layoutSidenav">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?= base_url('Member/Dashboard') ?>">GREEN LAUNDRY</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#layoutSidenav_nav"><i class="fas fa-bars"></i></button>

            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('Member/logout') ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading"></div>
                        <a class="nav-link" href="<?= base_url('member/dashboard') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link" href="<?= base_url('member/order') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Penjemputan Barang
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">

                        </div>
                        <a class="nav-link" href="<?= base_url('member/history') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Histori
                        </a>

                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        </div>
                        <a class="nav-link" href="<?= base_url('member/profile') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            profil
                        </a>

                    </div>

            </nav>
        </div>
        
        <script src="<?php echo base_url('/asset/assets/'); ?>assets/js/scripts.js"></script>
        
</html>