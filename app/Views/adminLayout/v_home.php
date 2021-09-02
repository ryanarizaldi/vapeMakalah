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
                <h3> - <?=session()->get('nama'); ?> - <?php $roles = session()->get('roles_map'); ?></h3>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-4">
                <a href="<?= base_url() ?>/admin/pembayaran" >
                    <div class="card text-center dash-menu no-link">
                        <img src="<?= base_url()?>/assets/bootstrap/icons/cash-coin.svg" alt="icon pembayaran" width="50%" class="mx-auto d-block">
                        <div class="card-body">
                            <h3 id="noLink">Pembayaran</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?= base_url() ?>/admin/cari_va">
                    <div class="card text-center dash-menu no-link">
                        <img src="<?= base_url()?>/assets/bootstrap/icons/search.svg" alt="icon cari va" width="50%" class="mx-auto d-block">
                        <div class="card-body">
                            <h3>Cari VA</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?= base_url() ?>/admin/history_va">
                    <div class="card text-center dash-menu no-link">
                        <img src="<?= base_url()?>/assets/bootstrap/icons/receipt-cutoff.svg" alt="icon history va" width="50%" class="mx-auto d-block">
                        <div class="card-body">
                            <div class="menu-title">
                                <h3  class="aler-link">History VA</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>