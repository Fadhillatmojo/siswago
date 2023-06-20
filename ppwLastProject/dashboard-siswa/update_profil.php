<?php
session_start();
require '../sign-up-page/config.php';
$id = $_SESSION['user']['id'];

// jika button submit ditekan maka
if (isset($_POST["submit"])) {
    $nama_depan = $_POST["nama_depan"];
    $nama_belakang = $_POST["nama_belakang"];
    $telp = $_POST["telp"];
    $query = "UPDATE siswa SET nama_depan = '$nama_depan', nama_belakang = '$nama_belakang', no_telp = '$telp' WHERE id_siswa = $id";
    mysqli_query($conn, $query);
    echo '<script>alert("Profil Berhasil Di update")</script>';
    header("Location: statistik.php?msg=Berhasil di update");

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>

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

        .updateprofile-form{
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
    <div class="updateprofile-container d-flex justify-content-center align-items-center flex-column p-4">
        <a href="../landing-page/landing.html" class="logo mb-5">
            <div class="d-flex justify-content-center align-items-center">
                <img src="./assets/img/global/logo.svg" alt="">
                <span class=" ms-2 text-white fw-bold">Siswa <span class="atmojo"> Go</span></span>
            </div>
        </a>
        <h1 class="text-white mb-3 fw-bold">Update Profile Page</h1>
        <div class="updateprofile-form p-4">
            <form action="" method="post" autocomplete="off">
                <label for="id_siswa" class="form-label">ID Siswa</label>
                <input class="form-control" type="text" name="id_siswa" id="id_siswa" disabled value="<?php echo $_SESSION['user']['id'] ?>"> 
                <label for="nama_depan" class="form-label">Nama Depan</label>
                <input class="form-control" type="text" name="nama_depan" id="nama_depan" required value="<?php echo $_SESSION['user']['nama_depan'] ?>"> 
                <label for="nama_belakang" class="form-label">Nama Belakang</label>
                <input class="form-control" type="text" name="nama_belakang" id="nama_belakang" required value="<?php echo $_SESSION['user']['nama_belakang'] ?>"> 
                <label for="username" class="form-label">Username</label>
                <input class="form-control" type="text" name="username" id="username" disabled value="<?php echo $_SESSION['user']['username'] ?>"> 
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="text" name="email" id="email" disabled value="<?php echo $_SESSION['user']['email'] ?>"> 
                <label for="telp" class="form-label">No Telepon</label>
                <input class="form-control" type="text" name="telp" id="telp" required value="<?php echo $_SESSION['user']['telp'] ?>"> 
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
