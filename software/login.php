<?php
session_start();
    $conn = new mysqli("localhost", "thoma26s", "008096", "thoma26s");
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    $username = $_POST["user"];
    $password = $_POST["pswd"];

    $sql = "SELECT tier FROM ense470users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

  
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

        if($row["tier"] == 1){
            header("Location: usersplash.php");
        }
        elseif($row["tier"] == 2){
            header("Location: approversplash.php");
        }
        elseif($row["tier"] == 3){
            header("Location: analystsplash.php");
        }
    }
    else{
       header("Location: splashpage.php");
    }
    $conn->close();
?>

