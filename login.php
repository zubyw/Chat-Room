<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Chat Room RZA</title>
</head>
<body>
    <nav>
        <h2><a href="index.php">Chatroom</a></h2>
        <div>
        <!-- <a href="uitlog.php">Logout</a> -->
            <a href="registreren.php">Register</a>
        </div>
    </nav>
    <form id="loginForm" method="post" action="login_verwerk.php">
        <h3>Login:</h3>
        <div>
                <label for="inputusername">username</label>
                <input type="text" name="inputusername">
               
            </div>
            <div>
                <label for="inputpassword">password</label>
                <input type="password" name="inputpassword">
                
            </div>
            <div>
                <input type="submit">
            </div>
    </form>
    
</body>
</html>