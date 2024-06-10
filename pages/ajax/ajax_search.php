<?php
// koneksi database
require '../../functions.php';

// cek apakah parameter keyword ada
if (isset($_GET['keyword'])) {
  $keyword = $_GET['keyword'];

  // query Artis berdasarkan keyword
  $queryArtis = mysqli_query($conn, "SELECT * FROM artis WHERE nama LIKE '%$keyword%'");
  $queryKategori = mysqli_query($conn, "SELECT * FROM kategori WHERE nama LIKE '%$keyword%'");

  // cek jumlah hasil query
  $jumlahArtis = mysqli_num_rows($queryArtis);
  $jumlahKategori = mysqli_num_rows($queryKategori);

  // looping hasil query
  while ($artis = mysqli_fetch_array($queryArtis)) {
    // tampilkan hasil pencarian
    echo '<div class="col-md-4 mb-5 text-center">';
    echo '<div class="card h-100">';
    echo '<div class="image-box">';
    echo '<img src="../adminpanel/image/' . $artis['foto'] . '" class="card-img-top" alt="">';
    echo '</div>';
    echo '<div class="card-body">';
    echo '<h4 class="card-title">' . $artis['nama'] . '</h4>';
    echo '<a href="Artis-detail.php?nama=' . $artis['nama'] . '" class="btn btn-warning d-grid">Detail</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }

  if ($jumlahArtis == 0) {
    echo '<h4 class="text-center my-5">Artis yang anda cari tidak tersedia</h4>';
  }
}
