<?php
require '../sign-up-page/config.php';
$id = $_GET['id'];
$sql = "DELETE FROM materi WHERE id_silabus = $id";
$resultset = mysqli_query($conn, $sql);
if ($resultset) {
    header("Location: Materi.php?msg=Materi Berhasil Dihapus");
} 
else{
    echo "eror";
}
?>