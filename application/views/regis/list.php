<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/form/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/form/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/form/css/mystyle.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form action="<?= base_url('auth/register') ?>" method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title"><?= $title; ?></h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="nama" id="nama" value="<?= set_value('nama') ?>" placeholder="Nama Lengkap"/>
                            <small style="color:red;"><i><?= form_error('nama') ?></i></small>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" value="<?= set_value('email') ?>" placeholder="Email"/>
                            <small style="color:red;"><i><?= form_error('email') ?></i></small>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                            <small style="color:red;"><i><?= form_error('password') ?></i></small>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Ulangi Password"/>
                            <small style="color:red;"><i><?= form_error('re_password') ?></i></small>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit btn-hover" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Sudah punya akun ? <a href="<?= base_url('auth/login') ?>" class="loginhere-link">Login disini</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="<?= base_url() ?>assets/templates/form/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/form/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>