<?php
session_start();
session_destroy();
echo "<script>localStorage.setItem('adminLogout', '1'); window.location.href='admin_login.php';</script>";
exit;
