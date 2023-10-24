
<form action="" method="post">
        <div class="modal fade" id="EditAbsenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Data Player</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                        <input type="hidden" name="id" class="id">
                        <input type="hidden" name="nama_pegawai" class="nama">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="text" name="tanggal" class="form-control tanggal">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Absen</label>
                                    <input type="text" name="absen" class="form-control absen">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Jam masuk</label>
                                    <input type="text" name="masuk" class="form-control masuk">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Jam pulang</label>
                                    <input type="text" name="pulang" class="form-control pulang">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-primary">Ubah</button>
                    </div>
                </div>
            </div>
        </div>
</form>

<script>//edit data
    $(document).ready(function(){
        $('#mytable').on('click', '.editabsen', function() {
            var tanggal = $(this).data("tanggal");
            var absen = $(this).data("absen");
            var masuk = $(this).data("masuk");
            var pulang = $(this).data("pulang");
            var nama = $(this).data("nama");
            var id = $(this).data("id");
            $("#EditAbsenModal").modal("show");
            $(".tanggal").val(tanggal);
            $(".absen").val(absen);
            $(".masuk").val(masuk);
            $(".pulang").val(pulang);
            $(".nama").val(nama);
            $(".id").val(id);
        });
    });
</script>

<?php

    if (isset($_POST['update'])) {

        //perbaiki format tanggal
        $tanggalbulantahun = $_POST['tanggal'];
        $tanggal = date('m', strtotime($tanggalbulantahun));
        $bulan = date('d', strtotime($tanggalbulantahun));
        $tahun = date('Y', strtotime($tanggalbulantahun));
        //end
        $absen = $_POST['absen'];
        $masuk = $_POST['masuk'];
        $pulang = $_POST['pulang'];
        $id = $_POST['id'];
        $nama_pegawai = $_POST['nama_pegawai'];

        $query_update_absen = "UPDATE absen SET 
                            date_time = '$tanggal',
                            absen = '$absen',
                            masuk = '$masuk',
                            pulang = '$pulang'

                            WHERE id_absen = '$id'  
        ";

$wes3 = mysqli_query($koneksi, $query_update_absen);

if ($wes3 > 0) {
    echo "<script>
    swal('Berhasil!', 'Data pegawai berhasil di update!', 'success').then((value) => {
        document.location.href = '?page=detail_absen&nama_pegawai=$nama_pegawai';
    }) ;
    </script>";
}else{
    echo "<script>
    swal('Maaf!', 'Data pegawai gagal di update!', 'error').then((value) => {
        document.location.href = '?page=detail_absen&nama_pegawai=$nama_pegawai';
    }) ;
    </script>";
}

    }

?>