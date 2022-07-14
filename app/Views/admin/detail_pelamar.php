<?= $this->extend('admin/template'); ?>
<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kontrol Lowongan Kerja</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Pelamar</li>
                    </ol>
                </div>
            </div>
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert"><?= session()->getFlashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php
            if (session()->getFlashdata('berhasil')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('berhasil') ?></div>
            <?php endif; ?>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row mb-2">
            <div class="col"></div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h3>Detail Pelamar</h3>
                        <?php foreach ($detailpelamar as $row) :  ?>
                            <table class="mb-3">
                                <tr>
                                    <td>
                                        <?php
                                        if (!empty($row["foto"])) {
                                            echo '<img src="' . base_url("assets/file/$row[foto]") . '"width=150 height=200" >';
                                        } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Id Pelamar</td>
                                    <td> : AA00<?= $row['id_user']; ?></td>
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
                    </div>
                    <div class="col">
                        <h3>Detail Pendaftaran</h3>
                        <table class="mb-5">
                            <tr>
                                <td>ID Pendaftaran</td>
                                <td> : PDF<?= $row['id_pendaftar']; ?></td>
                            </tr>
                            <tr>
                                <td>ID Lowongan</td>
                                <td> : <?= $row['id_detail']; ?></td>
                            </tr>
                            <tr>
                                <td>Posisi Yang Di Inginkan</td>
                                <td> : <?= $row['nama_posisi']; ?></td>
                            </tr>
                            <tr>
                                <td>Penempatan</td>
                                <td> : <?= $row['tempat']; ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td> : <?= $row['status_pelamar']; ?></td>
                            </tr>
                        </table>
                        <h3>Detail Berkas Pelamar</h3>
                        <table>
                            <tr>
                                <td>Pas Foto (4x6)</td>
                                <td> : <?php if ($row['foto'] == NULL) {
                                            echo '<i>File Belum Ada</i>';
                                        } else { ?>
                                        <a href="<?= base_url() ?>/assets/file/<?= $row['foto']; ?>"><?= $row['foto']; ?></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>File Lamaran</td>
                                <td> :
                                    <?php if ($row['file_lamaran'] == NULL) {
                                        echo '<i>File Belum Ada</i>';
                                    } else { ?>
                                        <a href="<?= base_url() ?>/assets/file/<?= $row['file_lamaran']; ?>"><?= $row['file_lamaran']; ?></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>File SKCK</td>
                                <td> :
                                    <?php if ($row['file_skck'] == NULL) {
                                        echo '<i>File Belum Ada</i>';
                                    } else { ?>
                                        <a href="<?= base_url() ?>/assets/file/<?= $row['file_skck']; ?>"><?= $row['file_skck']; ?></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>File CV</td>
                                <td> :
                                    <?php if ($row['file_cv'] == NULL) {
                                        echo '<i>File Belum Ada</i>';
                                    } else { ?>
                                        <a href="<?= base_url() ?>/assets/file/<?= $row['file_cv']; ?>"><?= $row['file_cv']; ?></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <form action="/administrator/emailditerima/<?= $row['id_pendaftar']; ?>" method="POST">
                    <input type="hidden" name="status_pelamar" value="diterima">
                    <?php
                            if ($row['status_pelamar'] == 'sedang proses') { ?>
                        <button style="float: right;" class="btn btn-primary ml-2" type="submit">Terima Pelamar</button></a>
                    <?php } else { ?>
                        <button style="float: right;" class="btn btn-primary ml-2" type="submit" disabled>Terima Pelamar</button>
                    <?php } ?>
                </form>
                <form action="/administrator/emailditolak/<?= $row['id_pendaftar']; ?>" method="POST">
                    <input type="hidden" name="status_pelamar" value="ditolak">
                    <?php
                            if ($row['status_pelamar'] == 'sedang proses') { ?>
                        <button style="float: right;" class="btn btn-danger" type="submit">Tolak Pelamar</button>
                    <?php } else { ?>
                        <button style="float: right;" class="btn btn-danger" type="submit" disabled>Tolak Pelamar</button>
                    <?php } ?>
                </form>
            </div>
        <?php endforeach; ?>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>