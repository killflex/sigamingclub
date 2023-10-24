<?php
	// mengaktifkan session php
	session_start();

	// menghubungkan dengan koneksi
	include 'koneksi.php';

	// menangkap data yang dikirim dari form
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	// menyeleksi data user dengan username dan password yang sesuai
	$data = mysqli_query($koneksi,"SELECT * FROM login WHERE username='$username' and password='$password'");

	// menghitung jumlah data yang ditemukan
	$cek = mysqli_num_rows($data);

	// cek apakah username dan password di temukan pada database
	if($cek > 0){
		$coba = mysqli_fetch_assoc($data);
		
		// cek jika user login sebagai admin
		if($coba['role']=="admin"){
			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['nama_user'] = $coba['nama_user'];
			$_SESSION['id_user'] = $coba["id_user"];
			$_SESSION['role'] = "admin";
			$_SESSION['status'] = "login";
			// alihkan ke halaman dashboard admin
			header("location:admin/?page=dashboard");

		}else if($coba['role']=="guru"){
			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['nama_user'] = $coba['nama_user'];
			$_SESSION['id_user'] = $coba["id_user"];
			$_SESSION['role'] = "guru";
			$_SESSION['status'] = "login";
			// alihkan ke halaman dashboard guru
			header("location:guru/?page=dashboard");
			
		}else{
			// alihkan ke halaman login kembali
			header("location:index.php");
		}
	}else{
		header("location:index.php");
	}
?>
