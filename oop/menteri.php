<?php
include_once "pengurusBEM.php";

class kepalaDepartemen extends pengurusBEM
{
    public function __construct($nama)
    {
        $this->nama = $nama;
        $this->setJabatan("Kepala Departemen");
    }

    public function setJabatan($jabatan)
    {
        parent::setJabatan($jabatan);
    }

    public function getJabatan()
    {
        return parent::getJabatan();
    }
}
?>