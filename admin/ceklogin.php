<?php
include "../config/koneksi.php";

const BASE_URL = '/andri';
$user= $_POST['txtusername'];
$password= $_POST['txtpassword'];
$query=mysql_query("select * from login where username='$user' and password='$password'");
$rows=mysql_num_rows($query);
$data= mysql_fetch_array($query);

if ($rows > 0){
    session_start();
        
        $_SESSION['TUGASWEB']=array();
        
        $_SESSION['namauser']     = $data['username'];
        $_SESSION['passuser']     = $data['password'];
        
        $_SESSION['login'] = 1;
        
    header("location:" . BASE_URL . "/admin/halaman/index.php?halaman=home");	
}
else
{
    header("location:" . BASE_URL . "/admin/");
}
?>