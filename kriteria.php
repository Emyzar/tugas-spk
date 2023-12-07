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
            <!-- Button Tambah Data -->
            <button type="button" style="height: 45px" class="btn btn-primary bi bi-plus-square" data-bs-toggle="modal" data-bs-target="#TambahDatakriteria">
            Tambah Data
            </button>
            <!-- Modal -->
            <div class="modal fade" id="TambahDatakriteria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Kriteria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label ">Kode</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="kode" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Kriteria</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="kriteria" required>
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
                    $kode          = $_POST['kode'];
                    $kriteria      = $_POST['kriteria'];
                    
                    $sql = "INSERT INTO kriteria (kode,kriteria) 
                    VALUES ('$kode','$kriteria')";
                    if($conn->query ($sql) === false) {
                        trigger_error("Perintah sql manual anda salah");
                    }else{
                        
                        echo"<meta http-equiv='refresh' content=0.1; url=?page=datakriteria>";
                    }
                }
                ?>
                </div>
            </div>
            </div>
            <table class="table table-dark" id="example">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Kode</th>
                        <th class="text-center">Kriteria</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include_once "config/dbconnect.php";
                    if(isset($_GET['hapus'])){
                        $id=$_GET['hapus'];
                        if(!empty($id)){
                            $sqlhapus="DELETE FROM `kriteria` WHERE id ='$id'";

                            if($conn->query($sqlhapus) === false){
                                trigger_error("Perintah sql manual anda salah");
                            
                            }else{
                                //echo"<meta http-equiv='refresh' content=0.1; url=?page=datakriteria;
                            }
                        }
                    }
                    $no=0;
                    $sql= "SELECT * FROM kriteria order by id ASC";
                    $result = $conn->query($sql);
                    if($result == false) {
                        trigger_error("Perintah sql manual anda salah");
                    }else{
                        while($data = $result -> fetch_array()){
                            $no++;       
                ?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $data['kode']?></td>
                    <td><?php echo $data['kriteria']?></td>
                    <td>
                    <!-- Button trigger edit -->
                            <button type="button" style="height: 45px" class="btn btn-secondary bi bi-pencil" data-bs-toggle="modal" data-bs-target="#EditDatakriteria<?php echo $data['id']?>">
                            Edit
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="EditDatakriteria<?php echo $data['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content text-black">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data kriteria</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" align="justify">
                                <form action="" method="POST">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label ">Kode</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="kode" required value="<?php echo $data['kode']?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Kriteria</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="kriteria" required value="<?php echo $data['kriteria']?>">
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
                                        $kode          = $_POST['kode'];
                                        $kriteria      = $_POST['kriteria'];

                                        $sql = "UPDATE kriteria SET kode='$kode',kriteria='$kriteria' WHERE id='$id'";
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
