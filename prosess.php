<?php
    include 'koneksi.php';

    if (isset($_POST['btnProses'])) { 
        $nama = $_POST['nama'];
        $profesi = $_POST['profesi'];
        $pengalaman = $_POST['pengalaman'];
        
        if ($_POST['btnProses'] == "tambah") {
            $gambar = $_FILES['gambar']['name'];
            $dir = "gambar/";
            $dirFile = $_FILES['gambar']['tmp_name'];
            move_uploaded_file($dirFile, $dir . $gambar);

            $query = "INSERT INTO konselor VALUES('','$nama','$profesi','$pengalaman','$gambar')";
            $sql = mysqli_query($konek, $query);
            if ($sql) {
                header('location:admin.php');
            }
        } else {
            if ($_FILES['gambar']['name'] != ""){
                $queryHapus = "SELECT gambar FROM konselor WHERE id = '$_POST[id]'";
                $sqlHapus = mysqli_query($konek, $queryHapus);
                $data = mysqli_fetch_array($sqlHapus);

                unlink("gambar/" . $data['gambar']);
                $gambar = $_FILES['gambar']['name'];
                $dir = "gambar/";
                $dirFile = $_FILES['gambar']['tmp_name'];
                move_uploaded_file($dirFile, $dir . $gambar);

                $query = "UPDATE konselor SET nama='$nama',profesi='$profesi',
                pengalaman='$pengalaman',gambar='$gambar' WHERE id = '$_POST[id]'";
                
            }else{
                $query = "UPDATE konselor SET nama='$nama',profesi='$profesi',pengalaman='$pengalaman' WHERE id = '$_POST[id]'";
            }    
            $sql = mysqli_query($konek, $query);
            if ($sql) {
                header('location:admin.php');
            }
        }
        
    } elseif($_GET['hapus']){
        $queryHapus = "SELECT gambar FROM konselor WHERE id = '$_GET[hapus]'";
        $sqlHapus = mysqli_query($konek, $queryHapus);
        $data = mysqli_fetch_array($sqlHapus);

        unlink("gambar/" . $data['gambar']);

        $query = "DELETE  FROM konselor WHERE id = '$_GET[hapus]'";
        $sql = mysqli_query($konek, $query);
        if ($sql) {
            header('location:admin.php');
        }
    }
?>