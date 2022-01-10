<!doctype html>

<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
        exit;
    }

    include 'koneksi.php';
    $id="";
    $nama = "";
    $profesi = "";
    $pengalaman = "";
    $gambar = "";
     
    if (isset($_GET['edit'])) {
        $id=$_GET['edit'];
        $query = "SELECT * FROM konselor WHERE id = '$id'";
        $sql = mysqli_query($konek, $query);
        $data = mysqli_fetch_array($sql);
        $nama = $data['nama'];
        $profesi = $data['profesi'];
        $pengalaman = $data['pengalaman'];
        $gambar = $data['gambar'];
         
    }
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- CSS -->
    <style>
        .navbar-brand {
            font-size: 30px;
            font-weight: 700;
            line-height: 1;
            letter-spacing: 3px;
        }
    </style>

    <title>Halaman Mengolah</title>
  </head>
  <body>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand">PeduliMental</a>
                <a class="btn btn-secondary" href="logout.php">Log out</a>
            </div>
        </nav>

        <figure class="text-center mt-5">
            <blockquote class="blockquote">
                <p>DATA KONSELOR AKTIF</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                <cite title="Source Title">Kelola Data Konselor</cite>
            </figcaption>
        </figure>

        <form action="proses.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" placeholder="Masukan nama konselor">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="profesi" class="col-sm-2 col-form-label">Profesi</label>
                <div class="col-sm-10">
                    <select name="profesi" id="profesi" class="form-control">
                        <option value="Psikolog" <?php if ($profesi == "Psikolog") echo "selected"; ?>>Psikolog</option>
                        <option value="Psikiater" <?php if ($profesi == "Psikiater") echo "selected"; ?>>Psikiater</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="pengalaman" class="col-sm-2 col-form-label">Pengalaman</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pengalaman" name="pengalaman" value="<?php echo $pengalaman; ?>" placeholder="Masukan lama bertugas">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="gambar" name="gambar" value="<?php echo $gambar; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <?php
                    if (isset($_GET['edit'])) {
                        echo "<button type='submit' class='btn btn-secondary' name='btnProses' value='edit'>Simpan Perubahan</button>";
                    } else {
                        echo "<button type='submit' class='btn btn-secondary' name='btnProses' value='tambah'>Tambah Data</button>";
                    }
                ?>
            </div>
        </form>    
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>