<?php
session_start();

function getHarga($size) {
    if ($size == "Kecil") return 15000;
    if ($size == "Sedang") return 20000;
    return 25000;
}

if (isset($_POST['nama']) && isset($_POST['size'])) {
    $nama = $_POST['nama'];
    $size = $_POST['size'];
    $harga = getHarga($size);

    $_SESSION['cart'][] = [
        "nama" => $nama,
        "size" => $size,
        "harga" => $harga
    ];

    header("Location: keranjang.php");
    exit();
}

if (isset($_GET['hapus'])) {
    unset($_SESSION['cart']);
    header("Location: keranjang.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja - Kopi Nusantara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><span style="color: #d4a373;">🛒</span> Keranjang Belanja</h2>
            <a href="keranjang.php?hapus=1" class="btn btn-outline-danger btn-sm">Kosongkan Keranjang</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Ukuran (Size)</th>
                        <th class="text-end">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    if (!empty($_SESSION['cart'])) {
                        $no = 1;
                        foreach ($_SESSION['cart'] as $item) {
                            echo "<tr>
                                <td>" . $no++ . "</td>
                                <td>" . htmlspecialchars($item['nama']) . "</td>
                                <td><span class='badge bg-info text-dark'>" . $item['size'] . "</span></td>
                                <td class='text-end'>Rp " . number_format($item['harga'], 0, ',', '.') . "</td>
                            </tr>";
                            $total += $item['harga'];
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center text-muted'>Keranjang masih kosong. <a href='produk.php'>Yuk belanja!</a></td></tr>";
                    }
                    ?>
                </tbody>
                <?php if ($total > 0): ?>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end fw-bold fs-5">Total Pembayaran:</th>
                        <th class="text-end text-success fw-bold fs-5">Rp <?= number_format($total, 0, ',', '.') ?></th>
                    </tr>
                </tfoot>
                <?php endif; ?>
            </table>
        </div>

        <div class="d-flex justify-content-between mt-3">
            <a href="produk.php" class="btn btn-secondary">← Kembali Belanja</a>
            <?php if ($total > 0): ?>
                <a href="checkout.php" class="btn btn-success px-5 fw-bold shadow">Lanjut ke Checkout</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
