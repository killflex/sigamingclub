<form action="" method="post">
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data User</h5>
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
                var nama_user = $(this).data("nama_user");
                var username = $(this).data("username");
                var role = $(this).data("role");
                var id_user = $(this).data("id_user");
                
                $("#DeleteModal").modal("show");
                $(".nama_user").val(nama_user);
                $(".username").val(username);
                $(".role").val(role);
                $(".id_user").val(id_user);
            });
        });
    </script>

    <?php
    if (isset($_POST['delete'])) {
        $id_user = $_POST['id_user'];
        $query_delete_user = "DELETE FROM login WHERE id_user = '$id_user'";
        $wes2 = mysqli_query($koneksi, $query_delete_user);


        if ($wes2) {
            echo "<script>
            swal('Berhasil!', 'Data User berhasil dihapus', 'success').then((value) => {
                document.location.href = '?page=data_user';
            }) ;
            </script>";
        }else{
            echo "<script>
            swal('Maaf!', 'Data User gagal dihapus!', 'error').then((value) => {
                document.location.href = '?page=data_user';
            }) ;
            </script>";
        }
    }

