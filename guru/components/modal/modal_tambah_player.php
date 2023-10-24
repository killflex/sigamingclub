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
                                    <label>Nama Player</label>
                                    <input type="text" name="nama_player" class="form-control nama_player" value="">
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
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_player" class="id_player">
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
        $id_player = $_POST['id_player'];
        $nama_player = $_POST['nama_player'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $query_tambah_user = "INSERT INTO players VALUES 
            ('',
            '$nama_player',
            '$username',
            '$password')";

    $wes1 = mysqli_query($koneksi, $query_tambah_user);

    if ($wes1 > 0) {
        echo "<script>
        swal('Berhasil!', 'Data Player berhasil ditambah!', 'success').then((value) => {
            document.location.href = '?page=data_player';
        }) ;
        </script>";
    }else{
        echo "<script>
        swal('Maaf!', 'Data Player gagal ditambah!', 'error').then((value) => {
            document.location.href = '?page=data_player';
        }) ;
        </script>";
    }
// return mysqli_affected_rows($koneksi);
    } 
?>