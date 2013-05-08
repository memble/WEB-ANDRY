<?php
error_reporting(0);
include '../../config/koneksi.php';

$halaman = $_GET['halaman'];

if($halaman == 'home') {
	echo 'Selamat datang [] di Halman Administrator !!';
}
elseif($halaman == 'artikel') {
	include '/artikel/index.php';
} else {
	echo "<script>alert('halaman tidak ada');</script>";	
}
?>