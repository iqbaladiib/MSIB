<?php

abstract class Bentuk2D {
    abstract public function luasBidang();
    abstract public function kelilingBidang();
}

class Lingkaran extends Bentuk2D {
    public $jari2;

    public function namaBidang() {
        return 'Lingkaran';
    }

    public function luasBidang() {
        return 3.14 * $this->jari2 * $this->jari2;
    }

    public function kelilingBidang() {
        return 2 * 3.14 * $this->jari2;
    }
}

class PersegiPanjang extends Bentuk2D {
    public $panjang;
    public $lebar;

    public function namaBidang() {
        return 'Persegi Panjang';
    }

    public function luasBidang() {
        return $this->panjang * $this->lebar;
    }

    public function kelilingBidang() {
        return 2 * ($this->panjang + $this->lebar);
    }
}

class Segitiga extends Bentuk2D {
    public $alas;
    public $tinggi;

    public function namaBidang() {
        return 'Segitiga';
    }

    public function luasBidang() {
        return 0.5 * $this->alas * $this->tinggi;
    }

    public function kelilingBidang() {
        // Untuk segitiga, tidak diberikan nilai sisi, sehingga keliling tidak dapat dihitung
        return 'Tidak dapat dihitung';
    }
}

// Membuat objek Lingkaran
$lingkaran = new Lingkaran();
$lingkaran->jari2 = 7;

// Membuat objek PersegiPanjang
$persegiPanjang = new PersegiPanjang();
$persegiPanjang->panjang = 5;
$persegiPanjang->lebar = 10;

// Membuat objek Segitiga
$segitiga = new Segitiga();
$segitiga->alas = 6;
$segitiga->tinggi = 8;

// Mencetak objek dalam bentuk tabel
echo '<table>';
echo '<tr><th>Nama Bidang</th><th>Luas Bidang</th><th>Keliling Bidang</th></tr>';

echo '<tr>';
echo '<td>' . $lingkaran->namaBidang() . '</td>';
echo '<td>' . $lingkaran->luasBidang() . '</td>';
echo '<td>' . $lingkaran->kelilingBidang() . '</td>';
echo '</tr>';

echo '<tr>';
echo '<td>' . $persegiPanjang->namaBidang() . '</td>';
echo '<td>' . $persegiPanjang->luasBidang() . '</td>';
echo '<td>' . $persegiPanjang->kelilingBidang() . '</td>';
echo '</tr>';

echo '<tr>';
echo '<td>' . $segitiga->namaBidang() . '</td>';
echo '<td>' . $segitiga->luasBidang() . '</td>';
echo '<td>' . $segitiga->kelilingBidang() . '</td>';
echo '</tr>';

echo '</table>';

?>
