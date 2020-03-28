<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login admin
// jika admin belum login, alihkan ke halaman login dan tampilkan pesan = 1
if ($_SESSION['hak_akses']=='admin' || $_SESSION['hak_akses']=='panitia') {
    if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
        echo "<meta http-equiv='refresh' content='0; url=index0.php?alert=1'>";
    } // jika admin sudah login, maka jalankan perintah untuk ubah password
    else {
        if (isset($_POST['simpan'])) {
            if (isset($_SESSION['id_admin'])) {
                // ambil data hasil submit dari form
                $old_pass = md5(mysqli_real_escape_string($mysqli, trim($_POST['old_pass'])));
                $new_pass = md5(mysqli_real_escape_string($mysqli, trim($_POST['new_pass'])));
                $retype_pass = md5(mysqli_real_escape_string($mysqli, trim($_POST['retype_pass'])));

                // ambil data hasil session admin
                $id_admin = $_SESSION['id_admin'];

                // seleksi password dari tabel admin untuk dicek
                $sql = mysqli_query($mysqli, "SELECT password FROM admin WHERE id_admin=$id_admin")
                or die('Ada kesalahan pada query seleksi password : ' . mysqli_error($mysqli));
                $data = mysqli_fetch_assoc($sql);

                // fungsi untuk pengecekan password sebelum diubah
                // jika input password lama tidak sama dengan password di database,
                // alihkan ke halaman ubah password dan tampilkan pesan = 1
                if ($old_pass != $data['password']) {
                    header("Location: ../../main.php?module=password&alert=1");
                } // jika input password lama sama dengan password didatabase, jalankan perintah untuk pengecekan selanjutnya
                else {

                    // jika input password baru tidak sama dengan input ulangi password baru,
                    // alihkan ke halaman ubah password dan tampilkan pesan = 2
                    if ($new_pass != $retype_pass) {
                        header("Location: ../../main.php?module=password&alert=2");
                    } // selain itu, jalankan perintah update password
                    else {
                        // perintah query untuk mengubah data pada tabel admin
                        $query = mysqli_query($mysqli, "UPDATE admin SET password = '$new_pass'
                                                                  WHERE id_admin  = '$id_admin'")
                        or die('Ada kesalahan pada query update password : ' . mysqli_error($mysqli));

                        // cek query
                        if ($query) {
                            // jika berhasil tampilkan pesan berhasil update data
                            header("location: ../../main.php?module=password&alert=3");
                        }
                    }
                }
            }
        }
    }
} else {
    if (empty($_SESSION['email']) && empty($_SESSION['password'])) {
        echo "<meta http-equiv='refresh' content='0; url=index0.php?alert=1'>";
    } // jika admin sudah login, maka jalankan perintah untuk ubah password
    else {
        if (isset($_POST['simpan'])) {
            if (isset($_SESSION['id_siswa'])) {
                // ambil data hasil submit dari form
                $old_pass = md5(mysqli_real_escape_string($mysqli, trim($_POST['old_pass'])));
                $new_pass = md5(mysqli_real_escape_string($mysqli, trim($_POST['new_pass'])));
                $retype_pass = md5(mysqli_real_escape_string($mysqli, trim($_POST['retype_pass'])));

                // ambil data hasil session siswa
                $id_siswa = $_SESSION['id_siswa'];

                // seleksi password dari tabel siswa untuk dicek
                $sql = mysqli_query($mysqli, "SELECT password FROM siswa WHERE id_siswa=$id_siswa")
                or die('Ada kesalahan pada query seleksi password : ' . mysqli_error($mysqli));
                $data = mysqli_fetch_assoc($sql);

                // fungsi untuk pengecekan password sebelum diubah
                // jika input password lama tidak sama dengan password di database,
                // alihkan ke halaman ubah password dan tampilkan pesan = 1
                if ($old_pass != $data['password']) {
                    header("Location: ../../main.php?module=password&alert=1");
                } // jika input password lama sama dengan password didatabase, jalankan perintah untuk pengecekan selanjutnya
                else {

                    // jika input password baru tidak sama dengan input ulangi password baru,
                    // alihkan ke halaman ubah password dan tampilkan pesan = 2
                    if ($new_pass != $retype_pass) {
                        header("Location: ../../main.php?module=password&alert=2");
                    } // selain itu, jalankan perintah update password
                    else {
                        // perintah query untuk mengubah data pada tabel siswa
                        $query = mysqli_query($mysqli, "UPDATE siswa SET password = '$new_pass'
                                                                  WHERE id_siswa  = '$id_siswa'")
                        or die('Ada kesalahan pada query update password : ' . mysqli_error($mysqli));

                        // cek query
                        if ($query) {
                            // jika berhasil tampilkan pesan berhasil update data
                            header("location: ../../main.php?module=password&alert=3");
                        }
                    }
                }
            }
        }
    }
}
?>