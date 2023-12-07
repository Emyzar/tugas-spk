<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="asset/fonts/icomoon/style.css">
    <link rel="stylesheet" href="asset/css/owl.carousel.min.css">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <title>Sidebar #1</title>
</head>
<body>
    <aside class="sidebar">
        <!-- Sidebar content goes here -->
        <div class="toggle">
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
            </a>
    </div>
    <div class="side-inner">
        <div class="profile">
        <img src="asset/image/cowo.png" alt="Image" class="img-fluid">
        <h3 class="name">Mahasiswa1</h3>
        <span class="country">Admin</span>
        </div>
        
        <div class="nav-menu">
        <ul>
        <?php if($_SESSION['hak_akses'] == 'admin'){?>
            <li><a href="home.php"><span class="icon-home mr-3"></span>Home</a></li>
            <li><a href="user.php"><span class="icon-home mr-3"></span>User</a></li>
            <li><a href="mahasiswa.php"><span class="icon-search2 mr-3"></span>Mahasiswa</a></li>
            <li><a href="kriteria.php"><span class="icon-notifications mr-3"></span>Kriteria</a></li>
            <li><a href="subkriteria.php"><span class="icon-location-arrow mr-3"></span>Sub Kriteria</a></li>
            <li><a href="penilaian.php"><span class="icon-location-arrow mr-3"></span>Penilaian</a></li>
            <li><a href="hasil.php"><span class="icon-sign-out mr-3"></span>Hasil</a></li>
            <li><a href="logout.php"><span class="icon-sign-out mr-3"></span>Logout</a></li>
        <?php } ?>
        <?php if($_SESSION['hak_akses'] == 'mahasiswa'){?>
            <li><a href="home.php"><span class="icon-home mr-3"></span>Home</a></li>
            <li><a href="mahasiswa.php"><span class="icon-search2 mr-3"></span>Mahasiswa</a></li>
            <li><a href="hasil.php"><span class="icon-sign-out mr-3"></span>Hasil</a></li>
            <li><a href="logout.php"><span class="icon-sign-out mr-3"></span>Logout</a></li>
        <?php } ?>
        </ul>
        </div>
    </div>
    
    </aside>
    <script src="asset/js/jquery-3.3.1.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/main.js"></script>
</body>
</html>
