<?php
require_once "./database.php";
$anggotas = query("SELECT * FROM anggota");
if (isset($_POST["submit"])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if (addTransaksi($_POST) > 0) {
        echo "
        		<script>
        			alert('data berhasil ditambahkan!');
        			document.location.href = 'index.php?page=transaksi';
        		</script>
        	";
    } else {
        echo "
        		<script>
        			alert('data gagal ditambahkan!');
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
                    <div class="form-group">
                        <label for="anggota" class="form-label">Anggota</label>
                        <select name="anggota" id="anggota" class="form-control" required>
                            <option value="" selected>Pilih Anggota</option>
                            <?php foreach ($anggotas as $anggota) : ?>
                                <option value="<?= $anggota->id; ?>"><?= $anggota->nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_bayar" class="form-label">Tanggal Bayar</label>
                        <input type="date" name="tgl_bayar" id="tgl_bayar" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="total" class="form-label">Total Bayar</label>
                        <input type="number" name="total" id="total" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>