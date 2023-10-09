<?php
session_start();

if (isset($_GET['nik'])) {
    $nik_to_delete = $_GET['nik'];

    // Ambil data mahasiswa dari sesi
    $mahasiswa = $_SESSION['mahasiswa'];

    // Cari indeks data yang akan dihapus
    $index_to_delete = -1;
    foreach ($mahasiswa as $key => $data) {
        if ($data[0] === $nik_to_delete) {
            $index_to_delete = $key;
            break;
        }
    }

    // Hapus data jika indeks ditemukan
    if ($index_to_delete !== -1) {
        unset($mahasiswa[$index_to_delete]);

        // Simpan kembali data yang telah diubah ke dalam sesi
        $_SESSION['mahasiswa'] = array_values($mahasiswa);
    }
}

// Kembali ke halaman utama
header('Location: no1.php');
?>
