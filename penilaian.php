<?php
    // mengaktifkan session php
    session_start();
    // kondisi mengecek apakah sudah login apa belum
    if($_SESSION['status']!="sudah_login"){
        header("location:index.php?pesan=anda belum login");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>penilaian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
</head>
<body style="background-image: url('https://cdn.pixabay.com/photo/2018/02/23/04/38/computer-3174729_1280.jpg');">

    <?php
        // memasukkan file adminHeader.php, sidebar.php, dan db_connect.php
        
        include "sidebar.php";
        include_once "config/dbconnect.php";
    ?>

    <div id="main-content" class="container allcontent-section py-4">
        <div>
            <center><h1>Data penilaian</h1></center>
            <table class="table table-dark" id="example">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Nim</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include_once "config/dbconnect.php";
                    $no=0;
                    $sql= "SELECT * FROM mahasiswa";
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
                    <td>
                        
                    <!-- Button trigger detail -->
                        <button type="button" style="height: 45px" class="btn btn-primary bi bi-search" data-bs-toggle="modal" data-bs-target="#DetailDatapenilaian<?php echo $data['nim']?>">
                        Detail
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="DetailDatapenilaian<?php echo $data['nim']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content text-black">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 bi bi-list-task" id="exampleModalLabel">Detail Data penilaian</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" align="justify">
                                <div class="row">
                                    <div class="col-sm-4">
                                        Nim<br>
                                        Nama<br>
                                        IPK<br>
                                        Masa Studi<br>
                                        Prestasi<br>
                                        Tugas Akhir KIAN
                                    </div>
                                    <div class="col-sm-8">
                                        : <?php echo $data ['nim']?><br>
                                        : <?php echo $data ['nama']?><br>
                                        : <?php echo $data ['ipk']?><br>
                                        : <?php echo $data ['ms_studi']?><br>
                                        : <?php echo $data ['prestasi']?><br>
                                        : <?php echo $data ['na']?><br>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" style="height: 45px" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        
                    <button type="button" style="height: 45px" class="btn btn-primary bi bi-plus-square" data-bs-toggle="modal" data-bs-target="#TambahDatapenilaian<?php echo $data['nim']?>">
                        Input Nilai
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="TambahDatapenilaian<?php echo $data['nim']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content text-black">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Penilaian</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label ">Nim</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nim" disabled value="<?php echo $data['nim']?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">IPK</label>
                                        <div class="col-sm-9">
                                            <input type="int" class="form-control" name="ipk" required value="<?php echo $data['ipk']?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Masa Study</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="ms_studi" required>
                                                <option selected><?php echo $data['ms_studi']?></option>
                                                <option value="1 Tahun">1 Tahun</option>
                                                <option value="2 Tahun">2 Tahun</option>
                                                <option value="3 Tahun">3 Tahun</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Prestasi</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="prestasi" required>
                                                <option selected><?php echo $data['prestasi']?></option>
                                                <option value="Internasional">Internasional</option>
                                                <option value="Nasional">Nasional</option>
                                                <option value="Regional">Regional</option>
                                                <option value="Tidak Ada">Tidak Ada</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Tugas Akhir</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="na" required>
                                                <option selected><?php echo $data['na']?></option>
                                                <option value="A">A</option>
                                                <option value="AB">AB</option>
                                                <option value="B">B</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="nim" value="<?php echo $data['nim']?>">
                                    <button type="submit" style="height: 45px" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" style="height: 45px" name="save" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            <?php
                            if(isset($_POST['save'])){
                                include_once "config/dbconnect.php";
                                //Simpan ke database
                                $nim          = $_POST['nim'];
                                $nama         = $_POST['nama'];
                                $ipk          = $_POST['ipk'];
                                $ms_studi     = $_POST['ms_studi'];
                                $prestasi     = $_POST['prestasi'];
                                $na           = $_POST['na'];

                                // Konversi IPK ke nilai sesuai aturan
                                if ($ipk == 4.00) {
                                    $ipk_value = 5;
                                } elseif ($ipk >= 3.80 && $ipk <= 3.99) {
                                    $ipk_value = 4;
                                } elseif ($ipk >= 3.70 && $ipk <= 3.79) {
                                    $ipk_value = 3;
                                } elseif ($ipk >= 3.50 && $ipk <= 3.69) {
                                    $ipk_value = 2;
                                } elseif ($ipk >= 2.76 && $ipk <= 3.49) {
                                    $ipk_value = 1;
                                } else {
                                    // Handle kasus lain jika diperlukan
                                    $ipk_value = 0; // Nilai default jika tidak sesuai aturan
                                }
                                // Konversi masa studi ke nilai sesuai aturan
                                if ($ms_studi == '1 Tahun') {
                                    $ms_studi_value = 5;
                                } elseif ($ms_studi == '2 Tahun') {
                                    $ms_studi_value = 3;
                                } elseif ($ms_studi == '3 Tahun') {
                                    $ms_studi_value = 1;
                                } else {
                                    // Handle kasus lain jika diperlukan
                                    $ms_studi_value = ""; // Nilai default jika tidak sesuai aturan
                                }

                                // Konversi prestasi ke nilai sesuai aturan
                                if ($prestasi == 'Internasional') {
                                    $prestasi_value = 5;
                                } elseif ($prestasi == 'Nasional') {
                                    $prestasi_value = 4;
                                } elseif ($prestasi == 'Regional') {
                                    $prestasi_value = 2;
                                } elseif ($prestasi == 'Tidak Ada') {
                                    $prestasi_value = 1;
                                } else {
                                    // Handle kasus lain jika diperlukan
                                    $prestasi_value = ""; // Nilai default jika tidak sesuai aturan
                                }

                                // Konversi nilai akhir ke nilai sesuai aturan
                                if ($na == 'A') {
                                    $na_value = 5;
                                } elseif ($na == 'AB') {
                                    $na_value = 3;
                                } elseif ($na == 'B') {
                                    $na_value = 2;
                                } else {
                                    // Handle kasus lain jika diperlukan
                                    $na_value = ""; // Nilai default jika tidak sesuai aturan
                                }
                                
                                $sql1 = "UPDATE penilaian SET nim='$nim', ipk='$ipk_value', ms_studi='$ms_studi_value', prestasi='$prestasi_value', na='$na_value' WHERE nim='$nim'";
                                $sql2 = "UPDATE mahasiswa SET nim='$nim', ipk='$ipk', ms_studi='$ms_studi', prestasi='$prestasi', na='$na' WHERE nim='$nim'";
                                $query = $sql1 . ";" . $sql2;
                                if ($conn->multi_query($query) === FALSE) {
                                    trigger_error("Perintah sql manual anda salah: " . $conn->error);
                                } else {
                                    echo "<meta http-equiv='refresh' content=0.1; url=?page=datapenilaian>";
                                }
                            }
                            ?>
                            </div>
                        </div>
                        </div>
                    </td>
                </tr>
                <?php
                    }}
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
</body>
<script type="text/javascript" src="./assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

</html>