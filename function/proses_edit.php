<?php
include("koneksi.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
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

    $sql = "UPDATE pemesan SET 
            nama='$nama', 
            no_hp='$no_hp', 
            tanggal_pesan='$tanggal_pesan', 
            jumlah_hari='$jumlah_hari', 
            akomodasi='$akomodasi', 
            transportasi='$transportasi', 
            servis='$servis', 
            jumlah_peserta='$jumlah_peserta', 
            harga_paket='$harga_paket', 
            total_tagihan='$total_tagihan'
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("location: ../modifikasi_pesan.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
