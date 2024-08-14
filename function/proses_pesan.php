<?php
include("koneksi.php");

if (isset($_POST['pemesan'])) {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $tanggal_pesan = $_POST['tanggal_pesan'];
    $jumlah_hari = $_POST['jumlah_hari'];

    $akomodasi = in_array('1000000', $_POST['pelayanan']) ? 'Y' : 'N';
    $transportasi = in_array('1200000', $_POST['pelayanan']) ? 'Y' : 'N';
    $servis = in_array('500000', $_POST['pelayanan']) ? 'Y' : 'N';

    $jumlah_peserta = $_POST['jumlah_peserta'];
    $harga_paket = $_POST['harga_paket'];
    $total_tagihan = $_POST['total_tagihan'];

    $sql = "INSERT INTO pemesan (nama, no_hp, tanggal_pesan, jumlah_hari, akomodasi, transportasi, servis, jumlah_peserta, harga_paket, total_tagihan) 
    VALUES ('$nama', '$no_hp', '$tanggal_pesan', '$jumlah_hari', '$akomodasi', '$transportasi', '$servis', '$jumlah_peserta', '$harga_paket', '$total_tagihan')";

    if (mysqli_query($conn, $sql)) {
        header("location: ../modifikasi_pesan.php");
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
} else {
    die("Akses dilarang...");
}
