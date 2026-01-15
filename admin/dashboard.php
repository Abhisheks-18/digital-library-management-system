<?php
include '../includes/db.php';

$books = mysqli_query($conn, "SELECT SUM(quantity) as total FROM books");
$books = mysqli_fetch_assoc($books)['total'] ?? 0;

$issued = mysqli_query($conn, "SELECT COUNT(*) as total FROM issued_books");
$issued = mysqli_fetch_assoc($issued)['total'];

$students = mysqli_query($conn, "SELECT COUNT(*) as total FROM users WHERE role='student'");
$students = mysqli_fetch_assoc($students)['total'];
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
    <a href="#">Dashboard</a>
    <a href="add_book.php">Add Books</a>
    <a href="view_books.php">View Books</a>
    <a href="issue_book.php">Issued Books</a>
    <a href="../index.php">Logout</a>
</div>

<div class="main">
    <h1>Admin Dashboard</h1>

    <div class="card">
        <h3>Total Books</h3>
        <p><?php echo $books; ?></p>
    </div>

    <div class="card">
        <h3>Issued Books</h3>
        <p><?php echo $issued; ?></p>
    </div>

    <div class="card">
        <h3>Students</h3>
        <p><?php echo $students; ?></p>
    </div>
</div>

</body>
</html>
