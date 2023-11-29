<?php if ($_GET['id_player'] && $_GET['id_game']) : ?>

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
                    <th scope="col">Waktu Bermain</th>
                    <th scope="col">Quest Terakhir</th>
                    <th scope="col">Status Quest</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $idgame = 1;
                    $query = "SELECT * FROM log_game lg 
                            INNER JOIN games ga ON ga.id_game=lg.id_game
                            INNER JOIN log_game_event lge ON lg.id_log=lge.id_log 
                            WHERE lg.id_player=".$_GET['id_player']." AND lg.id_game=".$_GET['id_player']." ORDER BY lg.id_log DESC LIMIT 1;";
                    $result = mysqli_query($koneksi, $query);
                    while (($dtl_player = mysqli_fetch_array($result)) && ($idgame < 5)) {
                ?>
                    <tr>
                        <th scope="row"><?= $dtl_player['nama_game'] ?></th>
                        <td>
                            <?php 
                                $waktu_mulai = $dtl_player['waktu_mulai'];
                                $waktu_entry = $dtl_player['waktu_entry'];
                                $time_mulai = DateTime::createFromFormat('Y-m-d H:i:s',  $waktu_mulai)->format('i');
                                $time_entry = DateTime::createFromFormat('Y-m-d H:i:s',  $waktu_entry)->format('i');
                                $total_waktu = abs($time_mulai - $time_entry);
                                $avg_time = $total_waktu;
                                echo $avg_time;
                            ?> Menit
                        </td>
                        <td><?= $dtl_player['no_event'] ?></td>
                        <td><?= $dtl_player['status_event'] ?></td>
                    </tr>
                <?php
                    $idgame++;
                    }
                ?>
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

<?php
else :
    session_destroy();
    header("location: ../../index.php");
endif;
?>