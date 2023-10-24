<form action="" method="post">
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Player</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin? Anda tidak akan dapat mengembalikan data!</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_user" class="id_user">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</form>

    <script>
        //delete data
        $(document).ready(function(){
            $('#mytable').on('click', '.delete', function() {
                var nama_player = $(this).data("nama_player");
                var username = $(this).data("username");
                var id_player = $(this).data("id_player");
                
                $("#DeleteModal").modal("show");
                $(".nama_player").val(nama_player);
                $(".username").val(username);
                $(".id_player").val(id_player);
            });
        });
    </script>

    <?php
    if (isset($_POST['delete'])) {
        $id_player = $_POST['id_player'];
        $query_delete_player = "DELETE FROM players WHERE id_player = '$id_player'";
        $wes2 = mysqli_query($koneksi, $query_delete_player);

        if ($wes2) {
            echo "<script>
            swal('Berhasil!', 'Data Player berhasil dihapus', 'success').then((value) => {
                document.location.href = '?page=data_player';
            }) ;
            </script>";
        }else{
            echo "<script>
            swal('Maaf!', 'Data Player gagal dihapus!', 'error').then((value) => {
                document.location.href = '?page=data_player';
            }) ;
            </script>";
        }
    }

