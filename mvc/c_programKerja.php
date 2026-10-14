<?php
include_once("m_programKerja.php");

class c_programKerja
{
    public $model;

    public function __construct()
    {
        $this->model = new m_programKerja();
    }

    public function invoke()
    {
        if (!isset($_SESSION['jabatan'])) {
            header("Location: login.php");
            exit;
        }

        $act = isset($_GET['act']) ? $_GET['act'] : 'index';

        // Selain index, aksi hanya untuk Kepala Departemen.
        if (
            $act != 'index' &&
            $_SESSION['jabatan'] != 'Kepala Departemen'
        ) {
            http_response_code(403);
            exit("Menteri hanya dapat melihat daftar program kerja.");
        }

        if ($act == 'index') {
            $proker = $this->model->getSemuaPogramKerja();
            include 'v_programKerja.php';
        }

        elseif ($act == 'tambah') {
            include 'v_tambah.php';
        }

        elseif ($act == 'simpan') {
            $nomor = $_POST['nomorProgram'];
            $nama = $_POST['namaProgram'];
            $sk = $_POST['suratKeterangan'];

            $this->model->insertProker($nomor, $nama, $sk);

            header("Location: index.php");
            exit;
        }

        elseif ($act == 'edit') {
            $nomor = $_GET['nomor'];

            $data = $this->model->getProkerByNomor($nomor);

            if (!$data) {
                http_response_code(404);
                exit("Program kerja tidak ditemukan.");
            }

            include 'v_edit.php';
        }

        elseif ($act == 'update') {
            $nomor = $_POST['nomorProgram'];
            $nama = $_POST['namaProgram'];
            $sk = $_POST['suratKeterangan'];

            $this->model->updateProker($nomor, $nama, $sk);

            header("Location: index.php");
            exit;
        }

        elseif ($act == 'hapus') {
            $nomor = $_GET['nomor'];

            $this->model->deleteProker($nomor);

            header("Location: index.php");
            exit;
        }

        else {
            http_response_code(404);
            exit("Aksi tidak ditemukan.");
        }
    }
}
?>