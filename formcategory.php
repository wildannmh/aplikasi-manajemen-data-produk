<?php
require_once 'category.php';
$category = new Category();

$id = $_GET['id'] ?? ''; 
$data = $id ? $category->getById($id) : ['name' => ''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($id) {
        $category->update($id, $_POST['name']);
    } else {
        $category->create($_POST['name']);
    }
    header("Location: listcategory.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $id ? 'Edit' : 'Tambah' ?> Kategori</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

    <h2 class="mb-4"><?= $id ? 'Edit' : 'Tambah' ?> Kategori</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="listcategory.php" class="btn btn-secondary">Batal</a>
    </form>

</body>
</html>
