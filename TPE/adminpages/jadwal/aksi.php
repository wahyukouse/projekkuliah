<?php 
include "../../lib/config_web.php";
include "../../lib/koneksi.php";

$mapel = $_GET['mapel'];
$query = $koneksi->query("SELECT nama_lengkap,nip FROM guru WHERE id_mapel='$mapel' order by nama_lengkap");
echo "<option value='0'>-Pilih Guru Pengajar-</option>";
while($data = mysqli_fetch_array($query)){
?>
<option value="<?php echo $data['nip']; ?>"><?php echo $data['nama_lengkap']; ?></option>
<?php } ?>