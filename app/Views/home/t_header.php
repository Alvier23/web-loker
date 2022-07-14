<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets/img/favicon.png'); ?>" rel="icon">
    <link href="<?= base_url('assets/img/apple-touch-icon.png'); ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="<?= base_url('assets/user/vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/user/vendor/ionicons/css/ionicons.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/user/vendor/venobox/venobox.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/user/vendor/owl.carousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/user/vendor/aos/aos.css'); ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/user/css/style.css'); ?>" rel="stylesheet">

</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-none d-lg-flex align-items-end fixed-top topbar-transparent">
        <div class="container d-flex justify-content-end">
            <div class="social-links">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="#"><?= $hai, $nama_user; ?></a>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-transparent">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="/">PT UTM</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav class="main-nav d-none d-lg-block">
                <ul>
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="/#services">Lowongan</a></li>

                    <?php if ($nama_user) { ?>
                        <li id="notifikasi"><a href="#">Notifikasi</a></li>
                    <?php } elseif ($nama_user == null) { ?>
                        <li id="notifikasi" hidden><a href="#">Notifikasi</a></li>
                    <?php } ?>

                    <?php if ($nama_user) { ?>
                        <li id="pengaturan"><a href="<?= base_url("home/pengaturanakun") ?>">Pengaturan Akun</a></li>
                    <?php } elseif ($nama_user == null) { ?>
                        <li id="pengaturan" hidden><a href="#">Pengaturan Akun</a></li>
                    <?php } ?>

                    <?php if ($nama_user) { ?>
                        <li id="login" hidden><a class="btn btn-warning" style="border-radius: 10px; padding:8px 20px; " href="<?= base_url("login"); ?>">
                                <ion-icon name="contacts"></ion-icon> Login
                            </a></li>
                    <?php } elseif ($nama_user == null) { ?>
                        <li id="login"><a class="btn btn-warning" style="border-radius: 10px; padding:8px 20px; " href="<?= base_url("home/login"); ?>">
                                <ion-icon name="contacts"></ion-icon> Login
                            </a></li>
                    <?php } ?>

                    <?php if ($nama_user) { ?>
                        <li id="logout"><a class="btn btn-warning" style="border-radius: 10px; padding:8px 20px; " href="<?= base_url('home/logout') ?>">
                                Logout <ion-icon name="exit"></ion-icon>
                            </a></li>
                    <?php } elseif ($nama_user == null) { ?>
                        <li id="logout" hidden><a class="btn btn-warning" style="border-radius: 10px; padding:8px 20px; " href="">
                                Logout <ion-icon name="exit"></ion-icon>
                            </a></li>
                    <?php } ?>
                </ul>
            </nav><!-- .main-nav-->

        </div>
    </header><!-- End Header -->