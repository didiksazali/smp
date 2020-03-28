<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login agama
// jika agama belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika agama sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            $agama        = $_POST['agama'];

            // perintah query untuk menyimpan data ke tabel users
            $query = mysqli_query($mysqli, "INSERT INTO agama (agama) VALUES('$agama')")
            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=agama&alert=1");
            }
            
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_agama'])) {
                $id_agama     = $_POST['id_agama'];
                $agama        = $_POST['agama'];

                // perintah query untuk mengubah data pada tabel users
                $query = mysqli_query($mysqli, "UPDATE agama SET agama = '$agama' WHERE id_agama = '$id_agama'")
                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=agama&alert=2");
                }

            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id_agama'])) {
            $id_agama = $_GET['id_agama'];
    
            // perintah query untuk menghapus data pada tabel agama
            $query = mysqli_query($mysqli, "DELETE FROM agama WHERE id_agama = '$id_agama'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=agama&alert=3");
            }
        }
    }       
}       
?>