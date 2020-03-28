<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PSB SMPN 1 Bengkalis</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <?php
    // fungsi untuk pengecekan menu aktif
    // jika menu beranda dipilih, menu beranda aktif
    if ($_GET["module"]=="beranda") { ?>
        <li class="nav-item active">
            <a class="nav-link" href="?module=beranda">
                <i class="fas fa-fw fa-home"></i>
                <span>Beranda</span></a>
        </li>
        <?php
    }
    // jika tidak, menu home tidak aktif
    else { ?>
        <li class="nav-item">
            <a class="nav-link" href="?module=beranda">
                <i class="fas fa-fw fa-home"></i>
                <span>Beranda</span></a>
        </li>
        <?php
    }

    // jika menu ubah password dipilih, menu ubah password aktif
    if ($_GET["module"]=="siswa") { ?>
        <li class="nav-item active">
            <a class="nav-link" href="?module=siswa">
                <i class="fas fa-fw fa-user"></i>
                <span>Data Siswa</span></a>
        </li>
        <?php
    }
    // jika tidak, menu ubah password tidak aktif
    else { ?>
        <li class="nav-item">
            <a class="nav-link" href="?module=siswa">
                <i class="fas fa-fw fa-user"></i>
                <span>Data Siswa</span></a>
        </li>
        <?php
    }

    // jika menu ubah password dipilih, menu ubah password aktif
    if ($_GET["module"]=="wali") { ?>
        <li class="nav-item active">
            <a class="nav-link" href="?module=wali">
                <i class="fas fa-fw fa-user"></i>
                <span>Data Wali</span></a>
        </li>
        <?php
    }
    // jika tidak, menu ubah password tidak aktif
    else { ?>
        <li class="nav-item">
            <a class="nav-link" href="?module=wali">
                <i class="fas fa-fw fa-user"></i>
                <span>Data Wali</span></a>
        </li>
        <?php
    }

    if ($_SESSION['hak_akses']=='admin') {
        // jika menu ubah password dipilih, menu ubah password aktif
        if ($_GET["module"] == "pekerjaan") { ?>
            <li class="nav-item active">
                <a class="nav-link" href="?module=pekerjaan">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Data Pekerjaan</span></a>
            </li>
            <?php
        } // jika tidak, menu ubah password tidak aktif
        else { ?>
            <li class="nav-item">
                <a class="nav-link" href="?module=pekerjaan">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Data Pekerjaan</span></a>
            </li>
            <?php
        }

        // jika menu ubah password dipilih, menu ubah password aktif
        if ($_GET["module"] == "agama") { ?>
            <li class="nav-item active">
                <a class="nav-link" href="?module=agama">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Data Agama</span></a>
            </li>
            <?php
        } // jika tidak, menu ubah password tidak aktif
        else { ?>
            <li class="nav-item">
                <a class="nav-link" href="?module=agama">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Data Agama</span></a>
            </li>
            <?php
        }
    }

    // jika menu ubah password dipilih, menu ubah password aktif
    if ($_GET["module"]=="password") { ?>
        <li class="nav-item active">
            <a class="nav-link" href="?module=password">
                <i class="fas fa-fw fa-lock"></i>
                <span>Ubah Password</span></a>
        </li>
        <?php
    }
    // jika tidak, menu ubah password tidak aktif
    else { ?>
        <li class="nav-item">
            <a class="nav-link" href="?module=password">
                <i class="fas fa-fw fa-lock"></i>
                <span>Ubah Password</span></a>
        </li>
        <?php
    }
    ?>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>