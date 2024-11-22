<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
        body {
            background-color: rgba(11, 58, 150, 0.1);
        }

        .profile-header {
            position: relative;
            background: linear-gradient(to right, #4b79a1, #283e51);
            color: white;
            padding: 2rem;
            border-radius: 10px;
        }

        .profile-header img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid white;
            margin-top: -75px;
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
        <!-- Profile Header -->
        <div class="profile-header text-center mb-4">
            <img src="<?= base_url() . 'Uploads\\' . @$user['photo'] ?>" alt="Profile Photo">
            <h2 class="mt-3"><?= esc(@$user['username']) ?></h2>
            <p class="mb-1">Backend Developer</p>
            <p class="text-light">Reference No:- <?= esc(@$user['ref_no']) ?></p>
            <p class="text-light"><?= esc(@$user['email']) ?></p>
            <a href="<?= base_url('dashboard/password') ?>" class="btn btn-custom btn-sm">Change Password</a>
            <a href="<?= base_url('login/logout') ?>" class="btn btn-custom btn-sm">Logout</a>
        </div>
        <div class="row d-flex justify-content-center">
            <!-- Profile Details -->
            <div class="col-md-8">
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
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Profile Details
                    </div>

                    <div class="card-body">
                        <form action="<?= base_url('dashboard/update') ?>" method="post" enctype="multipart/form-data">
                            <input type="text" id="username" name="ref_no" value="<?= esc(@$user['ref_no']) ?>" hidden>
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="username" id="username" value="<?= esc(@$user['username']) ?>">
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?= esc(@$user['email']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="password">Profile Photo</label>
                                <div class="password-container">
                                    <input class="form-control" type="file" name="photo" id="profile_photo">
                                </div>
                            </div>
                            <!-- Submit Button -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>





<!-- <!DOCTYPE html>
<html lang=" en">

                                                        <head>
                                                            <meta charset="UTF-8">
                                                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                                            <title>Update Profile</title>
                                                            <style>
                                                                .form-container {
                                                                    width: 400px;
                                                                    margin: auto;
                                                                    padding: 20px;
                                                                    border: 1px solid #ccc;
                                                                    border-radius: 8px;
                                                                    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                                                                }

                                                                .form-container h2 {
                                                                    text-align: center;
                                                                    margin-bottom: 20px;
                                                                }

                                                                .form-group {
                                                                    margin-bottom: 15px;
                                                                }

                                                                .form-group label {
                                                                    display: block;
                                                                    margin-bottom: 5px;
                                                                }

                                                                .form-group input {
                                                                    width: 100%;
                                                                    padding: 8px;
                                                                    box-sizing: border-box;
                                                                }

                                                                .form-group img {
                                                                    display: block;
                                                                    max-width: 100%;
                                                                    height: auto;
                                                                    margin-top: 10px;
                                                                }

                                                                .btn {
                                                                    width: 100%;
                                                                    padding: 10px;
                                                                    background-color: #007BFF;
                                                                    color: white;
                                                                    border: none;
                                                                    border-radius: 4px;
                                                                    cursor: pointer;
                                                                }

                                                                .btn:hover {
                                                                    background-color: #0056b3;
                                                                }
                                                            </style>
                                                        </head>

                                                        <body>
                                                            <div class="form-container">
                                                                <h2>Update Profile</h2>
                                                                <?php if (isset($validation)): ?>
                                                                    <div style="color: red; margin-bottom: 10px;">
                                                                        <?= $validation->listErrors() ?>
                                                                    </div>
                                                                <?php endif; ?>

                                                                <form action="<?= base_url('dashboard/update') ?>" method="post" enctype="multipart/form-data">
                                                                    <input type="text" id="username" name="ref_no" value="<?= esc(@$user['ref_no']) ?>" hidden>
                                                                    <div class="form-group">
                                                                        <label for="username">Username</label>
                                                                        <input type="text" id="username" name="username" value="<?= esc(@$user['username']) ?>" required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="email">Email</label>
                                                                        <input type="email" id="email" name="email" value="<?= esc(@$user['email']) ?>" required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="photo">Photo</label>
                                                                        <input type="file" id="photo" name="photo" accept="image/*" onchange="previewImage(event)">
                                                                        <?php if (!empty($user['photo'])): ?>
                                                                            <img id="photo-preview" src="<?= ROOTPATH . 'assets\Uploads\\' . esc(@$user['photo']) ?>" alt="Photo Preview">
                                                                        <?php else: ?>
                                                                            <img id="photo-preview" style="display: none;" alt="Photo Preview">
                                                                        <?php endif; ?>
                                                                    </div>

                                                                    <button type="submit" class="btn">Update Profile</button>
                                                                </form>
                                                            </div>

                                                            <script>
                                                                function previewImage(event) {
                                                                    const input = event.target;
                                                                    const preview = document.getElementById('photo-preview');
                                                                    const file = input.files[0];

                                                                    if (file) {
                                                                        const reader = new FileReader();
                                                                        reader.onload = function(e) {
                                                                            preview.src = e.target.result;
                                                                            preview.style.display = 'block';
                                                                        };
                                                                        reader.readAsDataURL(file);
                                                                    } else {
                                                                        preview.src = '';
                                                                        preview.style.display = 'none';
                                                                    }
                                                                }
                                                            </script>
                                                        </body>

</html> -->