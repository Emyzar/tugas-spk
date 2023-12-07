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
        <div id="main-content" class="container allcontent-section py-4 ">
        
            <center><h1>Data mahasiswa</h1></center>
            <!-- Button Tambah Data -->
            <?php if($_SESSION['hak_akses'] == 'admin'){?>
            <button type="button" style="height: 45px" class="btn btn-primary bi bi-plus-square" data-bs-toggle="modal" data-bs-target="#TambahDatamahasiswa">
            Tambah Data
            </button>
            <?php } ?>
            <!-- Modal -->
            <div class="modal fade" id="TambahDatamahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data mahasiswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label ">Nim</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nim" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="int" class="form-control" name="tempat_lahir" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tgl_lahir" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Tahun Masuk</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="tahun_masuk" required>
                                    <option selected>Pilih Tahun Masuk</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" style="height: 45px" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" style="height: 45px" name="save" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <?php
                if(isset($_POST['save'])){
                    include_once "config/dbconnect.php";
                    //Simpan ke database
                    $nim           = $_POST['nim'];
                    $nama          = $_POST['nama'];
                    $tgl_lahir     = $_POST['tgl_lahir'];
                    $tempat_lahir  = $_POST['tempat_lahir'];
                    $tahun_masuk   = $_POST['tahun_masuk'];
                    
                    $sql1 = "INSERT INTO mahasiswa (nim,nama, tgl_lahir, tempat_lahir, tahun_masuk) 
                    VALUES ('$nim','$nama','$tgl_lahir','$tempat_lahir','$tahun_masuk')";
                    $sql2 = "INSERT INTO penilaian (nim,nama) VALUES ('$nim','$nama')";
                    $query = $sql1 . ";" . $sql2; // Concatenate SQL statements with a semicolon

                    // Execute the first query
                    if ($conn->query($sql1) === FALSE) {
                        trigger_error("Perintah sql manual anda salah: " . $conn->error);
                    } else {
                        // Free the result set
                        $conn->next_result();
                        
                        // Execute the second query
                        if ($conn->query($sql2) === FALSE) {
                            trigger_error("Perintah sql manual anda salah: " . $conn->error);
                        } else {
                            // Success, you can proceed
                            // echo "<meta http-equiv='refresh' content=0.1; url=?page=datapenilaian>";
                        }
                    }
                }
                ?>
                </div>
            </div>
            </div>
            <table class="table table-dark " id="example">
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
                    if(isset($_GET['hapus'])){
                        $nim=$_GET['hapus'];
                        if(!empty($nim)){
                            $sqlhapus="DELETE FROM `mahasiswa` WHERE nim ='$nim'";

                            if($conn->query($sqlhapus) === false){
                                trigger_error("Perintah sql manual anda salah");
                            
                            }else{
                                //echo"<meta http-equiv='refresh' content=0.1; url=?page=datamahasiswa;
                            }
                        }
                    }
                    $no=0;
                    $sql= "SELECT * FROM mahasiswa order by nim ASC";
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
                        <button type="button" style="height: 45px" class="btn btn-primary bi bi-search" data-bs-toggle="modal" data-bs-target="#DetailDatamahasiswa<?php echo $data['nim']?>">
                        Detail
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="DetailDatamahasiswa<?php echo $data['nim']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
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
                                    </div>
                                    <div class="col-sm-8">
                                        : <?php echo $data ['nim']?><br>
                                        : <?php echo $data ['nama']?><br>
                                        : <?php echo $data ['tgl_lahir']?><br>
                                        : <?php echo $data ['tempat_lahir']?><br>
                                        : <?php echo $data ['tahun_masuk']?><br>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" style="height: 45px" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        <?php if($_SESSION['hak_akses'] == 'admin'){?>
                    <!-- Button trigger edit -->
                            <button type="button" style="height: 45px" class="btn btn-secondary bi bi-pencil" data-bs-toggle="modal" data-bs-target="#EditDatamahasiswa<?php echo $data['nim']?>">
                            Edit
                            </button>
                        <?php } ?>
                            <!-- Modal -->
                            <div class="modal fade" id="EditDatamahasiswa<?php echo $data['nim']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                <div class="modal-content text-black">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data mahasiswa</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" align="justify">
                                <form action="" method="POST">
                                            <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label ">Nim</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nim" required value="<?php echo $data['nim']?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama" required value="<?php echo $data['nama']?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-9">
                                            <input type="int" class="form-control" name="tempat_lahir" required value="<?php echo $data['tempat_lahir']?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="tgl_lahir" required value="<?php echo $data['tgl_lahir']?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Tahun Masuk</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="tahun_masuk" required>
                                                <option selected><?php echo $data['tahun_masuk']?></option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="nim" value="<?php echo $data['nim']?>">
                                    <button type="submit" style="height: 45px" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" style="height: 45px" name="update" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                                <?php
                                    if(isset($_POST['update'])){
                                        include_once "config/dbconnect.php";
                                        //update ke database
                                        $nim           = $_POST['nim'];
                                        $nama          = $_POST['nama'];
                                        $tgl_lahir     = $_POST['tgl_lahir'];
                                        $tempat_lahir  = $_POST['tempat_lahir'];
                                        $tahun_masuk   = $_POST['tahun_masuk'];

                                        $sql = "UPDATE mahasiswa SET nim='$nim',nama='$nama',tgl_lahir='$tgl_lahir',tempat_lahir='$tempat_lahir',tahun_masuk='$tahun_masuk' WHERE nim='$nim'";
                                        if($conn->query($sql) === false ){
                                            trigger_error("Perintah sql manual anda salah");
                                        
                                        }else{
                                            echo "<meta http-equiv='refresh' content=0.1; url=?page=datamahasiswa";
                                            
                                        }
                                    }
                                ?>
                                </div>
                                </div>
                            </div>
                            </div>
                            <?php if($_SESSION['hak_akses'] == 'admin'){?>
                            <button type="button" style="height: 45px" class="btn btn-success bi bi-trash" data-bs-toggle="modal" data-bs-target="#hapusDatamahasiswa<?php echo $data['nim']?>">
                            Hapus
                            </button>
                            <?php } ?>
                            <div class="modal fade" id="hapusDatamahasiswa<?php echo $data['nim']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-content text-black">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Hapus Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda Yakin ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" style="height: 45px" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                        <a href="?page=datamahasiswa&hapus=<?php echo $data['nim']?>" type="button" style="height: 45px" class="btn btn-primary">Ya</a>
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
