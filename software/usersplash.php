<?php
session_start();
if($_SESSION["currTier"] == 2){
    header("Location: approversplash.php");
}
elseif($_SESSION["currTier"] == 3){
    header("Location: analystsplash.php");
}
elseif($_SESSION["currTier"] != 1){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head><link rel="stylesheet" type="text/css" href="ense470.css">
<title>User Selection</title></head>

<body>
    <header class="brand"> HELL Software</header>

<br><br><br>
<form action="createRequest.php" id="softwareR" method="post">
Software Name: <input type="text" class="comment" name="softwarename" size=30 /><br><br>
<textarea name="usercomment" class="comment" rows="5" cols="36">Other Comments</textarea><br><br>
<input type="submit" value="Submit Software Request" />
</form>

</body>

</html>
