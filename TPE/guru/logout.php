<?php
  session_start();
  unset($_SESSION['nip']);
  echo "<script>alert('Anda telah keluar dari halaman guru'); window.location = '../index.php'</script>";

?>