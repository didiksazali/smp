<?php
// ambil data hasil submit dari form

$id_siswa = $_GET['id_siswa'];

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
        <title>Kartu Pendaftaran Siswa Baru SMPN 1 Bengkalis</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
        <style type="text/css">
            .line {
                margin:5px 0;
                height:2px;
                background:
                        repeating-linear-gradient(to right,red 0,red 5px,transparent 5px,transparent 7px)
                /*5px red then 2px transparent -> repeat this!*/
            }
        </style>
    </head>
    <body>


<!--    <table align="center" width="100%">-->
<!--        <tr>-->
<!--            <td align="center">-->
<!--                <img src="../../images/logo.png" style="width: 40px; height: 40px hspace=5px; margin-right: 20px">-->
<!--            </td>-->
<!--            <td align="center" padding="5px" style="font-size: 22px;">-->
<!--                Siswa Baru SMPN 1 Bengkalis-->
<!--                <br>-->
<!--            </td>-->
<!--            <td align="center">-->
<!--<!--                <img src="../../../../logolaporan2.png" style="width: 60px; height: 60px" hspace="10px">-->
<!--            </td>-->
<!--        </tr>-->
<!--    </table>-->



<!--    <hr>-->
    <br>
    <table align="center" width="100%" border="0.3" cellpadding="0" cellspacing="0">

        <tr>
            <td width='605' style="font-size: 22px;">
                <img src="../../images/logo.png" style="width: 40px; height: 40px hspace=5px">  Kartu Pendaftar Siswa Baru SMPN 1 Bengkalis
            </td>

        </tr>


    </table>

        <table align="center" width="100%" border="0.3" cellpadding="0" cellspacing="0">
            <?php
            // fungsi query untuk menampilkan data dari tabel karyawan
            $query = mysqli_query($mysqli, "SELECT * FROM siswa WHERE id_siswa='$id_siswa'")
            or die('Ada kesalahan pada query tampil Data siswa: '.mysqli_error($mysqli));
            $no = 1;

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
                $jk = $data['jenis_kelamin'];
                echo"
            <tr>
                <td height='10' width='300' align='center' valign='middle' rowspan='8'><img style='width: 200px; height: 230px' src='../../images/siswa/$data[foto]'> </td>
                <td height='10' width='300' align='left' valign='middle'>
                Nama Siswa
                <p style='margin-left: 20px'><b>$data[nama_siswa]</b></p>
                Email Siswa
                <p style='margin-left: 20px'><b>$data[email]</b></p>
                Alamat
                <p style='margin-left: 20px'><b>$data[alamat]</b></p>
                Telepon
                <p style='margin-left: 20px'><b>$data[telepon]</b></p>
                Asal Sekolah
                <p style='margin-left: 20px'><b>$data[asal_sekolah]</b></p>
                Tanggal Daftar
                <p style='margin-left: 20px'><b>";?><?php echo tgl_indo($data['tgl_daftar'])?><?php echo "</b></p>
                </td>
            </tr>
            
            ";?>

        </table>

    <table align="center" width="100%" border="0.3" cellpadding="0" cellspacing="0">

            <tr>
            <td width='605'>
            Dengan ini saya menyatakan bahwa data yang saya daftarkan di formulir pendaftaran
                <br>
                siswa baru SMPN 1 Bengkalis adalah benar. Apabila di kemudian hari, diketahui bahwa
                <br>
                data saya ini salah, saya siap dituntut sesuai peraturan yang berlaku.
                <br>
                <br>
                <p style="margin-left: 380px">
                    Pekanbaru, <?php echo tgl_indo($hari_ini); ?>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                <p style="margin-left: 65px">
                    <b>
                        <?php echo $data['nama_siswa']; ?>
                    </b>
                </p>
            </p>
            </td>

            </tr>


    </table>







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
    $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>