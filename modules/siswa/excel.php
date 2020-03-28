<?php
include '../../config/fungsi_indotgl.php';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=datasiswa.xls");
// deklarasi parameter koneksi database
$server   = "localhost";
$username = "root";
$password = "";
$database = "db_smp";

// koneksi database
$mysqli = new mysqli($server, $username, $password, $database);

// cek koneksi
if ($mysqli->connect_error) {
    die('Koneksi Database Gagal : '.$mysqli->connect_error);
}
?>
<center>
    <h3>Data Siswa Baru SMPN 1 Bengkalis</h3>
</center>
<table border="1" id="dataTables1" class="table table-bordered table-striped table-hover">
    <!-- tampilan tabel header -->
    <thead>
    <tr>
        <th class="center">No.</th>
        <th class="center">Nama</th>
        <th class="center">Email</th>
        <th class="center">Alamat</th>
        <th class="center">Telepon</th>
        <th class="center">Jenis Kelamin</th>
        <th class="center">Asal Sekolah</th>
        <th class="center">Nilai Sekolah</th>
        <th class="center">Nilai UN</th>
    </tr>
    </thead>
    <!-- tampilan tabel body -->
    <tbody>
    <?php
    // fungsi query untuk menampilkan data dari tabel karyawan
    $query = mysqli_query($mysqli, "SELECT * FROM siswa ")
    or die('Ada kesalahan pada query tampil Data siswa: '.mysqli_error($mysqli));
    $no = 1;

    // tampilkan data
    while ($data = mysqli_fetch_assoc($query)) {
        $jk = $data['jenis_kelamin'];
        echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td class='center'>$data[nama_siswa]</td>
                      <td class='center'>$data[email]</td>
                      <td class='center'>$data[alamat]</td>
                      <td class='center'>$data[telepon]</td>
                      
                      <td class='center'>";
        if($jk=='Laki-laki'){echo 'Laki-laki';}elseif($jk=='Perempuan'){echo 'Perempuan';}
        echo "
                      </td>
                      <td class='center'>$data[asal_sekolah]</td>
                      <td class='center'>$data[nilai_sekolah]</td>
                      <td class='center'>$data[nilai_un]</td>

        </tr>";
        $no++;
    }
    ?>
    </tbody>
</table>
