<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ubah Password</h1>
</div>

<?php
// fungsi untuk menampilkan pesan
// jika alert = "" (kosong)
// tampilkan pesan "" (kosong)
if (empty($_GET['alert'])) {
    echo "";
}
// jika alert = 1
// tampilkan pesan Gagal "Paswword lama Anda salah"
elseif ($_GET['alert'] == 1) {
    echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Gagal!</h4>
              Password lama Anda salah.
            </div>";
}
// jika alert = 2
// tampilkan pesan Gagal "Password baru dan Ulangi password baru tidak cocok"
elseif ($_GET['alert'] == 2) {
    echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Gagal!</h4>
              Password baru dan Ulangi password baru tidak cocok.
            </div>";
}
// jika alert = 3
// tampilkan pesan Sukses "Password berhasil diubah"
elseif ($_GET['alert'] == 3) {
    echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Password berhasil diubah.
            </div>";
}
?>

<div class="row">

<div class="col-xl-8 col-lg-7">

    <!-- Area Chart -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div>
                <form role="form" class="form-horizontal" method="POST" action="modules/password/proses.php">
                    <div class="box-body">

                        <div class="form-group">
                            <label class="col-sm-12 control-label">Password Lama</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" name="old_pass" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12 control-label">Password Baru</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" name="new_pass" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12 control-label">Ulangi Password Baru</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" name="retype_pass" autocomplete="off" required>
                            </div>
                        </div>
                    </div><!-- /.box-body -->

                    <hr>
                    <div class="box-footer bg-btn-action">
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</div>
