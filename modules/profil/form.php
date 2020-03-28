<?php
if (isset($_POST['id_admin'])) {
  // fungsi query untuk menampilkan data dari tabel admin
  $query = mysqli_query($mysqli, "SELECT * FROM admin WHERE id_admin='$_POST[id_admin]'")
                                  or die('Ada kesalahan pada query tampil data admin : '.mysqli_error($mysqli));
  $data  = mysqli_fetch_assoc($query);
}	
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ubah Profil</h1>
</div>

<div class="row">

    <div class="col-xl-8 col-lg-7">

        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div>
                    <form role="form" class="form-horizontal" method="POST" action="modules/profil/proses.php?act=update" enctype="multipart/form-data">
                        <div class="box-body">

                            <input type="hidden" name="id_admin" value="<?php echo $data['id_admin']; ?>">

                            <div class="form-group">
                                <label class="col-sm-12 control-label">Username</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="username" autocomplete="off" value="<?php echo $data['username']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12 control-label">Password</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" name="password" autocomplete="off" placeholder="Kosongkan password jika tidak diubah">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12 control-label">Nama Admin</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="nama_admin" autocomplete="off" value="<?php echo $data['nama_admin']; ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12 control-label">Telepon</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="telepon" autocomplete="off" value="<?php echo $data['telepon']; ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12 control-label">Foto</label>
                                <div class="col-sm-12">
                                    <input type="file" name="foto">
                                    <br/>
                                    <?php
                                    if ($data['foto']=="") { ?>
                                        <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/admin/user-default.png" width="128">
                                        <?php
                                    }
                                    else { ?>
                                        <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/admin/<?php echo $data['foto']; ?>" width="128">
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>

                        </div><!-- /.box body -->

                        <hr>
                        <div class="box-footer">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan">
                                </div>
                            </div>
                        </div><!-- /.box footer -->
                    </form>
            </div>
        </div>

    </div>

</div>
