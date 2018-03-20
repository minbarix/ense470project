<?php
session_start();
//if(!$_SESSION[""]){
//    header("Location: ");
//}

$conn = new mysqli("localhost", "thoma26s", "008096", "thoma26s");
    if($conn->connect_error){
        die("connection failed: " . $conn->connect_error);
    }

    $softname = $_POST["softwarename"];
    $comment = $_POST["usercomment"];
    $username = $_SESSION["currUsername"];
    $sql = "INSERT INTO ense470request (owner,software,comments) VALUES ('$username','$softname','$comment')";
    //$cCode = $_SESSION["currentCode"];
    //$query = "SELECT temp FROM tablename WHERE input ORDER BY ID DESC";
    //$replyResult = $conn->query($query);
    
    if ($conn->query($sql)===TRUE) {
        header("Location: usersplash.php");
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;  
       } 
    
       $conn->close();
       
?>