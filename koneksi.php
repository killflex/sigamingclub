<?php 
	// $koneksi = mysqli_connect("localhost","root","","penggajian");
	$koneksi = mysqli_connect("localhost","root","","sinurulhuda");
	
	// Check connection
	if (mysqli_connect_errno()){
		echo "Koneksi database gagal : " . mysqli_connect_error();
	}
?>