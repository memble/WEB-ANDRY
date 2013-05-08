<?php
include "../config/koneksi.php";

const BASE_URL = '/andri';
$user= $_POST['txtusername'];
$password= $_POST['txtpassword'];
$query=mysql_query("select * from login where username='$user' and password='$password'");
$row= mysql_fetch_array($query);

if (count($row) > 0){
    header("location:" . BASE_URL . "/admin/halaman/index.php?halaman=home");	
}
else
{
    echo"<script>alert('USERNAME TIDAK DITEMUKA');</script>";
}
?>