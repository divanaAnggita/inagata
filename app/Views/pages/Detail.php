<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"> <?= $berita['judul_berita']; ?></h5>
                                <h6 class="card"><?= $berita['tanggal_berita']; ?></h6>
                                <p class="card-text"> <?= $berita['isi_berita']; ?></p>

                                <a href="/pages/edit/<?= $berita['id_berita']; ?>" class="btn btn-warning">edit</a>

                                <form action="/pages/<?= $berita['id_berita']; ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda benar benar yakin akan menghapus data ini?')">delete</button>
                                </form>

                                <a href="/pages" class="btn btn-success">kembali ke daftar berita</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>