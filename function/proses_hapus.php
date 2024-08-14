<?php

include("koneksi.php");

$id = $_GET['id'];

$result = mysqli_query($conn, "DELETE FROM pemesan WHERE id=$id");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:../modifikasi_pesan.php");
