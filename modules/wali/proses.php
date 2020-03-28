<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login siswa
// jika siswa belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika siswa sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            $id_siswa        = $_SESSION['id_siswa'];
            $nama_ayah        = $_POST['nama_ayah'];
            $nama_ibu        = $_POST['nama_ibu'];
            $id_kerja_ayah        = $_POST['id_kerja_ayah'];
            $id_kerja_ibu        = $_POST['id_kerja_ibu'];
            $alamat             = $_POST['alamat'];
            $tempat_lahir_ayah      = $_POST['tempat_lahir_ayah'];
            $tempat_lahir_ibu      = $_POST['tempat_lahir_ibu'];
            $tgl_lahir_ayah         = $_POST['tgl_lahir_ayah'];
            $tgl_lahir_ibu         = $_POST['tgl_lahir_ibu'];
            $telepon_ayah         = $_POST['telepon_ayah'];
            $telepon_ibu         = $_POST['telepon_ibu'];

            $query = mysqli_query($mysqli, "INSERT INTO wali (id_siswa,nama_ayah,nama_ibu,id_kerja_ayah,id_kerja_ibu,alamat,
                                              tempat_lahir_ayah,tempat_lahir_ibu,tgl_lahir_ayah,tgl_lahir_ibu,telepon_ayah,telepon_ibu)
                                            VALUES('$id_siswa','$nama_ayah','$nama_ibu','$id_kerja_ayah','$id_kerja_ibu','$alamat',
                                            '$tempat_lahir_ayah','$tempat_lahir_ibu','$tgl_lahir_ayah','$tgl_lahir_ibu','$telepon_ayah','$telepon_ibu')")
            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=wali&alert=1");
            }

        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_wali'])) {
                $id_wali        = $_POST['id_wali'];
                $nama_ayah        = $_POST['nama_ayah'];
                $nama_ibu        = $_POST['nama_ibu'];
                $id_kerja_ayah        = $_POST['id_kerja_ayah'];
                $id_kerja_ibu        = $_POST['id_kerja_ibu'];
                $alamat             = $_POST['alamat'];
                $tempat_lahir_ayah      = $_POST['tempat_lahir_ayah'];
                $tempat_lahir_ibu      = $_POST['tempat_lahir_ibu'];
                $tgl_lahir_ayah         = $_POST['tgl_lahir_ayah'];
                $tgl_lahir_ibu         = $_POST['tgl_lahir_ibu'];
                $telepon_ayah         = $_POST['telepon_ayah'];
                $telepon_ibu         = $_POST['telepon_ibu'];

                $query = mysqli_query($mysqli, "UPDATE wali SET nama_ayah = '$nama_ayah',
                                                                                       nama_ibu = '$nama_ibu',
                                                                                       id_kerja_ayah = '$id_kerja_ayah',
                                                                                       id_kerja_ibu = '$id_kerja_ibu',
                                                                                       alamat = '$alamat',
                                                                                       tempat_lahir_ayah = '$tempat_lahir_ayah',
                                                                                       tempat_lahir_ibu = '$tempat_lahir_ibu',
                                                                                       telepon_ayah = '$telepon_ayah',
                                                                                       telepon_ibu = '$telepon_ibu'
                                                                                       WHERE id_wali = '$id_wali'")
                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=wali&alert=2");
                }


            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id_wali'])) {
            $id_wali= $_GET['id_wali'];
    
            // perintah query untuk menghapus data pada tabel siswa
            $query = mysqli_query($mysqli, "DELETE FROM wali WHERE id_wali = '$id_wali'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=wali&alert=3");
            }
        }
    }       
}       
?>