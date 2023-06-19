<!DOCTYPE html>
<html>
<head>
    <title>Data Nilai Mahasiswa</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
        }
        tfoot td {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Data Nilai Mahasiswa</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nilai</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $mahasiswa = array(
                array('Kevin Alatas', 85),
                array('Andi Binawan', 92),
                array('Mulqi Wijaya', 78),
                array('Ukayasah Mahmud', 65),
                array('Dion Prawinangga', 70),
            );

            $jumlah_mahasiswa = count($mahasiswa);
            $nilai_tertinggi = $mahasiswa[0][1];
            $nilai_terendah = $mahasiswa[0][1];
            $total_nilai = 0;

            foreach ($mahasiswa as $key => $data) {
                echo "<tr>";
                echo "<td>" . ($key + 1) . "</td>";
                echo "<td>" . $data[0] . "</td>";
                echo "<td>" . $data[1] . "</td>";

                // Cek nilai tertinggi
                if ($data[1] > $nilai_tertinggi) {
                    $nilai_tertinggi = $data[1];
                }

                // Cek nilai terendah
                if ($data[1] < $nilai_terendah) {
                    $nilai_terendah = $data[1];
                }

                // Hitung total nilai
                $total_nilai += $data[1];

                // Tentukan grade menggunakan switch case
                $grade = '';
                switch (true) {
                    case ($data[1] >= 80):
                        $grade = 'A';
                        break;
                    case ($data[1] >= 70):
                        $grade = 'B';
                        break;
                    case ($data[1] >= 60):
                        $grade = 'C';
                        break;
                    case ($data[1] >= 50):
                        $grade = 'D';
                        break;
                    default:
                        $grade = 'E';
                        break;
                }

                echo "<td>" . $grade . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">Jumlah Mahasiswa:</td>
                <td><?php echo $jumlah_mahasiswa; ?></td>
                <td rowspan="4"></td>
            </tr>
            <tr>
                <td colspan="2">Nilai Tertinggi:</td>
                <td><?php echo $nilai_tertinggi; ?></td>
            </tr>
            <tr>
                <td colspan="2">Nilai Terendah:</td>
                <td><?php echo $nilai_terendah; ?></td>
            </tr>
            <tr>
                <td colspan="2">Rata-rata:</td>
                <td><?php echo $total_nilai / $jumlah_mahasiswa; ?></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
