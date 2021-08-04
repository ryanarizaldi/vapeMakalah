<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vape: Virtual Account Payment</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
    <!-- <link rel="stylesheet" type="text/css" href="/assets/css/datatables.min.css"> -->
    <script src="/assets/js/jquery.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->


</head>
<body>
    <!-- <div class="container"> -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/home"><h4>VAPE: Virtual Account Payment</h4></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
                                <strong>Entri </strong>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="/admin/tambah_instansi">Instansi</a></li>
                                <li><a class="dropdown-item" href="#">Virtual Account</a></li>
                                <li><a class="dropdown-item" href="/admin/upload">Test Upload</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
                                <strong>Informasi </strong>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="/admin/cari_instansi">Pencarian Instansi</a></li>
                              
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
                                <strong>Laporan </strong>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="/admin/laporan_normatif">Laporan Nominatif Instansi</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- <ul class="navbar-right">
                        <li><a href="#">Keluar</a></li>
                    </ul> -->
                   
                </div>
                <div class="d-flex">
                    <a href="" class="logoutButt">Logout</a>
                </div>
            </div>
        </nav>
  
        <?= $this->renderSection('content') ?>
    
    <script src="/assets/js/myJquery.js"></script>
    <script src="/assets/js/datatables.js"></script>
    <script src="/assets/js/bootstrap.bundle.js"></script>
    <!-- <script src="/assets/js/alert.js"></script>
    <script src="/assets/js/button.js"></script>
    <script src="/assets/js/carousel.js"></script>
    <script src="/assets/js/collapse.js"></script>
    <script src="/assets/js/dropdown.js"></script>
    <script src="/assets/js/modal.js"></script>
    <script src="/assets/js/bootstrap.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
</body>
</html>