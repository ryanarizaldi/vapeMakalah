<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Pencarian Instansi</h1>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="mb-3 row">
                            <label for="kd_instansi" class="col-sm-2 col-form-label">Nomor Kode Instansi</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="kd_instansi" name="kd_instansi">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">
                                    Cari
                                </button>
                            </div>
                        </div>
                    </form>
                    <form action="">
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Instansi</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">
                                    Cari
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
