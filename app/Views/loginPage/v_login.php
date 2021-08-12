<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/assets/css/bootstrap.css')?>">
    <title>Vape: Virtual Account Payment</title>
    <style>
        form {
            margin-top: 150px;
        }

        input {
            margin-bottom: 10px;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .title-login{
            display: flex;
            align-items: center;
            justify-content: center;

        }

        .text-muted{
            margin-top: 200px !important;
        }

        
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <main class="form-signin">
                    
                    <form action="<?= base_url()?>/Login/actionLogin" method="post">    
                        <div class="title-login">
                            <img  src="<?= base_url() ?> /assets/img/bp.png" alt="" width="240" height="120">
                            <!-- <h1 class="h3 mb-3 fw-normal">Silahkan Login</h1> -->

                        </div>
                        <?php 
                            $asd = session()->getFlashdata('error');
                            // dd($asd);
                        ?>
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="masukkan username" name="username">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                            <label for="floatingPassword">Password</label>
                        </div>

                        
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                        <div class="title-login">

                            <p class="mt-5 mb-3 text-muted">VAPE: Virtual Account Payment</p>
                        </div>
                    </form>
                </main>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    

    <script src="<?= base_url()?>/assets/js/bootstrap.js"></script>
    <script src="<?= base_url()?>/assets/js/button.js"></script>
    
</html>