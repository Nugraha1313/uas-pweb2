<?php $this->extend('layout/page_layout') ?>
<?php $this->section('content') ?>
<br>
<br>
<section class="container-fluid">
    <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
    <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-4">
            <form class="register-box" action="/register/save" method="post" enctype="multipart/form-data">
                <button title="Menuju ke Halaman Login" class="btn_style posisi-head" id="submit"><a href="/login">Back</a></button><br><br><br>
                <h2>Registration</h2>
                <?php
                if (isset($validation)) : ?>
                    <div class="alert msg"><?= $validation->listErrors() ?></div>
                <?php endif; ?>
                <div class="user-box">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" placeholder="Masukkan Nama" name="nama" required>
                </div>
                <div class="user-box">
                    <label for="InputEmail">Email</label>
                    <input type="email" class="form-control" id="InputEmail" aria-describeby="emailHelp" id="email" name="email" autocomplete="email" placeholder="Masukkan Email">
                </div>
                <div class="user-box">
                    <label for="name">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Masukkan username" name="username" required>
                </div>
                <div class="user-box">
                    <label for="formFile" class="form-label">Foto Profile </label>
                    <input class="form-control" type="file" id="formFile" name="imageFile" required>
                </div>
                <div class="user-box">
                    <label for="InputPassword">Password</label>
                    <input type="password" class="form-control" id="InputPassword" placeholder="Password" name="password" required minlength="6">
                </div>
                <div class="user-box">
                    <label for="InputPassword">Confirm Password</label>
                    <input type="password" class="form-control" id="InputRePassword" placeholder="Confirm Password" name="confirm_password" required min="6">
                </div>
                </div>
                <input type="submit" class="btn_style" id="submit" name="register" value="submit">
            </form>
        </section>
    </section>
</section>
<br>
<br>
<?php $this->endSection() ?>