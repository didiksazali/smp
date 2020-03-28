<?php
// deklarasi parameter koneksi database
$server   = "localhost";
$username = "root";
$password = "";
$database = "db_smp";

$domain = "http://localhost/smp/";

// koneksi database
$mysqli = new mysqli($server, $username, $password, $database);
$hari_ini = date("Y-m-d");

// cek koneksi
if ($mysqli->connect_error) {
    die('Koneksi Database Gagal : '.$mysqli->connect_error);
}
?>