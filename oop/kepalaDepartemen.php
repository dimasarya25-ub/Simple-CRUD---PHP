<?php
include_once "pengurusBEM.php";

class menteri extends pengurusBEM
{
    public function __construct($nama)
    {
        $this->nama = $nama;
        $this->setJabatan("Menteri");
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