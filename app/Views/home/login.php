<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">


    <link href="<?= base_url('assets/user/vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/user/vendor/owl.carousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Style -->
    <link href="<?= base_url('assets/user/css/stylelogin.css'); ?>" rel="stylesheet">

    <title>Login - PT Usaha Teknologi Mantap</title>
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <img src="<?= base_url('assets/user/images/undraw_file_sync_ot38.svg') ?>" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <p><i class="fa fa-home"></i><a href="/" style="text-decoration:none;"> Kembali ke halaman utama</a></p>
                                <h3>Sign In</h3>
                                <p class="mb-4">Silahkan melakukan login jika sudah memiliki akun.</p>
                                <?php
                                if (session()->getFlashdata('pesan')) : ?>
                                    <div class="alert alert-danger"><?= session()->getFlashdata('pesan') ?></div>
                                <?php endif; ?>
                                <?php
                                if (session()->getFlashdata('sukses')) : ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong><?= session()->getFlashdata('sukses') ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <form action="authlog" method="POST">
                                <div class="form-group first">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" id="email">
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>
                                <input type="submit" value="Log In" class="btn text-white btn-block btn-primary">
                                <span class="d-block text-right my-4"><a href="registrasi" style="color: blue;"> Belum registrasi? Klik Disini</a></span>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="<?= base_url('assets/user/js/jslogin/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/user/js/jslogin/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/user/js/jslogin/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/user/js/jslogin/main.js') ?>"></script>
</body>

</html>