<?php
include '../includes/db.php';

$query = "
SELECT books.title, issued_books.issue_date
FROM issued_books
JOIN books ON issued_books.book_id = books.id
";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Books</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<div class="sidebar">
    <h2>Library</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="search.php">Search Books</a>
    <a href="history.php">My Borrowed Books</a>
    <a href="../index.php">Logout</a>
</div>

<div class="main">
    <h2>My Borrowed Books</h2>

    <table border="1" cellpadding="10">
        <tr>
            <th>Book</th>
            <th>Issue Date</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['issue_date']; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
