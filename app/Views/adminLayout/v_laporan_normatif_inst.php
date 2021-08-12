<?= $this->extend('template') ?>
<?= $this->section('content') ?>

    <div class="contentTitle">
        <h3>Laporan Nominatif Instansi</h3>
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
            </div>
        </div>
        <div class="row mt-3">
            <div class="d-flex justify-content-end">
                <!-- <a href="<?= base_url() ?>/Admin/exportPdf" class="btn btn-primary">PDF</a> -->
                
                <a href="<?= base_url() ?>/Admin/exportLapToXls" class="btn btn-success">XLS</a>
            </div>
        </div>
    </div>

    <script>
         $(document).ready( function () {
                $('#myTable').DataTable();
        } );
    </script>

<?= $this->endSection() ?>
