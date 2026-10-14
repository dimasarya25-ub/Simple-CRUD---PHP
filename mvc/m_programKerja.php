<?php
require "koneksiMVC.php";

class m_programKerja {
    private $nomorProgram;
    private $namaProgram;
    private $suratKeterangan;
    public $hasil = array();

    public function __construct($nomorProgram = null, $namaProgram = null, $suratKeterangan = null) {
        $this->nomorProgram = $nomorProgram;
        $this->namaProgram = $namaProgram;
        $this->suratKeterangan = $suratKeterangan;
    }

    public function setPogramKerja($nomorProgram, $namaProgram, $suratKeterangan) {
        global $mysqli;
        $rs = $mysqli->query("INSERT INTO proker VALUES ('$this->nomorProgram', '$this->namaProgram', '$this->suratKeterangan')");
    }

    public function getSemuaPogramKerja() {
        global $mysqli;
        $rs = $mysqli->query("SELECT * FROM proker");
        $rows = array();
        while ($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        $this->hasil = $rows;
        return $this->hasil;
    }

    public function getProkerByNomor($nomorProgram) {
        global $mysqli;
        $rs = $mysqli->query("SELECT * FROM proker WHERE nomorProgram = '$nomorProgram'");
        return $rs->fetch_assoc();
    }

    public function insertProker($nomorProgram, $namaProgram, $suratKeterangan){
        global $mysqli;
        return $mysqli->query("INSERT INTO proker VALUES ('$nomorProgram', '$namaProgram', '$suratKeterangan')");
    }

    public function updateProker($nomorProgram, $namaProgram, $suratKeterangan){
        global $mysqli;
        return $mysqli->query("UPDATE proker SET namaProgram = '$namaProgram', suratKeterangan = '$suratKeterangan' WHERE nomorProgram = '$nomorProgram'");
    }

    public function deleteProker($nomorProgram){
        global $mysqli;
         return $mysqli->query("DELETE FROM proker WHERE nomorProgram = '$nomorProgram'");
    }
}
?>