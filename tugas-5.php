<?php

class Pegawai {
    public $nip;
    public $nama;
    public $jabatan;
    public $agama;
    public $status;
    public $gajiPokok;
    public $tunjanganJabatan;
    public $tunjanganKeluarga;
    public $zakatProfesi;
    public $gajiBersih;

    public function setTunjanganJabatan() {
        $this->tunjanganJabatan = 0.2 * $this->gajiPokok;
    }

    public function setTunjanganKeluarga() {
        $this->tunjanganKeluarga = $this->status == 'menikah' ? 0.1 * $this->gajiPokok : 0;
    }

    public function setZakatProfesi() {
        $this->zakatProfesi = $this->agama == 'muslim' && $this->gajiPokok >= 6000000 ? 0.025 * $this->gajiPokok : 0;
    }

    public function setGajiBersih() {
        $this->gajiBersih = $this->gajiPokok + $this->tunjanganJabatan + $this->tunjanganKeluarga - $this->zakatProfesi;
    }

    public function cetakGaji() {
        echo "NIP: " . $this->nip . "<br>";
        echo "Nama: " . $this->nama . "<br>";
        echo "Jabatan: " . $this->jabatan . "<br>";
        echo "Agama: " . $this->agama . "<br>";
        echo "Status: " . $this->status . "<br>";
        echo "Gaji Pokok: " . $this->gajiPokok . "<br>";
        echo "Tunjangan Jabatan: " . $this->tunjanganJabatan . "<br>";
        echo "Tunjangan Keluarga: " . $this->tunjanganKeluarga . "<br>";
        echo "Zakat Profesi: " . $this->zakatProfesi . "<br>";
        echo "Gaji Bersih: " . $this->gajiBersih . "<br><br>";
    }
}

// Membuat objek Pegawai
$pegawai1 = new Pegawai();
$pegawai1->nip = '123456789';
$pegawai1->nama = 'Mikael Avicena';
$pegawai1->jabatan = 'Manajer';
$pegawai1->agama = 'Islam';
$pegawai1->status = 'menikah';
$pegawai1->gajiPokok = 8000000;

$pegawai2 = new Pegawai();
$pegawai2->nip = '987654321';
$pegawai2->nama = 'Kevin Alatas';
$pegawai2->jabatan = 'Staff';
$pegawai2->agama = 'Islam';
$pegawai2->status = 'belum menikah';
$pegawai2->gajiPokok = 5000000;

$pegawai3 = new Pegawai();
$pegawai3->nip = '456123789';
$pegawai3->nama = 'Michael Jackson';
$pegawai3->jabatan = 'Supervisor';
$pegawai3->agama = 'Kristen';
$pegawai3->status = 'menikah';
$pegawai3->gajiPokok = 7000000;

$pegawai4 = new Pegawai();
$pegawai4->nip = '789321654';
$pegawai4->nama = 'Aisyah';
$pegawai4->jabatan = 'Analyst';
$pegawai4->agama = 'Islam';
$pegawai4->status = 'menikah';
$pegawai4->gajiPokok = 5500000;

$pegawai5 = new Pegawai();
$pegawai5->nip = '159753852';
$pegawai5->nama = 'Fransiska Olie';
$pegawai5->jabatan = 'Koordinator';
$pegawai5->agama = 'Kristen';
$pegawai5->status = 'belum menikah';
$pegawai5->gajiPokok = 6000000;

// Mengatur tunjangan dan gaji bersih untuk setiap pegawai
$pegawai1->setTunjanganJabatan();
$pegawai1->setTunjanganKeluarga();
$pegawai1->setZakatProfesi();
$pegawai1->setGajiBersih();

$pegawai2->setTunjanganJabatan();
$pegawai2->setTunjanganKeluarga();
$pegawai2->setZakatProfesi();
$pegawai2->setGajiBersih();

$pegawai3->setTunjanganJabatan();
$pegawai3->setTunjanganKeluarga();
$pegawai3->setZakatProfesi();
$pegawai3->setGajiBersih();

$pegawai4->setTunjanganJabatan();
$pegawai4->setTunjanganKeluarga();
$pegawai4->setZakatProfesi();
$pegawai4->setGajiBersih();

$pegawai5->setTunjanganJabatan();
$pegawai5->setTunjanganKeluarga();
$pegawai5->setZakatProfesi();
$pegawai5->setGajiBersih();

// Mencetak struktur gaji pegawai
$pegawai1->cetakGaji();
$pegawai2->cetakGaji();
$pegawai3->cetakGaji();
$pegawai4->cetakGaji();
$pegawai5->cetakGaji();

?>
