<?php include 'config/koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Produk Kopi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.card {
border-radius:10px;
}
.btn-dark{
background:#2c2c3c;
border:none;
}
</style>

</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-4">
<h3 class="mb-3">Produk Kopi</h3>

<div class="row">

<?php
$query = mysqli_query($conn, "SELECT * FROM produk");
while($data = mysqli_fetch_array($query)){
?>

<div class="col-md-3 mb-4">
<div class="card p-2 shadow-sm">

<img src="<?= $data['espresso.jpg']; ?>" class="card-img-top" style="height:150px;object-fit:cover;">
<img src="<?= $data['americano.jpg']; ?>" class="card-img-top" style="height:150px;object-fit:cover;">

<h6 class="mt-2"><?= $data['nama']; ?></h6>

<div style="font-size:13px">
<b>Harga:</b><br>
Kecil : Rp 15.000<br>
Sedang : Rp 20.000<br>
Besar : Rp 25.000
</div>

<form action="keranjang.php" method="POST">

<label class="mt-2">Size:</label>
<select name="size" class="form-select form-select-sm">
<option value="Kecil">Kecil</option>
<option value="Sedang">Sedang</option>
<option value="Besar">Besar</option>
</select>

<input type="hidden" name="nama" value="<?= $data['nama']; ?>">

<button class="btn btn-dark w-100 mt-2">Tambah ke Keranjang</button>

</form>

</div>
</div>

<?php } ?>

</div>
</div>

</body>
</html>