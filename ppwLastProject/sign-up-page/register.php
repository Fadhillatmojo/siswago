<?php
session_start();
require 'config.php';
if (isset($_SESSION["login"])) {
    header("Location: ../dashboard-siswa/statistik.php");
    exit;
}
if (isset($_POST["submit"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $telp = $_POST["telp"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $idkelas = $_POST["id_kelas"];
    $duplicate = mysqli_query($conn, "SELECT * FROM siswa WHERE username = '$username' OR email = '$email'");

    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script> alert('Username or email has already taken') </script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO siswa VALUES('', '$first_name', '$last_name', '$telp', '$username', '$email', '$password', '$idkelas')";
            mysqli_query($conn, $query);
            header("Location: login.php?msg=Berhasil Registrasi, Silahkan Login!");
            // header("Location: login.php");
            // echo "<script>alert('registration success!');</script>";
            exit;
        } else {
            echo "<script> alert('password tidak cocok') </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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

        .register-form{
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

        .login-placeholder-container{
            background-color: #181733;
            height: 100vh;
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
    <div class="register-container d-flex justify-content-center align-items-center flex-column p-4">
        <a href="../landing-page/landing.html" class="logo mb-5">
            <div class="d-flex justify-content-center align-items-center">
                <img src="./assets/img/global/logo.svg" alt="">
                <span class=" ms-2 text-white fw-bold">Siswa <span class="atmojo"> Go</span></span>
            </div>
        </a>
        <h1 class="text-white mb-3 fw-bold">Register Page</h1>
        <div class="register-form p-4">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                <label for="first_name" class="form-label">Nama depan </label>
                <input class="form-control" type="text" name="first_name" id="first_name" required value=""> <br>
                <label for="last_name" class="form-label">Nama belakang </label>
                <input class="form-control" type="text" name="last_name" id="last_name" required value=""> <br>
                <label for="telp" class="form-label">Telp </label>
                <input class="form-control" type="text" name="telp" id="telp" value=""> <br>
                <label for="email" class="form-label">Email </label>
                <input class="form-control" type="text" name="email" id="email" required value=""> <br>
                <label for="username" class="form-label">Username </label>
                <input class="form-control" type="text" name="username" id="username" required value=""> <br>
                <label for="password" class="form-label">Password </label>
                <input class="form-control" type="password" name="password" id="password" required value=""> <br>
                <label for="confirmpassword" class="form-label">Confirm Password </label>
                <input class="form-control" type="password" name="confirmpassword" id="confirmpassword" required value=""> <br>
                <?php
                $sqlkelas = "SELECT * FROM kelas";
                $result = $conn->query($sqlkelas);
        
                if ($result->num_rows > 0) {
                    // Menampilkan pilihan kelas
                    echo "<h4>Pilih Kelas:</h4>";
                    echo "<select name='id_kelas' class='form-select'>";
                    while ($row = $result->fetch_assoc()) {
                        $id_kelas = $row['id_kelas'];
                        $nama_kelas = $row['nama_kelas'];
                        echo "<option value='$id_kelas'>$nama_kelas</option>";
                    }
                    echo "</select>";
                    echo "<br>";
                } else {
                    echo "Tidak ada kelas yang tersedia.";
                }
                ?>
                
                <button type="submit" name="submit[]" class="btn btn-primary mt-3">Register</button>
            </form>
        </div>
        <p class="mb-1 mt-4 text-white text-center">
            Sudah Punya akun?
        </p>
        <a href="login.php">
            <button class="btn btn-outline-primary mt-3">
                Login
            </button>
        </a>
    </div>

</body>
</html>
