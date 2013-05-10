<?php
session_start();
error_reporting(0);
if($_SESSION[login]==0){
  header('location:logout.php');
} else {
    if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
        echo "<link href='style.css' rel='stylesheet' type='text/css'>
        <center>Untuk mengakses halaman, Anda harus login <br>";
        echo "<a href=index.php><b>LOGIN</b></a></center>";
    } else {
        ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Admin Page</title>
<link rel="stylesheet" type="text/css" href="../Style/css/stylesheet.css" />
</head>

<body>
<div class="container">
<div class="header">
<h1>Admin Page</h1>
</div>
<div class="sidebar1">
	<ul class="nav">
    	<li><a href="index.php?halaman=home">Home</a></li>
        <li><a href="index.php?halaman=artikel">Artikel</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>
<div class="content"><?php include 'halaman.php'; ?></div>
<div class="footer">Test footer</div>
</div>
</body>
</html>
<?php
}
}
?>