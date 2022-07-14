<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/style_login.css"> -->
    <link rel="stylesheet" href="<?= base_url('css/style_login.css') ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="login-box">
        <h2>Login</h2>
        <?php if (session()->getFlashdata('success')) { ?>
            <div class="alert alert-success">
                <?php echo session()->getFlashdata('success'); ?>
            </div>
        <?php } ?>

        <?php if (session()->getFlashdata('error')) { ?>
            <div class="alert alert-danger">
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php } ?>
        <?= form_open('login'); ?>
        <br>
        <div class="user-box">
            <!-- <input type="email" name="email" class="form-control" required> -->
            <!-- <label>Email</label> -->
            <input type="text" name="username" required="">
            <label>Username</label>
        </div>
        <div class="user-box">
            <input type="password" name="password" required="">
            <label>Password</label>
        </div>
        <input class="btn_style" id="simpan" type="submit" value="Login" name="submit">
        <?= form_close(); ?>
        <br>
        <!-- <p> Belum punya account? <a href="registrasi.php">Registrasi</a></p> -->
        <!-- <p><a href="../registrasi">Registrasi</a></p> -->
        <p>Belum punya akun? <a href="../registrasi">Registrasi</a></p>
    </div>
</body>

</html>