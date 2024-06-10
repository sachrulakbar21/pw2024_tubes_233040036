<?php
require "koneksi.php";

$id = $_GET['p'];

$query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM artis a JOIN kategori b ON a.kategori_id=b.id WHERE a.id='$id'");
$data = mysqli_fetch_array($query);

$queryKategori = mysqli_query($con, "SELECT * FROM kategori WHERE id!='$data[kategori_id]'");

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Detail Artis</title>

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Script Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Navbar -->
    <?php require "partials/navbar.php"; ?>
    <!-- Navbar -->

    <!-- Container -->
    <div class="container mt-5">
        <!-- breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="admin.php" class="text-decoration-none text-muted"><i class="fas fa-home "></i> Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="artis.php" class="text-decoration-none text-muted">Artis</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Detail Artis
                </li>
            </ol>
        </nav>
        <!-- breadcrumb -->

        <div class="my-5 col-12 col-md-6 mb-5">
            <h2>Detail Artis</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama">Nama Artis</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?php echo htmlspecialchars($data['nama']); ?>" required>
                </div>
                <div>
                    <label for="kategori">Genre</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="<?php echo $data['kategori_id']; ?>"><?php echo htmlspecialchars($data['nama_kategori']); ?></option>
                        <?php
                        while ($dataKategori = mysqli_fetch_array($queryKategori)) {
                        ?>
                            <option value="<?php echo $dataKategori['id']; ?>"><?php echo htmlspecialchars($dataKategori['nama']); ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <label for="currentFoto">Foto Artis Sekarang</label>
                    <img src="image/<?php echo htmlspecialchars($data['foto']); ?>" alt="" width="200px">
                </div>
                <div>
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div>
                    <label for="detail">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="10" class="form-control">
                    <?php echo $data['detail']; ?>
                </textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary mt-2" name="simpan">Simpan</button>
                    <button type="submit" class="btn btn-danger mt-2" name="hapus">Hapus</button>
                </div>
            </form>

            <?php
            if (isset($_POST['simpan'])) {
                // Peroleh nilai dari form
                $nama = htmlspecialchars($_POST['nama']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $detail = htmlspecialchars($_POST['detail']);

                $target_dir = "image/";
                $nama_file = '';
                if (isset($_FILES["foto"]["name"])) {
                    $nama_file = basename($_FILES["foto"]["name"]);
                }
                $target_file = $target_dir . $nama_file;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $image_size = isset($_FILES['foto']['size']) ? $_FILES['foto']['size'] : 0;
                $random_name = generateRandomString(20);
                $new_name = $random_name . "." . $imageFileType;

                if ($nama == '' || $kategori == '') {
                    echo '<div class="alert alert-warning mt-3" role="alert">Nama, Kategori wajib di isi</div>';
                } else {
                    // query update artis table
                    $queryUpdate = mysqli_query($con, "UPDATE artis SET kategori_id='$kategori', nama='$nama', 
                    detail='$detail' WHERE id=$id");

                    if ($nama_file != '') {
                        if ($image_size > 500000) {
                            echo '<div class="alert alert-warning mt-3" role="alert">File tidak boleh lebih dari 500kb</div>';
                        } else {
                            if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif') {
                                echo '<script>
                                    Swal.fire({
                                        title: "<h3>Format File harus jpg, png, atau gif</h3>",
                                        showClass: {
                                            popup: "animate__animated animate__fadeInDown"
                                        },
                                        hideClass: {
                                            popup: "animate__animated animate__fadeOutUp"
                                        }
                                    });
                                    </script>';
                            } else {
                                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);

                                $queryUpdate = mysqli_query($con, "UPDATE artis SET foto='$new_name' WHERE id='$id'");

                                if ($queryUpdate) {
                                    echo '<script>
                                        Swal.fire({
                                            position: "center",
                                            icon: "success",
                                            title: "Artis Berhasil diubah",
                                            showConfirmButton: false,
                                            timer: 2000
                                        });
                                        </script>';
                                    echo '<meta http-equiv="refresh" content="2; url=artis.php" />';
                                } else {
                                    echo mysqli_error($con);
                                }
                            }
                        }
                    } else {
                        if ($queryUpdate) {
                            echo '<script>
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: "Artis Berhasil diubah",
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                                </script>';
                            echo '<meta http-equiv="refresh" content="2; url=artis.php" />';
                        } else {
                            echo mysqli_error($con);
                        }
                    }
                }
            }

            if (isset($_POST['hapus'])) {
                $queryHapus = mysqli_query($con, "DELETE FROM artis WHERE id='$id'");

                if ($queryHapus) {
                    echo '<script>
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Artis Berhasil dihapus",
                            showConfirmButton: false,
                            timer: 2000
                        });
                        </script>';
                    echo '<meta http-equiv="refresh" content="2; url=artis.php" />';
                }
            }
            ?>
        </div>
    </div>
    <!-- Container -->

    <!-- Footer -->
    <?php require "partials/footer.php" ?>
    <!-- Footer -->

    <!-- Script Fontawesome -->
    <script src="https://kit.fontawesome.com/84b8f8fd02.js" crossorigin="anonymous"></script>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>