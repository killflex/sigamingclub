<?php 
	// mengaktifkan session
	session_start();

	// menghapus semua session
	session_destroy();
	header("location:index.php?pesan=logout");
?>