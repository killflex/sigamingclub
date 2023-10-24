<?php $data = mysqli_query($koneksi, "SELECT * FROM login") ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<div class="container-fluid px-5 py-5 ">
    <a class="btn btn-success btn-sm mb-2 add" data-toggle="modal" href="#AddModal" href="javascript:void(0);" onclick="document.querySelectorAll('input').value = '' "><i class="fas fa-plus fa-sm fa-fw"></i> Tambah User</a>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mt-4" id="mytable" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama User</th>
                            <th scope="col">Username</th>
                            <th scope="col">Role</th>
                            <!-- <th scope="col">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data as $tabel) : ?>
                            <tr>
                                <th><?= $no ?></th>
                                <td><?= $tabel['nama_user'] ?></td>
                                <td><?= $tabel['username'] ?></td>
                                <td><?= $tabel['role'] ?></td>
                                <!-- <td>
                                    <a class="btn btn-outline-warning edit" data-id_user="<?= $tabel['id_user'] ?>" data-nama_user="<?= $tabel['nama_user'] ?>" data-username="<?= $tabel['username'] ?>" data-role="<?= $tabel['role'] ?>" href="javascript:void(0) edit;"><i class="fas fa-pencil-alt"></i></a>
                                    <a class="btn btn-outline-danger delete" data-id_user="<?= $tabel['id_user'] ?>" data-nama_user="<?= $tabel['nama_user'] ?>" data-username="<?= $tabel['username'] ?>" data-role="<?= $tabel['role'] ?>" href="javascript:void(0) delete;"><i class="fas fa-trash"></i></a>
                                </td> -->
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
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
include 'components/modal/modal_tambah.php';
include 'components/modal/modal_edit.php';
include 'components/modal/modal_delete.php';
?>