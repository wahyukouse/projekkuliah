<?php
ob_start();
include "lib/koneksi.php";
$query = $koneksi->query ("SELECT * FROM pendaftar WHERE no_pendaftaran = '$_GET[cetak]'");

?>
<!DOCTYPE>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="guru/report/style.css">
</head>
<body>
  <page size="A4">
    <table width="100%" border="0">
      <tr>
        <td valign="bottom" width="20%"><img src="img/logokop.png" width="50%"></td>
        <td align="center" width="60%">
          <font size="3">KARTU PESERTA TES<br>
            <font size="2"><b>PENERIMAAN PESERTA DIDIK BARU</b><br>
              <font size="2"><b>SEKOLAH MENENGAH ATAS MUHAMMDIYAH 2 KARANG TENGAH</b><br>
                <font size="2"><b>TAHUN AJRAN </b><br>
                  <font size="1"><i>jl. Raya Belitang Bk 5 Desa Karang Tengah tlp. 0232-xxxxx</i></font>
                </td>
                <td></td>
              </tr>
            </table>
            <hr size="5" color="black"><br>
            <table class="tabel" width="100%">
              <!--DWLayoutTable-->
              <tr align="center">
                <td><strong>NO</strong></td>
                <td><strong>NO PENDAFTARAN</strong></td>
                <td><strong>NAMA</strong></td>
                <td><strong>NISN</strong></td>
                <td><strong>ASAL SMP</strong></td>
                <td><strong>ALAMAT</strong></td>
                <td><strong>TTL</strong></td>
              </tr>
              <?php
              $nomor = 1;
              while($data = mysqli_fetch_array($query)){
                $kode = $data['no_pendaftaran'];
                ?>
                <tr>
                  <td width="38" height="25" valign="middle"><?php echo $nomor; ?></td>
                  <td><?php echo $data['no_pendaftaran']; ?></td>
                  <td><?php echo $data['nama_lengkap']; ?></td>
                  <td><?php echo $data['nisn']; ?></td>
                  <td><?php echo $data['asal_smp']; ?></td>
                  <td><?php echo $data['alamat']; ?></td>
                  <td><?php echo $data['tempat_lahir'] .", ". $data['tgl_lahir']; ?></td>
                </tr>
                <?php
                $nomor++;
              }
              ?>
              <tr>
                <td colspan="7" align="center"><input type="button" onClick="window.print()" value="Print"></td>
              </tr>
            </table>
          </page>
        </body>
        </html>