<?php
//This is not a necessary file ( optional )
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) 
{
    session_start();
}

// Include required class files
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/Encryption.php';
require_once __DIR__ . '/../classes/PasswordGenerator.php';

// Connect to DB
$db = (new Database())->connect();
?>