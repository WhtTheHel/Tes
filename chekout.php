<?php
session_start();

// Jika keranjang kosong, arahkan kembali ke produk
if (empty($_SESSION['cart'])) {
    header("Location: produk.php");
    exit();
}

$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['harga'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout - Kopi Nusantara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .checkout-box { border-radius: 15px; }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-7 mb-4">
            <div class="card checkout-box shadow-sm p-4">
                <h4 class="mb-4">Informasi Pengiriman</h4>
                <form action="proses_simpan.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input name="nama" class="form-control" placeholder="Masukkan nama penerima" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor WhatsApp</label>
                        <input name="no_hp" class="form-control" placeholder="Contoh: 08123456789" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat Lengkap</label>
                        <textarea name="alamat" class="form-control" rows="3" placeholder="Nama jalan, nomor rumah, kecamatan, kota" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-dark btn-lg w-100 mt-3 shadow">
                        Konfirmasi & Bayar
                    </button>
                </form>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card checkout-box shadow-sm p-4 bg-white">
                <h4 class="mb-3">Ringkasan Pesanan</h4>
                <hr>
                <div class="order-items mb-3">
                    <?php foreach ($_SESSION['cart'] as $item): ?>
                        <div class="d-flex justify-content-between mb-2">
                            <span><?= htmlspecialchars($item['nama']) ?> (<?= $item['size'] ?>)</span>
                            <span class="fw-bold">Rp <?= number_format($item['harga'], 0, ',', '.') ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <hr>
                <div class="d-flex justify-content-between fs-5 fw-bold">
                    <span>Total Bayar:</span>
                    <span class="text-success">Rp <?= number_format($total, 0, ',', '.') ?></span>
                </div>
                <div class="mt-4 p-3 bg-light rounded" style="font-size: 0.85rem;">
                    <p class="mb-1 text-muted">Metode Pembayaran:</p>
                    <p class="mb-0 fw-bold">Bayar di Tempat (COD) / Transfer Bank</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
