<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Instansi</h4>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-8">
                            <?php foreach($res as $key): ?>
                            <div class="col-md-4"><b>Kode Instansi :</b></div>
                            <div class="col-md-8"><?= $key['kd_instansi']?></div>

                            <div class="col-md-4"><b>Nama Instansi :</b></div>
                            <div class="col-md-8"><?= $key['nama'] ?></div>
                            
                            <div class="col-md-4"><b>Status Instansi :</b></div>
                            <div class="col-md-8"><?php if ( $key['status'] == 0) {
                                echo "AKTIF";
                            }else{
                                echo "TIDAK AKTIF";
                            } ?>
                            </div>
                            
                            <div class="col-md-4"><b>Nomor Rekening Instansi :</b></div>
                            <div class="col-md-8"><?= $key['norek'] ?></div>
                            
                            <?php endforeach; ?>
                        </div>
                        <div class="col-md-3"></div>
                        
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
