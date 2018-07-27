<?php
session_start();
ob_start();
include "lib/koneksi.php"; //buat koneksi ke database
$kode   = $_GET['kode']; //kode berita yang akan dikonvert
$query = $koneksi->query ("SELECT * FROM pendaftar WHERE no_pendaftaran='".$kode."'");
$data   = mysqli_fetch_array($query);

?>
<head>
  <title>Kartu Pendaftaran SMA Muhammadiyah 2 Karang Tengah</title>
</head>
<body>
  <?php
  echo '<table border="0" width="100%">
  <tr>
  <td width="20%" valign="bottom"><img src="img/logokop.png" width="75"></td>
  <td width="60%" align="center">
  <font size="7">KARTU PESERTA TES<br></font>
  <font size="6"><b>PENERIMAAN PESERTA DIDIK BARU</b><br></font>
  <font size="6"><b>SEKOLAH MENENGAH ATAS MUHAMMDIYAH 2 KARANG TENGAH</b><br></font>
  <font size="3"><i>jl. Raya Belitang Bk 5 Desa Karang Tengah tlp. 0232-xxxxx</i></font>
  </td>
  <td width="20%"><img src="img/okut.png" width="75"></td>
  </tr>
  <tr><td colspan="3" valign="top" width="100%"><hr size="5" color="black"></td></tr>
  </table>
  ';
  echo '<table border="0">
  <tr>
  <td width="100">Nama</td>
  <td width="10">:</td>
  <td width="250">'.$data['nama_lengkap'].'</td>
  </tr>
  <tr>
  <td>Tempat,Tanggal Lahir</td>
  <td>:</td>
  <td>'.$data['tempat_lahir'] .", ". $data['tgl_lahir'].'</td>
  </tr>
  <tr>
  <td>Nomor Induk Siswa</td>
  <td>:</td>
  <td>'.$data['nisn'].'</td>
  </tr>
  <tr>
  <td>Asal SMP</td>
  <td>:</td>
  <td>'.$data['asal_smp'].'</td>
  </tr>
  </table>
  <table style="border: 1px solid black; text-align: center;">
  <tr>
  <td width="113" height="151">Foto 3x4</td>
  </tr>
  </table>';
  ?>
</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$html = ob_get_contents(); 
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(30, 0, 20, 0));
$pdf->WriteHTML($html);
ob_end_clean();
$pdf->Output('Kartu-Pendaftaran-'.$kode.'.pdf');
?>