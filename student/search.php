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

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Books</title>
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
    <h2>Search Books</h2>

    <form method="get">
        <input type="text" name="search" placeholder="Search..." value="<?php echo $search; ?>">
        <button>Search</button>
    </form>

    <br>

    <table border="1" cellpadding="10">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Available</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>
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
