<?php
$host = 'localhost';
$username = 'root';
$password = '';
$databasse = 'kosan';
$port = 3306;
$conn = mysqli_connect($host, $username, $password, $databasse, $port);

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_object($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// tambah Cosan
function addAnggota($data)
{
    global $conn;
    $nama   = $data['nama'];
    $telp   = $data['telp'];
    $alamat = $data['alamat'];

    $query = "INSERT INTO anggota VALUES (null, '$nama', '$telp', '$alamat')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editAnggota($data)
{
    global $conn;
    $id     = $data['id'];
    $nama   = $data['nama'];
    $telp   = $data['telp'];
    $alamat = $data['alamat'];
    // var_dump($id);
    $query = "UPDATE anggota SET
				nama = '$nama',
				tlp = '$telp',
				alamat = '$alamat'
			  WHERE id = $id
			";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapusAnggota($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM anggota WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// Kamar
function addKamar($data)
{
    global $conn;
    $anggota    = $data['anggota'];
    $no_kamar   = $data['no_kamar'];
    $tgl_kos    = $data['tgl_kos'];

    $query = "INSERT INTO kamar VALUES (null, '$anggota', '$no_kamar', '$tgl_kos')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editKamar($data)
{
    global $conn;
    $id         = $data['id'];
    $anggota    = $data['anggota'];
    $no_kamar   = $data['no_kamar'];
    $tgl_kos    = $data['tgl_kos'];

    $query = "UPDATE kamar SET
				anggota_id = '$anggota',
				no_kamar = '$no_kamar',
				tgl_kos = '$tgl_kos'
			  WHERE id = $id
			";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapusKamar($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM kamar WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// Transaksi
function addTransaksi($data)
{
    global $conn;
    $anggota    = $data['anggota'];
    $tgl_bayar   = $data['tgl_bayar'];
    $total    = $data['total'];

    $query = "INSERT INTO transaksi VALUES (null, '$anggota', '$tgl_bayar', '$total')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editTransaksi($data)
{
    global $conn;
    $id         = $data['id'];
    $anggota    = $data['anggota'];
    $tgl_bayar   = $data['tgl_bayar'];
    $total    = $data['total'];

    $query = "UPDATE transaksi SET
				anggota_id = '$anggota',
				tgl_bayar = '$tgl_bayar',
				total_bayar = '$total'
			  WHERE id = $id
			";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapusTransaksi($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM transaksi WHERE id = $id");
    return mysqli_affected_rows($conn);
}


// 
function tanggal($value)
{
    return date('d-m-Y', strtotime($value));
}

function rupiah($value)
{
    return 'Rp' . number_format($value, 0, ',', '.');
}
