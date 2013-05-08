<?php
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
<li><a href="#">Home</a></li>
          <li><a href="#">Profile</a></li>
          <li><a href="#">Artikel</a></li>
          <li><a href="#">Gallery</a></li>
          <li><a href="#">Tentang</a></li>
       </ul>
     </div>
     <div class="content">
       
         <?php
         
         $query = mysql_query("SELECT * FROM artikel");
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
                    <img src="Style/images/great-billboard.jpg" class="gambar_artikel" width="100" height="" />';
            echo $row['content'];        
            echo '</td></tr></table><br />';
         }
         
         ?>
       
     </div>
     <div class="footer">
     	Tes footer ..
     </div>
</div>
</body>
</html>
