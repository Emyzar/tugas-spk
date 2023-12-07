<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "aplikasi-spk";
$conn = mysqli_connect($host, $user, $password, $dbname);

if(!$conn){
    die("error in connection");
}
