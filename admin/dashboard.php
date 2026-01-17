<?php
include '../includes/db.php';

$books = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT SUM(quantity) AS total FROM books")
)['total'] ?? 0;

$issued = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM issued_books")
)['total'];

$students = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM users WHERE role='student'")
)['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
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
    <h1>Admin Dashboard</h1>

    <div class="cards">
        <div class="card">
            <h3>Total Books</h3>
            <p><?= $books ?></p>
        </div>

        <div class="card">
            <h3>Issued Books</h3>
            <p><?= $issued ?></p>
        </div>

        <div class="card">
            <h3>Students</h3>
            <p><?= $students ?></p>
        </div>
    </div>
</div>

</body>
</html>
