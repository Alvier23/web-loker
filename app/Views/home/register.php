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

    <title>Registrasi - PT Usaha Teknologi Mantap</title>
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
                                <h3>Registrasi</h3>
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <div class="alert alert-danger">
                                        <h4>Periksa Isi form</h4>
                                        </hr />
                                        <?= session()->getFlashdata('error'); ?>
                                    </div>
                                <?php endif; ?>
                                <p class="mb-4">Silahkan melakukan registrasi di sini, isi dengan lengkap</p>
                            </div>
                            <form method="post" action="<?= base_url(); ?>/home/authregis">
                                <div class="form-group first">
                                    <label for="email">Email</label>
                                    <input name="email" type="email" class="form-control" id="email">
                                </div>

                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control" id="password">
                                </div>

                                <div class="form-group last mb-4">
                                    <label for="confpassword">Confirm Password</label>
                                    <input name="confpassword" type="password" class="form-control" id="confpassword">
                                </div>

                                <div class="form-group first">
                                    <p>Isikan Data Diri Anda</p>
                                </div>

                                <div class="form-group first">
                                    <label for="nama">Nama</label>
                                    <input name="nama" type="text" class="form-control" id="nama">
                                </div>

                                <div class="form-group first">
                                    <label for="alamat">Alamat</label>
                                    <input name="alamat" type="text" class="form-control" id="alamat">
                                </div>

                                <div class="form-group first">
                                    <label for="notelp">No Telp</label>
                                    <input name="notelp" type="text" class="form-control" id="notelp">
                                </div>

                                <div class="form-group first">
                                    <label for="tempatlhr">Tempat Lahir</label>
                                    <input name="tempatlhr" type="text" class="form-control" id="tempatlhr">
                                </div>

                                <div class="form-group first">
                                    <p style="color: #b3b3b3; font-size:13px; margin-bottom:-5px">Tanggal Lahir</p>
                                    <input name="tgllahir" type="date" class="form-control" id="tgllahir" required>
                                </div>

                                <div class="form-group">
                                    <p style="color: #b3b3b3; font-size:13px; margin-bottom:0px">Tingkat Pendidikan</p>
                                    <select class="form-control" name="pendidikan" id="pendidikan">
                                        <option>SD/Sederajat</option>
                                        <option>SMP/Sederajat</option>
                                        <option>SMA/SMK/Sederajat</option>
                                        <option>D3</option>
                                        <option>S1/D4</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <p style="color: #b3b3b3; font-size:13px; margin-bottom:0px">Jenis Kelamin</p>
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                        <option>Laki-laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group first">
                                    <p style="color: #b3b3b3; font-size:13px; margin-bottom:-5px">Agama</p>
                                    <input name="agama" type="text" class="form-control" id="agama">
                                </div>

                                <input type="submit" value="Daftar Sekarang" class="btn text-white btn-block btn-primary">
                                <span class="d-block text-right my-4"><a href="login" style="color:blue"> Sudah memiliki akun? Klik Disini</a></span>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/user/js/jslogin/main.js') ?>"></script>
</body>

</html>