<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<script>
    function printPdf(){
    window.print();
    }
</script>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>History Virtual Account</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url();  ?>/Admin/rekeningKoran" method="post">
                        <div class="row mb-3">
                            <div class="col-md-5">
                                <input type="date" class="form-control" placeholder="Tanggal Awal" name="tgl_awal">
                            </div>
                            <div class="col-md-1">
                                <p class="centerMe">S/D</p>
                            </div>
                            <div class="col-md-6">
                                <input type="date" class="form-control" placeholder="Tanggal Akhir" name="tgl_akhir">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="no_va">Nomor Rekening Virtual Account</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="no_va" class="form-control">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary">Cari</button>
                        </div>
                    </form>    
                </div>
                <?php if(!empty($sql)): ?>
                    <div class="container">
                    <h6>Nama:       <?php echo $name[0]->nama;?></h6>
                    <h6>Nomor VA:   <?= $no_va ?></h6>
                    <table class="table table-bordered table-hover" id="myTable">
                        <thead >
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nomor Arsip</th>
                                <!-- <th scope="col">Nomor VA</th> -->
                                <th scope="col">Keterangan</th>
                                <th scope="col">Jumlah Transaksi</th>
                                <th scope="col">Saldo</th>
                                <th scope="col">Kode User</th>
                                <th scope="col">Jenis Transaksi</th>
                                <th scope="col">Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sql as $key) :?>
                            <tr>
                                <td><?= $key->id ?></td>
                                <td><?= $key->tgl ?></td>
                                <td><?= $key->no_arsip ?></td>
                                <td><?= $key->keterangan ?></td>
                                <td><?= $key->jml_tx ?></td>
                                <td><?= $key->saldo ?></td>
                                <td><?= $key->kd_user ?></td>
                                <td><?= $key->jns_tx ?></td>
                                <td><?= $key->time_stamp ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mb-5">
                        <a href="<?= base_url()?>/admin/printVa/<?="$tgl_awal/$tgl_akhir/$no_va"?>" class="btn btn-info" target="_blank">Print</a>
                    </div>
                </div>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

