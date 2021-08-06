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
                        <th scope="col">Id</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nomor Arsip</th>
                        <!-- <th scope="col">Nomor VA</th> -->
                        <th scope="col">Keterangan</th>
                        <th scope="col">Jumlah Transaksi</th>
                        <th scope="col">Saldo</th>
                        <th scope="col">Kode User</th>
                        <th scope="col">Jenis Transaksi</th>
                        <th scope="col">Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sql as $key) :?>
                    <tr>
                        <td><?= $key->id ?></td>
                        <td><?= $key->tgl ?></td>
                        <td><?= $key->no_arsip ?></td>
                        <td><?= $key->keterangan ?></td>
                        <td><?= $key->jml_tx ?></td>
                        <td><?= $key->saldo ?></td>
                        <td><?= $key->kd_user ?></td>
                        <td><?= $key->jns_tx ?></td>
                        <td><?= $key->time_stamp ?></td>
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