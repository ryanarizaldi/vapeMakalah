<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Pencarian Virtual Account</h1>
                </div>
                <div class="card-body">
                    <form action="<?= base_url()?>/Admin/actionCariVa" method="post">
                        <div class="mb-3 row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <select class="form-select" aria-label="Default select example" name="opsi" required>
                                    <option selected disabled>Pilih Instansi</option>
                                    <option value="inst">Instansi</option>
                                    <option value="bsps">BSPS</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <!-- <button class="btn btn-success">Cari Instansi</button> -->
                            </div> 
                        </div>
                        <div class="mb-3 row">
                            <label for="no_va" class="col-sm-2 col-form-label">Nomor Virtual Account</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="no_va" name="no_va">
                            </div>
                            <div class="col-sm-2">
                                <input type="submit" class="btn btn-primary" value="Cari" name="va">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="col-sm-2">
                                <input type="submit" class="btn btn-primary" value="Cari" name="inNama">
                            </div>
                        </div>
                        <!-- <div class="text-center">
                            <button type="submit" class='btn btn-primary btn-lg'>Cari</button>

                        </div> -->
                    </form>
                    <form action="<?= base_url()?>/Admin/cariInstByName" method="post">
                    </form>
                </div>
            </div>
        </div>
        <?php if (!empty(session()->getFlashdata('succCariVa'))){?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata('succCariVa'); ?>
            </div>
        <?php }else if(!empty(session()->getFlashdata('errCariVa'))) {?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata('errCariVa'); ?>
            </div>
        <?php } ?>
        <div class="col-md-12 mt-5">
            <?php if(!empty($sql)): ?>
            <table class="table table-bordered table-hover" id="myTable">
                <?php if($opsi == 'inst'){ ?>
                <thead >
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">No Arsip</th>
                            <th scope="col">No Virtual Account</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Jumlah Transaksi</th>
                            <th scope="col">Saldo</th>
                            <th scope="col">Kode User</th>
                            <th scope="col">Jenis Transaksi</th>
                            <th scope="col">Time Stamp</th>
                        </tr>
                </thead>
                <tbody>
                    <?php foreach($sql as $key) : ?>
                    <tr>
                        <td><?= $key['id']?></td>
                        <td><?= $key['tgl'] ?></td>
                        <td><?= $key['no_arsip'] ?></td>
                        <td><?= $key['no_va'] ?></td>
                        <td><?= $key['keterangan'] ?></td>
                        <td><?= $key['jml_tx'] ?></td>
                        <td><?= $key['saldo'] ?></td>
                        <td><?= $key['kd_user'] ?></td>
                        <td><?= $key['jns_tx'] ?></td>
                        <td><?= $key['time_stamp'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

                <?php }else if($opsi == 'bsps'){ ?>
                <thead >
                    <tr>
                        <th scope="col">Kode Instansi</th>
                        <th scope="col">No Virtual Account</th>
                        <th scope="col">Nama </th>
                        <th scope="col">Saldo</th>
                        <th scope="col">Rekening Bsps</th>
                        <th scope="col">Time Stamp</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($sql as $key) : ?>
                    <tr>
                        <td><?= $key['kd_instansi']?></td>
                        <td><?= $key['no_va'] ?></td>
                        <td><?= $key['nama'] ?></td>
                        <td><?= $key['saldo'] ?></td>
                        <td><?= $key['rek_bsps'] ?></td>
                        <td><?= $key['time_stamp'] ?></td>
                        
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <?php } ?>
               
            </table>
            <?php endif; ?>
        </div>
    </div>
</div>
<script>
        $(document).ready( function () {
        $('#myTable').DataTable();
        } );
    </script>
<?= $this->endSection() ?>
