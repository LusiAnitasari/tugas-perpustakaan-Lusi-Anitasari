<?php
require_once ("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header ("Location: data.php");
    exit;
}

//Mengambil id anggota
$id_no = $_POST["id"];

$query = "DELETE FROM anggota WHERE id = ?";
//Menyiapkan prepared statment
$stmt = mysqli_prepare($koneksi, $query);
//Mengikat parameter
mysqli_stmt_bind_param($stmt, "i", $id_no);

//menjalankan query DELETE
if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    header("Location: data.php");
    exit;
} else {
    die("Gagal menghapus data: " . mysqli_stmt_error($stmt));
}
?>