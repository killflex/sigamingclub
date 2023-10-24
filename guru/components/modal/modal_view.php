<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <label>NIK</label>
                            <input type="text" name="nik" class="form-control nik" disabled id="nik">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <input type="text" name="nama_pegawai" class="form-control nama" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control jabatan" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control username" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" name="status" class="form-control status" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>No Telpon</label>
                            <input type="text" name="no_tel" class="form-control no_tel" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Agama</label>
                            <input type="text" name="agama" class="form-control agama" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control email" disabled>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control alamat" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <input type="hidden" name="id" class="product_id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div> -->
        </div>
    </div>
</div>

    
<script>//view data
    $(document).ready(function(){
        $('#mytable').on('click', '.view', function() {
            var nik = $(this).data("nik");
            var nama = $(this).data("nama");
            var jabatan = $(this).data("jabatan");
            var username = $(this).data("username");
            var status = $(this).data("status");
            var no_tel = $(this).data("no_tel");
            var alamat = $(this).data("alamat");
            var agama = $(this).data("agama");
            var email = $(this).data("email");
            $("#ViewModal").modal("show");
            $(".nik").val(nik);
            $(".nama").val(nama);
            $(".jabatan").val(jabatan);
            $(".username").val(username);
            $(".status").val(status);
            $(".no_tel").val(no_tel);
            $(".alamat").val(alamat);
            $(".agama").val(agama);
            $(".email").val(email);
        });
    });
</script>