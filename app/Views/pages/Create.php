<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <?= $validation->listErrors(); ?>
            <form action="/pages/save" method="POST">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="judul_berita" class="form-label">Judul berita</label>
                    <input type="text" class="form-control" name="judul_berita" id="judul_berita" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="isi_berita" class="form-label">isi berita</label>
                    <input type="text" class="form-control" name="isi_berita" id="isi_berita">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>