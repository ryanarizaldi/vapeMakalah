<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Pembayaran</h1>
                </div>
                <div class="card-body">
                    <form action="<?= base_url()?>/Admin/cekVa" class="mt-3" method="post">
                        <div class="mb-3 row">
                            <label for="kd_va" class="col-sm-2 col-form-label">Nomor Virtual Account</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kd_va" name="kd_va">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary" >Cari</button>
                            </div>
                        </div>
                    </form>
                    <?php if (!empty(session()->getFlashdata('sucInqueryVA'))){?>
                        <div class="alert alert-success alert-dismissible fade show mt-5 " role="alert">
                            <h4>Data Ditemukan</h4>
                            <hr>
                            <?= session()->getFlashdata('sucInqueryVA') ?>
                        </div>
                        <div class="row mb-5 mt-5">
                        <div class="col-md-5"></div>
                        <div class="col-md-3">
                            <div class="radioSelect text-center">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="tunai" value="tunai" checked>
                                        <label class="form-check-label" for="tunai">
                                            Tunai
                                        </label>
                                    </div>
                                    <div>
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="pindah_buku" >
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Pindah Buku
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <div class="formTunai">
                        <form action="<?= base_url()?>/Admin/transaksiTunai" method="post">
                        <!-- < -->
                            <div class="d-flex justify-content-end mt-5">
                                <button class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                     <?php } else if(!empty(session()->getFlashdata('errInqueryVA'))) { ?>
                        <div class="alert alert-danger alert-dismissible fade show mt-5 " role="alert">
                            <h4>Data Tidak Ditemukan</h4>
                            <hr>
                            <?= session()->getFlashdata('errInqueryVA') ;?>
                        </div>
                        
                    <?php } ?>
                    <!-- form after sumbit va -->
                    
                    <div class="pindahBuku">
                        <form action="<?= base_url()?>/Admin/cariRekeningPembayaran" class="mt-5" method="post">
                            <!--  -->
                            <div class="mb-5 row">
                                <label for="kd_va" class="col-sm-2 col-form-label">Rekening</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="norek" name="norek">
                                </div>
                                <div class="col-sm-5">
                                    <button class="btn btn-primary">Cek Rekening</button>
                                </div>
                            </div>
                            <?php if (!empty(session()->getFlashdata('sucCekRek'))){ ?>
                                <div class="alert alert-success alert-dismissible fade show mt-5 " role="alert">
                                    <h4>Data Ditemukan</h4>
                                    <hr>
                                    <?= session()->getFlashdata('sucCekRek'); ?>
                                </div>
                                 <form action="<?= base_url()?>/Admin/transaksiPindahBuku" method="post">
                                    <div class="no-show" style="display: none">
                                        <input type="text" value="<?= $kd_va ?>" name="kd_va">
                                        <input type="text" value="<?= $nominal ?>" name="nominal">
                                        <input type="text" value="<?= $norek_instansi ?>" name="rek_instansi">
                                    </div>
                                    <div class="d-flex justify-content-end mt-5">
                                        <button class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            <?php } else if (empty($success)){ ?>
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Rekening Tidak Ditemukan!',
                                        })
                                </script>
                            <?php }  ?>
                           
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $(".pindahBuku").hide()
    $(".formTunai").show()

    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        if (inputValue == 'tunai') {
            $(".pindahBuku").hide()
            $(".formTunai").show()
        } else {
            $(".pindahBuku").show()
            $(".formTunai").hide()

        }
    });
});
</script>

<?= $this->endSection() ?>
