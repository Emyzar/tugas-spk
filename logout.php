<?php
    // mengaktifkan session php
    session_start();

    // menghapus session php
    session_destroy();

    // mengalihkan halaman dan mengirim pesan logout
    header("location:index.php?pesan=anda telah keluar.");
?>