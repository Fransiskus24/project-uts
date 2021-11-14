<?php
require_once "./database.php";
$id = $_GET["id"];

if (hapusKamar($id) > 0) {
    echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'index.php?page=kamar';
		</script>
	";
} else {
    echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'index.php?page=kamar';
		</script>
	";
}
