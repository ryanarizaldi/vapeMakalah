<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="contentTitle">
        <h3>Upload Berkas Xls</h3>
    </div>
    <div class="row mt-4">
        <div class="col-md-4"></div>
        <div class="col-md-6">
            <form action="<?= '/Admin/uploadTheXls' ?>" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                    <!-- <label for="file" class="col-sm-3 control-label">File Excel</label> -->
                    <div class="col">
                        <input type="file" id="file" name="fileXls" class="form-control" autofocus="">
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
        <!-- <div class="col-md-4  "></div> -->
    </div>
</div>
<?= $this->endSection() ?>
