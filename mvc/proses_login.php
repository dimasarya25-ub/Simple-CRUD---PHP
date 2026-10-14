<?php
session_start();

include_once __DIR__ . '/../oop/menteri.php';
include_once __DIR__ . '/../oop/kepalaDepartemen.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: login.php");
    exit;
}

// Akun sementara untuk pengujian praktikum.
$akun = [
    'menteri' => [
        'password' => 'menteri123',
        'nama' => 'Menteri BEM',
        'jabatan' => 'Menteri'
    ],

    'kepala' => [
        'password' => 'kepala123',
        'nama' => 'Kepala Departemen BEM',
        'jabatan' => 'Kepala Departemen'
    ]
];

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (
    !isset($akun[$username]) ||
    !hash_equals($akun[$username]['password'], $password)
) {
    $_SESSION['error'] = 'Username atau password salah.';
    header("Location: login.php");
    exit;
}

$data = $akun[$username];

// Membuat objek berdasarkan jabatan.
if ($data['jabatan'] == 'Menteri') {
    $pengguna = new menteri($data['nama']);
} else {
    $pengguna = new kepalaDepartemen($data['nama']);
}

session_regenerate_id(true);

$_SESSION['nama'] = $pengguna->getNama();
$_SESSION['jabatan'] = $pengguna->getJabatan();

header("Location: index.php");
exit;
?>