<?php 

$aksi = $_GET['aksi'];
$idartikel = $_GET['idartikel'];
$query = mysql_query("SELECT * FROM artikel");
$tgl_sekarang = date("Ymd");

if (empty($aksi)) {
	$no = 1;
	echo "<h3>List Artikel</h3>
		  <input type='button' value='Tambah Artikel' class='tambah' onClick=location.href='index.php?halaman=artikel&aksi=input' />
		  <table>
		  	<tr><th>No</th>
			<th>Judul Artikel</th>
			<th>Tanggal Posting</th>
			<th>Aksi</th></tr>
		 ";
		 
	while($row = mysql_fetch_array($query)) {
		if (count($row) > 0 ) {
			echo "<tr>
					<td>$no</td>
					<td>$row[judul_artikel]</td>
					<td>$row[tgl_posting]</td>
					<td><a href='index.php?halaman=artikel&aksi=edit&idartikel=$row[id_artikel]'>Edit</a> | <a href='index.php?halaman=artikel&aksi=delete&idartikel=$row[id_artikel]'>Delete</a></td>
				  </tr>
				 ";	
			
			$no++;
		}
	}
	
	echo "</table>";
	
} else {
	switch($aksi) {	
		
		case 'input':
			
			if (! empty($_POST['txtjudul'])) {
				mysql_query("INSERT INTO `cybercrime`.`artikel` (`judul_artikel` ,`tgl_posting` ,`content`)
							 VALUES('$_POST[txtjudul]','$tgl_sekarang','$_POST[txtisi]')
								");
                                header('location:index.php?halaman=artikel');
			}
			
			echo '<h3> Buat Artikel Baru </h3>
				  <form method="post" action="index.php?halaman=artikel&aksi=input">
				  <table>
				  	<tr>
						<td>Judul Artikel</td>
						<td>:</td>
						<td><input type="textbox" name="txtjudul" size=40 /></td>
					</tr>
					<tr>
						<td>Gambar</td>
						<td>:</td>
						<td><input type="file" name="gambar_artikel" size=40 /></td>
					</tr>
					<tr>
						<td>Isi Artikel</td>
						<td>:</td>
						<td><textarea name="txtisi" cols="45" rows="10"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td><input type="submit" name="simpan" value="Simpan" /><input type="button" name="Batal" value="Batal" onClick=self.history.back() /></td>
					</tr>
				  </table>
				  </form>
				 ';
		break;
		
		case 'edit':
			
                        if (! empty($_POST['txtjudul'])) {
				mysql_query("UPDATE `cybercrime`.`artikel` SET `content` = '$_POST[txtisi]',judul_artikel= '$_POST[txtjudul]' WHERE `artikel`.`id_artikel` = '$_POST[idartikel]';");
                                header('location:index.php?halaman=artikel');
			}
                        
			if (! empty($idartikel)) {
				
				$query_edit = mysql_query("SELECT * FROM artikel WHERE id_artikel = '$idartikel'");
				$row = mysql_fetch_array($query_edit);
				
				if (count($row) > 0) { 
					echo "<h3> Edit Artikel </h3>
                                                  <form method='post' enctype='multipart/form-data' action='index.php?halaman=artikel&aksi=edit'>
						  <table>
							<input type='hidden' name='idartikel' value='$row[id_artikel]' />
							<tr>
								<td>Judul Artikel</td>
								<td>:</td>
								<td><input type='textbox' name='txtjudul' size=40 value='$row[judul_artikel]' /></td>
							</tr>
							<tr>
								<td>Gambar</td>
								<td>:</td>
								<td><input type='file' name='gambar_artikel' size=40 /></td>
							</tr>
							<tr>
								<td>Isi Artikel</td>
								<td>:</td>
								<td><textarea name='txtisi' cols='45' rows='10'>$row[content]</textarea></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><input type='submit' value='Update' /><input type='button' name='Batal' value='Batal' onClick=self.history.back() /></td>
							</tr>
						  </table>
                                                  </form>
						 ";
				} else {
					echo 'artikel tidak ditemukan';	
				}
			}
			
		break;
		
		case 'delete':
			
			if (! empty($idartikel)) {
				mysql_query("DELETE FROM artikel WHERE id_artikel = '$idartikel'");	
				header('location:index.php?halaman=artikel');
			}
			
		break;
	}
}
?>