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
                                    <label>Nama User</label>
                                    <input type="text" name="nama_user" class="form-control nama_user">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control username">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Role</label>
                                    <input type="text" name="role" class="form-control role">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_user" class="id_user">
                        <button type="submit" name="update" class="btn btn-success">Edit</button>
                    </div>
                </div>
            </div>
        </div>
</form>

<script>
    $(document).ready(function(){
        $('#mytable').on('click', '.edit', function() {
            var nama_user = $(this).data("nama_user");
            var username = $(this).data("username");
            var role = $(this).data("role");
            var id_user = $(this).data("id_user");
            
            $("#EditModal").modal("show");
            $(".nama_user").val(nama_user);
            $(".username").val(username);
            $(".role").val(role);
            $(".id_user").val(id_user);
        });
    });
</script>

<?php 
    if (isset($_POST['update'])) {
        $nama_user = $_POST['nama_user'];
        $role = $_POST['role'];
        $username = $_POST['username'];
        $id_user = $_POST['id_user'];

        $query_edit_user = "UPDATE login SET 
            nama_user = '$nama_user',
            role = '$role',
            username = '$username'

            WHERE id_user = '$id_user'
        ";

    $wes1 = mysqli_query($koneksi, $query_edit_user);

    if ($wes1 > 0) {
        echo "<script>
        swal('Berhasil!', 'Data User berhasil diedit!', 'success').then((value) => {
            document.location.href = '?page=data_user';
        }) ;
        </script>";
    }else{
        echo "<script>
        swal('Maaf!', 'Data User gagal diedit!', 'error').then((value) => {
            document.location.href = '?page=data_user';
        }) ;
        </script>";
    }
// return mysqli_affected_rows($koneksi);
    } 
?>
    

