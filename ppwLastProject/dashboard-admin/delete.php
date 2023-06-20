<?php
require '../sign-up-page/config.php';
$id = $_GET['id'];
$sql = "DELETE FROM siswa WHERE id_siswa = $id";
$resultset = mysqli_query($conn, $sql);
if ($resultset) {
    header("Location: siswa.php?msg=Record deleted successfully");
} 
else{
    echo "eror";
}
?>