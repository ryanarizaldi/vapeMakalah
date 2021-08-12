<?= $this->extend('template') ?>
<?= $this->section('content') ?>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Laporan Nominatif Virtual Account</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="<?= base_url() ?>/admin/cariVaByKdInst"method="post">
                                <div class="mb-3 mt-3 row">
                                    <label for="kd_instansi" class="col-sm-2 col-form-label">Kode Instansi</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="kd_instansi" name="kd_instansi" placeholder="Masukkan Kode Instansi">
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-success" >
                                            Submit
                                        </button>
                                    </div>
                                </div> 
                            </form>
                        </div>
                        <?php if (!empty(session()->getFlashData('sucCariVa'))) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('sucCariVa'); ?>
                            </div>
                        <?php }else if (!empty(session()->getFlashData('errCariVaa'))) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('errCariVaa'); ?>
                            </div>
                        <?php }?>
                        <div class="row mt-5">
                            <?php if (!empty($res)): ?>
                                <table class="table table-bordered table-hover" id="myTable">
                                    <?php if(!empty($bsps)){?>
                                        <thead>
                                            <tr>
                                                <td>Kode Instansi</td>
                                                <td>Nomor Virtual Account</td>
                                                <td>Nama</td>
                                                <td>Saldo</td>
                                                <td>Rekening BSPS</td>
                                                <td>Rekening Penampung</td>
                                                <td>Rekening Toko</td>
                                                <td>Rekening Tukang</td>
                                                <td>Timestamp</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($res as $key): ?>
                                                <tr>
                                                    <td><?= $key['kd_instansi'] ?></td>
                                                    <td><?= $key['no_va'] ?></td>
                                                    <td><?= $key['nama'] ?></td>
                                                    <td><?= $key['saldo'] ?></td>
                                                    <td><?= $key['rek_bsps'] ?></td>
                                                    <td><?= $key['rek_penampung'] ?></td>
                                                    <td><?= $key['rek_toko'] ?></td>
                                                    <td><?= $key['rek_tukang'] ?></td>
                                                    <td><?= $key['time_stamp'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    <?php } else {?>
                                        <thead>
                                            <tr>
                                                <td>Kode Instansi</td>
                                                <td>No Identitas</td>
                                                <td>Nama</td>
                                                <td>Kode VA</td>
                                                <td>Nominal</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($res as $key): ?>
                                                <tr>
                                                    <td><?= $key['kd_instansi'] ?></td>
                                                    <td><?= $key['no_identitas'] ?></td>
                                                    <td><?= $key['nama'] ?></td>
                                                    <td><?= $key['kd_va'] ?></td>
                                                    <td><?= $key['nominal'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    <?php } ?>
                                </table>
                                <div class="col-md-3">
                                    <a href="<?=base_url("Admin/exportVaToXls/$kd_inst")?>" class="btn btn-success">Export to Excel</a>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
            </div>
        </div>
    </div>

    <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cari Kode Instansi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url()?>/Admin/cariVaByKdInst" method="post">
                        <div class="mb-3 row">
                            <label for="kd_instansi" class="col-sm-2 col-form-label">Kode Instansi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kd_instansi" name="kd_instansi" placeholder="Masukkan Kode Instansi">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">
                                    Cari
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>
    <script>
         $(document).ready( function () {
                $('#myTable').DataTable();
        } );

        // var myModal = document.getElementById('myModal')
        // var myInput = document.getElementById('myInput')

        // myModal.addEventListener('shown.bs.modal', function () {
        // myInput.focus()
        // })
    </script>

<?= $this->endSection() ?>
