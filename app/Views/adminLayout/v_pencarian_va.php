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
                        
                        <!-- <div class="mb-3 row">
                            <label for="kd_instansi" class="col-sm-2 col-form-label">Kode Instansi</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="kd_instansi" name="kd_instansi">
                            </div>
                            <div class="col-sm-6">
                                <p><i>* masukkan kode instansi terlebih dahulu</i></p>
                            </div>
                        </div> -->
                        <div class="mb-3 row">
                            <label for="kd_va" class="col-sm-2 col-form-label">Nomor Virtual Account</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kd_va" name="kd_va">
                            </div>
                            <div class="col-sm-2">
                                <input type="submit" class="btn btn-primary" value="Cari" name="byVa">
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
        <div class="container">
            <?php if (!empty(session()->getFlashdata('succCariVa'))){?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata('succCariVa'); ?>
            </div>
        <?php }else if(!empty(session()->getFlashdata('errCariVa'))) {?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata('errCariVa'); ?>
            </div>
        <?php } ?>
        </div>
        <div class="col-md-12">
            <?php if (!empty($sql)): ?>
                <table class="table table-bordered table-hover" id="myTable">
                    <thead>
                        <tr>
                            <td>Kode Instansi</td>
                            <td>No Identitas</td>
                            <td>Nama</td>
                            <td>Nominal</td>
                            <td>No Virtual Account</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sql as $key ): ?>
                            <tr>
                                <td><?= $key['kd_instansi'] ?></td>
                                <td><?= $key['no_identitas'] ?></td>
                                <td><?= $key['nama'] ?></td>
                                <td><?= $key['nominal'] ?></td>
                                <td><?= $key['kd_va'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
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
