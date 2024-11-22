<!-- <form action="<?= base_url('dashboard/changePassword') ?>" method="POST">
    <label for="current_password">Current Password:</label>
    <input type="password" id="current_password" name="current_password" required>

    <label for="new_password">New Password:</label>
    <input type="password" id="new_password" name="new_password" required>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>

    <button type="submit">Change Password</button>
</form> -->






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

    <!-- stylesheet -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/style.css">



    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/7731116391.js" crossorigin="anonymous"></script>
    <!-- Bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 10px;
        }

        .btn-custom {
            background-color: #4b79a1;
            color: white;
        }

        .btn-custom:hover {
            background-color: #3a5f77;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- Change Password Form -->
            <div class="col-md-6">
                <?php if (session()->getFlashdata('error_register')) { ?>
                    <div class="alert alert-warning d-flex align-items-center" style="height: 30px;" role="alert">
                        <ion-icon name="alert-circle-outline"></ion-icon>
                        <p class="mt-3">&nbsp;<?= session()->getFlashdata('error_register') ?></p>
                    </div>
                <?php } ?>
                <?php if (session()->getFlashdata('Success_register')) {  ?>
                    <div class="alert alert-success d-flex align-items-center" style="height: 30px;" role="alert">
                        <ion-icon name="checkmark-circle-outline" class="text-success"></ion-icon>
                        <p class="mt-3 text-success">&nbsp;<?= session()->getFlashdata('Success_register') ?></p>
                    </div>
                <?php } ?>
                <div class="card shadow-sm">
                    <div class="card-header text-white bg-primary">
                        <h5 class="card-title mb-0">Change Password</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('dashboard/changePassword') ?>" method="POST" autocomplete="off">
                            <!-- Current Password -->
                            <div class="mb-3">
                                <label for="password">Current Password<span class="text-danger">*</span> </label>
                                <div class="password-container">
                                    <input class="form-control" type="password" name="current_password" id="current_password" required>
                                    <i class="fa-solid fa-eye toggle-password" id="current_password_eye"></i>
                                </div>
                                <p class="error d-none" id="cur_password_error">Enter Valid Password</p>
                            </div>

                            <!-- New Password -->
                            <div class="mb-3">
                                <label for="password">New Password<span class="text-danger">*</span></label>
                                <div class="password-container">
                                    <input class="form-control" type="password" name="new_password" id="register_password" required>
                                    <i class="fa-solid fa-eye toggle-password" id="togglePasswordReg"></i>
                                </div>
                                <p class="error d-none" id="reg_password_error">Enter Valid Password</p>
                            </div>

                            <!-- Confirm New Password -->
                            <div class="mb-3">
                                <label for="password">Confirm Password<span class="text-danger">*</span></label>
                                <div class="password-container">
                                    <input class="form-control" type="password" name="confirm_password" id="register_con_password" required>
                                    <i class="fa-solid fa-eye toggle-password" id="toggleConfirmPasswordReg"></i>
                                </div>
                                <p class="error d-none" id="con_password_error">Enter Valid Password</p>
                                <p class="error d-none" id="passMatch"> Password not Matched</p>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-custom">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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