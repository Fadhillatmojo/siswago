<?php
session_start();
require '../sign-up-page/config.php';
$id = $_GET['id'];
$sql = "SELECT * FROM kelas WHERE id_kelas = $id";

$resultset = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($resultset);

// jika button submit ditekan maka
if (isset($_POST["submit"])) {
    $nama_kelas = $_POST["nama_kelas"];
    $query = "UPDATE kelas SET nama_kelas = '$nama_kelas' WHERE id_kelas = $id";
    mysqli_query($conn, $query);
    echo '<script>alert("Kelas Berhasil Di update")</script>';
    header("Location: statistik.php?msg=Berhasil di update");

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Kelas</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200;1,300&display=swap" rel="stylesheet">

    <!-- style css -->
    <style>
        body{
            font-family: 'Poppins', sans-serif;
            background-color: #181733;
        }

        span.atmojo{
            color: #4640DE;
        }

        .updateclass-form{
            width: 50%;
            background-color: white;
            border-radius: 20px;
        }

        input{
            border-radius: 50px !important;
        }
        .btn{
            width: 100% !important;
            border-radius: 20px;
        }

        .btn-primary{
            background-color: #4640DE !important;
        }
        .btn-outline-primary:hover{
            background-color: #4640DE;
        }
        a{
            text-decoration: none !important;
            width: 50%;
        }

        .btn-outline-primary:hover > a{
            color: white !important;
        }

        .form-select{
            border-radius: 20px !important;
        }
    </style>
</head>
<body>
    <!-- ini buat di display flex -->
    <div class="updateclass-container d-flex justify-content-center align-items-center flex-column p-4">
        <a href="../landing-page/landing.html" class="logo mb-5">
            <div class="d-flex justify-content-center align-items-center">
                <img src="./assets/img/global/logo.svg" alt="">
                <span class=" ms-2 text-white fw-bold">Siswa <span class="atmojo"> Go</span></span>
            </div>
        </a>
        <h1 class="text-white mb-3 fw-bold">Update Kelas Page</h1>
        <div class="updateclass-form p-4">
            <form action="" method="post" autocomplete="off">
                <label for="nama_kelas" class="form-label">Nama Kelas </label>
                <input class="form-control" type="text" name="nama_kelas" id="nama_kelas" required value="<?php echo $row['nama_kelas'] ?>"> 
                <button type="submit" name="submit[]" class="btn btn-primary mt-3" onclick="refreshPage()">Update</button>
            </form>
        </div>
        <a href="./statistik.php">
            <button class="btn btn-outline-primary mt-3">
                Batal
            </button>
        </a>
    </div>

    
</body>
</html>
