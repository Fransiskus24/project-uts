<?php
require_once "./database.php";
$id = $_GET["id"];
$kamar = query("SELECT * FROM kamar WHERE id = $id")[0];
$anggotas = query("SELECT * FROM anggota");
if (isset($_POST["submit"])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if (editKamar($_POST) > 0) {
        echo "
        		<script>
        			alert('data berhasil diupdate!');
        			document.location.href = 'index.php?page=kamar';
        		</script>
        	";
    } else {
        echo "
        		<script>
        			alert('data gagal diupdate!');
        			document.location.href = 'index.php?page=edit-kamar';
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
                    <input type="hidden" name="id" value="<?= $kamar->id; ?>">
                    <div class="form-group">
                        <label for="anggota" class="form-label">Anggota</label>
                        <select name="anggota" id="anggota" class="form-control" required>
                            <option value="" selected>Pilih Anggota</option>
                            <?php foreach ($anggotas as $anggota) : ?>
                                <option <?= $anggota->id == $kamar->anggota_id ? 'selected' : ''; ?> value="<?= $anggota->id; ?>"><?= $anggota->nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_kamar" class="form-label">No Kamar</label>
                        <input type="text" name="no_kamar" id="no_kamar" class="form-control" value="<?= $kamar->no_kamar; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_kos" class="form-label">Tanggal Kos</label>
                        <input type="date" name="tgl_kos" id="tgl_kos" class="form-control" value="<?= $kamar->tgl_kos; ?>" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>