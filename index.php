<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="3"> -->
    <script src="https://kit.fontawesome.com/1fb6469b0d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Chat Room RZA</title>
</head>
<body>

    <nav>
        <h2><a href="index.php">Chatroom</a></h2>
        <div>
            
            <a href="uitlog.php">Logout</a>
         
        </div>
    </nav>

    <div id="messageBoard" method="post">

        
    <form id="zoekform" method="POST" action="index.php">
    <input type="text" name="zoek" placeholder="...">
    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    
        <!-- <input type="text" name="zoek" placeholder="..." oninput="submitForm()"> -->
    </form>
    

<script>
// function submitForm() {
//         var form = document.getElementById("zoekform");
//         form.submit();
// }

</script>
    <?php

    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    session_start();

    include 'config.php';
    include 'login_check.php';
    // "INSERT INTO `chat_users`(`ID`, `username`, `password`) VALUES ('','','');"
    // "SELECT `ID`, `username`, `password` FROM `chat_users` WHERE 1"


    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["message"])) {
        
        
        
        
        // Naam krijgen van user die is ingelogd.
        
        $name = $_POST['name'];
        
        // Text krijgen van Input.
        $message = $_POST['message'];
        
        // Timestamp Variabele
        $timestamp = date("Y-m-d H:i:s");
        
        // Insert Query
        $insertQuery = "INSERT INTO `chat_messages`(`name`, `text`, `timestamp`) VALUES ('$name','$message','$timestamp')";
        
        
        $result = $mysqli->query($insertQuery);
        
        header("Location: index.php");
        
        //Select Query
    }

 
    

        $sql = "SELECT * FROM chat_messages ORDER BY timestamp DESC";
        $result = $mysqli->query($sql);
        $messages = $result->fetch_all(MYSQLI_ASSOC);
            



    
        
    // echo $messages;



    // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["message"])) {
    //     $message = $_POST["message"];
    //     $sender = $_SESSION["username"];
    //     $timestamp = date("Y-m-d H:i:s");
        
    //     // Insert the new message into the database
    //     $sql = "INSERT INTO chat_messages (username, message, recipient, timestamp) VALUES (?, ?, ?, ?)";
    //     $stmt = $mysqli->prepare($sql);
    //     $stmt->bind_param("ssss", $sender, $message, $recipient, $timestamp);
    //     $stmt->execute();
    //     $stmt->close();
    
    //     // Redirect to prevent form resubmission
    //     header("Location: index.php");
    //     exit();
    // }
    



    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["zoek"])) {

    


        $zoek = $_POST["zoek"];
        
        
        $zoekQuery = "SELECT * FROM `chat_messages` WHERE `name` LIKE '%$zoek%' OR `text` LIKE '%$zoek%' ORDER BY timestamp DESC";
        // echo $zoekQuery;
        $result = $mysqli->query($zoekQuery);
        $messages = $result->fetch_all(MYSQLI_ASSOC);
        
        ?> <div id="chat-container"> <?php
        foreach ($messages as $message) : ?>
            <p>
                
                    <strong><?php echo $message["name"]; ?>:</strong>
                    <?php echo $message["text"]; ?>
                    
                
            </p>
        <?php endforeach;
        ?> </div> <?php
        }
        else{

            
            ?>
    <div id="chat-container">
        <?php foreach ($messages as $message) : ?>
            <p>
                <strong><?php echo $message["name"]; ?>:</strong>
                <?php echo $message["text"]; ?>
                
                
            </p>
            <?php endforeach; ?>
        </div>
    <?php } ?>


        <div id="message-input">
            <form method="POST" action="index.php">
                <textarea  name="message" rows="4" cols="50" required></textarea>
                <br>
            <input type="hidden" name="name" value="<?php echo $_SESSION['username']; ?>">
            <br>
            <button type="submit">Send</button>
        </form>
    </div>



    
        <!-- <p>Bericht: <input type="text" name="message" required></p> -->
    </div>
</body>
</html>
<?php

