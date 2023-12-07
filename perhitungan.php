<?php
// Koneksi ke database (ganti dengan informasi koneksi database Anda)
$host = "localhost";
$username = "root";
$password = "";
$database = "aplikasi-spk";

$koneksi = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}

// Query untuk mendapatkan data mahasiswa dari database
$query_mahasiswa = "SELECT nama, ipk, ms_studi, prestasi, na FROM penilaian";
$result_mahasiswa = $koneksi->query($query_mahasiswa);

// Cek apakah query berhasil dieksekusi
if (!$result_mahasiswa) {
    die("Query gagal: " . $koneksi->error);
}

// Ambil data mahasiswa dari hasil query
$mahasiswa = array();
while ($row = $result_mahasiswa->fetch_assoc()) {
    $mahasiswa[$row['nama']] = array(
        $row['ipk'],
        $row['ms_studi'],
        $row['prestasi'],
        $row['na']
    );
}

// Query untuk mendapatkan bobot dari tabel subkriteria
$query_bobot_ipk = "SELECT nama_sub, bobot FROM subkriteria WHERE kriteria_id = '1'";
$query_bobot_masa_studi = "SELECT nama_sub, bobot FROM subkriteria WHERE kriteria_id = '2'";
$query_bobot_prestasi = "SELECT nama_sub, bobot FROM subkriteria WHERE kriteria_id = '3'";
$query_bobot_tugas_akhir = "SELECT nama_sub, bobot FROM subkriteria WHERE kriteria_id = '4'";

$result_bobot_ipk = $koneksi->query($query_bobot_ipk);
$result_bobot_masa_studi = $koneksi->query($query_bobot_masa_studi);
$result_bobot_prestasi = $koneksi->query($query_bobot_prestasi);
$result_bobot_tugas_akhir = $koneksi->query($query_bobot_tugas_akhir);

// Fungsi untuk mendapatkan array bobot dari hasil query
function getBobotArray($result) {
    $bobot_array = array();
    while ($row = $result->fetch_assoc()) {
        $bobot_array[$row['nama_sub']] = $row['bobot'];
    }
    return $bobot_array;
}

// Mendapatkan array bobot untuk setiap kriteria
$bobot_ipk = getBobotArray($result_bobot_ipk);
$bobot_masa_studi = getBobotArray($result_bobot_masa_studi);
$bobot_prestasi = getBobotArray($result_bobot_prestasi);
$bobot_tugas_akhir = getBobotArray($result_bobot_tugas_akhir);

// Pastikan setiap array memiliki nilai
if (empty($bobot_ipk) || empty($bobot_masa_studi) || empty($bobot_prestasi) || empty($bobot_tugas_akhir)) {
    die("Salah satu dari bobot subkriteria kosong.");
}
// Kriteria dan Sub Kriteria
$kriteria = array("IPK", "Masa Studi", "Prestasi", "Tugas Akhir");

// Hitung Bobot Total untuk Normalisasi
$bobot_total = array(
    "IPK" => array_sum($bobot_ipk),
    "Masa Studi" => array_sum($bobot_masa_studi),
    "Prestasi" => array_sum($bobot_prestasi),
    "Tugas Akhir" => array_sum($bobot_tugas_akhir),
);

// Normalisasi Bobot
$normalisasi_bobot = array(
    "IPK" => array_map(function ($val) use ($bobot_total) {
        return isset($bobot_total["IPK"]) && $bobot_total["IPK"] != 0 ? $val / $bobot_total["IPK"] : 0;
    }, $bobot_ipk),
    "Masa Studi" => array_map(function ($val) use ($bobot_total) {
        return isset($bobot_total["Masa Studi"]) && $bobot_total["Masa Studi"] != 0 ? $val / $bobot_total["Masa Studi"] : 0;
    }, $bobot_masa_studi),
    "Prestasi" => array_map(function ($val) use ($bobot_total) {
        return isset($bobot_total["Prestasi"]) && $bobot_total["Prestasi"] != 0 ? $val / $bobot_total["Prestasi"] : 0;
    }, $bobot_prestasi),
    "Tugas Akhir" => array_map(function ($val) use ($bobot_total) {
        return isset($bobot_total["Tugas Akhir"]) && $bobot_total["Tugas Akhir"] != 0 ? $val / $bobot_total["Tugas Akhir"] : 0;
    }, $bobot_tugas_akhir),
);
// Normalisasi Matriks Keputusan
$normalisasi = array();

foreach ($mahasiswa as $nama => $nilai) {
    foreach ($kriteria as $krit) {
        $krit_index = array_search($krit, $kriteria);
        
        if (isset($nilai[$krit_index])) {
            // Konversi nilai ke tipe data numerik sebelum dibagi
            $nilai_kriteria = floatval($nilai[$krit_index]);
            $normalisasi[$nama][$krit] = $nilai_kriteria / $bobot_total[$krit];
        } else {
            $normalisasi[$nama][$krit] = 0;
        }
    }
}

// Hitung Bobot Relatif dengan Metode AHP
$totalBobotRelatif = array();
foreach ($mahasiswa as $nama => $nilai) {
    $totalBobotRelatif[$nama] = array_sum($normalisasi[$nama]);
}

// Hitung Nilai Preferensi dengan Metode SAW
$nilaiPreferensiSAW = array();
foreach ($mahasiswa as $nama => $nilai) {
    $nilaiPreferensiSAW[$nama] = array_sum(array_map(function ($val) {
        return $val;
    }, $normalisasi[$nama]));
}

// Tentukan Rangking Berdasarkan Nilai Preferensi SAW
arsort($nilaiPreferensiSAW);

// Simpan peringkat ke dalam database
foreach ($nilaiPreferensiSAW as $nama => $nilai) {
    $peringkat = array_search($nama, array_keys($nilaiPreferensiSAW)) + 1;

    $sqlSimpanPeringkat = "UPDATE mahasiswa SET peringkat = $peringkat WHERE nama = '$nama'";
    $koneksi->query($sqlSimpanPeringkat);
}
// Simpan peringkat ke dalam database
foreach ($nilaiPreferensiSAW as $nama => $nilai) {
    $peringkat = array_search($nama, array_keys($nilaiPreferensiSAW)) + 1;

    $sqlSimpanPeringkat = "UPDATE penilaian SET peringkat = $peringkat WHERE nama = '$nama'";
    $koneksi->query($sqlSimpanPeringkat);
}

?>