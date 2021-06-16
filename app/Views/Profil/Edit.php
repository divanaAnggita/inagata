<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <?= $validation->listErrors(); ?>
            <form action="/profil/update" method="POST">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="nama_user" class="form-label">Nama User</label>
                    <input type="text" class="form-control" name="nama_user" id="nama_user" value="<?= $user['nama_user']; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <input type="text" class="form-control" name="email" id="email" value="<?= $user['email']; ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="pass" class="form-control" name="password" id="password" value="<?= $user['password']; ?>">
                </div>
                <button type="submit" class="btn btn-warning">Submit</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>