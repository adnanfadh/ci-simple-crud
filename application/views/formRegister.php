<!DOCTYPE html>
<html>

<head>
    <title>CRUD Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery-3.3.1.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
</head>

<body style="margin: 20px;">
    <div class="container">
        <h1>Register</h1>
        <p>Daftar ke User Akun</p>

        <?php if($this->session->flashdata('message_login_error')): ?>
        <div class="invalid-feedback">
            <?= $this->session->flashdata('message_login_error') ?>
        </div>
        <?php endif ?>

        <form action="" method="post" style="max-width: 600px;">
            <form>
                <div class="form-group">
                    <label >Username</label>
                    <input type="text" name="username" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label >Email</label>
                    <input type="text" name="email" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label >Password</label>
                    <input type="password" name="password" class="form-control"></input>
                </div>
             <div>
                <input type="submit" class="button button-primary" value="Login">
            </div>
        </form>
    </div>

</body>

</html>
