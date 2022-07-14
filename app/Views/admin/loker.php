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
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#staticBackdrop">Tambah Data +</button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Lowongan Kerja</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/administrator/addloker" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="pdk">Posisi</label>
                                        <select name="id_posisi" class="form-control" id="pdk" required>
                                            <?php foreach ($loker as $row) : ?>
                                                <option value="<?= $row['id']; ?>"><?= $row['nama_posisi']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tmpt">Tempat</label>
                                        <select name="tempat" class="form-control" id="tmpt" required>
                                            <option>Surabaya</option>
                                            <option>Jakarta</option>
                                            <option>Semarang</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="gmb">Gambar</label>
                                        <input type="file" class="form-control-file" id="gmb" name="gambar">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>
                                        <script>
                                            CKEDITOR.replace('editor1');
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        <label for="tmpt">Status</label>
                                        <select name="status" class="form-control" id="tmpt" required>
                                            <option>Tersedia</option>
                                            <option>Tidak Tersedia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Default box -->
        <div class="card collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Lokasi Lowongan : Surabaya</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <!-- datatable -->
            <div class="card-body">
                <table id="loker" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Lowongan</th>
                            <th>Posisi Lowongan</th>
                            <th>Penempatan</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($lokersby as $row) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['id_detail']; ?></td>
                                <td><?= $row['nama_posisi']; ?></td>
                                <td><?= $row['tempat']; ?></td>
                                <td><?php if (!empty($row["gambar"])) {
                                        echo '<img src="' . base_url("assets/img/$row[gambar]") . '"width=100">';
                                    }
                                    ?>
                                </td>
                                <td><?= substr($row['deskripsi'], 0, 150); ?>...</td>
                                <td><?php if ($row["status"] == "tidak tersedia") : ?>
                                        <span class="badge badge-danger"><?= $row["status"]; ?></span>
                                    <?php endif; ?>
                                    <?php if ($row["status"] == "tersedia") : ?>
                                        <span class="badge badge-success"><?= $row["status"]; ?></span>
                                    <?php endif; ?>
                                </td>

                                <td><button class="btn btn-warning btn-sm">Edit</button> |
                                    <form action="/administrator/<?= $row['id_detail']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ?')">Delete</button></a>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        endforeach;
                        ?>
                </table>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        <!-- Default box -->
        <div class="card collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Lokasi Lowongan : Semarang</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>

            <!-- datatable -->
            <div class="card-body">
                <table id="lokersmg" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Lowongan</th>
                            <th>Posisi Lowongan</th>
                            <th>Penempatan</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($lokersmrg as $row) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['id_detail']; ?></td>
                                <td><?= $row['nama_posisi']; ?></td>
                                <td><?= $row['tempat']; ?></td>
                                <td><?php if (!empty($row["gambar"])) {
                                        echo '<img src="' . base_url("assets/img/$row[gambar]") . '"width=100">';
                                    }
                                    ?>
                                </td>
                                <td><?= $row['deskripsi']; ?></td>
                                <td><?php if ($row["status"] == "tidak tersedia") : ?>
                                        <span class="badge badge-danger"><?= $row["status"]; ?></span>
                                    <?php endif; ?>
                                    <?php if ($row["status"] == "tersedia") : ?>
                                        <span class="badge badge-success"><?= $row["status"]; ?></span>
                                    <?php endif; ?>
                                </td>

                                <td><button class="btn btn-warning btn-sm">Edit</button> |
                                    <form action="/administrator/<?= $row['id_detail']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ?')">Delete</button></a>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        endforeach;
                        ?>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Default box -->
        <div class="card collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Lokasi Lowongan : Jakarta</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="lokerjkt" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Lowongan</th>
                            <th>Posisi Lowongan</th>
                            <th>Penempatan</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($lokerjkt as $row) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['id_detail']; ?></td>
                                <td><?= $row['nama_posisi']; ?></td>
                                <td><?= $row['tempat']; ?></td>
                                <td><?php if (!empty($row["gambar"])) {
                                        echo '<img src="' . base_url("assets/img/$row[gambar]") . '"width=100">';
                                    }
                                    ?>
                                </td>
                                <td><?= $row['deskripsi']; ?></td>
                                <td><?php if ($row["status"] == "tidak tersedia") : ?>
                                        <span class="badge badge-danger"><?= $row["status"]; ?></span>
                                    <?php endif; ?>
                                    <?php if ($row["status"] == "tersedia") : ?>
                                        <span class="badge badge-success"><?= $row["status"]; ?></span>
                                    <?php endif; ?>
                                </td>

                                <td><button class="btn btn-warning btn-sm">Edit</button> |
                                    <form action="/administrator/<?= $row['id_detail']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ?')">Delete</button></a>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        endforeach;
                        ?>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>