<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- costum css -->
    <link rel="stylesheet" href="/css/style_edit.css">
    <title>Change Password</title>
</head>

<body>
    <br>
    <br>
    <section class="container-fluid">
        <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-4">

                <form class="register-box" action="/editprofil/editpasswordsave" method="post"
                    enctype="multipart/form-data">


                    <button title="Menuju Ke Halaman Edit" class="btn_style posisi-head" id="submit"><a
                            href="/editprofil">Back</a></button><br><br><br>
                    <h2>Change Password</h2>
                    <?php
                if (isset($validation)) : ?>
                    <div class="alert msg"><?= $validation->listErrors() ?></div>
                    <?php endif; ?>
                    <div class="user-box">
                        <label for="InputPassword">Password</label>
                        <input type="password" class="form-control" id="InputPassword" placeholder="Password"
                            name="password" required minlength="6">
                    </div>
                    <div class="user-box">
                        <label for="InputRePassword">Confirm Password</label>
                        <input type="password" class="form-control" id="InputRePassword" placeholder="Confirm Password"
                            name="confirm_password" required min="6">
                    </div>
                    <button type="submit" class="btn_style" id="submit" name="ubahpass">Submit</button>
                    <!-- <div class="form-footer">
                   <p> Kembali ke <a href="edit.php">Edit Profil</a></p>
                </div> -->
                </form>
            </section>
        </section>
    </section>
    <br>
    <br>
</body>

</html>