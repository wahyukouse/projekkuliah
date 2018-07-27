<?php 
session_start();

include "lib/koneksi.php";

$id = $_POST['id'];
$password = $_POST['password'];
$status = $_POST['status'];
if ($status == 'siswa') {
  $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$id' AND password='$password'");
  $data = mysqli_fetch_array($query);
  $jml_data = mysqli_num_rows($query);


  if($jml_data==1){
    $_SESSION['nisn']=$data['nisn'];
    header('Location: siswa/home/main.php');
  } else {
    header('Location: index.php');
  }
}
elseif ($status == 'guru') {
  $query = mysqli_query($koneksi, "SELECT * FROM guru WHERE nip='$id' AND password='$password'");
  $data = mysqli_fetch_array($query);
  $jml_data = mysqli_num_rows($query);


  if($jml_data==1){
    $_SESSION['nip']=$data['nip'];
    header('Location: guru/home/main.php');
  } else {
    header('Location: index.php');
  }
}





?>