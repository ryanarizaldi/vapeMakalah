<?= $this->extend('template') ?>
<?= $this->section('content') ?>

    <div class="container">
        <div class="row">
            <div class="col dashboardTittle centerBox">
                <h1>Welcome To The VAPE APP</h1>
                <br>
            </div>
        </div>
        <div class="row ">
            <div class="centerBox">
                <h3> <?=session()->get('nama'); ?> </h3>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>