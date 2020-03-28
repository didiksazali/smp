 <?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Siswa</h1>
    </div>

    <div class="row">

        <div class="col-xl-8 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div>
                        <form role="form" class="form-horizontal" action="modules/siswa/proses.php?act=insert" method="POST" enctype="multipart/form-data">
                            <div class="box-body">

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Nama</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nama_siswa" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Tempat Lahir</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="tempat_lahir" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="datepicker" name="tgl_lahir" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Agama</label>
                                    <div class="col-sm-12">
                                        <?php
                                        $query2 = mysqli_query($mysqli, "SELECT * FROM agama")
                                        or die('Ada kesalahan pada query tampil data karyawan : '.mysqli_error($mysqli));
                                        ?>
                                        <select type="text" class="form-control" name="id_agama" autocomplete="off" required>
                                            <option></option>
                                            <?php
                                            while ($data2  = mysqli_fetch_assoc($query2)) { ?>
                                                <option value="<?php echo $data2['id_agama']; ?>" ><?php echo $data2['agama']; ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="email" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Password</label>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" name="password" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Alamat</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="alamat" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Telepon</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="telepon" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-12">
                                        <label>
                                            <input type="radio" name="jenis_kelamin" value="Laki-laki" >
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>
                                            <input type="radio" name="jenis_kelamin" value="Perempuan" >
                                            Perempuan
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Foto</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="foto">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">KK</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="kk">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Ijazah</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="ijazah">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Asal Sekolah</label>
                                    <div class="col-sm-12">
                                        <select type="text" class="form-control" name="asal_sekolah" autocomplete="off" required>
                                            <option></option>
                                            <option value="SD">SD</option>
                                            <option value="MI">MI</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Nilai Sekolah</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nilai_sekolah" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Nilai UN</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nilai_un" autocomplete="off" required>
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
elseif ($_GET['form']=='detail') {
  if (isset($_GET['id_siswa'])) {
      // fungsi query untuk menampilkan data dari tabel siswa
      $query = mysqli_query($mysqli, "SELECT * FROM siswa WHERE id_siswa='$_GET[id_siswa]'")
                                      or die('Ada kesalahan pada query tampil data siswa : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Siswa</h1>
    </div>

    <div class="row">

        <div class="col-xl-8 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div>
                        <form role="form" class="form-horizontal" action="modules/siswa/proses.php?act=update" method="POST" enctype="multipart/form-data">
                            <div class="box-body">

                                <input type="hidden" class="form-control" name="id_siswa" value="<?php echo $data['id_siswa']; ?>" >

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Nama</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nama_siswa" value="<?php echo $data['nama_siswa']; ?>" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Tempat Lahir</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="datepicker" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Agama</label>
                                    <div class="col-sm-12">
                                        <?php
                                        $query2 = mysqli_query($mysqli, "SELECT * FROM agama")
                                        or die('Ada kesalahan pada query tampil data karyawan : '.mysqli_error($mysqli));
                                        ?>
                                        <select type="text" class="form-control" name="id_agama" autocomplete="off" required>
                                            <option></option>
                                            <?php
                                            while ($data2  = mysqli_fetch_assoc($query2)) { ?>
                                                <option value="<?php echo $data2['id_agama']; ?>"  <?php if($data2['id_agama']==$data['id_agama']){ echo 'selected'; } ?> ><?php echo $data2['agama']; ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="email" value="<?php echo $data['email']; ?>" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Password</label>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" name="password" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Alamat</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Telepon</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="telepon" value="<?php echo $data['telepon']; ?>" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-12">
                                        <label>
                                            <input type="radio" name="jenis_kelamin" value="Laki-laki" <?php if($data['jenis_kelamin']=='Laki-laki'){ echo "checked";} ?>>
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>
                                            <input type="radio" name="jenis_kelamin" value="Perempuan" <?php if($data['jenis_kelamin']=='Perempuan'){ echo "checked";} ?>>
                                            Perempuan
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Foto</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="foto">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">KK</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="kk">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Ijazah</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="ijazah">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Asal Sekolah</label>
                                    <div class="col-sm-12">
                                        <select type="text" class="form-control" name="asal_sekolah" autocomplete="off" required>
                                            <option></option>
                                            <option value="SD" <?php if($data['asal_sekolah']=='SD'){ echo "selected";} ?> >SD</option>
                                            <option value="MI" <?php if($data['asal_sekolah']=='MI'){ echo "selected";} ?> >MI</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Nilai Sekolah</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nilai_sekolah" value="<?php echo $data['nilai_sekolah']; ?>" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Nilai UN</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nilai_un" value="<?php echo $data['nilai_un']; ?>" autocomplete="off" required>
                                    </div>
                                </div>

                            </div><!-- /.box-body -->

                            <hr>
                            <div class="box-footer bg-btn-action">
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan">
                                        <a href="?module=siswa" class="btn btn-default btn-reset">Batal</a>                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php
} elseif ($_GET['form']=='proses') {
     if (isset($_GET['id_siswa'])) {
         // fungsi query untuk menampilkan data dari tabel siswa
         $query = mysqli_query($mysqli, "SELECT * FROM siswa WHERE id_siswa='$_GET[id_siswa]'")
         or die('Ada kesalahan pada query tampil data siswa : '.mysqli_error($mysqli));
         $data  = mysqli_fetch_assoc($query);
     }
     ?>
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Detail Data Siswa</h1>
     </div>

     <div class="row">

         <div class="col-xl-8 col-lg-7">

             <!-- Area Chart -->
             <div class="card shadow mb-4">
                 <div class="card-body">
                     <div>
                         <form role="form" class="form-horizontal" action="modules/siswa/proses.php?act=proses" method="POST" enctype="multipart/form-data">
                             <div class="box-body">

                                 <input type="hidden" class="form-control" name="id_siswa" value="<?php echo $data['id_siswa']; ?>" >

                                 <div class="form-group">
                                     <label class="col-sm-12 control-label">Nama</label>
                                     <div class="col-sm-12">
                                         <input type="text" class="form-control" name="nama_siswa" disabled value="<?php echo $data['nama_siswa']; ?>" autocomplete="off" required>
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <label class="col-sm-12 control-label">Tempat Lahir</label>
                                     <div class="col-sm-12">
                                         <input type="text" class="form-control" name="tempat_lahir" disabled value="<?php echo $data['tempat_lahir']; ?>" autocomplete="off" required>
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <label class="col-sm-12 control-label">Tanggal Lahir</label>
                                     <div class="col-sm-12">
                                         <input type="text" class="form-control" id="datepicker" name="tgl_lahir" disabled value="<?php echo $data['tgl_lahir']; ?>" autocomplete="off" required>
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <label class="col-sm-12 control-label">Agama</label>
                                     <div class="col-sm-12">
                                         <?php
                                         $query2 = mysqli_query($mysqli, "SELECT * FROM agama")
                                         or die('Ada kesalahan pada query tampil data karyawan : '.mysqli_error($mysqli));
                                         $data2  = mysqli_fetch_assoc($query2);
                                         ?>
                                         <input type="text" class="form-control" name="id_agama" disabled value="<?php if($data2['id_agama']==$data['id_agama']){ echo $data2['agama'];; } ?>" autocomplete="off" required>
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <label class="col-sm-12 control-label">Email</label>
                                     <div class="col-sm-12">
                                         <input type="text" class="form-control" name="email" disabled value="<?php echo $data['email']; ?>" autocomplete="off" required>
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <label class="col-sm-12 control-label">Alamat</label>
                                     <div class="col-sm-12">
                                         <input type="text" class="form-control" name="alamat" disabled value="<?php echo $data['alamat']; ?>" autocomplete="off" required>
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <label class="col-sm-12 control-label">Telepon</label>
                                     <div class="col-sm-12">
                                         <input type="text" class="form-control" name="telepon" disabled value="<?php echo $data['telepon']; ?>" autocomplete="off" required>
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <label class="col-sm-12 control-label">Jenis Kelamin</label>
                                     <div class="col-sm-12">
                                         <label>
                                             <input disabled type="radio" name="jenis_kelamin" value="Laki-laki" <?php if($data['jenis_kelamin']=='Laki-laki'){ echo "checked";} ?>>
                                             Laki-laki
                                         </label>
                                     </div>
                                     <div class="col-sm-12">
                                         <label>
                                             <input disabled type="radio" name="jenis_kelamin" value="Perempuan" <?php if($data['jenis_kelamin']=='Perempuan'){ echo "checked";} ?>>
                                             Perempuan
                                         </label>
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <label class="col-sm-12 control-label">Asal Sekolah</label>
                                     <div class="col-sm-12">
                                         <input type="text" class="form-control" name="asal_sekolah" disabled value="<?php echo $data['asal_sekolah']; ?>" autocomplete="off" required>
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <label class="col-sm-12 control-label">Nilai Sekolah</label>
                                     <div class="col-sm-12">
                                         <input type="text" class="form-control" name="nilai_sekolah" disabled value="<?php echo $data['nilai_sekolah']; ?>" autocomplete="off" required>
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <label class="col-sm-12 control-label">Nilai UN</label>
                                     <div class="col-sm-12">
                                         <input type="text" class="form-control" name="nilai_un" disabled value="<?php echo $data['nilai_un']; ?>" autocomplete="off" required>
                                     </div>
                                 </div>

                                 <?php if ($_SESSION['hak_akses']=='admin') {

                                     $id_siswa = $_GET['id_siswa'];

                                     $query = mysqli_query($mysqli, "SELECT * FROM siswa WHERE id_siswa ='$id_siswa'")
                                     or die('Ada kesalahan pada query tampil darah: ' . mysqli_error($mysqli));
                                     // tampilkan data
                                     $data = mysqli_fetch_assoc($query);
                                     if ($data['kirim']=='Ya') { ?>

                                         <div class="form-group">
                                             <label class="col-sm-12 control-label">Status</label>
                                             <div class="col-sm-12">
                                                 <select type="text" class="form-control" name="status" autocomplete="off" required>
                                                     <option></option>
                                                     <option value="Menunggu" <?php if($data['status']=='Menunggu'){ echo "selected";} ?>>Menunggu</option>
                                                     <option value="Lulus" <?php if($data['status']=='Lulus'){ echo "selected";} ?>>Lulus</option>
                                                     <option value="Tidak Lulus" <?php if($data['status']=='Tidak Lulus'){ echo "selected";} ?>>Tidak Lulus</option>
                                                 </select>
                                             </div>
                                         </div>
                                     <?php } } ?>

                                 <div class="form-group">
                                     <label class="col-sm-12 control-label">Keterangan</label>
                                     <div class="col-sm-12">
                                         <input type="text" class="form-control" name="keterangan" value="<?php echo $data['keterangan']; ?>" autocomplete="off" required>
                                     </div>
                                 </div>

                             </div><!-- /.box-body -->

                             <hr>
                             <div class="box-footer bg-btn-action">
                                 <div class="form-group">
                                     <div class="col-sm-offset-2 col-sm-10">
                                         <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan">
                                         <a href="?module=siswa" class="btn btn-default btn-reset">Batal</a>                                    </div>
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