<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="/css/style_profil.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="script" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="script" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>

<body>
    <div class="row py-5 px-4 posisi">
        <div class="col-md-6 mx-auto">
            <!-- Profile widget -->
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="px-4 pt-0 pb-4 cover">
                    <div class="media align-items-end profile-head">
                        <div class="profile mr-3"><img src="<?= base_url('users/'.session()->foto) ?>" alt="..."
                                width="130" class="rounded mb-2 img-thumbnail"><a href="/editprofil"
                                class="btn btn-outline-dark btn-sm btn-block">Edit Profile</a></div>

                        <div class="media-body mb-5 text-white">
                            <h4 class="mt-0 mb-0"><?= session()->nama ?></h4>
                            <p class="small mb-4"> <i class="fas fa-map-marker-alt mr-2"></i><?= session()->username ?>
                            </p>

                        </div>
                        <div class="profile mr-3"><img><a href="/home"
                                class="btn btn-outline-dark btn-sm btn-block">Home</a></div>
                    </div>
                </div>

                <div class="bg-ligh t p-4 d-flex justify-content-end text-center">

                </div>
                <div class="px-4 py-3">
                    <h5 class="mb-0 about">About</h5>
                    <hr style="background-color: black;">
                    <div class="p-4 rounded shadow-sm  content">
                        <p class="font-italic mb-0">Nama : <?= session()->nama ?></p>
                        <p class="font-italic mb-0">Username : <?= session()->username ?></p>
                        <p class="font-italic mb-0">Email : <?= session()->email ?></p>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>