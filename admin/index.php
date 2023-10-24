<?php
	include '../koneksi.php';
	include 'components/session.php';
	$data_join = mysqli_query($koneksi, "SELECT * FROM login");
	$data = mysqli_fetch_array($data_join);
	date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'components/style.php'; ?>
	<?php include 'components/script.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<?php include 'components/navbar.php'; ?>
	<?php include 'components/menu.php'; ?>
	<div class="content-wrapper">
		<?php
		if (isset($_GET['page'])) {
			if ($_GET['page'] == "dashboard") {
				include 'content.php';
			} else if ($_GET['page'] == "dashboard_game") {
				include 'dashboard_game.php';
			} else if ($_GET['page'] == "data_player") {
				include 'data_player.php';
			} else if ($_GET['page'] == "data_user") {
				include 'data_user.php';
			} else if ($_GET['page'] == "data_player") {
				include 'data_player.php';
			} else if ($_GET['page'] == "detail_player") {
				include 'detail_player.php';
			} else if ($_GET['page'] == "doughnut_chart") {
				include './components/doughnut_chart.php';
			} else if ($_GET['page'] == "detail_player") {
				include './components/detail_player.php';
			}
		} else {
			session_destroy();
			header("location: ../index.php");
		}
		?>
	</div>
	<?php include 'components/footer.php'; ?>
</body>
</html>