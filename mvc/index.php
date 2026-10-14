<?php
include_once("c_programKerja.php");
session_start();

if (!isset($_SESSION['jabatan'])) {
    header("Location: login.php");
    exit;
}


$controller = new c_programKerja();
$controller->invoke();
?>