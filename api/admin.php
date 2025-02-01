<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">مرحبًا بالإدمن!</h1>
        <a href="logout.php" class="btn btn-danger">تسجيل الخروج</a>
        <h2 class="mt-4">إدارة المنتجات</h2>
        <form action="add_product.php" method="post" enctype="multipart/form-data" class="mt-4">
            <div class="mb-3">
                <label for="name" class="form-label">اسم المنتج:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">السعر:</label>
                <input type="number" id="price" name="price" step="0.01" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">صورة المنتج:</label>
                <input type="file" id="image" name="image" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">الوصف:</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">إضافة منتج</button>
        </form>
    </div>
</body>
</html>
