<?php
  session_start();
  unset($_SESSION['username']);
  echo "<script>alert('Anda telah keluar dari halaman administrator'); window.location = 'index.php'</script>";

?>