<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- stylesheet -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/style.css">

    <!-- Bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/7731116391.js" crossorigin="anonymous"></script>

    <!-- Jquery CDN's -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</head>

<body>
    <div class="container-fluid">
        <div class="login">
            <form method="post" action="<?= base_url('login/process') ?>" id="login_form">
                <div class="row">
                    <?php if (session()->getFlashdata('error_login')) { ?>
                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <ion-icon name="alert-circle-outline"></ion-icon>
                            <p class="error"><?= session()->getFlashdata('error_login') ?></p>
                        </div>
                    <?php } ?>
                    <?php if (session()->getFlashdata('Success_register')) {  ?>
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <ion-icon name="alert-circle-outline"></ion-icon>
                            <p class="error text-success"><?= session()->getFlashdata('Success_register') ?></p>
                        </div>
                    <?php } ?>
                    <div class="col-md-12 mt-2">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username_email" id="username">
                        <p class="error d-none" id="username_error">Enter Valid Email Address</p>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="password">Password</label>
                        <div class="password-container">
                            <input class="form-control" type="password" name="password" id="password">
                            <i class="fa-solid fa-eye toggle-password" id="togglePasswordLogin"></i>
                        </div>
                        <p class="error d-none" id="password_error">Enter Valid Password</p>
                    </div>
                    <div class="col-md-12 text-end mt-3">
                        <button class="btn btn-primary login-btn" id="login_btn">Login</button>
                    </div>
                    <div class="col-md-12 text-center pt-3">
                        <a href="<?= base_url('login/register') ?>" class="text-decoration-none">
                            <p class="text-primary">Register New User</p>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap links -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- Script File -->
    <script src="<?= base_url() ?>/js/script.js"></script>

</body>

</html>