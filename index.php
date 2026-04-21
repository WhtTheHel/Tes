<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace Kopi Nusantara</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                        /*url('img/hero-kopi.jpg');Opsional */
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            border-radius: 20px;
        }
        .btn-dark {
            background-color: #2c2c3c;
            border: none;
            padding: 10px 30px;
            font-weight: bold;
        }
        .btn-dark:hover {
            background-color: #1a1a26;
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">

    <div class="p-5 text-center bg-light rounded shadow-sm border">
        <h1 class="display-4 fw-bold">Marketplace Kopi Nusantara</h1>
        <p class="lead">Menyediakan biji kopi pilihan dari petani lokal di seluruh penjuru Indonesia. ☕</p>
        <hr class="my-4" style="width: 100px; margin: auto; border-top: 3px solid #2c2c3c;">
        
        <p>Segar, aromatik, dan dipanggang dengan cinta.</p>
        
        <div class="mt-4">
            <a href="produk.php" class="btn btn-dark btn-lg shadow">Mulai Belanja</a>
            <a href="#tentang" class="btn btn-outline-secondary btn-lg ms-2">Tentang Kami</a>
        </div>
    </div>

    <div class="row mt-5 text-center">
        <div class="col-md-4">
            <div class="p-3">
                <h3>Kualitas Premium</h3>
                <p class="text-muted">Hanya biji kopi terbaik yang kami kirimkan ke rumah Anda.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3">
                <h3>Pengiriman Cepat</h3>
                <p class="text-muted">Kopi dipacking dengan aman untuk menjaga kesegaran aromanya.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3">
                <h3>Petani Lokal</h3>
                <p class="text-muted">Mendukung keberlangsungan ekonomi petani kopi di Indonesia.</p>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
              </html>
