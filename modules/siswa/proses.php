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
            $nama_siswa        = $_POST['nama_siswa'];
            $tempat_lahir      = $_POST['tempat_lahir'];
            $tgl_lahir         = $_POST['tgl_lahir'];
            $id_agama          = $_POST['id_agama'];
            $email             = $_POST['email'];
            $password          = md5($_POST['password']);
            $alamat            = $_POST['alamat'];
            $telepon           = $_POST['telepon'];
            $jenis_kelamin     = $_POST['jenis_kelamin'];
            $asal_sekolah      = $_POST['asal_sekolah'];
            $nilai_sekolah     = $_POST['nilai_sekolah'];
            $nilai_un          = $_POST['nilai_un'];
            $status            = $_POST['status'];

            $nama_file          = $_FILES['foto']['name'];
            $nama_kk            = $_FILES['kk']['name'];
            $nama_ijazah        = $_FILES['ijazah']['name'];
            $ukuran_file        = $_FILES['foto']['size'];
            $tipe_file          = $_FILES['foto']['type'];
            $tmp_file           = $_FILES['foto']['tmp_name'];
            $tmp_kk             = $_FILES['kk']['tmp_name'];
            $tmp_ijazah         = $_FILES['ijazah']['tmp_name'];

            // tentuka extension yang diperbolehkan
            $allowed_extensions = array('jpg','jpeg','png');

            // Set path folder tempat menyimpan gambarnya
            $path_file          = "../../images/siswa/".$nama_file;
            $path_kk            = "../../images/kk/".$nama_kk;
            $path_ijazah        = "../../images/ijazah/".$nama_ijazah;

            // check extension
            $file               = explode(".", $nama_file);
            $extension          = array_pop($file);

            // Cek apakah tipe file yang diupload sesuai dengan allowed_extensions
            if (in_array($extension, $allowed_extensions)) {
                // Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
                if($ukuran_file <= 1000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                    // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                    // Proses upload
                    if(move_uploaded_file($tmp_file, $path_file)) {
                        move_uploaded_file($tmp_kk, $path_kk);
                        move_uploaded_file($tmp_ijazah, $path_ijazah);

                        // perintah query untuk menyimpan data ke tabel users
                        $query = mysqli_query($mysqli, "INSERT INTO siswa (nama_siswa,tempat_lahir,tgl_lahir,id_agama,email,password,alamat,
                                              telepon,jenis_kelamin,foto,kk,ijazah,asal_sekolah,nilai_sekolah,nilai_un,status)
                                            VALUES('$nama_siswa','$tempat_lahir','$tgl_lahir','$id_agama','$email','$password','$alamat','$telepon',
                                            '$jenis_kelamin','$nama_file','$nama_kk','$nama_ijazah','$asal_sekolah','$nilai_sekolah','$nilai_un','$status')")
                        or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));

                        // cek query
                        if ($query) {
                            // jika berhasil tampilkan pesan berhasil simpan data
                            header("location: ../../main.php?module=siswa&alert=1");
                        }
                    } else {
                        // Jika gambar gagal diupload, tampilkan pesan gagal upload
                        header("location: ../../main.php?module=siswa&alert=5");
                    }
                } else {
                    // Jika ukuran file lebih dari 1MB, tampilkan pesan gagal upload
                    header("location: ../../main.php?module=siswa&alert=6");
                }
            } else {
                // Jika tipe file yang diupload bukan jpg, jpeg, png, tampilkan pesan gagal upload
                header("location: ../../main.php?module=siswa&alert=7");
            }
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_siswa'])) {
                $id_siswa          = $_POST['id_siswa'];
                $nama_siswa        = $_POST['nama_siswa'];
                $tempat_lahir      = $_POST['tempat_lahir'];
                $tgl_lahir         = $_POST['tgl_lahir'];
                $id_agama          = $_POST['id_agama'];
                $email             = $_POST['email'];
                $password          = md5($_POST['password']);
                $alamat            = $_POST['alamat'];
                $telepon           = $_POST['telepon'];
                $jenis_kelamin     = $_POST['jenis_kelamin'];
                $asal_sekolah      = $_POST['asal_sekolah'];
                $nilai_sekolah     = $_POST['nilai_sekolah'];
                $nilai_un          = $_POST['nilai_un'];

                $nama_file          = $_FILES['foto']['name'];
                $nama_kk            = $_FILES['kk']['name'];
                $nama_ijazah        = $_FILES['ijazah']['name'];
                $ukuran_file        = $_FILES['foto']['size'];
                $tipe_file          = $_FILES['foto']['type'];
                $tmp_file           = $_FILES['foto']['tmp_name'];
                $tmp_kk             = $_FILES['kk']['tmp_name'];
                $tmp_ijazah         = $_FILES['ijazah']['tmp_name'];

                // tentuka extension yang diperbolehkan
                $allowed_extensions = array('jpg','jpeg','png');

                // Set path folder tempat menyimpan gambarnya
                $path_file          = "../../images/siswa/".$nama_file;
                $path_kk            = "../../images/kk/".$nama_kk;
                $path_ijazah        = "../../images/ijazah/".$nama_ijazah;

                // check extension
                $file               = explode(".", $nama_file);
                $extension          = array_pop($file);


                // jika password tidak diubah dan foto tidak diubah
                if (empty($_POST['password']) && empty($_FILES['foto']['name'])) {
                    move_uploaded_file($tmp_kk, $path_kk);
                    move_uploaded_file($tmp_ijazah, $path_ijazah);
                    // perintah query untuk mengubah data pada tabel users
                    $query = mysqli_query($mysqli, "UPDATE siswa SET nama_siswa = '$nama_siswa',
                                                                                       tempat_lahir = '$tempat_lahir',
                                                                                       tgl_lahir = '$tgl_lahir',
                                                                                       id_agama = '$id_agama',
                                                                                       email = '$email',
                                                                                       alamat = '$alamat',
                                                                                       telepon = '$telepon',
                                                                                       jenis_kelamin = '$jenis_kelamin',
                                                                                       kk = '$nama_kk',
                                                                                       ijazah = '$nama_ijazah',
                                                                                       asal_sekolah = '$asal_sekolah',
                                                                                       nilai_sekolah = '$nilai_sekolah',
                                                                                       nilai_un = '$nilai_un'
                                                                                       WHERE id_siswa = '$id_siswa'")
                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../main.php?module=siswa&alert=2");
                    }
                }
                // jika password diubah dan foto tidak diubah
                elseif (!empty($_POST['password']) && empty($_FILES['foto']['name'])) {
                    move_uploaded_file($tmp_kk, $path_kk);
                    move_uploaded_file($tmp_ijazah, $path_ijazah);
                    // perintah query untuk mengubah data pada tabel users
                    $query = mysqli_query($mysqli, "UPDATE siswa SET nama_siswa = '$nama_siswa',
                                                                                       tempat_lahir = '$tempat_lahir',
                                                                                       tgl_lahir = '$tgl_lahir',
                                                                                       id_agama = '$id_agama', 
                                                                                       email = '$email',
                                                                                       password  = '$password',
                                                                                       alamat = '$alamat',
                                                                                       telepon = '$telepon',
                                                                                       jenis_kelamin = '$jenis_kelamin',
                                                                                       kk = '$nama_kk',
                                                                                       ijazah = '$nama_ijazah',
                                                                                       asal_sekolah = '$asal_sekolah',
                                                                                       nilai_sekolah = '$nilai_sekolah',
                                                                                       nilai_un = '$nilai_un'
                                                                                       WHERE id_siswa = '$id_siswa'")
                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../main.php?module=siswa&alert=2");
                    }
                }
                // jika password tidak diubah dan foto diubah
                elseif (empty($_POST['password']) && !empty($_FILES['foto']['name'])) {
                    // Cek apakah tipe file yang diupload sesuai dengan allowed_extensions
                    if (in_array($extension, $allowed_extensions)) {
                        // Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
                        if($ukuran_file <= 1000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                            // Proses upload
                            if(move_uploaded_file($tmp_file, $path_file)) { // Cek apakah gambar berhasil diupload atau tidak
                                move_uploaded_file($tmp_kk, $path_kk);
                                move_uploaded_file($tmp_ijazah, $path_ijazah);
                                // Jika gambar berhasil diupload, Lakukan : 
                                // perintah query untuk mengubah data pada tabel users
                                $query = mysqli_query($mysqli, "UPDATE siswa SET nama_siswa = '$nama_siswa',
                                                                                       tempat_lahir = '$tempat_lahir',
                                                                                       tgl_lahir = '$tgl_lahir',
                                                                                       id_agama = '$id_agama',
                                                                                       email = '$email',
                                                                                       alamat = '$alamat',
                                                                                       telepon = '$telepon',
                                                                                       jenis_kelamin = '$jenis_kelamin',
                                                                                       foto = '$nama_file',
                                                                                       kk = '$nama_kk',
                                                                                       ijazah = '$nama_ijazah',
                                                                                       asal_sekolah = '$asal_sekolah',
                                                                                       nilai_sekolah = '$nilai_sekolah',
                                                                                       nilai_un = '$nilai_un'
                                                                                       WHERE id_siswa = '$id_siswa'")
                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                                // cek query
                                if ($query) {
                                    // jika berhasil tampilkan pesan berhasil update data
                                    header("location: ../../main.php?module=siswa&alert=2");
                                }
                            } else {
                                // Jika gambar gagal diupload, tampilkan pesan gagal upload
                                header("location: ../../main.php?module=siswa&alert=5");
                            }
                        } else {
                            // Jika ukuran file lebih dari 1MB, tampilkan pesan gagal upload
                            header("location: ../../main.php?module=siswa&alert=6");
                        }
                    } else {
                        // Jika tipe file yang diupload bukan jpg, jpeg, png, tampilkan pesan gagal upload
                        header("location: ../../main.php?module=siswa&alert=7");
                    }
                }
                // jika password diubah dan foto diubah
                else {
                    // Cek apakah tipe file yang diupload sesuai dengan allowed_extensions
                    if (in_array($extension, $allowed_extensions)) {
                        // Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
                        if($ukuran_file <= 1000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                            // Proses upload
                            if(move_uploaded_file($tmp_file, $path_file)) { // Cek apakah gambar berhasil diupload atau tidak
                                move_uploaded_file($tmp_kk, $path_kk);
                                move_uploaded_file($tmp_ijazah, $path_ijazah);
                                // Jika gambar berhasil diupload, Lakukan : 
                                // perintah query untuk mengubah data pada tabel users
                                $query = mysqli_query($mysqli, "UPDATE siswa SET nama_siswa = '$nama_siswa',
                                                                                       tempat_lahir = '$tempat_lahir',
                                                                                       tgl_lahir = '$tgl_lahir',
                                                                                       id_agama = '$id_agama',
                                                                                       email = '$email',
                                                                                       password  = '$password',
                                                                                       alamat = '$alamat',
                                                                                       telepon = '$telepon',
                                                                                       jenis_kelamin = '$jenis_kelamin',
                                                                                       foto = '$nama_file',
                                                                                       kk = '$nama_kk',
                                                                                       ijazah = '$nama_ijazah',
                                                                                       asal_sekolah = '$asal_sekolah',
                                                                                       nilai_sekolah = '$nilai_sekolah',
                                                                                       nilai_un = '$nilai_un'
                                                                                       WHERE id_siswa = '$id_siswa'")
                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                                // cek query
                                if ($query) {
                                    // jika berhasil tampilkan pesan berhasil update data
                                    header("location: ../../main.php?module=siswa&alert=2");
                                }
                            } else {
                                // Jika gambar gagal diupload, tampilkan pesan gagal upload
                                header("location: ../../main.php?module=siswa&alert=5");
                            }
                        } else {
                            // Jika ukuran file lebih dari 1MB, tampilkan pesan gagal upload
                            header("location: ../../main.php?module=siswa&alert=6");
                        }
                    } else {
                        // Jika tipe file yang diupload bukan jpg, jpeg, png, tampilkan pesan gagal upload
                        header("location: ../../main.php?module=siswa&alert=7");
                    }
                }
                
                



            }
        }
    }

    elseif ($_GET['act']=='kirim') {
        if (isset($_GET['id_siswa'])) {
            $id_siswa = $_GET['id_siswa'];

            $query = mysqli_query($mysqli, "UPDATE siswa SET kirim = 'Ya' WHERE id_siswa = '$id_siswa'")
            or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));
            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=siswa&alert=8");
            }
        }
    }

    elseif ($_GET['act']=='proses') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_siswa'])) {
                $id_siswa          = $_POST['id_siswa'];
                $status            = $_POST['status'];
                $keterangan        = $_POST['keterangan'];


                    // perintah query untuk mengubah data pada tabel users
                    $query = mysqli_query($mysqli, "UPDATE siswa SET status = '$status', keterangan = '$keterangan' WHERE id_siswa = '$id_siswa'")
                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../main.php?module=siswa&alert=2");
                    }


            }
        }
    }

    elseif ($_GET['act']=='kirim') {
        if (isset($_GET['id_siswa'])) {
            $id_siswa = $_GET['id_siswa'];

            $query = mysqli_query($mysqli, "UPDATE siswa SET kirim = 'Ya' WHERE id_siswa = '$id_siswa'")
            or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));
            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=siswa&alert=8");
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id_siswa'])) {
            $id_siswa = $_GET['id_siswa'];
    
            // perintah query untuk menghapus data pada tabel siswa
            $query = mysqli_query($mysqli, "DELETE FROM siswa WHERE id_siswa = '$id_siswa'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=siswa&alert=3");
            }
        }
    }       
}       
?>