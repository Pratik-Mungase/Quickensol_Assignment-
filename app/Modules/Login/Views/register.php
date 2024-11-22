<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
        <div class="register">
            <form action="<?= base_url('login/processRegister') ?>" method="post" id="login_form_r" enctype="multipart/form-data">
                <div class="row">
                    <?php if (session()->getFlashdata('error_register')) {  ?>
                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <ion-icon name="alert-circle-outline"></ion-icon>
                            <p class="error"><?= session()->getFlashdata('error_register') ?></p>
                        </div>
                    <?php } ?>
                    <?php if (session()->getFlashdata('Success_register')) {  ?>
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <ion-icon name="alert-circle-outline"></ion-icon>
                            <p class="error text-success"><?= session()->getFlashdata('Success_register') ?></p>
                        </div>
                    <?php } ?>
                    <div class="col-md-12 mt-2">
                        <label for="register_username">Username</label>
                        <input class="form-control" type="text" name="username" id="register_username">
                        <p class="error d-none" id="register_username_err">Username is required</p>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="register_email">Email</label>
                        <input class="form-control" type="text" name="email" id="register_email">
                        <p class="error d-none" id="register_email_error">Enter Valid Email Address</p>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="password">Password</label>
                        <div class="password-container">
                            <input class="form-control" type="password" name="password" id="register_password">
                            <i class="fa-solid fa-eye toggle-password" id="togglePasswordReg"></i>
                        </div>
                        <p class="error d-none" id="reg_password_error">Enter Valid Password</p>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="password">Confirm Password</label>
                        <div class="password-container">
                            <input class="form-control" type="password" name="confirm_password" id="register_con_password">
                            <i class="fa-solid fa-eye toggle-password" id="toggleConfirmPasswordReg"></i>
                        </div>
                        <p class="error d-none" id="con_password_error">Enter Valid Password</p>
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="password">Profile Photo</label>
                        <div class="password-container">
                            <input class="form-control" type="file" name="photo" id="profile_photo">
                        </div>
                    </div>

                    <div class="col-md-12 text-end mt-3">
                        <button class="btn btn-primary reg-btn" id="register_btn">Register</button>
                    </div>
                    <div class="col-md-12 text-center pt-3">
                        <a href="<?= base_url() ?>" class="text-decoration-none">
                            <p class="text-primary">Already have an account? Login</p>
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

<!-- 
(?=.*[a-z]): Ensures at least one lowercase letter.
(?=.*[A-Z]): Ensures at least one uppercase letter.
(?=.*\d): Ensures at least one digit (0–9).
(?=.*[@$!%*?&]): Ensures at least one special character (@$!%*?&).
[A-Za-z\d@$!%*?&]{6,}: Matches any combination of letters, digits, or special characters, with a minimum length of 6 characters. 
-->