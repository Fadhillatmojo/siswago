<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../sign-up-page/login.php");
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="./css/index.css">

    <title>Admin SiswaGO Dashboard</title>
</head>

<body>

    <!-- <div class="screen-cover d-none d-xl-none"></div> -->

    <div class="row">
        <div class="col-12 col-lg-3 col-navbar d-none d-xl-block">

            <aside class="sidebar">
                <a href="#" class="sidebar-logo">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="./assets/img/global/logo.svg" alt="">
                        <span>SiswaGO</span>
                    </div>

                    <button id="toggle-navbar" onclick="toggleNavbar()">
                        <img src="./assets/img/global/navbar-times.svg" alt="">
                    </button>
                </a>

                <h5 class="sidebar-title">Menu</h5>

                <a href="./statistik.php" class="sidebar-item active" onclick="toggleActive(this)">
                    <!-- <img src="./assets/img/global/grid.svg" alt=""> -->

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 14H14V21H21V14Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10 14H3V21H10V14Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M21 3H14V10H21V3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10 3H3V10H10V3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    <span>Profil</span>
                </a>

                <a href="./Materi.php" class="sidebar-item" onclick="toggleActive(this)">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 7H4C2.89543 7 2 7.89543 2 9V19C2 20.1046 2.89543 21 4 21H20C21.1046 21 22 20.1046 22 19V9C22 7.89543 21.1046 7 20 7Z" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16 21V5C16 4.46957 15.7893 3.96086 15.4142 3.58579C15.0391 3.21071 14.5304 3 14 3H10C9.46957 3 8.96086 3.21071 8.58579 3.58579C8.21071 3.96086 8 4.46957 8 5V21" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    <span>Materi</span>
                </a>

                <a href="./pengumuman.php" class="sidebar-item" onclick="toggleActive(this)">
                    <!-- <img src="./assets/img/global/dollar-sign.svg" alt=""> -->
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 8C18 6.4087 17.3679 4.88258 16.2426 3.75736C15.1174 2.63214 13.5913 2 12 2C10.4087 2 8.88258 2.63214 7.75736 3.75736C6.63214 4.88258 6 6.4087 6 8C6 15 3 17 3 17H21C21 17 18 15 18 8Z" stroke="#1F2B48" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13.73 21C13.5542 21.3031 13.3019 21.5547 12.9982 21.7295C12.6946 21.9044 12.3504 21.9965 12 21.9965C11.6496 21.9965 11.3054 21.9044 11.0018 21.7295C10.6982 21.5547 10.4458 21.3031 10.27 21" stroke="#1F2B48" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <span>Pengumuman</span>
                </a>

                <h5 class="sidebar-title">Lainnya</h5>

                <a href="../sign-up-page/logout.php" class="sidebar-item" onclick="toggleActive(this)">
                    <!-- <img src="./assets/img/global/log-out.svg" alt=""> -->

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 17L21 12L16 7" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M21 12H9" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H9" stroke="#ABB3C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    <span>Logout</span>
                </a>

            </aside>

        </div>


        <div class="col-12 col-xl-9">
            <div class="nav">
                <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
                    <div class="d-flex justify-content-start align-items-center">
                        <button id="toggle-navbar" onclick="toggleNavbar()">
                            <img src="./assets/img/global/burger.svg" class="mb-2" alt="">
                        </button>
                        <h2 class="nav-title">Profil</h2>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="row">
                    <div class="col-12">
                        <h2 class="content-title">Profil</h2>
                        <h5 class="content-desc mb-4">Kamu bisa mengedit profilmu disini</h5>
                    </div>
                    <div class="col-12">
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
                        <table class="table table-bordered">
                            <thead>
                                <th scope="col">ID Siswa</th>
                                <th scope="col">Nama Depan</th>
                                <th scope="col">Nama Belakang</th>
                                <th scope="col">Telepon</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">ID Kelas</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                <?php
                                    require '../sign-up-page/config.php';
                                    $idsiswa = $_SESSION["user"]["id"];
                                    $siswa = mysqli_query($conn, "SELECT * FROM siswa WHERE id_siswa = $idsiswa");
                                    foreach ($siswa as $value) {
                                        echo "
                                        <tr>
                                            <td>" .$value['id_siswa']. "</td>
                                            <td>" .$value['nama_depan']. "</td>
                                            <td>" .$value['nama_belakang']. "</td>
                                            <td>" .$value['no_telp']. "</td>
                                            <td>" .$value['username']. "</td>
                                            <td>" .$value['email']. "</td>
                                            <td>" .$value['id_kelas']. "</td>
                                            <td><a href='update_profil.php' target='_blank'><i class='fa fa-pencil-square'></i></a>"."</td>
                                        </tr>
                                        ";
                                    }
                                ?>
                            </tbody>
                        </table>                        
                    </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        const navbar = document.querySelector('.col-navbar')
        const cover = document.querySelector('.screen-cover')

        const sidebar_items = document.querySelectorAll('.sidebar-item')

        function toggleNavbar() {
            navbar.classList.toggle('d-none')
            cover.classList.toggle('d-none')
        }

        function toggleActive(e) {
            sidebar_items.forEach(function(v, k) {
                v.classList.remove('active')
            })
            e.closest('.sidebar-item').classList.add('active')

        }
    </script>
</body>

</html>