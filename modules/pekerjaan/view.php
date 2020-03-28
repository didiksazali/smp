<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pekerjaan</h1>
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
              Data pekerjaan berhasil dikirim.
            </div>";
}
// jika alert = 1
// tampilkan pesan Sukses "Data pekerjaan baru berhasil disimpan"
elseif ($_GET['alert'] == 1) {
    echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data pekerjaan berhasil disimpan.
            </div>";
}
// jika alert = 2
// tampilkan pesan Sukses "Data pekerjaan berhasil diubah"
elseif ($_GET['alert'] == 2) {
    echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data pekerjaan berhasil diubah.
            </div>";
}
// jika alert = 3
// tampilkan pesan Sukses "Data pekerjaan berhasil dihapus"
elseif ($_GET['alert'] == 3) {
    echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data pekerjaan berhasil dihapus.
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

<?php if ($_SESSION['hak_akses']=='admin') { ?>

    <table class="pull-right">
    <tr>
        <td style="padding-right: 10px">
            <a class="btn btn-success btn-social pull-right" href="?module=form_pekerjaan&form=add" title="Tambah Data" data-toggle="tooltip">
                <i class="fa fa-plus"></i> Tambah
            </a>
        </td>
    </tr>
    </table>

    <br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Pekerjaan</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
            <?php
            // fungsi query untuk menampilkan data dari tabel pekerjaan
            $query = mysqli_query($mysqli, "SELECT * FROM pekerjaan")
            or die('Ada kesalahan pada query tampil Data pekerjaan: '.mysqli_error($mysqli));
            $no = 1;

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) {
                echo "
                    <tr>
                    <td>$no</td>
                    <td>$data[pekerjaan]</td>
                    <td>
                          <a data-toggle='tooltip' data-placement='top' title='Detail' style='margin-right:5px' class='btn btn-success btn-sm' href='?module=form_pekerjaan&form=update&id_pekerjaan=$data[id_pekerjaan]'>
                              <i style='color:#fff' class='glyphicon glyphicon-folder-open'>Edit</i>
                          </a>
                          ";
            ?>
            <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/pekerjaan/proses.php?act=delete&id_pekerjaan=<?php echo $data['id_pekerjaan'];?>" onclick="return confirm('Anda yakin ingin menghapus <?php echo $data['pekerjaan']; ?> ?');">
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

<?php } else { ?>

<!-- DataTales Example -->

<?php } ?>
