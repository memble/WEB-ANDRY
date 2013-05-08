<?php
	$host		= "localhost";
	$user		= "root";
	$password	= "";
	$database	= "cybercrime";
	
	$conn		= mysql_connect($host, $user, $password);
	$bool 		= mysql_select_db($database, $conn);
	if ($bool == false){
		print "database $database tidak ditemukan";
	}

?>