<?php
// koneksi database
require 'functions.php';

// query produk dan limit hanya 6 produk yang ditampilkan
$queryArtis = mysqli_query($conn, "SELECT id, nama, foto, detail FROM artis LIMIT 6");

// query kategori
$queryKategori = mysqli_query($conn, "SELECT * FROM kategori");

if (isset($_GET['kategori'])) {
  $queryGetKategoriId = mysqli_query($conn, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
  $kategoriId = mysqli_fetch_array($queryGetKategoriId);

  // query produk
  $queryProduk = mysqli_query($conn, "SELECT * FROM produk WHERE kategori_id='$kategoriId[id]'");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Musicfy | Home</title>

  <!-- script bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />

  <!-- link index.css -->
  <link rel="stylesheet" href="css/index.css" />

  <style>
    .playlist-item img {
      max-width: 60%;
      height: auto;
      border-radius: 50px;
      margin-top: 20px;
      /* You can adjust the radius as needed */
    }

    .playlist-item {
      margin-bottom: 20px;
      /* Adjust the spacing between the items */
    }
  </style>
</head>

<body>
  <!-- Awal Navbar -->
  <nav class="navbar navbar-expand-lg text-white navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="assets/musicfy.png" alt="Logo" width="150" height="30" class="me-2" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <form class="d-flex ms-auto my-4" id="form-cari">
          <input class="form-control me-2" type="text" placeholder="Cari Artis" aria-label="Search" name="keyword" id="keyword" />
          <button class="btn btn-light" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/artis.php">Artis </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php" onclick="redirectToLogin()">Login User<i class="fa fa-sign-out fa-md ms-2"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->

  <!-- Awal Carousel -->
  <div class="container">
    <div id="carouselExampleIndicators" class="carousel slide mt-5" data-bs-ride="carousel">
      <div class="carousel-indicators text-align-center">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/1.jpg" class="d-block w-100" alt="gambar 1" />
        </div>
        <div class="carousel-item">
          <img src="assets/2.jpg" class="d-block w-100" alt="gambar 2" />
        </div>
        <div class="carousel-item">
          <img src="assets/3.jpg" class="d-block w-100" alt="gambar 3" />
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  </div>
  <!-- Akhir Carosel -->

  <!-- Awal Genre -->
  <div class="container mt-5">
    <div class="judul-kategori" style="background-color: #bbbbbb; padding: 5px 10px">
      <h5 class="text-center" style="margin-top: 5px">GENRE</h5>
    </div>
    <div class="row text-center row-container d-flex justify-content-center align-items-center mt-2">

      <div class="mix col-lg-3 col-md-4 col-sm-6 genres">
        <div class="playlist-item">
          <a href="pages/artis.php?kategori=Jazz"><img src="assets/playlist/live.jpg" alt="Live Concerts" class="img-fluid rounded mb-2"></a>
          <h5>JAZZ</h5>
        </div>
      </div>

      <div class="mix col-lg-3 col-md-4 col-sm-6 artists">
        <div class="playlist-item">
          <a href="pages/artis.php?kategori=INDIE"><img src="assets/playlist/rock.jpg" alt="Dj Sets" class="img-fluid rounded mb-2"></a>
          <h5>INDIE</h5>
        </div>
      </div>

      <div class="mix col-lg-3 col-md-4 col-sm-6 movies">
        <div class="playlist-item">
          <a href="pages/artis.php?kategori=POP"><img src="assets/playlist/jazz.jpg" alt="Recorded Live" class="img-fluid rounded mb-2"></a>
          <h5>POP</h5>
        </div>
      </div>

      <div class="mix col-lg-3 col-md-4 col-sm-6 labels">
        <div class="playlist-item">
          <a href="pages/artis.php?kategori=RNB"><img src="assets/playlist/country.jpg" alt="Oldies" class="img-fluid rounded mb-2"></a>
          <h5>R&B</h5>
        </div>
      </div>

    </div>
  </div>
  </div>
  <!-- Akhir Kategori -->

  <!-- Awal Artis -->
  <div class="container mt-5" id="produk">
    <div class="judul-produk" style="background-color: #bbbbbb; padding: 5px 10px">
      <h5 class="text-center" style="margin-top: 5px">ARTIS</h5>
    </div>
    <div class="row">
      <?php while ($data = mysqli_fetch_array($queryArtis)) { ?>
        <div class="col-lg-2 col-md-2 col-sm-4 col-6 mt-2">
          <div class="card text-center">
            <img src="adminpanel/image/<?php echo $data['foto']; ?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h6 class="card-title"><?php echo $data['nama']; ?></h6>
              <a href="pages/artis-detail.php?nama=<?php echo $data['nama']; ?>" class="btn btn-warning d-grid">Detail</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <!-- Akhir Artis -->

  <!-- Footer -->
  <footer class="bg-dark text-white p-4 mt-5" id="footer">
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

  <script>
    function redirectToLogin() {
      // Redirect to login.php
      window.location.href = "login.php";
    }
  </script>

  <!-- Tombol Go-Top -->
  <a href="#" class="gotop rounded"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
  <!-- Tombol Go-Top -->

  <!-- kit font awesome -->
  <script src="https://kit.fontawesome.com/84b8f8fd02.js" crossorigin="anonymous"></script>

  <!-- script bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</body>

</html>