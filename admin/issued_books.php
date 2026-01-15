<?php
include '../includes/db.php';

$query = "
SELECT users.name AS student, books.title AS book, issued_books.issue_date
FROM issued_books
JOIN users ON issued_books.user_id = users.id
JOIN books ON issued_books.book_id = books.id
";

$result = mysqli_query($conn, $query);
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
    <h2>Issued Books History</h2>

    <table border="1" cellpadding="10">
        <tr>
            <th>Student</th>
            <th>Book</th>
            <th>Issue Date</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $row['student']; ?></td>
            <td><?php echo $row['book']; ?></td>
            <td><?php echo $row['issue_date']; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
