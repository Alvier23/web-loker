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
                        <li class="breadcrumb-item active">Kontrol Lowongan Kerja</li>
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
            <div class="col">
                <!-- Button trigger modal -->

            </div>
        </div>

        <div class="card-body">
            <table id="pelamar" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Pendaftar</th>
                        <th>Id Pelamar</th>
                        <th>Nama Pelamar</th>
                        <th>ID Lowongan</th>
                        <th>Posisi yang di Inginkan</th>
                        <th>Status</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($datapelamar as $row) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td>PDF<?= $row['id_pendaftar']; ?></td>
                            <td>USR<?= $row['id_user']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['id_detail']; ?></td>
                            <td><?= $row['nama_posisi']; ?></td>
                            <td><?php if ($row["status_pelamar"] == "ditolak") : ?>
                                    <span class="badge badge-danger"><?= $row["status_pelamar"]; ?></span>
                                <?php endif; ?>
                                <?php if ($row["status_pelamar"] == "diterima") : ?>
                                    <span class="badge badge-success"><?= $row["status_pelamar"]; ?></span>
                                <?php endif; ?>
                                <?php if ($row["status_pelamar"] == "sedang proses") : ?>
                                    <span class="badge badge-warning"><?= $row["status_pelamar"]; ?></span>
                                <?php endif; ?>
                            </td>
                            <td><a href="/administrator/pelamar/<?= $row["id_pendaftar"]; ?>"><button class="btn btn-warning btn-sm">Detail Pelamar</button></a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    endforeach;
                    ?>
            </table>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>