<?php
session_start();

include "../lib/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];


$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
$data = mysqli_fetch_array($query);
$jml_data = mysqli_num_rows($query);


if($jml_data==1){
$_SESSION['username']=$data['username'];
header('Location: home/main.php');
} else {
header('Location: index.php');
}




?>