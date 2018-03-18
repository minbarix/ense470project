<?php
$conn = new mysqli("localhost", "thoma26s", "008096", "thoma26s");
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error);
}
$un = $_POST["username"];
$sw = $_POST["software"];


$sql = "INSERT INTO ense470request (owner, software, isapproved, isverified, iscompleted) VALUES ('$un','$sw','1','1','1')"; 

if ($conn->query($sql)===TRUE) 
{
header("Location: approvedlist.php");
} // end if 
else
{
    echo "Error: " . $sql . "<br>" . $conn->error;  
} 

   $conn->close();
?>