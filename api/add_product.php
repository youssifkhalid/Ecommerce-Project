<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $price = floatval($_POST['price']);
    $description = htmlspecialchars($_POST['description']);
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $stmt = $conn->prepare("INSERT INTO products (name, price, image, description) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sdss", $name, $price, $image, $description);
        $stmt->execute();
        echo "تم إضافة المنتج بنجاح!";
    } else {
        echo "حدث خطأ أثناء رفع الصورة.";
    }
}
?>
