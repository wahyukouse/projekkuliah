<?php

if(isset($_GET['nama'])){
	$file = $back_dir.$_GET['nama'];
	
	if (file_exists($file))
	{
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: private');
		header('Pragma: private');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		exit;

	} 
	else 
	{
		echo "file {$_GET['nama']} sudah tidak ada.";
	}
	
}
?>