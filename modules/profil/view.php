<?php
if ($_SESSION['hak_akses']=='admin' || $_SESSION['hak_akses']=='panitia') {
    if (isset($_SESSION['id_admin'])) {
        // fungsi query untuk menampilkan data dari tabel admin
        $query = mysqli_query($mysqli, "SELECT * FROM admin WHERE id_admin='$_SESSION[id_admin]'")
        or die('Ada kesalahan pada query tampil data admin : ' . mysqli_error($mysqli));
        $data = mysqli_fetch_assoc($query);
    }
} else {

        // fungsi query untuk menampilkan data dari tabel siswa
        $query = mysqli_query($mysqli, "SELECT * FROM siswa WHERE id_siswa='$_SESSION[id_siswa]'")
        or die('Ada kesalahan pada query tampil data siswa : ' . mysqli_error($mysqli));
        $data = mysqli_fetch_assoc($query);

}
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profil User</h1>
</div>

<?php
// fungsi untuk menampilkan pesan
// jika alert = "" (kosong)
// tampilkan pesan "" (kosong)
if (empty($_GET['alert'])) {
    echo "";
}
// jika alert = 1
// tampilkan pesan Sukses "Profil admin berhasil diubah"
elseif ($_GET['alert'] == 1) {
    echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Profil admin berhasil diubah.
            </div>";
}
// jika alert = 2
// tampilkan pesan Upload Gagal "Pastikan file yang diupload sudah benar"
elseif ($_GET['alert'] == 2) {
    echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
              </button>
              <strong><i class='fa fa-check-circle'></i> Upload Gagal!</strong> Pastikan file yang diupload sudah benar.
            </div>";
}
// jika alert = 3
// tampilkan pesan Upload Gagal "Pastikan ukuran foto tidak lebih dari 1MB"
elseif ($_GET['alert'] == 3) {
    echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
              </button>
              <strong><i class='fa fa-check-circle'></i> Upload Gagal!</strong> Pastikan ukuran foto tidak lebih dari 1MB.
            </div>";
}
// jika alert = 4
// tampilkan pesan Upload Gagal "Pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG"
elseif ($_GET['alert'] == 4) {
    echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
              </button>
              <strong><i class='fa fa-check-circle'></i> Upload Gagal!</strong> Pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG.
            </div>";
}
?>

<!-- Content Row -->
<div class="row">

    <?php if ($_SESSION['hak_akses']=='admin') { ?>

    <div class="col-xl-8 col-lg-7">

        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div>
                    <form role="form" class="form-horizontal" method="POST" action="?module=form_profil" enctype="multipart/form-data">
                        <div class="box-body">

                            <input type="hidden" name="id_admin" value="<?php echo $data['id_admin']; ?>">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">
                                    <?php
                                    if ($data['foto']=="") { ?>
                                        <img style="border:1px solid #eaeaea;border-radius:50px;" src="images/admin/user-default.png" width="75">
                                        <?php
                                    }
                                    else { ?>
                                        <img style="border:1px solid #eaeaea;border-radius:50px;" src="images/admin/<?php echo $data['foto']; ?>" width="75">
                                        <?php
                                    }
                                    ?>
                                </label>
                                <label style="font-size:25px;margin-top:10px;" class="col-sm-8"><?php echo $data['nama_admin']; ?></label>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Username</label>
                                <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['username']; ?></label>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Telepon</label>
                                <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['telepon']; ?></label>
                            </div>

                        </div><!-- /.box body -->

                </div>
                <hr>
                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-primary btn-submit" name="ubah" value="Ubah">
                        </div>
                    </div>
                </div><!-- /.box footer -->
                </form>
            </div>
        </div>

    </div>

        <?php } if ($_SESSION['hak_akses']=='panitia') { ?>

        <div class="col-xl-8 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div>
                        <form role="form" class="form-horizontal" method="POST" action="?module=form_profil" enctype="multipart/form-data">
                            <div class="box-body">

                                <input type="hidden" name="id_admin" value="<?php echo $data['id_admin']; ?>">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        <?php
                                        if ($data['foto']=="") { ?>
                                            <img style="border:1px solid #eaeaea;border-radius:50px;" src="images/admin/user-default.png" width="75">
                                            <?php
                                        }
                                        else { ?>
                                            <img style="border:1px solid #eaeaea;border-radius:50px;" src="images/admin/<?php echo $data['foto']; ?>" width="75">
                                            <?php
                                        }
                                        ?>
                                    </label>
                                    <label style="font-size:25px;margin-top:10px;" class="col-sm-8"><?php echo $data['nama_admin']; ?></label>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Username</label>
                                    <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['username']; ?></label>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Telepon</label>
                                    <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['telepon']; ?></label>
                                </div>

                            </div><!-- /.box body -->

                    </div>
                    <hr>
                    <div class="box-footer">
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-primary btn-submit" name="ubah" value="Ubah">
                            </div>
                        </div>
                    </div><!-- /.box footer -->
                    </form>
                </div>
            </div>

        </div>

    <?php } else { ?>

    <div class="col-xl-8 col-lg-7">
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div>
                        <form role="form" class="form-horizontal" method="POST" action="?module=form_profil" enctype="multipart/form-data">
                            <div class="box-body">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        <?php
                                        if ($data['foto']=="") { ?>
                                            <img style="border:1px solid #eaeaea;border-radius:50px;" src="images/siswa/user-default.png" width="75">
                                            <?php
                                        }
                                        else { ?>
                                            <img style="border:1px solid #eaeaea;border-radius:50px;" src="images/siswa/<?php echo $data['foto']; ?>" width="75">
                                            <?php
                                        }
                                        ?>
                                    </label>
                                    <label style="font-size:25px;margin-top:10px;" class="col-sm-8"><?php echo $data['nama_siswa']; ?></label>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email</label>
                                    <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['email']; ?></label>
                                </div>

                            </div><!-- /.box body -->


                        </form>
                    </div>
                </div>
            </div>
    </div>

        <?php }?>
    </div>


