<?= $this->extend('layout/template'); ?>
<?php $koneksi = mysqli_connect("localhost", "root", "", "inagata"); ?>
<?php $query = mysqli_query($koneksi, "SELECT * FROM berita"); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-dark table-striped">
                <?= $i = 1; ?>
                <?php while ($berita = mysqli_fetch_assoc($query)) : ?>
                    <tr>
                        <td> <?php echo $berita["isi_berita"]; ?> </td>
                    </tr>
                    <?= $i++; ?>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>