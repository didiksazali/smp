<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "config/database.php";

// fungsi untuk pengecekan status login siswa
// jika siswa belum login, alihkan ke halaman login dan tampilkan pesan = 1

    if ($_GET['act']=='daftar') {
        if (isset($_POST['simpan'])) {
            $email             = $_POST['email'];
            $password          = md5($_POST['password']);
            $jenis_kelamin     = $_POST['jenis_kelamin'];
            $asal_sekolah      = $_POST['asal_sekolah'];
            $tgl_daftar        = $hari_ini;

            // perintah query untuk menyimpan data ke tabel users
            $query = mysqli_query($mysqli, "INSERT INTO siswa (email,password,jenis_kelamin, asal_sekolah, tgl_daftar)
                                            VALUES('$email','$password','$jenis_kelamin','$asal_sekolah','$tgl_daftar')")
            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                echo '<script>
                alert("Pendaftaran Berhasil, Silahkan Login!");
                window.location = "login.php";
                </script>';
            }

        }   
    }


?>