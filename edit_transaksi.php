<?php
require_once "./database.php";
$id = $_GET["id"];
$transaksi = query("SELECT * FROM transaksi WHERE id = $id")[0];
$anggotas = query("SELECT * FROM anggota");
if (isset($_POST["submit"])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if (editTransaksi($_POST) > 0) {
        echo "
        		<script>
        			alert('data berhasil diupdate!');
        			document.location.href = 'index.php?page=transaksi';
        		</script>
        	";
    } else {
        echo "
        		<script>
        			alert('data gagal diupdate!');
        			document.location.href = 'index.php?page=tambah-transaksi';
        		</script>
        	";
    }
}
?>
<div class="row justify-content-center mt-4">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form action="" method="post" autocomplete="off">
                    <input type="hidden" name="id" value="<?= $transaksi->id; ?>">
                    <div class="form-group">
                        <label for="anggota" class="form-label">Anggota</label>
                        <select name="anggota" id="anggota" class="form-control" required>
                            <option value="" selected>Pilih Anggota</option>
                            <?php foreach ($anggotas as $anggota) : ?>
                                <option <?= $anggota->id == $transaksi->anggota_id ? 'selected' : ''; ?> value="<?= $anggota->id; ?>"><?= $anggota->nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_bayar" class="form-label">Tanggal Bayar</label>
                        <input type="date" name="tgl_bayar" id="tgl_bayar" class="form-control" value="<?= $transaksi->tgl_bayar; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="total" class="form-label">Total Bayar</label>
                        <input type="number" name="total" id="total" class="form-control" value="<?= $transaksi->total_bayar; ?>" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>