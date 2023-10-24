<?php if ($_GET['nama_player']) : ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

<div class="container-fluid px-5 pt-5">
<a class="btn btn-info btn-sm absensi mb-2" href="?page=data_player"><i class="fas fa-angle-left "></i> Kembali</a>
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
                <!-- <?php $no = 1;
                foreach (mysqli_query($koneksi, "SELECT * FROM absen WHERE nama_pegawai = '" .$_GET['nama_pegawai']. "' AND no %2 <> 0") as $tabel_absen) : ?> -->
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
                    <tr>
                        <th scope="row">Game Penyerbuan Gudang Don Bosco</th>
                        <td>00:05:00</td>
                        <td>00:10:00</td>
                        <td>85</td>
                        <td>99</td>
                        <td>
                            <a class="btn btn-outline-primary" ><i class="fas fa-pencil-alt"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Game Pertempuran 10 November 1945</th>
                        <td>00:02:00</td>
                        <td>00:20:00</td>
                        <td>88</td>
                        <td>100</td>
                        <td>
                            <a class="btn btn-outline-primary" ><i class="fas fa-pencil-alt"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Game Pertempuran Tiga Hari Surabaya</th>
                        <td>00:15:00</td>
                        <td>00:30:00</td>
                        <td>89</td>
                        <td>95</td>
                        <td>
                            <a class="btn btn-outline-primary" ><i class="fas fa-pencil-alt"></i>
                            </a>
                        </td>
                    </tr>
                        <!-- <th scope="row"><?= $no ?></th>
                        <td><?php $tanggal = explode(' ', $tabel_absen['date_time']);
                        echo $tanggal[0];
                        ?></td>
                        <td><?php if($tabel_absen['date_time'] == 0){
                            echo "Tidak Hadir";
                        }else if($tabel_absen['date_time'] != 0){
                            echo "Hadir";
                        } ?></td>
                        <td><?php 
                        $masuk = explode(' ', $tabel_absen['date_time']);
                        $tanggalmasuk = $masuk[0];
                        $jammasuk = $masuk[1];
                        echo $jammasuk;
                        ?></td>
                        <td><?php 
                        $pulangsql = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM absen WHERE date_time LIKE '$tanggalmasuk%' ORDER BY no DESC LIMIT 1"));
                        $pulang = explode(' ', $pulangsql['date_time']);
                        $tanggalpulang = $pulang[0];
                        $jampulang = $pulang[1];
                        echo $jampulang;
                        ?></td>
                        <td>
                            <a class="btn btn-outline-primary editabsen" data-nama="<?= $tabel_absen['nama_pegawai'] ?>" data-id="<?= $tabel_absen['no'] ?>" data-tanggal="<?= $tanggalmasuk ?>" data-absen="<?= $tabel_absen['verify_code'] ?>" data-masuk="<?= $jammasuk ?>" data-pulang="<?= $jampulang ?>" href="javascript:void(0)">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </td> -->
                    <!-- </tr> -->
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