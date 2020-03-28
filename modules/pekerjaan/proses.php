<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login pekerjaan
// jika pekerjaan belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika pekerjaan sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            $pekerjaan        = $_POST['pekerjaan'];

            // perintah query untuk menyimpan data ke tabel users
            $query = mysqli_query($mysqli, "INSERT INTO pekerjaan (pekerjaan) VALUES('$pekerjaan')")
            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=pekerjaan&alert=1");
            }
            
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_pekerjaan'])) {
                $id_pekerjaan     = $_POST['id_pekerjaan'];
                $pekerjaan        = $_POST['pekerjaan'];

                // perintah query untuk mengubah data pada tabel users
                $query = mysqli_query($mysqli, "UPDATE pekerjaan SET pekerjaan = '$pekerjaan' WHERE id_pekerjaan = '$id_pekerjaan'")
                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=pekerjaan&alert=2");
                }

            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id_pekerjaan'])) {
            $id_pekerjaan = $_GET['id_pekerjaan'];
    
            // perintah query untuk menghapus data pada tabel pekerjaan
            $query = mysqli_query($mysqli, "DELETE FROM pekerjaan WHERE id_pekerjaan = '$id_pekerjaan'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=pekerjaan&alert=3");
            }
        }
    }       
}       
?>