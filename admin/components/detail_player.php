<?php if ($_GET['nama_pegawai']) : ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

<div class="container-fluid px-5 pt-5">
<!-- <a class="btn btn-info btn-xs absensi mb-2" href="?page=data_absensi"><i class="fas fa-angle-left "></i> Kembali</a> -->
<div class="card">
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered mt-4" id="mytable">
            <thead>
                <tr>
                    <th scope="col">Judul Game</th>
                    <th scope="col">Rata-Rata Waktu Bermain</th>
                    <th scope="col">Waktu Bermain Terlama</th>
                    <th scope="col">Rata-Rata Score</th>
                    <th scope="col">Score Tertinggi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach (mysqli_query($koneksi, "SELECT * FROM absen WHERE nama_pegawai = '" .$_GET['nama_pegawai']. "' AND no %2 <> 0") as $tabel_absen) : ?>
                    <tr>
                        <th scope="row">Game Perobekan Bendera Belanda</th>
                        <td>00:10:00</td>
                        <td>00:30:00</td>
                        <td>82</td>
                        <td>98</td>
                        <td>
                            <a class="btn btn-outline-primary" ><i class="fas fa-pencil-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
    </div>
</div>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#mytable').DataTable({
            lengthMenu:[
                [5,10,25,50,-1],
                [5,10,25,50,"All"]
            ]
        });
} );
</script>

<?php include "components/modal/modal_edit_absen.php"; ?>

<?php
else :
    session_destroy();
    header("location: ../../index.php");
endif;
?>