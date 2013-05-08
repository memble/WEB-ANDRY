<?php
include "Koneksi.php";

$user= $_POST['txtusername'];
$password= $_POST['txtpassword'];
$query=mysql_query("select * from login where username='$user' and password='$password'");
$row= mysql_fetch_row($query);
if (count($row) > 0){
//header("location:/test");	

}
else
{
echo"test";
}
?>