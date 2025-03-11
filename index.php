<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: url('background.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .container-content {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
        }
        .footer {
            position: absolute;
            bottom: 10px;
            font-size: 14px;
            color: black;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <div class="container-content text-center">
        <h1 class="mb-4">Selamat Datang di Manajemen Produk</h1>
        <a href="listproduct.php" class="btn btn-primary btn-lg">Lihat Daftar Produk</a>
        <a href="listcategory.php" class="btn btn-secondary btn-lg">Lihat Kategori</a>
    </div>

    <div class="footer">
        &copy; <?= date('Y'); ?> Manajemen Produk. Wildan Munawwar Habib. H1D023045.
    </div>
</body>
</html>
