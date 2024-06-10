<?php
require '../functions.php';

// Mengambil data artis berdasarkan nama
$nama = htmlspecialchars($_GET['nama']);
$queryArtis = mysqli_query($conn, "SELECT * FROM artis WHERE nama='$nama'");
$artis = mysqli_fetch_array($queryArtis);

// Mengambil data kategori berdasarkan kategori_id dari artis
$genre = null;
if ($artis) {
  $kategori_id = $artis['kategori_id'];
  $queryGenre = mysqli_query($conn, "SELECT * FROM kategori WHERE id='$kategori_id'");
  $genre = mysqli_fetch_array($queryGenre);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Musicfy | Detail Artis</title>

  <!-- Link Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />

  <!-- Link CSS -->
  <link rel="stylesheet" href="../css/styleProduk.css" />
  <style>
    .badge.text-bg-warning {
      font-size: 1.5em;
      padding: 10px 20px;
    }
  </style>

</head>
<style>
  .detail p {
    white-space: pre-wrap;
    color: blue;
  }
</style>

<body>
  <!-- Awal Navbar -->
  <nav class="navbar navbar-expand-lg text-white navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="../assets/musicfy.png" alt="Logo" width="150" height="30" class="me-2" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <!-- <form class="d-flex ms-auto my-4" method="get" action="produk.php">
            <input class="form-control me-2" type="text" placeholder="Cari Barang Anda" aria-label="Search" name="keyword"/>
            <button class="btn btn-light" type="submit" ><i class="fa fa-search" aria-hidden="true"></i></button>
          </form> -->
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="artis.php">Artis </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../login.php">Login User <i class="fa fa-sign-out fa-md" aria-hidden="true"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->

  <!-- Detail Artis -->
  <div class="container-fluid py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <img src="../adminpanel/image/<?php echo $artis['foto']; ?>" class="w-100">
        </div>
        <div class="col-md-6 offset-md-1">
          <h1><?php echo $artis['nama']; ?></h1>
          <div class="garis-nama"></div>
          <p class="mt-1"><span class="badge text-bg-warning"><?php echo $genre['nama']; ?></span></p>
          <h5>Deskripsi Artis :</h5>
          <p class="fs-5 detail" style="white-space: pre-wrap;"><?php echo $artis['detail']; ?></p>

        </div>
      </div>
    </div>
  </div>
  <!-- Detail Artis -->

  <!-- Footer -->
  <footer class="bg-dark text-white p-4" id="footer">
    <div class="container">
      <div class="row mt-2">
        <div class="col-md-6 text-md-start text-center pt-2 pb-2">
          <span>Copyright &copy;2024 | Created by <a href="#" class="text-decoration-none text-white fw-bold">Moch Sachrul Akbar Ramadhan</a> </span>
        </div>
        <div class="col-md-6 text-md-end text-center pt-2 pb-2">
          <a href="" class="text-decoration-none">
            <i class="fa fa-instagram fa-xl text-white " aria-hidden="true"></i>
          </a>
          <a href="" class="text-decoration-none ms-1">
            <i class="fa fa-twitter fa-xl text-white" aria-hidden="true"></i>
          </a>
          <a href="" class="text-decoration-none ms-1">
            <i class="fa fa-github fa-xl text-white" aria-hidden="true"></i>
          </a>

        </div>
      </div>
    </div>
  </footer>
  <!-- Akhir Footer -->

  <!-- Script Fontawesome -->
  <script src="https://kit.fontawesome.com/84b8f8fd02.js" crossorigin="anonymous"></script>

  <!-- Script Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>