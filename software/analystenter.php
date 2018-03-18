<?php
session_start();
if($_SESSION["currTier"] == 1){
    header("Location: usersplash.php");
}
elseif($_SESSION["currTier"] == 2){
    header("Location: approversplash.php");
}
elseif($_SESSION["currTier"] != 3){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head><link rel="stylesheet" type="text/css" href="ense470.css">
    <script type="text/javascript" src="validation.js"></script>
<meta charset="utf-8">
  <meta class="test" name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<title>Manual DB Entry</title></head>

<body>
        <header class="brand2">HELL Software</header>     
<br>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Choose Option:</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="analystsplash.php">Pending Requests</a></li>
      <li><a href="approvedlist.php">Completed Requests</a></li>
      <li class="active"><a href="analystenter.php">Manual Entry</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>



<div id="lesswide" class="alert alert-danger">
  <strong>Danger!</strong> Only enter known data here! This directly adds a user to the software list!
</div>

    <header style="color:white;font-size:25px;"> Manual Database Entry Form:</header>    
    <form action="manual.php" id="entry" method="post">
        <table>
            <tr><td></td><td><label id= "username_msg" class= "error"></label></td></tr>
            <tr><td>Username: </td><td> <input style="color:black;" type="text" name="username" size="15"></td></tr>

            <tr><td></td><td><label id= "software_msg" class= "error"></label></td></tr>            
            <tr><td>Software Name: </td><td> <input style="color:black;" type="text" name="software" size="60"> </td></tr>

        </table>
    <section> <input type="submit" value="Push to Database"></section>
    </form>
    <script type="text/javascript" src = "analystenter-r.js"></script>
</body>
</html>
