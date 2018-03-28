<?php  
 if(isset($_POST["num"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost","thoma26s","008096","thoma26s");  
      $query = "SELECT * FROM ense470request WHERE requestnum = '".$_POST["num"]."'";  
      $result = mysqli_query($connect, $query);  
	  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = $result->fetch_assoc())  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Request Number</label></td>  
                     <td width="70%">'.$row["requestnum"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>User</label></td>  
                     <td width="70%">'.$row["owner"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Software</label></td>  
                     <td width="70%">'.$row["software"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Comments</label></td>  
                     <td width="70%">'.$row["comments"].'</td>  
                </tr>  
               
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
	  
 }  

 ?>

 <?php  
 if(isset($_POST["num1"]))  
 {  
       
      echo ("Please confirm the selection");  
 }  

 ?>



 <?php  
 if(isset($_POST["num2"]))  
 {  
      $conn = mysqli_connect("localhost","thoma26s","008096","thoma26s");  
	  if ($conn->connect_error) 
	  {
		die("Connection failed: " . $conn->connect_error);
	  } 
      $sql = "UPDATE ense470request SET isapproved = 1, iscompleted = 1 WHERE requestnum = '".$_POST["num2"]."'";  
      if ($conn->query($sql) === TRUE) 
	  {
		echo ("Record updated successfully");
		header("Location: usersplash.php");
	  } else 
	  {
		echo "Error updating record: " . $conn->error;
      }

	  $conn->close();
      
 }  

 ?>





 <?php  
 if(isset($_POST["num3"]))  
 {  
      $conn = mysqli_connect("localhost","thoma26s","008096","thoma26s");  
	  if ($conn->connect_error) 
	  {
		die("Connection failed: " . $conn->connect_error);
	  } 
      $sql = "UPDATE ense470request SET isapproved = 0, iscompleted = 1 WHERE requestnum = '".$_POST["num3"]."'";  
      if ($conn->query($sql) === TRUE) 
	  {
		echo ("Record updated successfully");
		header("Location: usersplash.php");
	  } else 
	  {
		echo "Error updating record: " . $conn->error;
      }

	  $conn->close();
      
 }  

 ?>







<style type="text/css">
table{
    margin-left:0%;
    color: black;
}
</style>