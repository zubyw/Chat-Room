<?php


error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'config.php';

$username = $_POST["inputusername"];
$password = $_POST["inputpassword"];
$invoercode = $_POST["inputpasscode"];
$realcode = "RZA";
// echo $username . "<br>";
// echo $password;
if (strlen($username)>0 && strlen($password)>0){
    if($realcode == $invoercode){
        $queryinsert = "INSERT INTO `chat_users`(`username`, `password`) ";
        $queryinsert .= "VALUES ('$username','$password')";

        $result = $mysqli->query($queryinsert);
    }
    // $password=sha1($password);
    

    $query = "SELECT * FROM `chat_users` ";
    $query .= "WHERE username='$username' AND password='$password'";

    $querynaam = "SELECT 'username' FROM `chat_users` ";
    $querynaam .= "WHERE username='$username' AND password='$password'";

    $queryww = "SELECT 'password' FROM `chat_users` ";
    $queryww .= "WHERE username='$username' AND password='$password'";

    
    
    // echo $querynaam;

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
    echo "<br><a id='gaterug' href='registreren.php'>Ga Terug</a>";
}
// require_once 'login_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            text-align:center;
            margin-top:80px;
        }   
         </style>
    <title></title>
</head>
<body>
    
</body>
</html>