<!--untuk proses add, delete, edit -->
<?php
    //agar terhubung ke database
    include 'koneksi.php';

    //untuk edit dan add data yang dimasukan di aksi.php
    if(isset($_POST['btnProses'])) {        //kondisi kalau klik edit atau add 
        $nama = $_POST['nama'];            //inisialisasikan data yang nanti akan di edit atau tambah di aksi.php
        $kategori = $_POST['kategori'];
        $brand = $_POST['brand'];
        $gambar ='loosepowder.jpeg'; //tulis memang namanya karena rempong kalau choose file:(
        echo $gambar;                //tampilkan gambar
        
        if($_POST['btnProses']=="tambah") {  //kalau tambah data
            
            $query="INSERT INTO tb_shop VALUES('','$nama','$kategori','$brand','$gambar')"; //masukan query tambah data
            $sql=mysqli_query($konek,$query);                                               //eksekusi query 
            if ($sql) {                                                                     //kalau eksekusi berhasil maka,
                header('location:index.php');                                               //dialihkan ke index.php
            }
        }else {     //kalau edit data
            $query="UPDATE tb_shop SET nama='$nama', kategori='$kategori', brand='$brand', gambar='$gambar' WHERE id='$_POST[id]'"; //masukan query update data
            $sql = mysqli_query($konek, $query);    //eksekusi query
            if ($sql) {                             //kalau eksekusi berhasil maka,
                header('location:index.php');       //dialihkan ke index.php
            }
        }
    }elseif ($_GET['hapus']) {                                 //kondisi kalau delete data
       $query = "DELETE FROM tb_shop WHERE id='$_GET[hapus]'"; //masukan query delete data
       $sql = mysqli_query($konek, $query);                    //eksekusi query
       if ($sql) {                                             //kalau eksekusi berhasil maka
           header('location:index.php');                       //dialihkan ke index.php
       }
    }
    
?>
