<?php
include '../includes/db.php';
$result = mysqli_query($conn, "SELECT * FROM books");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
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
    <h1>Books</h1>

    <div class="table-container">
        <table>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Quantity</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['title'] ?></td>
                <td><?= $row['author'] ?></td>
                <td><?= $row['category'] ?></td>
                <td><?= $row['quantity'] ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

</body>
</html>
