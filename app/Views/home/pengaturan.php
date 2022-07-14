<?= $this->extend('home/template'); ?>
<?= $this->section('content'); ?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Home</a></li>
                <li>Pengaturan Akun</li>
            </ol>
            <h2>Pengaturan Akun</h2>
        </div>
    </section><!-- End Breadcrumbs -->


    <section class="inner-page pt-4">
        <div class="container mb-3">
            <nav class="navbar navbar-light relative-top bg-light flex-md-nowrap p-0 shadow">
                <div class="navbar-brand col-md-3 col-lg-2 mr-0 px-3">Pengaturan</div>
                <button class="navbar-toggler position-relative d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>

            <div class="container-fluid">
                <div class="row">
                    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse shadow">
                        <div class="sidebar-sticky pt-3">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="pengaturanakun">
                                        Profile
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="dokumen">
                                        Dokumen
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">Profile</h1>
                        </div>
                        <div class="row">
                            <div class="col">
                                <?php foreach ($profiluser as $row) : ?>
                                    <?php
                                    if (!empty($row["foto"])) {
                                        echo '<img class="ml-5" src="' . base_url("assets/file/$row[foto]") . '"width=150 height=200" >';
                                    }
                                    ?>
                            </div>
                            <div class="col">
                                <table class="mb-3">
                                    <tr>
                                        <td>Id Pelamar</td>
                                        <td> : AA00<?= $iduser; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td> : <?= $row['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td> : <?= $row['alamat']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No Telepon</td>
                                        <td> : <?= $row['notelp']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Lahir</td>
                                        <td> : <?= $row['tempat_lahir']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td> : <?= $row['tgl_lahir']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Pendidikan</td>
                                        <td> : <?= $row['pendidikan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td> : <?= $row['jenis_kelamin']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td>
                                        <td> : <?= $row['agama']; ?></td>
                                    </tr>
                                </table>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfil">
                                    Edit Profile
                                </button>
                            <?php endforeach; ?>
                            </div>
                            <div class="col"></div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </section>

    <!-- modal edit data profil -->
    <div class="modal fade" id="editProfil" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="home/editakun" method="POST">
                    <div class="modal-body">
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
                            <label for="tgllahir">Tanggal Lahir</label>
                            <input name="tgllahir" type="date" class="form-control" id="tgllahir" required>
                        </div>

                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <select class="form-control" name="pendidikan" id="pendidikan">
                                <option>SD/Sederajat</option>
                                <option>SMP/Sederajat</option>
                                <option>SMA/SMK/Sederajat</option>
                                <option>D3</option>
                                <option>S1/D4</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group first">
                            <label for="agama">Agama</label>
                            <input name="agama" type="text" class="form-control" id="agama">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Edit Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</main><!-- End #main -->
<?= $this->endSection(); ?>