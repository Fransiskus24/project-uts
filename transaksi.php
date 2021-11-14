<?php
require_once './database.php';
$transactions = query("SELECT transaksi.id, transaksi.anggota_id, transaksi.tgl_bayar, transaksi.total_bayar, anggota.nama FROM transaksi INNER JOIN anggota ON transaksi.anggota_id = anggota.id");

?>
<div class="card shadow-sm border-0">
    <div class="card-header">
        <a href="?page=tambah-transaksi" class="btn btn-primary">Tambah Transaksi</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Anggota</th>
                        <th>Tanggal Bayar</th>
                        <th>Total Bayar</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Anggota</th>
                        <th>Tanggal Bayar</th>
                        <th>Total Bayar</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($transactions as $transaksi) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $transaksi->nama; ?></td>
                            <td><?= tanggal($transaksi->tgl_bayar); ?></td>
                            <td><?= rupiah($transaksi->total_bayar); ?></td>
                            <td>
                                <?php if ($transaksi->total_bayar) : ?>
                                    <div class="badge badge-success">Lunas</div>
                                <?php else : ?>
                                    <div class="badge badge-danger">Belum Lunas</div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="?page=edit-transaksi&id=<?= $transaksi->id; ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="./hapus_transaksi.php?id=<?= $transaksi->id; ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>