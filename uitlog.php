<link rel="stylesheet" href="style.css">

<?php
// // require_once 'login_check.php';
// echo "U bent uiteglogd!<br>";
// echo "<a href='index.php'>OVERZICHT</a>";
// session_destroy();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: login.php");
exit();

