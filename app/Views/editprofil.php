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
    <title>Edit Profile</title>
</head>

<body>
    <br>
    <br>
    <section class="container-fluid">
        <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-4">
                <form class="register-box" action="/editprofil/editSave" method="post" enctype="multipart/form-data">
                    <button title="Menuju Ke Halaman Profil" class="btn_style posisi-head" id="submit"><a
                            href="/profil">Back</a></button><br><br><br>
                    <h2>Edit Profile</h2>
                    <?php
                if (isset($validation)) : ?>
                    <div class="alert msg"><?= $validation->listErrors() ?></div>
                    <?php endif; ?>
                    <div class="user-box">
                        <label for="name">Nama :</label>
                        <input type="text" class="form-control" id="name" value="<?= session()->nama?>" name="nama"
                            required>
                    </div>
                    <div class="user-box">
                        <label for="name">Username : </label>
                        <input type="text" class="form-control" id="username" value="<?= session()->username ?>"
                            name="username" required>
                    </div>
                    <div class="user-box">
                        <label for="InputEmail">Email : </label>
                        <input type="email" class="form-control" id="InputEmail" aria-describeby="emailHelp"
                            name="email" value="<?= session()->email ?>" required>
                    </div>

                    <div class="user-box">
                        <label for="formFile" class="form-label">Foto Profile : </label>
                        <input class="form-control" type="file" id="formFile" name="imageFile">
                    </div>
                    </div>
                    <button type="submit" class="btn_style" id="submit" name="ubah">Submit</button>
                    <div class="form-footer">
                        <p>Change Your Password ? <a href="/editprofil/editpassword">Change Password</a></p>
                    </div>
                </form>
            </section>
        </section>
    </section>
    <br>
    <br>
</body>

</html>