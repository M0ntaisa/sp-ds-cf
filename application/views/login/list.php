<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/form/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/form/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/form/css/mystyle.css">
</head>
<body>

    <div class="main">

        <?= $this->session->flashdata('pesan'); ?>

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title"><?= $title; ?></h2>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" value="<?= set_value('email') ?>" placeholder="Email"/>
                            <small style="color:red;"><i><?= form_error('email') ?></i></small>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                            <small style="color:red;"><i><?= form_error('password') ?></i></small>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit btn-hover" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Belum punya akun ? <a href="<?= base_url('auth/register') ?>" class="loginhere-link">Registrasi disini</a>
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