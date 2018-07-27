<?php
  session_start();
  unset($_SESSION['nisn']);
  echo "<script>alert('Anda telah keluar dari halaman siswa'); window.location = '../index.php'</script>";

?>