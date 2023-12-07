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
        <h1>Login</h1>
        <p>Masuk ke Dashboard</p>

        <?php if($this->session->flashdata('message_login_error')): ?>
        <div class="invalid-feedback">
            <?= $this->session->flashdata('message_login_error') ?>
        </div>
        <?php endif ?>

        <form action="" method="post" style="max-width: 600px;">
            <div class="form-group">
                <label for="name">Email/Username*</label>
                <input type="text" name="username" class="<?= form_error('username') ? 'invalid' : '' ?>"
                    placeholder="Your username or email" value="<?= set_value('username') ?>" required />
                <div class="invalid-feedback">
                    <?= form_error('username') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password*</label>
                <input type="password" name="password" class="<?= form_error('password') ? 'invalid' : '' ?>"
                    placeholder="Enter your password" value="<?= set_value('password') ?>" required />
                <div class="invalid-feedback">
                    <?= form_error('password') ?>
                </div>
            </div>

            <div>
                <input type="submit" class="button button-primary" value="Login">
				<a href="<?php echo base_url(); ?>" 
            </div>
        </form>
    </div>

</body>

</html>
