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
                            <h1 class="h2">Dokumen</h1>
                        </div>
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"><?= session()->getFlashdata('error'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <?php foreach ($profiluser as $row) : ?>
                            <table class="table table-hover">
                                <tr>
                                    <td>Foto</td>
                                    <td> : <?= $row['foto']; ?></td>
                                </tr>
                                <tr>
                                    <td>File Lamaran</td>
                                    <td> :
                                        <?php if ($row['file_lamaran'] == NULL) {
                                            echo '<i>File Belum Ada</i>';
                                        } else {
                                            echo $row['file_lamaran'];
                                        } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>File SKCK</td>
                                    <td> :
                                        <?php if ($row['file_skck'] == NULL) {
                                            echo '<i>File Belum Ada</i>';
                                        } else {
                                            echo $row['file_skck'];
                                        } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>File CV</td>
                                    <td> :
                                        <?php if ($row['file_cv'] == NULL) {
                                            echo '<i>File Belum Ada</i>';
                                        } else {
                                            echo $row['file_cv'];
                                        } ?>
                                    </td>
                                </tr>
                            </table>

                            <a href="#" class="btn btn-primary btn-edit" data-id="<?= $row['id_user_detail']; ?>" data-userid="<?= $row['id_user']; ?>" data-filecv="<?= $row['file_cv']; ?>" data-fileskck="<?= $row['file_skck']; ?>" data-filelamaran="<?= $row['file_lamaran']; ?>" data-foto="<?= $row['foto']; ?>">
                                Edit Dokumen
                            </a>
                        <?php endforeach; ?>
                    </main>
                </div>
            </div>
        </div>
    </section>

    <!-- modal edit data dokumen -->
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form Edit Dokumen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/home/updateDokumen" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="filecv" class="col-sm-2 col-form-label">File CV</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="cv" class="custom-file-input" id="filecv" onchange="previewFile()">
                                    <label class="custom-file-label cv" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fileskck" class="col-sm-2 col-form-label">File SKCK</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="skck" class="custom-file-input" id="fileskck" onchange="previewFile()">
                                    <label class="custom-file-label skck" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="filelamaran" class="col-sm-2 col-form-label">File Lamaran</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="lamaran" class="custom-file-input" id="filelamaran" onchange="previewFile()">
                                    <label class="custom-file-label lamaran" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-sm-2 col-form-label">Foto (4x6)</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="foto" class="custom-file-input" id="foto" onchange="previewFile()">
                                    <label class="custom-file-label foto" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_user_detail" class="id">
                        <input type="hidden" name="id_user" class="userid">
                        <input type="hidden" name="cvlama" value="<?= $row['file_cv']; ?>">
                        <input type="hidden" name="skcklama" value="<?= $row['file_skck']; ?>">
                        <input type="hidden" name="lamaranlama" value="<?= $row['file_lamaran']; ?>">
                        <input type="hidden" name="fotolama" value="<?= $row['foto']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main><!-- End #main -->
<?= $this->endSection(); ?>