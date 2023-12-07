<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/style-login.css">
    <title>Aplikasi SPK</title>
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="" method="POST">
			<h1>Register</h1>
			<input type="text" placeholder="Name" name="nama"/>
			<input type="email" placeholder="Email" name="email"/>
			<input type="password" placeholder="Password" name="password"/>
			<button type="submit" style="height: 45px" name="save">Daftar</button>
		</form>
        <?php
                if(isset($_POST['save'])){
                    include_once "config/dbconnect.php";
                    //Simpan ke database
                    $nama            = $_POST['nama'];
                    $email         = $_POST['email'];
                    $password      = $_POST['password'];
                    
                    $sql = "INSERT INTO `user`(`nama`, `email`, `password`, `hak_akses`) VALUES ('$nama', '$email', '$password', 'mahasiswa')";
                    if ($conn->query($sql) === FALSE) {
                        trigger_error("Perintah sql manual anda salah: " . $conn->error);
                    } else {
                        echo "<meta http-equiv='refresh' content=0.1; url=?page=index>";
                    }
                    
                }
?>
	</div>
	<div class="form-container sign-in-container">
		<form action="cek-login.php" method="POST">
			<h1>Login</h1>
			<input type="email" placeholder="Email" name="email"/>
			<input type="password" placeholder="Password" name="password"/>
			<button>Masuk</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Masuk</button>
			</div>
			<div class="overlay-panel overlay-right">
				background: black;
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Daftar</button>
			</div>
		</div>
	</div>
</div> 
<script type="text/javascript" src="asset/js/style-login.js"></script>
</body>
</html>
