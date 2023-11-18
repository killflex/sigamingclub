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
                    <th scope="col">Waktu Bermain</th>
                    <th scope="col">Quest Terakhir</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach (mysqli_query($koneksi, "SELECT * FROM games g
                                                        LEFT JOIN log_game lg ON lg.id_player=".$_GET['id_player']." AND lg.id_game=g.id_game
                                                        LEFT JOIN log_game_event lge ON lge.id_log=lg.id_log
                                                        ORDER BY lg.id_log AND lge.id_log_event DESC LIMIT 1;") 
                                                    as $dtl_player) : 
                ?>
                    <tr>
                        <th scope="row"><?= $dtl_player['nama_game'] ?></th>
                        <td>20 Jam</td>
                        <td><?= $dtl_player['no_event'] ?></td>
                    </tr>
                <?php
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

<?php
else :
    session_destroy();
    header("location: ../../index.php");
endif;
?>