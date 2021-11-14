<?php
require_once "./database.php";
$id = $_GET["id"];

if (hapusAnggota($id) > 0) {
    echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'index.php?page=anggota';
		</script>
	";
} else {
    echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'index.php?page=anggota';
		</script>
	";
}
