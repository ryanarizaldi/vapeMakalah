<?= $this->extend('template') ?>
<?= $this->section('content') ?>

    <div class="contentTitle">
        <h3>Laporan Nominatif <?php if(isset($jenis) && $jenis == 'inst' ){echo "Instansi";}else if(isset($jenis) && $jenis == 'bsps' ){echo "BSPS";} ?></h3>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="<?= base_url() ?>/admin/pilihLaporan"method="post">
                    <select class="custom-select custom-select-lg mb-3" name="laporan">
                        <option selected disabled>Pilih Jenis Laporan</option>
                        <option value="inst">Laporan Instansi</option>
                        <option value="bsps">Laporan BSPS</option>
                    </select> 
                    <button type="submit" class="btn btn-sm btn-primary">Pilih</button> 
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty(session()->getFlashdata('succAddInst'))): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h4>Suksess</h4>
                    </hr />
                    <?php echo session()->getFlashdata('succAddInst'); ?>
                </div>
                <?php endif; ?>
                <?php if(isset($jenis)){ ?>
                <?php if(!empty($jenis == 'inst')){ ?>
                    <table class="table table-bordered table-hover" id="myTable">
                        <thead >
                            <tr>
                                <th scope="col">Kode Instansi</th>
                                <th scope="col">Nama Instansi</th>
                                <th scope="col">No Rekening</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($res as $key) : ?>
                                <tr>
                                    <td><?= $key['kd_instansi']?></td>
                                    <td><?= $key['nama'] ?></td>
                                    <td><?= $key['norek'] ?></td>
                                    <td><?php if($key['status'] == 0){
                                        echo "Aktif";
                                    }else{
                                        echo "Tidak Aktif";
                                    } ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php }else if(!empty($jenis == 'bsps')){ ?>
                    <table class="table table-bordered table-hover" id="myTable">
                        <thead >
                            <tr>
                                <th scope="col">Kode Instansi</th>
                                <th scope="col">Nama Instansi</th>
                                <th scope="col">Nomor VA</th>
                                <th scope="col">Saldo</th>
                                <th scope="col">Rekening BSPS</th>
                                <th scope="col">Rekening Penampung</th>
                                <th scope="col">Rekening Toko</th>
                                <th scope="col">Rekening Tukang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($res as $key) : ?>
                                <tr>
                                    <td><?= $key['kd_instansi']?></td>
                                    <td><?= $key['nama'] ?></td>
                                    <td><?= $key['no_va'] ?></td>
                                    <td><?= $key['saldo'] ?></td>
                                    <td><?= $key['rek_bsps'] ?></td>
                                    <td><?= $key['rek_penampung'] ?></td>
                                    <td><?= $key['rek_toko'] ?></td>
                                    <td><?= $key['rek_tukang'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php } ?>
                    <div class="row mt-3">
                        <div class="d-flex justify-content-end">
                            <a href="<?= base_url() ?>/Admin/exportPdf" class="btn btn-primary">PDF</a>
                            
                            <a href="" class="btn btn-success">XLS</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <script>
         $(document).ready( function () {
                $('#myTable').DataTable();
        } );
    </script>

<?= $this->endSection() ?>
