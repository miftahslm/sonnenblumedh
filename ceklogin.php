<!-- cek username sama password yang dimasukan -->
<?php
include 'koneksi.php';             //koneksi ke database
if(isset($_POST['btnLogin'])) {    //kalau tombol login
    $username=$_POST['username'];  //inisialisasikan
    $password=$_POST['password'];

    $query=mysqli_query($konek, "SELECT * FROM tb_user WHERE username='$username'");    //buat query untuk select username
    $data=mysqli_fetch_array($query);                                                   //tampilkan data
    
    if(mysqli_num_rows($query)==1) {                            //kalau username benar
        if(password_verify($password,$data['password'])) {      //cek password
            //password benar
            //login berhasil            
            session_start();
            $_SESSION['username']=$data['username'];
            header('location:index.php');
        }else {
            //password salah
            header('location:login.php?pesan=Password salah'); //tambahkan pesan
        }
    }else { //username salah
        //username salah
        header('location:login.php?pesan=Username salah'); //tambahkan pesan
    }
}
?>
