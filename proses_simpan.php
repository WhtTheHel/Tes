<?php
session_start();
include 'config/koneksi.php';

// Cek apakah ada data yang dikirim dan keranjang tidak kosong
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_SESSION['cart'])) {
    
    // Ambil data dari form checkout
    $nama_customer = mysqli_real_escape_string($conn, $_POST['nama']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    
    // Satukan rincian pesanan dari session menjadi teks
    $rincian_array = [];
    $total_bayar = 0;
    
    foreach ($_SESSION['cart'] as $item) {
        $rincian_array[] = $item['nama'] . " (" . $item['size'] . ")";
        $total_bayar += $item['harga'];
    }
    
    $rincian_kopi = implode(", ", $rincian_array);
    $tanggal_order = date('Y-m-d H:i:s');

    // Simpan ke database
    $query = "INSERT INTO pesanan (nama_customer, no_hp, alamat, rincian_kopi, total_bayar, tanggal_order) 
              VALUES ('$nama_customer', '$no_hp', '$alamat', '$rincian_kopi', '$total_bayar', '$tanggal_order')";

    if (mysqli_query($conn, $query)) {
        // Jika berhasil, kosongkan keranjang
        unset($_SESSION['cart']);
        
        // Tampilkan pesan sukses menggunakan JavaScript
        echo "<script>
                alert('Pesanan Berhasil! Terima kasih sudah berbelanja di Kopi Nusantara.');
                window.location.href='index.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

} else {
    // Jika mencoba akses langsung tanpa form, arahkan ke index
    header("Location: index.php");
}
?>
