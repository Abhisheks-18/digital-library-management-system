<?php
include '../includes/db.php';

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];

    mysqli_query($conn,
        "INSERT INTO books (title, author, category, quantity)
         VALUES ('$title','$author','$category','$quantity')"
    );

    header("Location: view_books.php");
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
    <a href="view_books.php">View Books</a>
    <a href="issue_book.php">Issue Book</a>
    <a href="issued_books.php">Issued Books</a>
    <a href="../index.php">Logout</a>
</div>

<div class="main">
    <h1>Add Book</h1>

    <form method="post">
        <input type="text" name="title" placeholder="Book Title" required>
        <input type="text" name="author" placeholder="Author" required>
        <input type="text" name="category" placeholder="Category" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <button name="add">Add Book</button>
    </form>
</div>

</body>
</html>
