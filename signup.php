<?php
//Signup / Registering page 
require_once 'classes/Database.php';
require_once 'classes/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = (new Database())->connect();
    $user = new User($db);

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($user->register($username, $password)) {
        $success = "Registration successful. Please <a href='login.php'>log in here</a>.";
    } else {
        $error = "Registration failed. Try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <form method="POST">
        <h2>Create Your Account</h2>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <?php if (!empty($success)) echo "<p class='success'>$success</p>"; ?>
        <input type="text" name="username" placeholder="Choose a username" required><br>
        <input type="password" name="password" placeholder="Choose a password" required><br>
        <button type="submit">Sign Up</button>
        <p style="margin-top:10px;">Already have an account? <a href="login.php">Login here</a></p>
    </form>
</body>
</html>
