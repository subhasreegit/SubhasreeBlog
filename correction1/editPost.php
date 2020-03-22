<?php
session_start();
    if(isset($_SESSION['ID'])){
        
    }
    else{
        header('Location:/LogInDetails.php');
    }

    echo $_SESSION['blogId']."<br>";
    echo $_SESSION['ID'];

    
?>