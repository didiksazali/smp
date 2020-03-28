<?php
// Tentukan folder file yang boleh di download
$folder = "../images/kk/";
// Lalu cek menggunakan fungsi file_exist
if (!file_exists($folder.$_GET['kk'])) {
  echo "<h1>Access forbidden!</h1>
      <p> Anda tidak diperbolehkan mendownload file ini.</p>";
  exit;
}

// Apabila mendownload file di folder files
else {
  $kk = $_GET['kk'];
  header("Content-Type: octet/stream");
  header("Content-Disposition: attachment;filename=$Koding");
//  $fp = fopen($folder.$_GET['kk'], "r");
//  $data = fread($fp, filesize($folder.$_GET['kk']));
//  fclose($fp);
//  print $data;
}
?>
