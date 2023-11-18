<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<div class="container-fluid px-5 py-5">
    <a class="btn btn-success btn-sm mb-2 add" data-toggle="modal" href="#AddModal" href="javascript:void(0);" onclick="document.querySelectorAll('input').value = '' "><i class="fas fa-plus fa-sm fa-fw"></i> Tambah Player</a>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="mytable" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Player</th>
                            <th scope="col">Username</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $query = "SELECT * FROM games";
                            $games = mysqli_fetch_array(mysqli_query($koneksi, $query));
                            foreach (mysqli_query($koneksi, "SELECT * FROM players") as $tabel) : 
                        ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $tabel['id_player'] ?></td>
                            <td><?= $tabel['username'] ?></td>
                            <td>Player</td>
                            <td>
                                <a class="btn btn-outline-primary detail" href="?page=detail_player&id_player=<?= $tabel['id_player'] ?>&id_game=<?=$games['id_game']?>"><i class="far fa-eye"></i></a>
                                <a class="btn btn-outline-primary detail" href="?page=detail_player&id_player=<?= $tabel['id_player'] ?>&id_game=<?=$games['id_game']?>"><i class="far fa-eye"></i></a>
                                <a class="btn btn-outline-primary detail" href="?page=detail_player&id_player=<?= $tabel['id_player'] ?>&id_game=<?=$games['id_game']?>"><i class="far fa-eye"></i></a>
                                <a class="btn btn-outline-primary detail" href="?page=detail_player&id_player=<?= $tabel['id_player'] ?>&id_game=<?=$games['id_game']?>"><i class="far fa-eye"></i></a>
                                <a class="btn btn-outline-warning edit" data-id_player="<?= $tabel['id_player'] ?>" data-id_player="<?= $tabel['id_player'] ?>" data-username="<?= $tabel['username'] ?>" href="javascript:void(0);"><i class="fas fa-pencil-alt"></i></a>
                                <a class="btn btn-outline-danger delete" data-id_player="<?= $tabel['id_player'] ?>" data-id_player="<?= $tabel['id_player'] ?>" data-username="<?= $tabel['username'] ?>" href="javascript:void(0);"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php 
                            $no++;
                            endforeach; 
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
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ]
        });
    });
</script>

<?php
include 'components/modal/modal_tambah_player.php';
include 'components/modal/modal_edit_player.php';
include 'components/modal/modal_delete_player.php';
?>