<?php
session_start();
//if(!$_SESSION[""]){
//    header("Location: ");
//}

$conn = new mysqli("localhost", "thoma26s", "008096", "thoma26s");
    if($conn->connect_error){
        die("connection failed: " . $conn->connect_error);
    }

    $name = $_POST["softwarename"];
    $comment = $_POST["usercomment"];
    //$cCode = $_SESSION["currentCode"];

    //$query = "SELECT temp FROM tablename WHERE input ORDER BY ID DESC";
    //$replyResult = $conn->query($query);
?>