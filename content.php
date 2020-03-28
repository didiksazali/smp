<?php
/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";
/* panggil file fungsi tambahan */

// fungsi untuk pengecekan status login admin
// jika admin belum login, alihkan ke halaman login dan tampilkan message = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index0.php?alert=1'>";
}
// jika admin sudah login, maka jalankan perintah untuk pemanggilan file halaman konten
else {
        // jika halaman konten yang dipilih beranda, panggil file view beranda
        if ($_GET['module'] == 'beranda') {
            include "modules/beranda/view.php";
        }

        // jika halaman siswa yang dipilih, panggil file view siswa
        elseif ($_GET['module'] == 'siswa') {
            include "modules/siswa/view.php";
        }

        // jika halaman konten yang dipilih form siswa, panggil file form siswa
        elseif ($_GET['module'] == 'form_siswa') {
            include "modules/siswa/form.php";
        }
        // -----------------------------------------------------------------------------

        // jika halaman konten yang dipilih pendonor, panggil file view agama
        elseif ($_GET['module'] == 'agama') {
            include "modules/agama/view.php";
        }

        // jika halaman konten yang dipilih form pendonor, panggil file form agama
        elseif ($_GET['module'] == 'form_agama') {
            include "modules/agama/form.php";
        }

        // -----------------------------------------------------------------------------

        // jika halaman konten yang dipilih admin, panggil file view admin
        elseif ($_GET['module'] == 'admin') {
            include "modules/admin/view.php";
        }

        // jika halaman konten yang dipilih form admin, panggil file form admin
        elseif ($_GET['module'] == 'form_admin') {
            include "modules/admin/form.php";
        }
        // -----------------------------------------------------------------------------

        // jika halaman konten yang dipilih profil, panggil file view profil
        elseif ($_GET['module'] == 'profil') {
            include "modules/profil/view.php";
        }

        // jika halaman konten yang dipilih form profil, panggil file form profil
        elseif ($_GET['module'] == 'form_profil') {
            include "modules/profil/form.php";
        }
        // -----------------------------------------------------------------------------

        elseif ($_GET['module'] == 'pekerjaan') {
            include "modules/pekerjaan/view.php";
        }

        // jika halaman konten yang dipilih form profil, panggil file form profil
        elseif ($_GET['module'] == 'form_pekerjaan') {
            include "modules/pekerjaan/form.php";
        }

        elseif ($_GET['module'] == 'wali') {
            include "modules/wali/view.php";
        }

        // jika halaman konten yang dipilih form profil, panggil file form profil
        elseif ($_GET['module'] == 'form_wali') {
            include "modules/wali/form.php";
        }

        // jika halaman konten yang dipilih password, panggil file view password
        elseif ($_GET['module'] == 'password') {
            include "modules/password/view.php";
        }
}
?>