<?php
session_start();
require 'config.php';
if (isset($_SESSION["loginadmin"])) {
    header("Location: ../dashboard-admin/statistik.php");
    exit;
} elseif (isset($_SESSION["login"])) {
    header("Location: ../dashboard-siswa/statistik.php");
    exit;
}

if (isset($_POST["submit"])) {
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $resultset = mysqli_query($conn, "SELECT * FROM siswa WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($resultset);
    if (mysqli_num_rows($resultset) > 0) {
        if ($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id_siswa"] = $row["id_siswa"];
            $_SESSION["user"] = array(
                'id' => $row["id_siswa"],
                'nama_depan' => $row["nama_depan"],
                'nama_belakang' => $row["nama_belakang"],
                'telp' => $row["no_telp"],
                'username' => $row["username"],
                'email' => $row["email"]
            );
            header("Location: ../dashboard-siswa/statistik.php");
            exit;
        } else {
            echo "<script> alert('wrong password') </script>";
        }
    } else {
        echo "<script> alert('User not registered') </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa</title>

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
        }

        span.atmojo{
            color: #4640DE;
        }

        .login-form{
            width: 100%;
        }

        .form-ul{
            background-color: #fff;
            border-radius: 20px;
        }

        ul{
            list-style: none;
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
            height: 100%;
            min-height: 100vh;
        }
        .login-container{
            width:50%;
        }

        .btn-primary{
            background-color: #4640DE !important;
        }
        .btn-outline-primary:hover{
            background-color: #4640DE;
        }
        a{
            text-decoration: none !important;
        }
        .btn-outline-primary:hover > a{
            color: white !important;
        }

    </style>
</head>
<body>
    <div class="login-placeholder-container d-flex justify-content-center align-items-center">
        <div class="login-container d-flex justify-content-center align-items-center">
            <div class="login-form d-flex flex-column justify-content-center">
                <a href="../landing-page/landing.html" class="logo mb-5">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="./assets/img/global/logo.svg" alt="">
                        <span class=" ms-2 text-white fw-bold">Siswa <span class="atmojo"> Go</span></span>
                    </div>
                </a>
                <h1 class="mb-3 fw-bold text-white">Log In</h1>
                <?php
                    if (isset($_GET['msg'])) {
                        $msg = $_GET['msg'];
                        echo 
                        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        '.$msg.'
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                    <div class="form-ul p-4">
                        <label for="usernameemail" class="form-label">Username or Email </label>
                        <input type="text" name="usernameemail" id="usernameemail" required value="" class="form-control">
                        <label for="password" class="form-label">Password </label>
                        <input type="password" name="password" id="password" required value="" class="form-control">
                        <button type="submit" name="submit[]" class="btn btn-primary mt-3">Login</button> <br>
                        
                    </div>
                </form>
                <p class="mb-1 mt-4 text-white text-center">
                    Belum Punya akun?
                </p>
                <a href="register.php">
                    <button class="btn btn-outline-primary mt-3">
                        Register
                    </button>
                </a>
                <p class="mb-1 mt-4 text-white text-center">
                    atau
                </p>
                <a href="login_admin.php">
                    <button class="btn btn-outline-primary mt-3">
                        Login sebagai admin
                    </button>
                </a>
    
            </div>
        </div>
    </div>
</body>
</html>