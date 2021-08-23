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
                <h1>Nota Transaksi Pembayaran Virtual Account</h1>
            </div>
        </div>

        <!-- // disini kontennya -->
        <!-- <div class="mt-5">
            <div class="row">
                <div class="col-md-2">
                    <span class="bold-me">No Virtual Account </span>
                </div>
                <div class="col-md-5">
                    <?= ": ".$va ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <span class="bold-me">Nominal </span>
                </div>
                <div class="col-md-3">
                    <?= ": ".$nominalRP ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <span class="bold-me">Rekening Instansi/Nasabah </span>
                </div>
                <div class="col-md-3">
                    <?= ": ".$rek_kr ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <span class="bold-me">No Arsip </span>
                </div>
                <div class="col-md-3">
                    <?= ": ".$no_arsip ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <span class="bold-me">Id Teller </span>
                </div>
                <div class="col-md-3">
                    <?= ": ".$kd_user ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <span class="bold-me">Waktu Transaksi</span>
                </div>
                <div class="col-md-3">
                    <?= ": ".$timeStamp ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <span class="bold-me">Metode </span>
                </div>
                <div class="col-md-3">
                    <?= ": ".$metode ?>
                </div>
            </div>
        </div> -->
        <div class="mt-5 ml-5 col-md-12">
            <table width="100%" style="padding-left: 2px; padding-right: 13px;">
                <tbody>
                    <tr>
                        <td width="25%" valign="top">Nomor VA</td>
                        <td width="2%">:</td>
                        <td><?= $va ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top">Nominal</td>
                        <td width="2%">:</td>
                        <td><?= $nominalRP ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top">No Rekening <?php if($metode == "Tunai"){echo "Instansi";}else{echo "Nasabah";} ?></td>
                        <td width="2%">:</td>
                        <td><?= $rek_kr ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top">No Arsip </td>
                        <td width="2%">:</td>
                        <td><?= $no_arsip ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top">Id Teller </td>
                        <td width="2%">:</td>
                        <td><?= $kd_user ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top">Waktu Pembayaran </td>
                        <td width="2%">:</td>
                        <td><?= $timeStamp ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top">Metode </td>
                        <td width="2%">:</td>
                        <td><?= $metode ?></td>
                    </tr>
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