<?php
include 'includes/db.php';

$error = "";


if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        $user = mysqli_fetch_assoc($result);

        if($user['role'] == 'admin'){
            header("Location: admin/dashboard.php");
        } else {
            header("Location: student/dashboard.php");
        }
    } else {
        echo "Invalid login";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Login</title>
</head>
<body>
    <div class="login-container">
        <h2>Digital Library Login</h2>

        <?php if($error != ""){ ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>

        <form method="post">
            <input type="email" name="email" placeholder="Enter Email" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <button name="login">Login</button>
        </form>
    </div>
</body>
</html>
