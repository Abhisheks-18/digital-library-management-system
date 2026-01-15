<?php
include '../includes/db.php';

$search = "";
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $query = "SELECT * FROM books 
              WHERE title LIKE '%$search%' 
              OR author LIKE '%$search%' 
              OR category LIKE '%$search%'";
} else {
    $query = "SELECT * FROM books";
}

$books = mysqli_query($conn, $query);
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
    <a href="#">Issued Books</a>
    <a href="../index.php">Logout</a>
</div>

<div class="main">
    <h2>All Books</h2>

    <form method="get">
        <input type="text" name="search" placeholder="Search books..." value="<?php echo $search; ?>">
        <button>Search</button>
    </form>

    <br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Quantity</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($books)){ ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
        </tr>
        <?php } ?>
    </table>

</div>

</body>
</html>
