<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table table-striped">
                <tr>
                    <td><?= $user['id_user'] ?></td>
                    <td><?= $user['nama_user']; ?> </td>
                    <td><?= $user['email']; ?> </td>
                    <td> <a href="/profil/edit/<?= $user['id_user'] ?> " class="btn btn-primary">edit</a> </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>