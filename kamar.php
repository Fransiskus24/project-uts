<?php
require_once './database.php';
$kamars = query("SELECT kamar.id, kamar.anggota_id, kamar.tgl_kos, kamar.no_kamar, anggota.nama FROM kamar LEFT JOIN anggota ON kamar.anggota_id = anggota.id");
?>
<div class="card shadow-sm border-0">
    <div class="card-header">
        <a href="?page=tambah-kamar" class="btn btn-primary">Tambah Kamar</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Anggota Kos</th>
                        <th>Nomor Kamar</th>
                        <th>Tanggal Kos</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Anggota Kos</th>
                        <th>Nomor Kamar</th>
                        <th>Tanggal Kos</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($kamars as $kamar) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $kamar->nama; ?></td>
                            <td><?= $kamar->no_kamar; ?></td>
                            <td><?= $kamar->tgl_kos; ?></td>
                            <td>
                                <a href="?page=edit-kamar&id=<?= $kamar->id; ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="./hapus_kamar.php?id=<?= $kamar->id; ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>