<form action="" method="post">
        <div class="modal fade" id="inputmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Data Pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="">Gaji Pokok</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input type="number" name="gaji_pokok" min="0" class="form-control gaji-pokok">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="">Asuransi</label>
                                    <div class="input-group">
                                        <input type="number" name="asuransi" min="0" step="any" class="form-control asuransi">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="">Tunjangan Jabatan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input type="number" name="tunjangan_jabatan" min="0" class="form-control tunjangan-jabatan">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="">Tunjangan Konsumsi</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input type="number" name="tunjangan_konsumsi" min="0" class="form-control tunjangan-konsumsi">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="">PPH</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input type="number" name="pph" min="0" class="form-control pph">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="">Hasil</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input type="number" name="hasil" class="hasil form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" class="id">
                        <button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        <!-- <button class="btn btn-primary hitung"><i class="fas fa-calculator"></i></button> -->
                        <a href="#" class="btn btn-primary hitung"><i class="fas fa-calculator"></i></a>
                        <button type="submit" name="input" class="btn btn-success"><i class="fas fa-save"></i></button>

                    </div>
                </div>
            </div>
        </div>
</form>


<script>
$(document).ready(function(){
  $('#mytable').on('click', '.input', function() {
    var id = $(this).data("id");
    $("#inputmodal").modal('show')
    $(".id").val(id);
  })
})
</script>

<script>
    $(document).ready(function() {
    $(".hitung").on('click', function() {
        const gajiPokok = Number($(".gaji-pokok").val());
        const asuransi = gajiPokok * Number($(".asuransi").val() / 100);
        const tunjanganJabatan = Number($(".tunjangan-jabatan").val());
        const tunjanganKonsumsi = Number($(".tunjangan-konsumsi").val());
        const pph = Number($(".pph").val());
        $(".hasil").val(gajiPokok + tunjanganJabatan + tunjanganKonsumsi - pph - asuransi);
    })
  });
</script>

<?php 
    if (isset($_POST['input'])) {
        $gaji_pokok = $_POST['gaji_pokok'];
        $asuransi = $_POST['asuransi'];
        $tunjangan_konsumsi = $_POST['tunjangan_konsumsi'];
        $tunjangan_jabatan = $_POST['tunjangan_jabatan'];
        $pph = $_POST['pph'];
        $hasil = $_POST['hasil'];
        $id = $_POST['id'];
        $date = date('d/m/Y');

        $query_inputgaji = "INSERT INTO detailgaji VALUES 
                        ('',
                        '$id',
                        '$gaji_pokok',
                        '$tunjangan_jabatan',
                        '$tunjangan_konsumsi',
                        '$asuransi',
                        '$pph',
                        '$hasil',
                        '$date'
                        )";
$wes3 = mysqli_query($koneksi, $query_inputgaji);

if ($wes3 > 0) {
    echo "<script>
    swal('Berhasil!', 'Data pegawai berhasil di update!', 'success').then((value) => {
        document.location.href = '?page=datagaji';
    }) ;
    </script>";
}else{
    echo "<script>
    swal('Maaf!', 'Data pegawai gagal di update!', 'error').then((value) => {
        document.location.href = '?page=datagaji';
    }) ;
    </script>";
    }
}    
?>