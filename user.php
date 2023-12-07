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
        <div id="main-content" class="container allcontent-section py-4">
        <div>
            <center><h1>Data Kriteria</h1></center>
            <table class="table table-dark" id="example">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Hak Akses</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include_once "config/dbconnect.php";
                    if(isset($_GET['hapus'])){
                        $id=$_GET['hapus'];
                        if(!empty($id)){
                            $sqlhapus="DELETE FROM user WHERE id ='$id'";

                            if($conn->query($sqlhapus) === false){
                                trigger_error("Perintah sql manual anda salah");
                            
                            }else{
                                //echo"<meta http-equiv='refresh' content=0.1; url=?page=datakriteria;
                            }
                        }
                    }
                    $no=0;
                    $sql= "SELECT * FROM user order by id ASC";
                    $result = $conn->query($sql);
                    if($result == false) {
                        trigger_error("Perintah sql manual anda salah");
                    }else{
                        while($data = $result -> fetch_array()){
                            $no++;       
                ?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $data['nama']?></td>
                    <td><?php echo $data['email']?></td>
                    <td><?php echo $data['hak_akses']?></td>
                    <td>
                        <!-- Button trigger detail -->
                        <button type="button" style="height: 45px" class="btn btn-primary bi bi-search" data-bs-toggle="modal" data-bs-target="#DetailDatamahasiswa<?php echo $data['id']?>">
                        Detail
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="DetailDatamahasiswa<?php echo $data['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content text-black">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 bi bi-list-task" id="exampleModalLabel">Detail Data mahasiswa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" align="justify">
                                <div class="row">
                                    <div class="col-sm-4">
                                        Nama<br>
                                        Email<br>
                                        Password<br>
                                        Hak Akses<br>
                                    </div>
                                    <div class="col-sm-8">
                                        : <?php echo $data ['nama']?><br>
                                        : <?php echo $data ['email']?><br>
                                        : <?php echo $data ['password']?><br>
                                        : <?php echo $data ['hak_akses']?><br>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" style="height: 45px" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    <!-- Button trigger edit -->
                            <button type="button" style="height: 45px" class="btn btn-secondary bi bi-pencil" data-bs-toggle="modal" data-bs-target="#EditDatakriteria<?php echo $data['id']?>">
                            Edit
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="EditDatakriteria<?php echo $data['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                <div class="modal-content text-black">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data kriteria</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" align="justify">
                                <form action="" method="POST">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label ">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama" required value="<?php echo $data['nama']?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="email" required value="<?php echo $data['email']?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="password" required value="<?php echo $data['password']?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Hak Akses</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="hak_akses" required>
                                                <option selected>Pilih Hak Akses</option>
                                                <option value="admin">Admin</option>
                                                <option value="mahasiswa">Mahasiswa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="id" value="<?php echo $data['id']?>">
                                    <button type="submit" style="height: 45px" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" style="height: 45px" name="update" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                                <?php
                                    if(isset($_POST['update'])){
                                        include_once "config/dbconnect.php";
                                        //update ke database
                                        $id           = $_POST['id'];
                                        $nama          = $_POST['nama'];
                                        $email      = $_POST['email'];
                                        $password      = $_POST['password'];
                                        $hak_akses     = $_POST['hak_akses'];

                                        $sql = "UPDATE user SET nama='$nama',email='$email',password='$password',hak_akses='$hak_akses' WHERE id='$id'";
                                        if($conn->query($sql) === false ){
                                            trigger_error("Perintah sql manual anda salah");
                                        
                                        }else{
                                            echo "<meta http-equiv='refresh' content=0.1; url=?page=datakriteria";
                                            
                                        }
                                    }
                                ?>
                                </div>
                                </div>
                            </div>
                            </div>
                            <button type="button" style="height: 45px" class="btn btn-success bi bi-trash" data-bs-toggle="modal" data-bs-target="#hapusDatakriteria<?php echo $data['id']?>">
                            Hapus
                            </button>
                            <div class="modal fade" id="hapusDatakriteria<?php echo $data['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <a href="?page=datakriteria&hapus=<?php echo $data['id']?>" type="button" style="height: 45px" class="btn btn-primary">Ya</a>
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