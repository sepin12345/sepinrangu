<?php
$nama = "Saverinus Rangu";
$foto = "sefrinom.jpg.jpeg";

$pendidikan = [
    ["SDI Pongwakar", "2014 - 2019"],
    ["SMPN 16 Pongwakar", "2019 - 2022"],
    ["SMK INFORMATIKA ST. Petrus Ruteng", "2022 - 2025"],
    ["INSTIKI", "2025 - Sekarang"]
];

$hobi = ["Sepak Bola", "Bola Voli", "Badminton"];

$skill = [
    "Bisa bekerja sama dalam Tim",
    "Bisa bekerja di bawah Tekanan",
    "Bisa menyelesaikan masalah dengan baik"
];

function e($text) {
    return htmlspecialchars(
        (string)$text,
        ENT_QUOTES,
        'UTF-8'
    );
}

// Proses formulir
$pesanStatus = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $namaPengirim = trim($_POST["nama"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $pesan = trim($_POST["pesan"] ?? "");

    if (
        $namaPengirim !== "" &&
        filter_var($email, FILTER_VALIDATE_EMAIL) &&
        $pesan !== ""
    ) {
        $pesanStatus = "Terima kasih, " .
            $namaPengirim .
            ". Formulir berhasil diterima.";
    } else {
        $pesanStatus =
            "Mohon periksa kembali data Anda.";
    }
}

// HTML menggunakan echo
echo '<!DOCTYPE html>';
echo '<html lang="id">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>CV ' . e($nama) . '</title>';
echo '</head>';

echo '<body>';
echo '<h1>' . e($nama) . '</h1>';

echo '<img src="' . e($foto) . '" 
      alt="Foto Profil" 
      width="250" 
      height="250">';

echo '<p>Mahasiswa INSTIKI</p>';
echo '<p>Jurusan Rekayasa Sistem Komputer (RSK)</p>';

echo '<hr>';

// Navigasi
echo '<nav>';
echo '<a href="#about">Tentang Saya</a> | ';
echo '<a href="#pendidikan">Pendidikan</a> | ';
echo '<a href="#hobi">Hobi</a> | ';
echo '<a href="#skill">Skill</a> | ';
echo '<a href="#kontak">Kontak</a>';
echo '</nav>';

echo '<hr>';

// Tentang Saya
echo '<section id="about">';
echo '<h2>Tentang Saya</h2>';

echo '<p>
Saya adalah mahasiswa INSTIKI jurusan
Rekayasa Sistem Komputer (RSK).
Saya memiliki minat di bidang teknologi
dan komputer. Selain itu, hobi saya adalah
bermain sepak bola karena dapat melatih
kerja sama, kedisiplinan, dan sportivitas.
</p>';

echo '</section>';

echo '<hr>';

// Pendidikan
echo '<section id="pendidikan">';
echo '<h2>Riwayat Pendidikan</h2>';

echo '<table border="1">';

echo '<tr>';
echo '<th>Nama Sekolah</th>';
echo '<th>Tahun</th>';
echo '</tr>';

foreach ($pendidikan as $data) {
    echo '<tr>';
    echo '<td>' . e($data[0]) . '</td>';
    echo '<td>' . e($data[1]) . '</td>';
    echo '</tr>';
}

echo '</table>';
echo '</section>';

echo '<hr>';

// Hobi
echo '<section id="hobi">';
echo '<h2>Hobi</h2>';
echo '<ol>';

foreach ($hobi as $item) {
    echo '<li>' . e($item) . '</li>';
}

echo '</ol>';
echo '</section>';

echo '<hr>';

// Skill
echo '<section id="skill">';
echo '<h2>Skill</h2>';
echo '<ul>';

foreach ($skill as $item) {
    echo '<li>' . e($item) . '</li>';
}

echo '</ul>';
echo '</section>';

echo '<hr>';

// Kontak
echo '<section id="kontak">';
echo '<h2>Kontak</h2>';

echo '<ul>';

echo '<li>Email:
<a href="mailto:sepinrangu58@gmail.com">
sepinrangu58@gmail.com</a></li>';

echo '<li>No Handphone: 081339599692</li>';

echo '<li>Alamat: Denpasar Selatan,
Jln Waturenggong, No. 19, Gang Mandau</li>';

echo '<li>GitHub:
<a href="https://github.com/sepin12345/Sefrin.github.io">
GitHub Saya</a></li>';

echo '</ul>';

echo '<hr>';

echo '<h2>Hubungi Saya</h2>';

if ($pesanStatus !== "") {
    echo '<p>' . e($pesanStatus) . '</p>';
}

echo '<form action="" method="post">';

echo '<label for="nama">Nama Lengkap:</label><br>';
echo '<input type="text" id="nama" name="nama"
placeholder="Masukkan Nama Anda" required>';
echo '<br><br>';

echo '<label for="email">Email:</label><br>';
echo '<input type="email" id="email" name="email"
placeholder="example@gmail.com" required>';
echo '<br><br>';

echo '<label for="pesan">Pesan:</label><br>';
echo '<textarea id="pesan" name="pesan"
rows="5" cols="30" required></textarea>';
echo '<br><br>';

echo '<button type="submit">Kirim</button>';

echo '</form>';
echo '</section>';

echo '<hr>';

// Footer
echo '<footer>';
echo '<p>&copy; 2026 ' . e($nama) . '</p>';
echo '</footer>';

echo '</body>';
echo '</html>';
?>