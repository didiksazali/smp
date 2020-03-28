<?php
session_start();
ob_start();
include '../../config/fungsi_indotgl.php';
// deklarasi parameter koneksi database
$server   = "localhost";
$username = "root";
$password = "";
$database = "db_smp";

// koneksi database
$mysqli = new mysqli($server, $username, $password, $database);
$hari_ini = date("Y-m-d");
// cek koneksi
if ($mysqli->connect_error) {
    die('Koneksi Database Gagal : '.$mysqli->connect_error);
}


?>
    <html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Data Siswa Baru SMPN 1 Bengkalis</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <body>


    <table align="center" width="100%">
        <tr>
            <td align="center">
                <img src="../../images/logo.png" style="width: 60px; height: 60px hspace=10px; margin-right: 20px">
            </td>
            <td align="center" padding="5px" style="font-size: 22px;">
                Siswa Baru SMPN 1 Bengkalis
                <br>
            </td>
            <td align="center">
<!--                <img src="../../../../logolaporan2.png" style="width: 60px; height: 60px" hspace="10px">-->
            </td>
        </tr>
    </table>



    <hr><br>
    <div id="isi">
        <table align="center" width="100%" border="0.3" cellpadding="0" cellspacing="0">
            <thead style="background:#e8ecee">
            <tr class="tr-title">
                <th height="20" align="center" valign="middle">No.</th>
                <th height="20" align="center" valign="middle">Nama</th>
                <th height="20" align="center" valign="middle">Email</th>
                <th height="20" align="center" valign="middle">Alamat</th>
                <th height="20" align="center" valign="middle">Telepon</th>
                <th height="20" align="center" valign="middle">Jenis Kelamin</th>
                <th height="20" align="center" valign="middle">Asal Sekolah</th>
                <th height="20" align="center" valign="middle">Nilai Sekolah</th>
                <th height="20" align="center" valign="middle">Nilai UN</th>
                <th height="20" align="center" valign="middle">Status</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // fungsi query untuk menampilkan data dari tabel karyawan
            $query = mysqli_query($mysqli, "SELECT * FROM siswa WHERE status='Tidak Lulus'")
            or die('Ada kesalahan pada query tampil Data karyawan: '.mysqli_error($mysqli));
            $no = 1;

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) {
                $jk = $data['jenis_kelamin'];
                echo "<tr>
                    <td width='35' height='13' align='center' valign='middle'>$no</td>
                    <td width='120' height='13' align='center' valign='middle'>$data[nama_siswa]</td>
                    <td width='120' height='13' align='center' valign='middle'>$data[email]</td>
                    <td width='120' height='13' align='center' valign='middle'>$data[alamat]</td>
                    <td width='90' height='13' align='center' valign='middle'>$data[telepon]</td>
                    <td width='90' height='13' align='center' valign='middle'>";
                    if($jk=='Laki-laki'){echo 'Laki-laki';}elseif($jk=='Perempuan'){echo 'Perempuan';}
                    echo "</td>
                    <td width='100' height='13' align='center' valign='middle'>$data[asal_sekolah]</td>
                    <td width='100' height='13' align='center' valign='middle'>$data[nilai_sekolah]</td>
                    <td width='100' height='13' align='center' valign='middle'>$data[nilai_un]</td>
                    <td width='100' height='13' align='center' valign='middle'>$data[status]</td>
                  ";
        ?>

        </tr>
        <?php
        $no++;
    }
    ?>
            </tbody>
        </table>
        <br>
        <br>
        <p align="right">
            Pekanbaru, <?php echo tgl_indo($hari_ini); ?>
            <br>
            <br>
            <br>
            <br>
            <br>
        <p style="margin-right: 50px">
            <b>
                ADMIN
            </b>
        </p>
        </p>

    </div>
    </body>
    </html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$nama_dokumen='Data Siswa Baru';
$filename=$nama_dokumen.".pdf";
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';
// panggil library html2pdf
require_once('../../html2pdf/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('L','A4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>