<?= $this->extend('login/TemplateAuth'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <form action="/Auth/loginHandler" method="post">
                <br /> <br />
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" name="password">
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary">login</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>