<?php
session_start();

unset($_SESSION["Nama"]);
$_SESSION["alert"] = "Perhatian! Anda Telah Logout";
session_destroy();
header("Location:index.php");
?>