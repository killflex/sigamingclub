<?php if ($_GET['id_player']) : ?>

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
                    <th scope="col">Waktu Bermain Terakhir</th>
                    <th scope="col">Quest Terakhir</th>
                    <th scope="col">Status Quest</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $jml_game = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM games"));
                $i = 1;
                for ($i;$i<=$jml_game;$i++) {
                    $query = "SELECT * FROM log_game lg 
                            INNER JOIN games ga ON ga.id_game=lg.id_game
                            INNER JOIN log_game_event lge ON lg.id_log=lge.id_log 
                            WHERE lg.id_player=".$_GET['id_player']." AND lg.id_game=$i ORDER BY lg.id_log DESC LIMIT 1;";
                    $result = mysqli_query($koneksi, $query);
                    $query_run = mysqli_fetch_assoc($result);
                ?>
                    <tr>
                        <td><?= isset($query_run['nama_game']) ? $query_run['nama_game'] : 'Player Belum Memainkan Game!'?></td>
                        <td>
                            <?php 
                                if(mysqli_num_rows($result) > 0){
                                    $waktu_mulai = isset($query_run['waktu_mulai']) ? $query_run['waktu_mulai'] : '-';
                                    $waktu_entry = isset($query_run['waktu_entry']) ? $query_run['waktu_entry'] : '-';
                                    $time_mulai = DateTime::createFromFormat('Y-m-d H:i:s',  $waktu_mulai)->format('i');
                                    $time_entry = DateTime::createFromFormat('Y-m-d H:i:s',  $waktu_entry)->format('i');

                                    $wkt_mulai = new DateTime($query_run['waktu_mulai']);
                                    $since_start = $wkt_mulai->diff(new DateTime($query_run['waktu_entry']));
                                    $minutes = $since_start->days * 24 * 60;
                                    $minutes += $since_start->h * 60;
                                    $minutes += $since_start->i;
                                    
                                    $total_waktu = abs($time_mulai - $time_entry);
                                    $avg_time = $total_waktu;
                                    echo $minutes, " Menit";
                                }else{
                                    echo "-";
                                }
                            ?>
                        </td>
                        <td><?= isset($query_run['no_event']) ? $query_run['no_event'] : '-'?></td>
                        <td><?= isset($query_run['status_event']) ? $query_run['status_event'] : '-'?></td>
                    </tr>
                <?php
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