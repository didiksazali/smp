<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
</div>

<div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p style="font-size:15px">
                <i class="icon fa fa-user"></i> Selamat datang <strong>
                    <?php
                    $akses = $_SESSION['hak_akses'];
                    if ($akses=='admin') {
                        echo $_SESSION['nama_admin']; }
                    else if ($akses=='panitia') {
                        echo $_SESSION['nama_admin']; }
                    else {
                        echo $_SESSION['nama_siswa'];
                    }?>
                </strong> di Aplikasi Pendaftaran Siswa Baru SMPN 1 Bengkalis.
            </p>
        </div>
    </div>
</div>

<?php
if ($akses=='admin' || $akses=='panitia') {
?>
<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <?php
                        $query = mysqli_query($mysqli, "SELECT count(asal_sekolah) as jumlah FROM siswa WHERE asal_sekolah ='SD'")
                        or die('Ada kesalahan pada query tampil darah: ' . mysqli_error($mysqli));
                        // tampilkan data
                        $data = mysqli_fetch_assoc($query);
                        ?>
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Asal SD</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['jumlah']; ?> Siswa</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-university fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <?php
                        $query = mysqli_query($mysqli, "SELECT count(asal_sekolah) as jumlah FROM siswa WHERE asal_sekolah ='MI'")
                        or die('Ada kesalahan pada query tampil pendonor: ' . mysqli_error($mysqli));
                        // tampilkan data
                        $data = mysqli_fetch_assoc($query);
                        ?>
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Asal MI</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['jumlah']; ?> Siswa</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-university fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <?php
                        $query = mysqli_query($mysqli, "SELECT count(asal_sekolah) as jumlah FROM siswa WHERE jenis_kelamin ='Laki-laki'")
                        or die('Ada kesalahan pada query tampil pendonor: ' . mysqli_error($mysqli));
                        // tampilkan data
                        $data = mysqli_fetch_assoc($query);
                        ?>
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Siswa Laki-laki</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['jumlah']; ?> Siswa</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-male fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <?php
                        $query = mysqli_query($mysqli, "SELECT count(asal_sekolah) as jumlah FROM siswa WHERE jenis_kelamin ='Perempuan'")
                        or die('Ada kesalahan pada query tampil pendonor: ' . mysqli_error($mysqli));
                        // tampilkan data
                        $data = mysqli_fetch_assoc($query);
                        ?>
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Siswa Perempuan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['jumlah']; ?> Siswa</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-female fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

<?php } ?>

