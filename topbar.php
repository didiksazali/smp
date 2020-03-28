<?php
/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";

if ($_SESSION['hak_akses']=='admin') {
// fungsi query untuk menampilkan data dari tabel admin
    $query = mysqli_query($mysqli, "SELECT * FROM admin WHERE id_admin='$_SESSION[id_admin]'")
    or die('Ada kesalahan pada query tampil Manajemen User: ' . mysqli_error($mysqli));
} else if ($_SESSION['hak_akses']=='panitia') {
// fungsi query untuk menampilkan data dari tabel admin
    $query = mysqli_query($mysqli, "SELECT * FROM admin WHERE id_admin='$_SESSION[id_admin]'")
    or die('Ada kesalahan pada query tampil Manajemen User: ' . mysqli_error($mysqli));
} else {
    $query = mysqli_query($mysqli, "SELECT * FROM siswa WHERE id_siswa='$_SESSION[id_siswa]'")
    or die('Ada kesalahan pada query tampil Manajemen User: ' . mysqli_error($mysqli));
}
// tampilkan data
$data = mysqli_fetch_assoc($query);
?>

<?php if ($_SESSION['hak_akses']=='admin') { ?>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <iframe scrolling="no" frameborder="no" clocktype="html5" style="overflow:hidden;border:0;margin:0;padding:0;width:120px;height:40px;"src="https://www.clocklink.com/html5embed.php?clock=043&timezone=Indonesia_Jakarta&color=blue&size=120&Title=&Message=&Target=&From=2020,1,1,0,0,0&Color=blue"></iframe>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $data['nama_admin']; ?> </span>
                <?php
                if ($data['foto']=="") { ?>
                    <img src="images/admin/user-default.png" class="img-profile rounded-circle" alt="User Image"/>
                    <?php
                }
                else { ?>
                    <img src="images/admin/<?php echo $data['foto']; ?>" class="img-profile rounded-circle" alt="User Image"/>
                    <?php
                }
                ?>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="?module=profil">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#logout" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>

<?php } else if ($_SESSION['hak_akses']=='panitia') { ?>

    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <iframe scrolling="no" frameborder="no" clocktype="html5" style="overflow:hidden;border:0;margin:0;padding:0;width:120px;height:40px;"src="https://www.clocklink.com/html5embed.php?clock=043&timezone=Indonesia_Jakarta&color=blue&size=120&Title=&Message=&Target=&From=2020,1,1,0,0,0&Color=blue"></iframe>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $data['nama_admin']; ?> </span>
                    <?php
                    if ($data['foto']=="") { ?>
                        <img src="images/admin/user-default.png" class="img-profile rounded-circle" alt="User Image"/>
                        <?php
                    }
                    else { ?>
                        <img src="images/admin/<?php echo $data['foto']; ?>" class="img-profile rounded-circle" alt="User Image"/>
                        <?php
                    }
                    ?>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="?module=profil">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#logout" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>

<?php } else { ?>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <iframe scrolling="no" frameborder="no" clocktype="html5" style="overflow:hidden;border:0;margin:0;padding:0;width:120px;height:40px;"src="https://www.clocklink.com/html5embed.php?clock=043&timezone=Indonesia_Jakarta&color=blue&size=120&Title=&Message=&Target=&From=2020,1,1,0,0,0&Color=blue"></iframe>

    <?php
    $query2 = mysqli_query($mysqli, "SELECT * FROM admin")
    or die('Ada kesalahan pada query tampil Manajemen User: ' . mysqli_error($mysqli));
    $data2 = mysqli_fetch_assoc($query2);
    ?>
    <a href="https://wa.me/<?= '62'.substr($data2['telepon'],1); ?>?text=Halo Admin, ada yang ingin saya tanyakan."><img width="50px" src="https://cdn3.iconfinder.com/data/icons/2018-social-media-logotypes/1000/2018_social_media_popular_app_logo-whatsapp-512.png"> </a>


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $data['nama_siswa']; ?></span>
                <?php
                if ($data['foto']=="") { ?>
                    <img src="images/siswa/user-default.png" class="img-profile rounded-circle" alt="User Image"/>
                    <?php
                }
                else { ?>
                    <img src="images/siswa/<?php echo $data['foto']; ?>" class="img-profile rounded-circle" alt="User Image"/>
                    <?php
                }
                ?>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="?module=profil">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#logout" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>

<?php } ?>
