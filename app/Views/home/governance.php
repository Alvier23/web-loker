<?= $this->extend('home/template'); ?>
<?= $this->section('content'); ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Home</a></li>
                <li>IT Governance</li>
            </ol>
            <h2>Lowongan Untuk IT Governance</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page pt-4">
        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <?php foreach ($governance as $row) : ?>
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
                                    <button style="float:right" type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Apakah anda yakin ?')">Apply Sekarang</button></a>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?= $this->endSection(); ?>