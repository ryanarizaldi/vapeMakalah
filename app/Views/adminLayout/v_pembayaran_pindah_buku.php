<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Pembayaran Pindah Buku</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-success alert-dismissible fade show  " role="alert">
                        <h4>Rekening Ditemukan</h4>
                        <hr>
                        <p>Konfimasi Pembayaran Dengan Data Berikut Ini :</p>
                        <ul>
                            <li>Nama:                      <?= $nama_va?></li>
                            <li>Nomor VA:                  <?= $kd_va?></li>
                            <li>Nomor rekening Nasabah:    <?= $norek?></li>
                            <li>Nomor Identitas:            <?= $no_identitas?></li>
                            <li>Nominal:                    <span class='nominal'><?= $nominalRP?></span></li>
                        </ul>
                        <div class="row">
                            <div class="col-md-6">
                                <form action="<?= base_url()?>/Admin/transaksiPindahBuku" method="post">
                                    <div class="no-show" display="none">
                                        <input type="text" value="<?= $nominal ?>" name="nominal">
                                        <input type="text" value="<?= $nominalRP ?>" name="nominalRP">
                                        <input type="text" value="<?= $kd_va ?>" name="kd_va">
                                        <input type="text" value="<?= $norek_instansi ?>" name="rek_instansi">
                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
                                    </div>
                                </form>  
                            </div>
                            <div class="col-md-6">
                                <form action="<?= base_url()?>/Admin/cekVa" method="post">
                                    <div class="no-show">
                                        <input type="text" value="<?= $kd_va?>" name="kd_va">
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-danger">Batal</button>
                                    </div>
                                </form>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>
