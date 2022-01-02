<?php
session_start();

unset($_SESSION["Nama"]);
$_SESSION["alert"] = "Anda telah Logout";
session_destroy();
header("Location:index.php");
?>