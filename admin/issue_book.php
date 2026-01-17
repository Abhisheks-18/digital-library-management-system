<?php
include '../includes/db.php';

if(isset($_POST['issue'])) {
    $student = $_POST['student_id'];
    $book = $_POST['book_id'];

    mysqli_query($conn, "
        INSERT INTO issued_books (user_id, book_id, issue_date)
        VALUES ($student, $book, CURDATE())
    ");

    mysqli_query($conn, "
        UPDATE books SET quantity = quantity - 1 WHERE id = $book
    ");

    header("Location: issued_books.php");
}

$students = mysqli_query($conn, "SELECT * FROM users WHERE role='student'");
$books = mysqli_query($conn, "SELECT * FROM books WHERE quantity > 0");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Issue Book</title>
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
    <h1>Issue Book</h1>

    <div class="form-box">
        <form method="post">
            <label>Select Student</label>
            <select name="student_id" required>
                <option value="">-- Select Student --</option>
                <?php while($s = mysqli_fetch_assoc($students)) { ?>
                    <option value="<?= $s['id'] ?>"><?= $s['name'] ?></option>
                <?php } ?>
            </select>

            <label>Select Book</label>
            <select name="book_id" required>
                <option value="">-- Select Book --</option>
                <?php while($b = mysqli_fetch_assoc($books)) { ?>
                    <option value="<?= $b['id'] ?>"><?= $b['title'] ?></option>
                <?php } ?>
            </select>

            <button type="submit" name="issue">Issue Book</button>
        </form>
    </div>
</div>

</body>
</html>
