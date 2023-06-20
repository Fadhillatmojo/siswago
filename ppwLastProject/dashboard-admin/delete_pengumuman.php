<?php
require '../sign-up-page/config.php';
$id = $_GET['id'];
$sql = "DELETE FROM pengumuman WHERE id_pengumuman = $id";
$resultset = mysqli_query($conn, $sql);
if ($resultset) {
    header("Location: pengumuman.php?msg=Pengumuman Berhasil Dihapus");
} 
else{
    echo "eror";
}
?>