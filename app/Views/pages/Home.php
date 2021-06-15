<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <a href="/pages/create" class="btn btn-primary">tambah berita</a>
            <table class="table table table-striped">
                <?php $i = 1 ?>
                <?php foreach ($berita as $k) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $k['judul_berita']; ?> </td>
                        <td><?= $k['isi_berita']; ?> </td>
                        <td> <a href="/pages/detail/<?= $k['id_berita'] ?> " class="btn btn-primary">detail</a> </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>