<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print History</title>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/bootstrap.css">
    <script src="<?= base_url() ?>/assets/js/jquery.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="<?= base_url()?>/assets/img/bp.png" alt="" class="rounded" width="240" height="120">
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
        </div>
        <div class="row mt-3">
            <div class="text-center">
                <h1>Rekening Koran Virtual Account</h1>
            </div>
        </div>
        <div class="row mt-5">
            <h6>Nama:       <?php echo $name[0]->nama;?></h6>
            <h6>Nomor VA:   <?= $no_va ?></h6>
            <table class="table table-bordered table-hover" id="myTable">
                <thead >
                    <tr>
                        <th scope="col">No Arsip</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">No Virtual Account</th>
                        <th scope="col">Jumlah Transaksi</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sql as $key) :?>
                    <tr>
                        <td><?= $key->no_arsip ?></td>
                        <td><?= $key->tgl ?></td>
                        <td><?= $key->kd_va ?></td>
                        <td><?= $key->jml_tx ?></td>
                        <td><?= $key->keterangan ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        window.print()
    </script>

<script src="<?= base_url() ?>/assets/js/myJquery.js"></script>
<script src="<?= base_url() ?>/assets/js/datatables.js"></script>
<script src="<?= base_url() ?>/assets/js/bootstrap.bundle.js"></script>
</body>
</html>