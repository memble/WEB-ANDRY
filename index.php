<?php
const BASE_URL = '/andri';
include 'config/koneksi.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>homepage</title>
<link rel="stylesheet" href="Style/stylesheet.css" />
</head>

<body>
<div class="container">
<div class="header"></div>
     <div class="sidebar1">
   	   <ul class="nav">
<li><a href="index.php">Home</a></li>
          <li><a href="#">Profile</a></li>
          <li><a href="?cari=semua">Artikel</a></li>
          <li><a href="#">Gallery</a></li>
          <li><a href="#">Tentang</a></li>
       </ul>
     </div>
     <div class="content">
       
         <?php
         error_reporting(0);
         $cari = $_GET['cari'];
         $kode = $_GET['kode'];
         
         $query = mysql_query("SELECT * FROM artikel");
         if (empty($cari) || $cari == "semua") {
            while($row = mysql_fetch_array($query)) {
                echo '<table width="580" border="0" align="center">
                    <tr>
                        <td width="574">Tanggal Posting : ' . $row['tgl_posting'] . '</td>
                    </tr>
                    <tr>
                        <td><h3>' . $row['judul_artikel'] . '</h3></td>
                    </tr>
                    <tr>
                        <td>
                        <img src="' . BASE_URL . '/admin/style/images/upload/kecil/' . $row['gambar'] . '" class="gambar_artikel" width="100" height="" />';
                echo " " . substr($row['content'], 0,100) . "... <a href='?cari=artikel&kode=$row[id_artikel]'>[baca >>]</a>";
                echo '</td></tr></table><br />';
            }
         } 
         elseif ($cari == "artikel" && !empty ($kode)) {
             $query_cari = mysql_query("SELECT * FROM artikel WHERE id_artikel = '$kode'");
             $row = mysql_num_rows($query_cari);
             $data = mysql_fetch_array($query_cari);
             
             if ($row > 0) {
                 echo '<table width="580" border="0" align="center">
                    <tr>
                        <td width="574">Tanggal Posting : ' . $data['tgl_posting'] . '</td>
                    </tr>
                    <tr>
                        <td><h3>' . $data['judul_artikel'] . '</h3></td>
                    </tr>
                    <tr>
                        <td>
                        <img src="' . BASE_URL . '/admin/style/images/upload/sedang/' . $data['gambar'] . '" class="gambar_artikel" />';
                echo $data['content'];
                echo '</td></tr></table><br />';
             }
             
         } else {
             echo "<script>alert('halaman yang anda minta tidak ada');</script>";
         }
         ?>
       
     </div>
     <div class="footer">
     	Tes footer ..
     </div>
</div>
</body>
</html>
