<?php
include '../includes/db.php';

$result = mysqli_query($conn, "
    SELECT users.name AS student,
           books.title AS book,
           issued_books.issue_date,
           issued_books.return_date
    FROM issued_books
    JOIN users ON issued_books.user_id = users.id
    JOIN books ON issued_books.book_id = books.id
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Issued Books</title>
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
    <h1>Issued Books</h1>

    <div class="table-container">
        <table>
            <tr>
                <th>Student</th>
                <th>Book</th>
                <th>Issue Date</th>
                <th>Return Date</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['student'] ?></td>
                <td><?= $row['book'] ?></td>
                <td><?= $row['issue_date'] ?></td>
                <td><?= $row['return_date'] ?? 'Not Returned' ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

</body>
</html>
