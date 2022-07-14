<?= $this->extend('home/template'); ?>
<?= $this->section('content'); ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Home</a></li>
                <li>Mobile Programmer</li>
            </ol>
            <h2>Lowongan Untuk Mobile Progammer</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page pt-4">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <?php if ($mobile == null) {
                        echo '<p>lowongan belum tersedia...</p>';
                    } else { ?>
                </div>
                <div class="col-8">
                    <?php foreach ($mobile as $row) : ?>
                        <div class="card shadow p-3 mb-5 bg-white rounded">
                            <div class="card-body">
                                <h2>Lowongan Posisi <?= $row['nama_posisi']; ?></h2>
                                <?php
                                if (!empty($row["gambar"])) {
                                    echo '<img style="width: 100%;
                                    height: auto;" src="' . base_url(" assets/img/$row[gambar]") . '"width=500" >';
                                } ?>
                                <p><?= $row['deskripsi']; ?></p>
                            </div>
                            <div class="card-footer">
                                Status : <span class="badge badge-pill badge-success"><?= $row['status']; ?></span> <br>
                                Penempatan : <b><?= $row['tempat']; ?></b>
                                <form action="/home/applyloker" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <?php foreach ($profiluser as $anu) : ?>
                                        <input type="hidden" name="id_user" value="<?= $anu['id_user_detail']; ?>">
                                    <?php endforeach; ?>
                                    <input type="hidden" name="id_loker" value="<?= $row['id_detail']; ?>">
                                    <input type="hidden" name="status" value="sedang proses">
                                    <?php if ($row['status'] == 'tersedia') { ?>
                                        <button style="float:right" type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Apakah anda yakin ?')">Apply Sekarang</button>
                                    <?php } else { ?>
                                        <button style="float:right" class="btn btn-warning btn-sm" onclick="return confirm('Apakah anda yakin ?')" disabled>Apply Sekarang</button>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php } ?>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?= $this->endSection(); ?>