<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
</div>

<?php if ($_SESSION['hak_akses']=='admin'|| $_SESSION['hak_akses']=='panitia') { ?>
    <table class="pull-right">
        <tr>
            <td style="padding-right: 10px">
                <a class="btn btn-success btn-social pull-right" href="?module=form_siswa&form=add" title="Tambah Data" data-toggle="tooltip">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </td>
            <td style="padding-right: 10px">
                <a class="btn btn-warning btn-social pull-right" href="modules/siswa/excel.php" title="Export to Excel" data-toggle="tooltip">
                    <i class="fas fa-file-excel-o"></i> Excel
                </a>
            </td>
            <td style="padding-right: 10px">
                <a class="btn btn-primary btn-social pull-right" href="modules/siswa/word.php" title="Export to Word" data-toggle="tooltip">
                    <i class="fas fa-file-word-o"></i> Word
                </a>
            </td>
<!--            <td>-->
<!--                <a class="btn btn-danger btn-social pull-right" href="modules/siswa/pdf.php" title="Export to PDF" data-toggle="tooltip">-->
<!--                    <i class="fas fa-file-pdf-o"></i> PDF-->
<!--                </a>-->
<!--            </td>-->
            <td>
                    <div class="col-sm-12">
                        <select type="text" onchange="document.location.href=this.value" class="form-control" name="" id="dynamic_select" autocomplete="off" required>
                            <option selected value="">Cetak Data PDF</option>
                            <option value="modules/siswa/pdf.php" href="">Lulus</option>
                            <option value="modules/siswa/pdf2.php">Tidak Lulus</option>
                        </select>
                    </div>
            </td>
        </tr>
    </table>

    <br>

<?php } ?>

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
              Data siswa berhasil dikirim.
            </div>";
}
// jika alert = 1
// tampilkan pesan Sukses "Data siswa baru berhasil disimpan"
elseif ($_GET['alert'] == 1) {
    echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data siswa berhasil disimpan.
            </div>";
}
// jika alert = 2
// tampilkan pesan Sukses "Data siswa berhasil diubah"
elseif ($_GET['alert'] == 2) {
    echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data siswa berhasil diubah.
            </div>";
}
// jika alert = 3
// tampilkan pesan Sukses "Data siswa berhasil dihapus"
elseif ($_GET['alert'] == 3) {
    echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data siswa berhasil dihapus.
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
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>KK</th>
                    <th>Ijazah</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
            <?php
            // fungsi query untuk menampilkan data dari tabel siswa
            $query = mysqli_query($mysqli, "SELECT * FROM siswa")
            or die('Ada kesalahan pada query tampil Data siswa: '.mysqli_error($mysqli));
            $no = 1;

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) {
                echo "
                <tr>
                    <td>$no</td>";
                    if ($data['foto']=="") { ?>
                        <td class='center'><img class='img-user' src='images/siswa/user-default.png' width='45'></td>
                      <?php
                      } else { ?>
                        <td class='center'><img class='img-user' src='images/siswa/<?php echo $data['foto']; ?>' width='45'></td>
                      <?php
                      }
                       echo "
                    <td>$data[nama_siswa]</td>
                    <td>$data[email]</td>
                    <td>$data[alamat]</td>
                    <td>$data[telepon]</td>";?>
                    <td><a class="btn btn-warning btn-sm" href="modules/siswa/download.php?filename=<?php echo $data["kk"];?>">Download</a></td>
                    <td><a class="btn btn-warning btn-sm" href="modules/siswa/download2.php?filename=<?php echo $data["ijazah"];?>">Download</a></td>
                    <?php echo"
                    <td>
                    <div>
                    <a data-toggle='tooltip' data-placement='top' title='Proses' style='margin-right:5px' class='btn btn-success btn-sm' href='?module=form_siswa&form=proses&id_siswa=$data[id_siswa]'>
                              <i style='color:#fff' class='glyphicon glyphicon-folder-open'>Proses</i>
                          </a>
                          <a data-toggle='tooltip' data-placement='top' title='Detail' style='margin-right:5px' class='btn btn-warning btn-sm' href='?module=form_siswa&form=detail&id_siswa=$data[id_siswa]'>
                              <i style='color:#fff' class='glyphicon glyphicon-folder-open'>Edit</i>
                          </a>
                          ";
            ?>
            <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/siswa/proses.php?act=delete&id_siswa=<?php echo $data['id_siswa'];?>" onclick="return confirm('Anda yakin ingin menghapus <?php echo $data['nama_siswa']; ?> ?');">
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

<?php  } else { ?>

    <table class="pull-right">
        <tr>
            <td>
                <a class="btn btn-danger btn-social pull-right" href="modules/siswa/kartupdf.php?id_siswa=<?php echo $_SESSION['id_siswa'];?>" title="Export to PDF" data-toggle="tooltip">
                    <i class="fas fa-file-pdf-o"></i> Cetak Kartu Pendaftaran
                </a>
            </td>
        </tr>
    </table>

    <br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $id_siswa = $_SESSION['id_siswa'];
                // fungsi query untuk menampilkan data dari tabel siswa
                $query = mysqli_query($mysqli, "SELECT * FROM siswa WHERE id_siswa='$id_siswa'")
                or die('Ada kesalahan pada query tampil Data siswa: '.mysqli_error($mysqli));
                $no = 1;

                // tampilkan data
                while ($data = mysqli_fetch_assoc($query)) {
                    echo "<tr>
                      <td width='30' class='center'>$no</td>";

                    if ($data['foto']=="") { ?>
                        <td class='center'><img class='img-user' src='images/siswa/user-default.png' width='45'></td>
                        <?php
                    } else { ?>
                        <td class='center'><img class='img-user' src='images/siswa/<?php echo $data['foto']; ?>' width='45'></td>
                        <?php
                    }
                    echo "
                      
                      <td class='center'>$data[nama_siswa]</td>
                      <td class='center'>$data[email]</td>
                      <td class='center'>$data[alamat]</td>
                      <td class='center'>$data[telepon]</td>
                      <td class='center'>$data[keterangan]</td>";
                    ?>
                    <td class='center' width='80'>
                        <div>
                            <?php
                            $query = mysqli_query($mysqli, "SELECT * FROM siswa WHERE id_siswa ='$id_siswa'")
                            or die('Ada kesalahan pada query tampil darah: ' . mysqli_error($mysqli));
                            // tampilkan data
                            $data = mysqli_fetch_assoc($query);
                            if ($data['kirim']=='Ya') {
                                if($data['status']=='Menunggu') {?>
                                    <span class="label label-warning" style="color: black; background: yellow">&nbsp;Menunggu&nbsp;</span>
                                <?php } else if($data['status']=='Lulus') {?>
                                    <span class="label" style="background: #00a65a; color: white; background: green">&nbsp;Lulus&nbsp;</span>
                                <?php } else if($data['status']=='Tidak Lulus') {?>
                                    <span class="label" style="background: #dd4b39; color: white; background: red">&nbsp;Tidak Lulus&nbsp;</span>
                                <?php }
                            } else {?>
                                <a data-toggle='tooltip' data-placement='top' title='Lengkapi Data' style='margin-right:5px' class='btn btn-success btn-sm' href='?module=form_siswa&form=detail&id_siswa=<?php echo $data['id_siswa'];?>'>
                                    <i style='color:#fff' class='glyphicon glyphicon-folder-open'>Edit</i>
                                </a>
                                <br>
                                <?php
                                $id_siswa = $_SESSION['id_siswa'];
                                $nama_siswa = $_SESSION['nama_siswa'];
                                $query = mysqli_query($mysqli, "SELECT COUNT(id_wali) as jumlah FROM wali WHERE id_siswa='$id_siswa' ")
                                or die('Ada kesalahan pada query tampil Data wali: '.mysqli_error($mysqli));

                                $data = mysqli_fetch_assoc($query);
                                if ($data['jumlah']>0) {
                                ?>
                                <a data-toggle='tooltip' data-placement='top' title='Kirim Data' class='btn btn-info btn-sm' href='modules/siswa/proses.php?act=kirim&id_siswa=<?php echo $id_siswa;?>' onclick='return confirm('Anda yakin ingin mengirim data pendaftaran <?php echo $nama_siswa; ?> ?');'>
                                <i style='color:#fff' class='glyphicon glyphicon-send'>Kirim</i>
                                </a>
                            <?php }
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
