<form action="" method="post">
        <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <input type="text" name="nama_user" class="form-control nama_user" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control username" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="password" class="form-control password" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Role</label>
                                    <div class="input-group mb-3">
                                        <select class="custom-select" id="inputGroupSelect01">
                                            <option selected>Pilih...</option>
                                            <option value="admin">Admin</option>
                                            <option value="guru">Guru</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_user" class="id_user">
                        <button type="submit" name="insert" class="btn btn-success">Input</button>
                    </div>
                </div>
            </div>
        </div>
</form>

<script>
    $(document).ready(function(){
        $('#mytable').on('click', '.add', function() {
        });
    });

    function resetAllInput() {
    const allInput = document.querySelectorAll('input');
    allInput.forEach( input => {
        input.value = "";
    });
}
</script>

<?php 
    if (isset($_POST['insert'])) {
        $id_user = $_POST['id_user'];
        $nama_user = $_POST['nama_user'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $role = $_POST['role'];

        $query_tambah_user = "INSERT INTO login VALUES 
            ('',
            '$nama_user',
            '$username',
            '$password',
            '$role')";

    $wes1 = mysqli_query($koneksi, $query_tambah_user);

    if ($wes1 > 0) {
        echo "<script>
        swal('Berhasil!', 'Data User berhasil ditambah!', 'success').then((value) => {
            document.location.href = '?page=data_user';
        }) ;
        </script>";
    }else{
        echo "<script>
        swal('Maaf!', 'Data User gagal ditambah!', 'error').then((value) => {
            document.location.href = '?page=data_user';
        }) ;
        </script>";
    }
// return mysqli_affected_rows($koneksi);
    } 
?>