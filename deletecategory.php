<?php
require_once 'database.php';
require_once 'category.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db = Database::getInstance()->getConnection();

    $checkProducts = $db->prepare("SELECT COUNT(*) FROM products WHERE category_id = ?");
    $checkProducts->execute([$id]);
    $productCount = $checkProducts->fetchColumn();

    if ($productCount > 0) {
        header("Location: listcategory.php?error=Kategori tidak bisa dihapus karena masih digunakan oleh produk.");
        exit;
    }

    $category = new Category();
    if ($category->delete($id)) {
        header("Location: listcategory.php?success=Kategori berhasil dihapus.");
    } else {
        header("Location: listcategory.php?error=Gagal menghapus kategori.");
    }
} else {
    header("Location: listcategory.php?error=ID tidak ditemukan.");
}
exit;
?>
