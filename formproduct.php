<?php
require_once 'product.php';
require_once 'category.php';

$product = new Product();
$category = new Category();
$categories = $category->getAll();

$id = $_GET['id'] ?? '';
$data = $id ? $product->getById($id) : ['name' => '', 'price' => '', 'stock' => '', 'category_id' => ''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($id) {
        $product->update($id, $_POST['name'], $_POST['price'], $_POST['stock'], $_POST['category_id']);
    } else {
        $product->create($_POST['name'], $_POST['price'], $_POST['stock'], $_POST['category_id']);
    }
    header("Location: listproduct.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $id ? 'Edit' : 'Tambah' ?> Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

    <h2 class="mb-4"><?= $id ? 'Edit' : 'Tambah' ?> Produk</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="price" value="<?= htmlspecialchars($data['price']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stock" value="<?= htmlspecialchars($data['stock']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="category_id" class="form-control" required>
                <option value="">Pilih Kategori</option>
                <?php foreach ($categories as $c) : ?>
                    <option value="<?= $c['id'] ?>" <?= ($c['id'] == $data['category_id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($c['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="listproduct.php" class="btn btn-secondary">Batal</a>
    </form>

</body>
</html>
