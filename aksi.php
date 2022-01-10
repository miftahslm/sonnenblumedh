<!-- tempat masukan data yang mau ditambah atau edit -->
<!-- starter template -->
<!doctype html>
<html lang="en">

<?php
//agar terhubung ke database
include 'koneksi.php';

//inisialisasikan
$id="";
$nama="";
$kategori="";
$brand="";
$gambar="";

if(isset($_GET['edit'])) {                               //kondisi ketika ada data yang diedit, maka tamppil data awalnya
  $id=$_GET['edit'];                
  $query="SELECT * FROM tb_shop WHERE id='$id'"; //masukan query
  $sql=mysqli_query($konek,$query);                      //eksekusi query
  $data=mysqli_fetch_array($sql);                        //menampilan data awal yang mau diubah
  $nama=$data['nama'];                                   //inisialisaikan data yang diedit
  $kategori=$data['kategori'];
  $brand=$data['brand'];
  $gambar=$data['gambar'];
}
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>SONNEN BLUME</title>
</head>

<body>
  <!-- ini navbar -->
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand ms-3">SONNEN BLUME SHOP</a>  <!-- ms-3 -->
    </div>
  </nav>
  <!-- batas navbar -->

  <!-- container -->
  <div class="container">
    <figure class="mt-5">  <!-- mt-5 -->
       <!-- typhography -->
      <blockquote class="blockquote">
        <p>DATA PRODUK YANG TERSEDIA</p>
      </blockquote>
      <figcaption class="blockquote-footer">
        <cite title="Source Title">Kelola Data Produk</cite>
      </figcaption>
    </figure>

       <!-- form control -->
    <form action="proses.php" method="post">  <!-- form diproses di proses.php -->
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama Prdouk</label>  <!-- label, id, nama, value -->
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama;?>">    <!-- data sebelum edit dimunculkan  -->
        </div>
      </div>
      <div class="mb-3 row">
        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label> <!-- label, id, nama, value -->
        <div class="col-sm-10">
          <input type="text" class="form-control" id="kategori" name="kategori" value="<?php echo $kategori;?>">  <!-- data sebelum edit ditampilkan  -->
        </div>
      </div>
      <div class="mb-3 row">
        <label for="brand" class="col-sm-2 col-form-label">Brand</label> <!-- label, id, nama, value -->
        <div class="col-sm-10">
          <input type="text" class="form-control" id="brand" name="brand" value="<?php echo $brand;?>">  <!-- data sebelum edit ditampilkan  -->
        </div>
      </div>
      <div class="mb-3 row"> 
        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label> <!-- label, id, nama, value -->
        <div class="col-sm-10">
          <input type="file" class="form-control" id="gambar" name="gambar" value="<?php echo $gambar;?>">  <!-- data sebelum edit ditampilkan  -->
        </div>
      </div>

       <!-- tombol yang muncul -->
      <div class="mb-3 row">
        <?php
        if (isset($_GET['tambah'])) {  //kondisi kalau tekan tombol tambah
          echo "<button type='submit' class='btn btn-secondary' name='btnProses' value='tambah'>Tambah</button>"; //maka yang muncul tombol tambah, name = btnproses, value = tambah
        } else {                      //kalau tekan tombol edit, name = btnproses, value = edit
          echo "<button type='submit' class='btn btn-secondary' name='btnProses' value='edit'>Simpan</button>"; //maka yang muncul tombol tambah, name = btnproses, value = edit
        }
        ?>
      </div>
    </form>

  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>