 <?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Pekerjaan</h1>
    </div>

    <div class="row">

        <div class="col-xl-8 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div>
                        <form role="form" class="form-horizontal" action="modules/pekerjaan/proses.php?act=insert" method="POST" enctype="multipart/form-data">
                            <div class="box-body">

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Pekerjaan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="pekerjaan" autocomplete="off" required>
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
  if (isset($_GET['id_pekerjaan'])) {
      // fungsi query untuk menampilkan data dari tabel pekerjaan
      $query = mysqli_query($mysqli, "SELECT * FROM pekerjaan WHERE id_pekerjaan='$_GET[id_pekerjaan]'")
                                      or die('Ada kesalahan pada query tampil data pekerjaan : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Data pekerjaan</h1>
    </div>

    <div class="row">

        <div class="col-xl-8 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div>
                        <form role="form" class="form-horizontal" action="modules/pekerjaan/proses.php?act=update" method="POST" enctype="multipart/form-data">
                            <div class="box-body">

                                <input type="hidden" class="form-control" name="id_pekerjaan" value="<?php echo $data['id_pekerjaan']; ?>" >

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Pekerjaan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="pekerjaan" value="<?php echo $data['pekerjaan']; ?>" autocomplete="off" required>
                                    </div>
                                </div>

                            </div><!-- /.box-body -->

                            <hr>
                            <div class="box-footer bg-btn-action">
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan">
                                        <a href="?module=pekerjaan" class="btn btn-default btn-reset">Batal</a>                                    </div>
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