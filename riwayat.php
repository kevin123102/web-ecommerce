<?php

session_start();
session_unset();
session_destroy();
header("Location: riwayat.html"); // fungsi untuk menuju ke halaman riwayat
exit();
