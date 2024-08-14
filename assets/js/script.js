function hitungTotal() {
  let jumlahPeserta = document.getElementById("jumlah_peserta").value;
  let waktuPerjalanan = document.getElementById("waktu_perjalanan").value;
  let pelayanan = document.querySelectorAll(
    'input[name="pelayanan[]"]:checked'
  );
  let totalHarga = 0;

  pelayanan.forEach((item) => {
    totalHarga += parseInt(item.value);
  });

  let jumlahTagihan = totalHarga * jumlahPeserta * waktuPerjalanan;
  document.getElementById("jumlahTagihan").value = jumlahTagihan;
  document.getElementById("hargaPaket").value = totalHarga;
}
