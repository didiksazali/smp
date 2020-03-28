 <?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data wali</h1>
    </div>

    <div class="row">

        <div class="col-xl-8 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div>
                        <form role="form" class="form-horizontal" action="modules/wali/proses.php?act=insert" method="POST" enctype="multipart/form-data">
                            <div class="box-body">

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Nama Ayah</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nama_ayah" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Nama Ibu</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nama_ibu" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Pekerjaan Ayah</label>
                                    <div class="col-sm-12">
                                        <?php
                                        $query2 = mysqli_query($mysqli, "SELECT * FROM pekerjaan")
                                        or die('Ada kesalahan pada query tampil data pekerjaan : '.mysqli_error($mysqli));
                                        ?>
                                        <select type="text" class="form-control" name="id_kerja_ayah" autocomplete="off" required>
                                            <option></option>
                                            <?php
                                            while ($data2  = mysqli_fetch_assoc($query2)) { ?>
                                                <option value="<?php echo $data2['id_pekerjaan']; ?>" ><?php echo $data2['pekerjaan']; ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Pekerjaan Ibu</label>
                                    <div class="col-sm-12">
                                        <?php
                                        $query2 = mysqli_query($mysqli, "SELECT * FROM pekerjaan")
                                        or die('Ada kesalahan pada query tampil data pekerjaan : '.mysqli_error($mysqli));
                                        ?>
                                        <select type="text" class="form-control" name="id_kerja_ibu" autocomplete="off" required>
                                            <option></option>
                                            <?php
                                            while ($data2  = mysqli_fetch_assoc($query2)) { ?>
                                                <option value="<?php echo $data2['id_pekerjaan']; ?>" ><?php echo $data2['pekerjaan']; ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Alamat</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="alamat" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Tempat Lahir Ayah</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="tempat_lahir_ayah" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Tanggal Lahir Ayah</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="datepicker" name="tgl_lahir_ayah" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Tempat Lahir Ibu</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="tempat_lahir_ibu" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Tanggal Lahir Ibu</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="datepicker2" name="tgl_lahir_ibu" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Telepon Ayah</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="telepon_ayah" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Telepon Ibu</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="telepon_ibu" autocomplete="off" required>
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

<?php
}
// jika form edit data yang dipilih
// isset : cek data ada / tidak
elseif ($_GET['form']=='update') {
  if (isset($_GET['id_wali'])) {
      // fungsi query untuk menampilkan data dari tabel wali
      $query = mysqli_query($mysqli, "SELECT * FROM wali WHERE id_wali='$_GET[id_wali]'")
                                      or die('Ada kesalahan pada query tampil data wali : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Data wali</h1>
    </div>

    <div class="row">

        <div class="col-xl-8 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div>
                        <form role="form" class="form-horizontal" action="modules/wali/proses.php?act=update" method="POST" enctype="multipart/form-data">
                            <div class="box-body">

                                <input type="hidden" class="form-control" name="id_wali" value="<?php echo $data['id_wali']; ?>" >

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Nama Ayah</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nama_ayah" value="<?php echo $data['nama_ayah']; ?>" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Nama Ibu</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nama_ibu" value="<?php echo $data['nama_ibu']; ?>" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Pekerjaan Ayah</label>
                                    <div class="col-sm-12">
                                        <?php
                                        $query2 = mysqli_query($mysqli, "SELECT * FROM pekerjaan")
                                        or die('Ada kesalahan pada query tampil data pekerjaan : '.mysqli_error($mysqli));
                                        ?>
                                        <select type="text" class="form-control" name="id_kerja_ayah" autocomplete="off" required>
                                            <option></option>
                                            <?php
                                            while ($data2  = mysqli_fetch_assoc($query2)) { ?>
                                                <option value="<?php echo $data2['id_pekerjaan']; ?>"  <?php if($data2['id_pekerjaan']==$data['id_kerja_ayah']){ echo 'selected'; } ?> ><?php echo $data2['pekerjaan']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Pekerjaan Ibu</label>
                                    <div class="col-sm-12">
                                        <?php
                                        $query2 = mysqli_query($mysqli, "SELECT * FROM pekerjaan")
                                        or die('Ada kesalahan pada query tampil data pekerjaan : '.mysqli_error($mysqli));
                                        ?>
                                        <select type="text" class="form-control" name="id_kerja_ibu" autocomplete="off" required>
                                            <option></option>
                                            <?php
                                            while ($data2  = mysqli_fetch_assoc($query2)) { ?>
                                                <option value="<?php echo $data2['id_pekerjaan']; ?>"  <?php if($data2['id_pekerjaan']==$data['id_kerja_ibu']){ echo 'selected'; } ?> ><?php echo $data2['pekerjaan']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Alamat</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>"autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Tempat Lahir Ayah</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="tempat_lahir_ayah" value="<?php echo $data['tempat_lahir_ayah']; ?>" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Tanggal Lahir Ayah</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="datepicker" name="tgl_lahir_ayah" value="<?php echo $data['tgl_lahir_ayah']; ?>" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Tempat Lahir Ibu</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="tempat_lahir_ibu" value="<?php echo $data['tempat_lahir_ibu']; ?>" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Tanggal Lahir Ibu</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="datepicker2" name="tgl_lahir_ibu" value="<?php echo $data['tgl_lahir_ibu']; ?>" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Telepon Ayah</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="telepon_ayah" value="<?php echo $data['telepon_ayah']; ?>" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Telepon Ibu</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="telepon_ibu" value="<?php echo $data['telepon_ibu']; ?>" autocomplete="off" required>
                                    </div>
                                </div>

                            </div>

                            <hr>
                            <div class="box-footer bg-btn-action">
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan">
                                        <a href="?module=wali" class="btn btn-default btn-reset">Batal</a>                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php
}
?>