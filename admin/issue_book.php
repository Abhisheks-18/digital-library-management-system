<?php
include '../includes/db.php';

$msg = "";

// Fetch students
$students = mysqli_query($conn, "SELECT * FROM users WHERE role='student'");

// Fetch books
$books = mysqli_query($conn, "SELECT * FROM books WHERE quantity > 0");

if(isset($_POST['issue'])){
    $user_id = $_POST['user'];
    $book_id = $_POST['book'];
    $date = date('Y-m-d');

    // Insert into issued_books
    mysqli_query($conn, "INSERT INTO issued_books (user_id, book_id, issue_date) 
                         VALUES ($user_id, $book_id, '$date')");

    // Reduce quantity
    mysqli_query($conn, "UPDATE books SET quantity = quantity - 1 WHERE id = $book_id");

    $msg = "Book issued successfully!";
}
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
    <a href="../index.php">Logout</a>
</div>

<div class="main">
    <h2>Issue Book</h2>

    <?php if($msg!="") echo "<p>$msg</p>"; ?>

    <form method="post">
        <select name="user" required>
            <option value="">Select Student</option>
            <?php while($s = mysqli_fetch_assoc($students)){ ?>
                <option value="<?php echo $s['id']; ?>">
                    <?php echo $s['name']; ?>
                </option>
            <?php } ?>
        </select><br><br>

        <select name="book" required>
            <option value="">Select Book</option>
            <?php while($b = mysqli_fetch_assoc($books)){ ?>
                <option value="<?php echo $b['id']; ?>">
                    <?php echo $b['title']; ?> (<?php echo $b['quantity']; ?>)
                </option>
            <?php } ?>
        </select><br><br>

        <button name="issue">Issue Book</button>
    </form>
</div>

</body>
</html>
