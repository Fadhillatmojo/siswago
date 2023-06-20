<?php
require '../sign-up-page/config.php';
$id = $_GET['id'];
$sql = "DELETE FROM kelas WHERE id_kelas = $id";
$resultset = mysqli_query($conn, $sql);
if ($resultset) {
    header("Location: statistik.php?msg=Kelas Berhasil Dihapus");
} 
else{
    echo "eror";
}
?>