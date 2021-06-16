<?= $this->extend('login/TemplateAuth'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <?= $validation->listErrors(); ?>
            <form action="/auth/save" method="POST">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="nama_user" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama_user" id="nama_user" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">password</label>
                    <input type="pass" class="form-control" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>