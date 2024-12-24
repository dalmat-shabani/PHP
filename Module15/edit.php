<?php
include 'db.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $conn->query("UPDATE products SET title='$title', description='$description', quantity=$quantity, price=$price WHERE id=$id");
    header('Location: index.php');
}

$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Product</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center">Edit Product</h1>
        <form method="POST" class="bg-white p-4 rounded shadow-sm">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="<?= $product['title'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control"><?= $product['description'] ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" value="<?= $product['quantity'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" step="0.01" name="price" class="form-control" value="<?= $product['price'] ?>" required>
            </div>
            <button type="submit" class="btn btn-warning w-100">Update Product</button>
        </form>
    </div>
</body>
</html>
