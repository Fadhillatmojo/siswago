<?php
    // session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ppwlastproject";

    // create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // // create check connection
    // if (!$conn) {
    //     die("Connection failed: ". mysqli_connect_error());
    // } else{
    //     echo "connection successfull";
    // }

    function cari($keyword, $conn){
        if ($keyword != null) {
            $query = "SELECT * FROM siswa WHERE nama_depan LIKE'%$keyword%' or nama_belakang LIKE '%$keyword%'";
            return mysqli_query($conn,$query);
        }
        $query = "SELECT * FROM siswa";
        return mysqli_query($conn, $query);
    }
    function cari_kelas($keyword, $conn){
        if ($keyword != null) {
            $query = "SELECT * FROM kelas WHERE nama_kelas LIKE '%$keyword%' OR id_kelas LIKE '%$keyword%'";
            return mysqli_query($conn,$query);
        }
        $query = "SELECT * FROM kelas";
        return mysqli_query($conn, $query);
    }