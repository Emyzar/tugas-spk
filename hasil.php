<?php
// mengaktifkan session php
session_start();
// kondisi mengecek apakah sudah login apa belum
if ($_SESSION['status'] != "sudah_login") {
    header("location:index.php?pesan=anda belum login");
}
include "config/dbconnect.php";
include "perhitungan.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <title>Mahasiswa</title>
</head>
<body style="background-image: url('https://cdn.pixabay.com/photo/2018/02/23/04/38/computer-3174729_1280.jpg');" class="container">
    <main>
        <!-- Include the sidebar -->
        <?php include('sidebar.php'); ?>

        <!-- Content goes here -->
        <div id="main-content" class="container allcontent-section py-4">
        <div>
            <center><h1>Data mahasiswa</h1></center>
            <table class= "table table-dark" id="example">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Nim</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">IPK</th>
                        <th class="text-center">Masa Studi</th>
                        <th class="text-center">Prestasi</th>
                        <th class="text-center">Tugas Akhir KIAN</th>
                        <th class="text-center">Peringkat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include_once "config/dbconnect.php";
                    $no=0;
                    $sql= "SELECT * FROM mahasiswa order by peringkat ASC";
                    $result = $conn->query($sql);
                    if($result == false) {
                        trigger_error("Perintah sql manual anda salah");
                    }else{
                        while($data = $result -> fetch_array()){
                            $no++;    
                ?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $data['nim']?></td>
                    <td><?php echo $data['nama']?></td>
                    <td><?php echo $data['ipk']?></td>
                    <td><?php echo $data['ms_studi']?></td>
                    <td><?php echo $data['prestasi']?></td>
                    <td><?php echo $data['na']?></td>
                    <td><?php echo $data['peringkat']?></td>
                    <td>
                    <!-- Button trigger detail -->
                        <button type="button" style="height: 45px" class="btn btn-primary bi bi-search" data-bs-toggle="modal" data-bs-target="#DetailDatamahasiswa<?php echo $data['nim']?>">
                        Detail
                        </button>
                        <?php
                            $get_nim = $data['nim'];
                            $sql2 = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = '$get_nim'");
                            $j = mysqli_fetch_assoc($sql2);
                            $r = $j;
                        ?>
                        <!-- Modal -->
                        <div class="modal fade" id="DetailDatamahasiswa<?php echo $data['nim']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content text-black">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 bi bi-list-task" id="exampleModalLabel">Detail Data mahasiswa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" align="justify">
                                <div class="row">
                                    <div class="col-sm-4">
                                        Nim<br>
                                        Nama<br>
                                        Tanggal Lahir<br>
                                        Tempat Lahir<br>
                                        Tahun Masuk<br>
                                        IPK<br>
                                        Masa Studi<br>
                                        Prestasi<br>
                                        Tugas Akhir KIAN<br>
                                        Peringkat <br>
                                        
                                    </div>
                                    <div class="col-sm-8">
                                        : <?php echo $r ['nim']?><br>
                                        : <?php echo $r ['nama']?><br>
                                        : <?php echo $r ['tgl_lahir']?><br>
                                        : <?php echo $r ['tempat_lahir']?><br>
                                        : <?php echo $r ['tahun_masuk']?><br>
                                        : <?php echo $data ['ipk']?><br>
                                        : <?php echo $data ['ms_studi']?><br>
                                        : <?php echo $data ['prestasi']?><br>
                                        : <?php echo $data ['na']?><br>
                                        : <?php echo $r ['peringkat']?><br>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" style="height: 45px" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    <?php }?>
                    </td>
                </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>
    </div>
    </main>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
</body>
</html>
