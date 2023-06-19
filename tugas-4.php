<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Function</title>
</head>

<?php
$listProdi = ["SI" => "Sistem Informasi", "TI" => "Teknik Informatika", "ILKOM" => "Ilmu Komputer", "TE" => "Teknik Elektro"];
$listSkill = ["HTML" => 10, "CSS" => 10, "Javascript" => 20, "RWD Bootstrap" => 20, "PHP" => 30, "MySQL" => 30, "Laravel" => 40];
$listDomisili = ["Jakarta", "Bandung", "Bekasi", "Malang", "Surabaya", "lainnya"];
?>

<body>
    <main>
        <h1>Form Hitung Skor Skill</h1>
        <form method="POST">
            <input type="text" name="nim" placeholder="Masukan NIM" required>
            <input type="text" name="nama" placeholder="Masukan Nama" required>
            <input type="email" name="email" placeholder="Masukan Email" required>
            <select name="prodi" required>
                <option>-- Pilih Prodi --</option>
                <?php foreach ($listProdi as $prodi => $value) : ?>
                    <option value="<?= $prodi; ?>"><?= $value; ?></option>
                <?php endforeach ?>
            </select>
            <select name="domisili" required>
                <option>-- Pilih Domisili --</option>
                <?php foreach ($listDomisili as $dom) : ?>
                    <option value="<?= $dom; ?>"><?= $dom; ?></option>
                <?php endforeach ?>
            </select>
            <div class="form-control">
                <div>
                    <input type="radio" name="gender" value="Laki-laki" id="laki" required>
                    <label for="laki">Laki-Laki</label>
                </div>
                <div>
                    <input type="radio" name="gender" value="Perempuan" id="cw" required>
                    <label for="cw">Perempuan</label>
                </div>
            </div>
            <label>Pilih Skill</label>
            <div class="form-control-checkbox">
                <?php foreach ($listSkill as $skill => $value) : ?>
                    <div>
                        <input type="checkbox" name="skill[]" value="<?= $skill; ?>" id="<?= $skill; ?>">
                        <label for="<?= $skill; ?>"><?= $skill; ?></label>
                    </div>
                <?php endforeach ?>
            </div>
            <button name="submit">Calculate</button>
            <br><br>
            <?php
            if (isset($_POST["submit"])) :
                $nim = $_POST["nim"];
                $nama = $_POST["nama"];
                $gender = $_POST["gender"];
                $prodi = $_POST["prodi"];
                $skillset = $_POST["skill"] ?? "";
                $email = $_POST["email"];

                function setScoreSkill($userSkill, $listSkill)
                {
                    return array_sum(array_filter($listSkill, fn ($key) => in_array($key, $userSkill), ARRAY_FILTER_USE_KEY));
                }

                function setCategorySkill($s)
                {
                    return $s == 0 ? "Tidak Memadai" : ($s <= 40 ? "Kurang" : ($s <= 60 ? "Cukup" : ($s <= 100 ? "Baik" : "Sangat Baik")));
                }

                $skill = $skillset ? implode(", ", $skillset) : "Tidak Memilih Skill";
                $scoreSkill = $skillset ? setScoreSkill($skillset, $listSkill) : 0
            ?>
                <input type="text" readonly value="NIM : <?= $nim ?>">
                <br><br>
                <input type="text" readonly value="NAMA : <?= $nama ?>">
                <br><br>
                <input type="text" readonly value="JENIS KELAMIN : <?= $gender ?>">
                <br><br>
                <input type="text" readonly value="PROGRAM STUDI : <?= $prodi ?>">
                <br><br>
                <input type="text" readonly value="SKILL : <?= $skill; ?>">
                <br><br>
                <input type="text" readonly value="SCORE SKILL : <?= $scoreSkill; ?>">
                <br><br>
                <input type="text" readonly value="SCORE SKILL : <?= setCategorySkill($scoreSkill); ?>">
                <br><br>
                <input type="text" readonly value="EMAIL : <?= $email ?>">
                <br><br>
            <?php endif ?>
        </form>
    </main>


</body>

</html>