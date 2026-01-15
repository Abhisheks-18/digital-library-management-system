<?php
include '../includes/db.php';

$msg = "";

if(isset($_POST['add'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];

    mysqli_query($conn, "INSERT INTO books (title, author, category, quantity) 
                         VALUES ('$title', '$author', '$category', $quantity)");

    $msg = "Book added successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<div class="sidebar">
    <h2>Library</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="add_book.php">Add Books</a>
    <a href="#">View Books</a>
    <a href="#">Issued Books</a>
    <a href="../index.php">Logout</a>
</div>

<div class="main">
    <h2>Add New Book</h2>

    <?php if($msg!="") echo "<p>$msg</p>"; ?>

    <form method="post">
        <input type="text" name="title" placeholder="Book Title" required><br><br>
        <input type="text" name="author" placeholder="Author" required><br><br>
        <input type="text" name="category" placeholder="Category" required><br><br>
        <input type="number" name="quantity" placeholder="Quantity" required><br><br>
        <button name="add">Add Book</button>
    </form>
</div>

</body>
</html>
