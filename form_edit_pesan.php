<?php
include("function/koneksi.php");

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wisata Banda Aceh</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
</head>

<body>
    <header class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="img/chor-tsang-07mSKrzKiRw-unsplash.jpg" class="img-fluid" width="100%" height="337" style="width: 100%; height: 337px" alt="Header Image" />
                </div>
            </div>
        </div>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Wisata Banda Aceh</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls required="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Destinasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="modifikasi_pesan.php">Modifikasi Pesanan</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form id="formPemesanan" action="function/proses_pesan.php" method="post" class="row g-3">
                        <?php
                        $id = isset($_GET['id']) ? $_GET['id'] : '';

                        // Ambil semua data dari tabel pemesan
                        $sql = "SELECT * FROM pemesan WHERE id = $id";
                        $result = mysqli_query($conn, $sql);

                        while ($user_data = mysqli_fetch_array($result)) {
                            $nama = $user_data['nama'];
                            $no_hp = $user_data['no_hp'];
                            $tanggal_pesan = $user_data['tanggal_pesan'];
                            $jumlah_hari = $user_data['jumlah_hari'];
                            $jumlah_peserta = $user_data['jumlah_peserta'];
                            $harga_paket = $user_data['harga_paket'];
                            $total_tagihan = $user_data['total_tagihan'];
                        }

                        if ($result):
                        ?>
                            <div class="col-md-12 pt-2">
                                <label for="inputPemesan" class="form-label">Nama Pemesan</label>
                                <input type="text" name="nama" value="<?php echo $nama ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12 pt-2">
                                <label for="inputPassword4" class="form-label">Nomor Hp/Telp</label>
                                <input type="number" name="no_hp" value="<?php echo $no_hp ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="inputAddress" class="form-label">Tanggal Pesan</label>
                                <input type="date" name="tanggal_pesan" value="<?php echo $tanggal_pesan ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="inputAddress2" class="form-label">Waktu Pelaksanaan Perjalanan</label>
                                <input type="number" name="jumlah_hari" value="<?php echo $jumlah_hari ?>" id="waktu_perjalanan" class="form-control" required>
                            </div>
                            <div class="col-md-12 pt-2">
                                <label for="">Pelayanan Paket Perjalanan</label>
                                <div class="form-check">
                                    <input name="pelayanan[]" class="form-check-input" type="checkbox" value="1000000" id="penginapan">
                                    <label class="form-check-label" for="penginapan">
                                        Penginapan (Rp 1,000,000)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="pelayanan[]" class="form-check-input" type="checkbox" value="1200000" id="transportasi">
                                    <label class="form-check-label" for="transportasi">
                                        Transportasi (Rp 1,200,000)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="pelayanan[]" class="form-check-input" type="checkbox" value="500000" id="servis">
                                    <label class="form-check-label" for="servis">
                                        Servis/Makan (Rp 500,000)
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 pt-2">
                                <label for="inputPemesan" class="form-label">Jumlah Peserta</label>
                                <input type="text" name="jumlah_peserta" value="<?php echo $jumlah_peserta ?>" id="jumlah_peserta" class="form-control" required required>
                            </div>
                            <div class="col-md-12 pt-2">
                                <label for="inputPassword4" class="form-label">Harga Paket Perjalanan</label>
                                <input type="number" name="harga_paket" value="<?php echo $harga_paket ?>" class="form-control" required id="hargaPaket" required readonly>
                            </div>
                            <div class="col-md-12 pt-2">
                                <label for="inputPemesan" class="form-label">Jumlah Tagihan</label>
                                <input type="text" name="total_tagihan" value="<?php echo $total_tagihan ?>" class="form-control" required id="jumlahTagihan" required readonly>
                            </div>

                            <div class="col-md-12 pt-2">
                                <button type="submit" name="pemesan" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-primary" onclick="hitungTotal()">Hitung</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        <?php
                        else:
                            echo '<p>Item not found.</p>';
                        endif;

                        ?>
                    </form>
                </div>
            </div>
        </div>
    </section>



    <footer class="bg-light">
        <div class="container bg-dark text-white text-center py-2">
            <p class="pt-2">
                &copy; 2024 Wisata Banda Aceh - SyauDev. Semua hak cipta dilindungi.
            </p>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>