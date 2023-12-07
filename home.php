<?php
// mengaktifkan session php
session_start();
// kondisi mengecek apakah sudah login apa belum
if ($_SESSION['status'] != "sudah_login") {
    header("location:index.php?pesan=anda belum login");
}
include "config/dbconnect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Home</title>
</head>
<body style="background-image: url('https://cdn.pixabay.com/photo/2018/02/23/04/38/computer-3174729_1280.jpg');" class="container">
    <main>
        <!-- Include the sidebar -->
        <?php include('sidebar.php'); ?>

        <!-- Content goes here -->
        <h1 class="fw-bold text-center text-white">Selamat Datang </h1><br>
        <h2 class="fw-bold text-center text-white">Selamat Datang Di Website SPK penentuan lulusan terbaik dengan metode AHP dan SAW</h2>
        <center><h3 class="fw-bold text-center text-white">Kelompok 4</h3></center>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title"><img src="asset/image/cewe.png" class="img-fluid" alt="Icon" style="width: 40px; height:40px;"> Emyzar Haflida Tanjung</h4>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title"><img src="asset/image/cewe.png" class="img-fluid" alt="Icon" style="width: 40px; height:40px;"> Aurelia Novinta Taufik</h4>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title"><img src="asset/image/cewe.png" class="img-fluid" alt="Icon" style="width: 40px; height:40px;"> Nur Lita</h4>
                </div>
            </div>
                <!-- Add similar cards for other members -->
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title"><img src="asset/image/cowo.png" class="img-fluid" alt="Icon" style="width: 40px; height:40px;"> Naufaldy Daffa</h4>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title"><img src="asset/image/cowo.png" class="img-fluid" alt="Icon" style="width: 40px; height:40px;"> Fahriza Ramadhani</h4>
                    </div>
                </div>
            <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title"><img src="asset/image/cowo.png" class="img-fluid" alt="Icon" style="width: 40px; height:40px;"> Fahreza Agung Firmansyah</h4>
                    </div>
                <!-- Add similar cards for other members -->
            </div>
        </div>
    </div>
    </main>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
