<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vape: Virtual Account Payment</title>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/bootstrap.css">
    <script src="<?= base_url() ?>/assets/js/jquery.js"></script>


</head>
<body>
    <!-- <div class="container"> -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url() ?>/home"><h4>VAPE: Virtual Account Payment</h4></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown blackme">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
                                <strong class="blackme">Entri </strong>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?= base_url() ?>/admin/tambah_instansi">Instansi</a></li>
                                <li><a class="dropdown-item" href="#">Virtual Account</a></li>
                                <li><a class="dropdown-item" href="<?= base_url() ?>/admin/upload">Test Upload</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown blackme">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
                                <strong  class="blackme">Informasi </strong>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?= base_url() ?>/admin/cari_instansi">Pencarian Instansi</a></li>
                                <li><a class="dropdown-item" href="<?= base_url() ?>/admin/cari_va">Pencarian Virtual Account</a></li>
                            </ul>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
                                <strong class="blackme">Laporan </strong>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?= base_url() ?>/admin/laporan_normatif">Laporan Nominatif</a></li>
                                <li><a class="dropdown-item" href="<?= base_url() ?>/admin/history_va">History VA</a></li>
                            </ul>
                        </li>
                    </ul>
                   
                </div>
                <div class="d-flex">
                    <a href="<?= base_url('Login/logout') ?>" class="logoutButt">Logout</a>
                </div>
            </div>
        </nav>
  
        <?= $this->renderSection('content') ?>
    
    <script src="<?= base_url() ?>/assets/js/myJquery.js"></script>
    <script src="<?= base_url() ?>/assets/js/datatables.js"></script>
    <script src="<?= base_url() ?>/assets/js/bootstrap.bundle.js"></script>
</body>
</html>