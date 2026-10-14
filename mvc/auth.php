<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

function wajibLogin()
{
    if (empty($_SESSION['jabatan'])) {
        header('Location: login.php');
        exit;
    }
}

function wajibKepalaDepartemen()
{
    wajibLogin();

    if (
        $_SESSION['jabatan'] !== 'Kepala Departemen'
    ) {
        http_response_code(403);

        exit(
            'Akses ditolak. Hanya Kepala Departemen ' .
            'yang dapat mengelola program kerja.'
        );
    }
}

function h($nilai)
{
    return htmlspecialchars(
        (string) ($nilai ?? ''),
        ENT_QUOTES,
        'UTF-8'
    );
}
?>