<?php
// require "session.php";
require "koneksi.php";

session_start();





$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);

$queryArtis = mysqli_query($con, "SELECT * FROM artis");
$jumlahArtis = mysqli_num_rows($queryArtis);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Admin</title>

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!--  -->
    <link rel="stylesheet" href="../css/darkmode.css">
</head>

<style>
    .kotak {
        border: solid;
    }

    .summary-kategori {
        background-color: #0a6b4a;
        border-radius: 15px;
    }

    .summary-produk {
        background-color: #0a516b;
        border-radius: 15px;
    }


    #footer {
        margin-top: 425px;
        bottom: 0;
        width: 100%;
    }
</style>

<body>
    <!-- navbar -->
    <?php require "partials/navbar.php"; ?>
    <!-- navbar -->

    <!-- container -->
    <div class="container mt-5">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    <i class="fas fa-home text-black-60"></i> Home
                </li>
            </ol>
        </nav>
        <!-- Breadcrumb -->

        <!-- Card -->
        <div class="container mt-5">
            <div class="card mb-3 bg-light">
                <div class="card-body ">
                    <h4 class="card-title">Selamat Datang di Dashboard, <b><?= $_SESSION['username'] ?></b></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="summary-kategori p-3">
                        <div class="row">
                            <div class="col-6">
                                <i class="fa-solid fa-music fa-7x text-black-60"></i>
                            </div>
                            <div class="col-6 text-white">
                                <h3 class="fs-2">Genre</h3>
                                <p class="fs-4"><?php echo $jumlahKategori; ?> Genre</p>
                                <p><a href="kategori.php" class="text-decoration-none text-white">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="summary-produk p-3">
                        <div class="row">
                            <div class="col-6">
                                <i class="fa-solid fa-users fa-7x text-black-60"></i>
                            </div>
                            <div class="col-6 text-white">
                                <h3 class="fs-2">Artis</h3>
                                <p class="fs-4"><?php echo $jumlahArtis; ?> Produk</p>
                                <p><a href="artis.php" class="text-decoration-none text-white">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card -->
    </div>
    <!-- container -->

    <!-- Footer -->
    <?php require "partials/footer.php" ?>
    <!-- Akhir Footer -->

    <!-- Script Fontawesome -->
    <script src="https://kit.fontawesome.com/84b8f8fd02.js" crossorigin="anonymous"></script>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>