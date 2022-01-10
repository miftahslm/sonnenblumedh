<!-- halaman login -->
<!-- starter template -->
<!doctype html>
<?php
//kalau masuk dialihkan ke index.php
session_start();
if(isset($_SESSION['username'])) {
  header('location:index.php');
  exit;
}

?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>HALAMAN LOGIN</title>
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
    <div class="container mt-5"> <!-- mt-5 -->
        <!-- .row -->
        <div class="row justify-content-center"> <!-- justify-content-center -->
            <!-- .col-md-6 -->
            <div class="col-md-6">
                <?php
                if(isset($_GET['pesan'])) { //menangkap pesan
                ?>
                    <!-- alert -->
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Login Gagal,</strong> <?php echo $_GET['pesan']; ?> <!-- tampilkan pesan -->
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <!-- card -->
                <div class="card">
                    <div class="card-header text-center"> <!-- text-center -->
                        HALAMAN LOGIN
                    </div>
                    <!-- form -->
                    <form action="ceklogin.php" method="post"> <!-- form dicek di ceklogin.php -->
                        <div class="card-body">

                            <!-- input grup -->
                            <label for="username" class="form-label">Username</label> <!-- label -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg></span>
                                <input type="text" class="form-control" id="username" name="username" required placeholder="Masukan Username"aria-describedby="basic-addon3"> <!-- id, name, required, placeholder -->
                            </div>
                            <label for="password" class="form-label">Password</label> <!-- label -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/></svg></span>
                                <input type="password" class="form-control" id="password" name="password" required placeholder="Masukan Password"aria-describedby="basic-addon3"> <!-- id, name, type, rrequired placeholder -->
                            </div>
                            <!-- button -->
                            <div class="row mb-3">  <!-- .row mb-3-->
                                <button type="submit" class="btn btn-primary" name="btnLogin">Login</button> <!-- type, name -->
                            </div>
                            <!-- .text-center -->
                            <div class="text-center">
                                Belum memiliki akun? <a href="daftar.php">Daftar</a> sekarang  <!-- kalau klik daftar dialihkan ke login.php -->
                            </div>

                        <div>
                    </form>
                    </div>
                </div>
            </div>
    
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>