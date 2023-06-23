<?php 
// session_start();

if (isset($_SESSION['username'])){
    if ($_SESSION['username'] == ''){
        header('Location: login.php');
    }
    else {
        
        // header('Location: inlog.php');
    }
    
}

else {
    
    header('Location: login.php');
}

// session_start();
        // $_SESSION['username'] = $username;