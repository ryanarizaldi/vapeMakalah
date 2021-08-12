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
                    <form action="<?= base_url()?>/Admin/cariInstById" method="post">
                        <div class="mb-3 row">
                            <label for="kd_instansi" class="col-sm-2 col-form-label">Nomor Kode Instansi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kd_instansi" name="kd_instansi">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">
                                    Cari
                                </button>
                            </div>
                        </div>
                    </form>
                    <form action="<?= base_url()?>/Admin/cariInstByName" method="post">
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Instansi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">
                                    Cari
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="row mt-3">
                        <?php if(!empty(session()->getFlashdata('errCariInstansi'))){ ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('errCariInstansi'); ?>
                            </div>
                        <?php }else if(!empty(session()->getFlashdata('succCariInstansi'))){ ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('succCariInstansi'); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-5">
            <?php if(!empty($show)): ?>
            <table class="table table-bordered table-hover" id="myTable">
                <thead >
                    <tr>
                        <th scope="col">Kode Instansi</th>
                        <th scope="col">Nama Instansi</th>
                        <th scope="col">No Rekening</th>
                        <th scope="col">Status</th>
                        <th scope="col">Detail</th>
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
                        <td><a href="<?= base_url('Admin/detailInstansi/'.$key['kd_instansi'])?> " class="btn btn-primary"><span class="glyphicon glyphicon-info-sign"></span> Details</a></td>
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
