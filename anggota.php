<?php
require_once './database.php';
$anggotas = query("SELECT * FROM anggota");

?>
<div class="card shadow-sm border-0">
    <div class="card-header">
        <a href="?page=tambah-anggota" class="btn btn-outline-primary">Tambah Anggota</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Telp</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Telp</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($anggotas as $anggota) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $anggota->nama; ?></td>
                            <td><?= $anggota->tlp; ?></td>
                            <td><?= $anggota->alamat; ?></td>
                            <td>
                                <a href="?page=edit-anggota&id=<?= $anggota->id; ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="./hapus_anggota.php?id=<?= $anggota->id; ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>