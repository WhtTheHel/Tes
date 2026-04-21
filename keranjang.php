<?php
session_start();

function getHarga($size){
if($size=="Kecil") return 15000;
if($size=="Sedang") return 20000;
return 25000;
}

if(isset($_POST['nama'])){
$harga = getHarga($_POST['size']);

$_SESSION['cart'][] = [
"nama" => $_POST['nama'],
"size" => $_POST['size'],
"harga" => $harga
];
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Keranjang</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-4">
<h2>Keranjang</h2>

<table class="table table-bordered">
<tr>
<th>Nama</th>
<th>Size</th>
<th>Harga</th>
</tr>

<?php
$total=0;

if(!empty($_SESSION['cart'])){
foreach($_SESSION['cart'] as $item){
echo "<tr>
<td>".$item['nama']."</td>
<td>".$item['size']."</td>
<td>Rp ".$item['harga']."</td>
</tr>";
$total += $item['harga'];
}
}
?>

</table>

<h4>Total: Rp <?= $total ?></h4>

<a href="checkout.php" class="btn btn-success">Checkout</a>

</div>

</body>
</html>