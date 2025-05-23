<?php
//Login page
require_once 'classes/Database.php';
require_once 'classes/User.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $db = (new Database())->connect();
    $user = new User($db);
    $loggedInUser = $user->login($_POST['username'], $_POST['password']);
    if ($loggedInUser) 
    {
        $_SESSION['user'] = $loggedInUser;
        $_SESSION['aes_key'] = $_POST['password'];
        header("Location: dashboard.php");
        exit();
    } 
    else 
    {
        $error = "Invalid login credentials.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <form method="POST">
        <h2>Login</h2>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
        <p style="margin-top:10px;">Don’t have an account? <a href="signup.php">Register yourself here</a></p>
    </form>
</body>
</html>
