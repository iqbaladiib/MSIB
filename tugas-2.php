<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Gaji</title>
</head>
<body>
    <h1>Kalkulator Gaji Pegawai</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="jabatan">Jabatan:</label>
        <select name="jabatan" id="jabatan">
            <option value="Manager">Manager</option>
            <option value="Asisten">Asisten</option>
            <option value="Kabag">Kabag</option>
            <option value="Staff">Staff</option>
        </select>
        <br><br>
        <label for="menikah">Status Menikah:</label>
        <input type="radio" name="menikah" value="sudah">Sudah Menikah
        <input type="radio" name="menikah" value="belum">Belum Menikah
        <br><br>
        <label for="jumlah_anak">Jumlah Anak:</label>
        <input type="number" name="jumlah_anak" id="jumlah_anak" min="0" max="5">
        <br><br>
        <label for="agama">Agama:</label>
        <input type="radio" name="agama" value="islam">islam
        <input type="radio" name="agama" value="non-islam">non islam
        <br><br>
        <input type="submit" name="submit" value="Hitung">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil nilai dari form
        $jabatan = $_POST["jabatan"];
        $menikah = isset($_POST["menikah"]) ? $_POST["menikah"] : "";
        $jumlah_anak = isset($_POST["jumlah_anak"]) ? $_POST["jumlah_anak"] : 0;
        $agama = isset($_POST['agama']) ? $_POST['agama'] : "";

        // Tentukan gaji pokok berdasarkan jabatan dengan switch case
        switch ($jabatan) {
            case 'Manager':
                $gaji_pokok = 20000000;
                break;
            case 'Asisten':
                $gaji_pokok = 15000000;
                break;
            case 'Kabag':
                $gaji_pokok = 10000000;
                break;
            case 'Staff':
                $gaji_pokok = 4000000;
                break;
            default:
                $gaji_pokok = 0;
                break;
        }

        // Hitung tunjangan jabatan
        $tunjangan_jabatan = 0.2 * $gaji_pokok;

        // Hitung tunjangan keluarga berdasarkan kondisi
        if ($menikah == 'sudah') {
            if ($jumlah_anak <= 2) {
                $tunjangan_keluarga = 0.05 * $gaji_pokok;
            } elseif ($jumlah_anak >= 3 && $jumlah_anak <= 5) {
                $tunjangan_keluarga = 0.1 * $gaji_pokok;
            } else {
                $tunjangan_keluarga = 0;
            }
        } else {
            $tunjangan_keluarga = 0;
        }

        // Hitung gaji kotor
        $gaji_kotor = $gaji_pokok + $tunjangan_jabatan + $tunjangan_keluarga;

        // Tentukan zakat profesi menggunakan ternary
        $zakat_profesi = ($agama == 'islam' && $gaji_kotor >= 6000000) ? (0.025 * $gaji_kotor) : 0;


        // Hitung take home pay (gaji bersih)
        $take_home_pay = $gaji_kotor - $zakat_profesi;

        // Tampilkan hasil perhitungan
        echo "<h2>Rincian Gaji:</h2>";
        echo "Jabatan: " . $jabatan . "<br>";
        echo "Gaji Pokok: " . number_format($gaji_pokok) . "<br>";
        echo "Tunjangan Jabatan: " . number_format($tunjangan_jabatan) . "<br>";
        echo "Tunjangan Keluarga: " . number_format($tunjangan_keluarga) . "<br>";
        echo "Gaji Kotor: " . number_format($gaji_kotor) . "<br>";
        echo "Zakat Profesi: " . number_format($zakat_profesi) . "<br>";
        echo "Take Home Pay: " . number_format($take_home_pay) . "<br>";
    }
    ?>
</body>
</html>
