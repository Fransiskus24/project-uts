<?php
require_once "./database.php";
if (isset($_POST["submit"])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if (addAnggota($_POST) > 0) {
        echo "
        		<script>
        			alert('data berhasil ditambahkan!');
        			document.location.href = 'index.php?page=anggota';
        		</script>
        	";
    } else {
        echo "
        		<script>
        			alert('data gagal ditambahkan!');
        			document.location.href = 'index.php?page=tambah-anggota';
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
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="telp" class="form-label">Telp</label>
                        <input type="text" name="telp" id="telp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>