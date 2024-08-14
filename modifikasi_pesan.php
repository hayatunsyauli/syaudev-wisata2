<?php
include("function/koneksi.php");

// Ambil semua data dari tabel pemesan
$sql = "SELECT * FROM pemesan";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wisata Banda Aceh</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css">
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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
    <section id="main-content" class="py-5 bg-light">
        <div class="container">
            <h3>Daftar Pesanan</h3>
            <div class="row">

                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <th>Phone</th>
                        <th>Jumlah Peserta</th>
                        <th>Jumlah Hari</th>
                        <th>Akomodasi</th>
                        <th>Transportasi</th>
                        <th>Servis/Makanan</th>
                        <th>Harga Paket</th>
                        <th>Total Tagihan</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                            <td>" . $row["nama"] . "</td>
                            <td>" . $row["no_hp"] . "</td>
                            <td>" . $row["jumlah_peserta"] . "</td>
                            <td>" . $row["jumlah_hari"] . "</td>
                            <td class='text-center'>" . $row["akomodasi"] . "</td>
                            <td class='text-center'>" . $row["transportasi"] . "</td>
                            <td class='text-center'>" . $row["servis"] . "</td>
                            <td>" . $row["harga_paket"] . "</td>
                            <td>" . $row["total_tagihan"] . "</td>
                            <td>
                                <a href='form_edit_pesan.php?id=" . $row["id"] . "'>Edit</a> | 
                                <a href='function/proses_hapus.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus pesanan ini?\")'>Hapus</a>
                            </td>
                          </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Tidak ada pesanan.</td></tr>";
                    }
                    $conn->close();
                    ?>
                </table>
            </div>
        </div>
    </section>


    <footer class=" bg-light">
        <div class="container bg-dark text-white text-center py-2">
            <p class="pt-2">
                &copy; 2024 Wisata Banda Aceh - SyauDev. Semua hak cipta dilindungi.
            </p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>