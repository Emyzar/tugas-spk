<?php
    // mengaktifkan session php
    session_start();

    // menghubungkan ke database
    include "config/dbconnect.php";
    // menangkap data yang dikirim dari from login
    $email   = $_POST["email"];
    $password   = $_POST["password"];

    // menyeleksi data user dengan email dan password yang sesuai
    $result   = mysqli_query($conn,"SELECT * FROM user WHERE email = '$email' AND password = '$password'");

    $cek      = mysqli_num_rows($result);

    if($cek > 0){
        $data = mysqli_fetch_assoc($result);
        // fungsi dibawah ini adalah untuk menyimpan session, nip, nama, hak akses, status dan id login
        $_SESSION['email'] = $email;
        $_SESSION['hak_akses'] = $data['hak_akses'];
        $_SESSION['status'] = "sudah_login";
        $_SESSION['id'] = $data['id'];
        header("location:home.php");
    } else{
        header("location:index.php?pesan=gagal login data tidak ditemukan.");
    }
?>