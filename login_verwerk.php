<?php


error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'config.php';

$username = $_POST["inputusername"];
$password = $_POST["inputpassword"];
echo $username . "<br>";
echo $password;
if (strlen($username)>0 && strlen($password)>0){
    // $password=sha1($password);

    $query = "SELECT * FROM `chat_users` ";
    $query .= "WHERE username='$username' AND password='$password'";

    $querynaam = "SELECT 'username' FROM `chat_users` ";
    $querynaam .= "WHERE username='$username' AND password='$password'";

    $queryww = "SELECT 'password' FROM `chat_users` ";
    $queryww .= "WHERE username='$username' AND password='$password'";

    
    
    echo $querynaam;

    $result1 = mysqli_query($mysqli, $query);

    $result2 = mysqli_query($mysqli, $querynaam);

    $result3 = mysqli_query($mysqli, $queryww);

    if (mysqli_num_rows($result2) == 1){
        session_start();
        $_SESSION['username'] = $username;
        header("Location: index.php");
        // echo $_SESSION['username'];
        // echo "<p>Ingelogd ". $username ."!</p>";

    }
    else {
        echo "<p>Naam en of wachtwoord fout.</p>";
    }
    echo "<br><a href='login.php'>Ga Terug</a>";
}
// require_once 'login_check.php';