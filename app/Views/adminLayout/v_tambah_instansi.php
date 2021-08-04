<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="contentTitle">
        <h3>Cari Instansi</h3>
    </div>
    <div class="row">
        <div class="centerBox">
            <form class="row g-3" action="<?= '/Admin/cariRekening' ?>" method="post">
                <div class="col-auto">
                    <label for="norek" class="visually-hidden">Nomor Rekening</label>
                    <input type="text" class="form-control" id="norek" placeholder="Nomor Rekening" name="norek">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Cari</button>
                </div>
            </form> 
        </div>
    </div>
    <div class="row">
        <div class="centerBox">
            <?php if(!empty(session()->getFlashdata('succCari'))){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h4>Suksess</h4>
                    </hr />
                    <?php echo session()->getFlashdata('succCari'); ?>
                </div>
            <?php }else if(!empty(session()->getFlashdata('errCari'))){ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4>Error!</h4>
                    </hr />
                    <?php echo session()->getFlashdata('errCari'); ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php if(!empty($show)):?>
         <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <div class="centerBox">
                        <h3>Tambah Instansi</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= '/Admin/aksi_tambah_inst' ?>" method="post">
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Instansi</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="norek" class="col-sm-2 col-form-label">Nomor Rekening</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="norek" name="norek" value="<?= $norek ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3 add-after">
                            <div class="col-md-2">
                                <label for="[]" class="col-form-label">Nama Field</label>
                            </div>
                            <div class="col-md-8 ">
                                <input type="text" class="form-control" id="norek" name="field[]" >
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-success btn-sm add-more" type="button" data-bs-toggle="popover" title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?">+</button>
                            </div>
                        </div>
                        <div class="copy hide">
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="field[]" class="col-form-label">Nama Field</label>
                                </div>
                                <div class="col-md-8 ">
                                    <input type="text" class="form-control" id="norek" name="field[]">
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-danger btn-sm remove" type='button'>x</button>
                                </div>
                            </div>
                        </div>
                        <p><em>Field berupa Nomor Identitas, Nama, dan Nominal Tidak Perlu Ditambahkan</em></p>
                        <div class="d-flex justify-content-end mt-5">
                            <button type="submit" class="btn btn-primary">Tambah Instansi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endif;?>
</div>

<script type="text/javascript">
let num = 0;
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          if (num<3) {
              num++;
              $(".add-after").after(html);
          } else {
              console.log("max");
          }
          console.log(num);
      });
      // saat tombol remove dklik control group akan dihapus 
      $("body").on("click",".remove",function(){ 
          num--;
          console.log(num);
          $(this).closest(".row").remove();
      });
    });
    console.log(num);
    var popoverTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="popover"]')
    );
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl);
    });
    var popover = new bootstrap.Popover(document.querySelector('.example-popover'), {
  container: 'body'
})
</script>


<?= $this->endSection() ?>
