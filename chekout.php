<!DOCTYPE html>
<html>
<head>
<title>Checkout</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-4">
<h2>Checkout</h2>

<form action="proses/simpan_order.php" method="POST" class="card p-4 shadow">

<input name="nama" class="form-control mb-2" placeholder="Nama Customer" required>
<input name="no_hp" class="form-control mb-2" placeholder="No HP" required>
<textarea name="alamat" class="form-control mb-2" placeholder="Alamat"></textarea>

<button class="btn btn-primary w-100">Pesan Sekarang</button>

</form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>