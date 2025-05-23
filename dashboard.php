<?php
//Dashboard / Main page after logging in.
if (session_status() === PHP_SESSION_NONE) 
{
    session_start();
}

if (!isset($_SESSION['user'])) 
{
    header("Location: login.php");
    exit();
}

require_once 'classes/PasswordGenerator.php';
require_once 'classes/Encryption.php';
require_once 'classes/Database.php';

$password = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $length = $_POST['length'];
    $upper = $_POST['upper'];
    $lower = $_POST['lower'];
    $numbers = $_POST['numbers'];
    $specials = $_POST['specials'];

    $password = PasswordGenerator::generate($length, $upper, $lower, $numbers, $specials);

    $db = (new Database())->connect();
    $stmt = $db->prepare("INSERT INTO passwords (user_id, website, password_encrypted) VALUES (?, ?, ?)");
    $enc = Encryption::encrypt($password, $_SESSION['aes_key']);
    $stmt->execute([$_SESSION['user']['id'], $_POST['website'], $enc]);

    $success = "Password saved successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <form method="POST">
        <h2>Welcome back, <?= htmlspecialchars($_SESSION['user']['username']) ?>!</h2>

        <?php if ($success): ?>
            <p class="success"><?= $success ?></p>
        <?php endif; ?>

        Website/App Name: <input type="text" name="website" required><br>
        Total Length: <input type="number" name="length" value="8" required><br>
        Uppercase: <input type="number" name="upper" value="2"><br>
        Lowercase: <input type="number" name="lower" value="2"><br>
        Numbers: <input type="number" name="numbers" value="2"><br>
        Special Characters: <input type="number" name="specials" value="2"><br>

        <button type="submit">Generate and Save Password</button>

        <?php if ($password): ?>
            <p style="margin-top: 15px;"><strong>Generated Password:</strong><br><?= htmlspecialchars($password) ?></p>
        <?php endif; ?>
    </form>
</body>
</html>
