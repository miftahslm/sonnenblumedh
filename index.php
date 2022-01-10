<!-- halaman awal setelah login -->
<!-- starter template -->
<!doctype html>

<!-- session agar harus login dulu baru bisa masuk di sini -->
<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:login.php');
  exit;
}

include 'koneksi.php'; //biar terhubung ke database

?>

<html lang="en">

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
      <a class="navbar-brand ms-3">SONNEN BLUME SHOP</a> <!-- ms-3 -->
      <form class="d-flex ms-auto"> <!-- ms-auto -->
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
      <a href="logout.php"><button class="btn btn-outline-light ms-2" type="submit">Logout</button></a> <!-- tambahkan tag a untuk dialihkan ke logout -->
    </div>
  </nav>
  <!-- batas navbar -->

  <!-- container -->
  <div class="container">
    <figure class="mt-5"> <!-- mt-5 -->

    <!-- typography -->
      <blockquote class="blockquote">
        <p>DATA PRODUK YANG TERSEDIA</p>
      </blockquote>
      <figcaption class="blockquote-footer">
        <cite title="Source Title">Create, Read, Update, & Delete</cite>
      </figcaption>
    </figure>

    <!-- tabel -->
    <table class="table table-hover table-bordered align-middle text-center"> <!-- table-bordered, align-midle, table-hover, text-center -->
      <thead class="table-dark">
        <tr>
          <th scope="col">NO.</th>
          <th scope="col">NAMA PRODUK</th>
          <th scope="col">KATEGORI</th>
          <th scope="col">BRAND</th>
          <th scope="col">GAMBAR</th>
          <th scope="col">AKSI</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM tb_shop";                //bikin query untuk menampilkan data yang ada di database
        $sql = mysqli_query($konek, $query);             //eksekusi query
        //$data = mysqli_fetch_array($sql);
        $no = 1;                                         //inisialisaikan memang nomor
        while ($data = mysqli_fetch_array($sql)) {       //menampilan data awal 
        ?>
          <tr>
            <th scope="row"><?php echo $no; ?></th>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['kategori']; ?></td>
            <td><?php echo $data['brand']; ?></td>
            <td>
               <!-- tempat gambar disimpan -->
              <img src="img/<?php echo $data['gambar']; ?>" alt="gambar" style="width: 100px">  <!-- alt, style widht:100px -->
            </td>
            <td> <a href="aksi.php?edit=<?php echo $data['id']; ?>"> <!-- kalau klik edit diarahkan ke aksi.php dan id dari data ditampilkan diurl -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                  </a>
                  <a href="proses.php?hapus=<?php echo $data['id']; ?>"> <!-- kalau klik hapus diarahkan ke proses.php dan id dari data ditampilkan diurl -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg>
                  </a>
            </td>
          </tr>
        <?php
          $no++; //nomor akan terus bertambah
        } ?>
      </tbody>
    </table>
    <!-- tombol add, tag a untuk dialihkan ke aksi.php, style float:right -->
    <a href="aksi.php?tambah" type="button" class="btn btn-dark" style="float:right"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
      </svg> add item</a>
  </div>
  <!-- batas container -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>