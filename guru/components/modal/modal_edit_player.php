<form action="" method="post">
        <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Nama Player</label>
                                    <input type="text" name="nama_player" class="form-control nama_player">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control username">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_player" class="id_player">
                        <button type="submit" name="update" class="btn btn-success">Edit</button>
                    </div>
                </div>
            </div>
        </div>
</form>

<script>
    $(document).ready(function(){
        $('#mytable').on('click', '.edit', function() {
            var nama_player = $(this).data("nama_player");
            var username = $(this).data("username");
            var id_player = $(this).data("id_player");
            
            $("#EditModal").modal("show");
            $(".nama_player").val(nama_player);
            $(".username").val(username);
            $(".id_player").val(id_player);
        });
    });
</script>

<?php 
    if (isset($_POST['update'])) {
        $nama_player = $_POST['nama_player'];
        $username = $_POST['username'];
        $id_player = $_POST['id_player'];

        $query_edit_player = "UPDATE players SET 
            nama_player = '$nama_player',
            username = '$username'

            WHERE id_player = '$id_player'
        ";

    $wes1 = mysqli_query($koneksi, $query_edit_player);

    if ($wes1 > 0) {
        echo "<script>
        swal('Berhasil!', 'Data Player berhasil diedit!', 'success').then((value) => {
            document.location.href = '?page=data_player';
        }) ;
        </script>";
    }else{
        echo "<script>
        swal('Maaf!', 'Data Player gagal diedit!', 'error').then((value) => {
            document.location.href = '?page=data_player';
        }) ;
        </script>";
    }
// return mysqli_affected_rows($koneksi);
    } 
?>
    

