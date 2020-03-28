<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Wali Murid</h1>
</div>

<?php
// fungsi untuk menampilkan pesan
// jika alert = "" (kosong)
// tampilkan pesan "" (kosong)
if (empty($_GET['alert'])) {
    echo "";
}
elseif ($_GET['alert'] == 8) {
    echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data wali berhasil dikirim.
            </div>";
}
// jika alert = 1
// tampilkan pesan Sukses "Data wali baru berhasil disimpan"
elseif ($_GET['alert'] == 1) {
    echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data wali berhasil disimpan.
            </div>";
}
// jika alert = 2
// tampilkan pesan Sukses "Data wali berhasil diubah"
elseif ($_GET['alert'] == 2) {
    echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data wali berhasil diubah.
            </div>";
}
// jika alert = 3
// tampilkan pesan Sukses "Data wali berhasil dihapus"
elseif ($_GET['alert'] == 3) {
    echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data wali berhasil dihapus.
            </div>";
}
// jika alert = 5
// tampilkan pesan Upload Gagal "Pastikan file yang diupload sudah benar"
elseif ($_GET['alert'] == 5) {
    echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Upload Gagal!</h4>
              Pastikan file yang diupload sudah benar.
            </div>";
}
// jika alert = 6
// tampilkan pesan Upload Gagal "Pastikan ukuran foto tidak lebih dari 1MB"
elseif ($_GET['alert'] == 6) {
    echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Upload Gagal!</h4>
              Pastikan ukuran foto tidak lebih dari 1MB.
            </div>";
}
// jika alert = 7
// tampilkan pesan Upload Gagal "Pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG"
elseif ($_GET['alert'] == 7) {
    echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Upload Gagal!</h4>
              Pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG.
            </div>";
}
?>

<?php if ($_SESSION['hak_akses']=='admin' || $_SESSION['hak_akses']=='panitia') { ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>Pekerjaan Ayah</th>
                    <th>Pekerjaan Ibu</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
            <?php
            // fungsi query untuk menampilkan data dari tabel wali
            $query = mysqli_query($mysqli, "SELECT w.*, p.pekerjaan as pekerjaan_ayah, p2.pekerjaan as pekerjaan_ibu FROM wali w LEFT JOIN pekerjaan p ON w.id_kerja_ayah = p.id_pekerjaan LEFT JOIN pekerjaan p2 ON w.id_kerja_ibu = p2.id_pekerjaan ")
            or die('Ada kesalahan pada query tampil Data wali: '.mysqli_error($mysqli));
            $no = 1;

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) {
                echo "
                <tr>
                    <td>$no</td>
                    <td>$data[nama_ayah]</td>
                    <td>$data[nama_ibu]</td>
                    <td>$data[pekerjaan_ayah]</td>
                    <td>$data[pekerjaan_ibu]</td>
                    <td>$data[alamat]</td>
                    <td>
                    <div>
                          <a data-toggle='tooltip' data-placement='top' title='Detail' style='margin-right:5px' class='btn btn-success btn-sm' href='?module=form_wali&form=update&id_wali=$data[id_wali]'>
                              <i style='color:#fff' class='glyphicon glyphicon-folder-open'>Edit</i>
                          </a>
                          ";
            ?>
            <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/wali/proses.php?act=delete&id_wali=<?php echo $data['id_wali'];?>" onclick="return confirm('Anda yakin ingin menghapus <?php echo $data['nama_ayah']; ?> dan <?php echo $data['nama_ibu']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash">Hapus</i>
                          </a>

                    </td>
                </tr>
                <?php
                $no++;
            }
            ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php } else {
    $id_siswa = $_SESSION['id_siswa'];
    $query = mysqli_query($mysqli, "SELECT COUNT(id_wali) as jumlah FROM wali WHERE id_siswa='$id_siswa' ")
    or die('Ada kesalahan pada query tampil Data wali: '.mysqli_error($mysqli));

    $data = mysqli_fetch_assoc($query);
    if ($data['jumlah']==0) {
    ?>

    <table class="pull-right">
        <tr>
            <td style="padding-right: 10px">
                <a class="btn btn-success btn-social pull-right" href="?module=form_wali&form=add" title="Tambah Data" data-toggle="tooltip">
                    <i class="fa fa-plus"></i> Tambah
                </a>
            </td>
        </tr>
    </table>

    <br>

        <?php } ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>Pekerjaan Ayah</th>
                    <th>Pekerjaan Ibu</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $id_siswa = $_SESSION['id_siswa'];
                // fungsi query untuk menampilkan data dari tabel wali
                $query = mysqli_query($mysqli, "SELECT w.*, p.pekerjaan as pekerjaan_ayah, p2.pekerjaan as pekerjaan_ibu FROM wali w LEFT JOIN pekerjaan p ON w.id_kerja_ayah = p.id_pekerjaan LEFT JOIN pekerjaan p2 ON w.id_kerja_ibu = p2.id_pekerjaan WHERE id_siswa='$id_siswa'")
                or die('Ada kesalahan pada query tampil Data wali: '.mysqli_error($mysqli));
                $no = 1;

                // tampilkan data
                while ($data = mysqli_fetch_assoc($query)) {
                    echo "<tr>
                      <td width='30' class='center'>$no</td>                      
                      <td class='center'>$data[nama_ayah]</td>
                      <td class='center'>$data[nama_ibu]</td>
                      <td class='center'>$data[pekerjaan_ayah]</td>
                      <td class='center'>$data[pekerjaan_ibu]</td>
                      <td class='center'>$data[alamat]</td>";
                    ?>
                    <td class='center' width='80'>
                        <div>

                            <?php
                            $id_siswa = $_SESSION['id_siswa'];
                            $query = mysqli_query($mysqli, "SELECT * FROM siswa WHERE id_siswa='$id_siswa' ")
                            or die('Ada kesalahan pada query tampil Data wali: '.mysqli_error($mysqli));

                            $data = mysqli_fetch_assoc($query);
                            if ($data['kirim']!='Ya') {
                                $query2 = mysqli_query($mysqli, "SELECT * FROM wali WHERE id_siswa='$id_siswa' ")
                                or die('Ada kesalahan pada query tampil Data wali: '.mysqli_error($mysqli));

                                $data2 = mysqli_fetch_assoc($query2);
                                ?>

                                <a data-toggle='tooltip' data-placement='top' title='Lengkapi Data' style='margin-right:5px' class='btn btn-success btn-sm' href='?module=form_wali&form=update&id_wali=<?php echo $data2['id_wali'];?>'>
                                    <i style='color:#fff' class='glyphicon glyphicon-folder-open'>Edit</i>
                                </a>
                            <?php } else {
                                echo "<span style='color: grey;'>Data Terkirim</span>";
                            } ?>

                        </div>
                    </td>
                    </tr>
                    <?php
                    $no++;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php } ?>
