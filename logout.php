<?php
session_start();
// hapus session
session_destroy();

// alihkan ke halaman login (index0.php) dan berikan alert = 2
header('Location: index.php');
?>