<?php  
 if(isset($_POST["num"]))  
 {  
      session_start();
      $rn = $_POST["num"];
      $_SESSION['rnum']=$rn;
      
      
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
 if(isset($_POST["user"]))  
 {  
  session_start();
      $conn = mysqli_connect("localhost","thoma26s","008096","thoma26s");  
      $rn = $_SESSION['rnum'];

	  if ($conn->connect_error) 
	  {
		die("Connection failed: " . $conn->connect_error);
	  } 
      $sql = "UPDATE ense470request SET isapproved = 1, approvername = '".$_POST["user"]."' WHERE requestnum = '".$rn."'";  
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
 if(isset($_POST["user1"]))  
 {  
  session_start();
      $conn = mysqli_connect("localhost","thoma26s","008096","thoma26s");  
      $rn = $_SESSION['rnum'];
	  if ($conn->connect_error) 
	  {
		die("Connection failed: " . $conn->connect_error);
	  } 
      $sql = "UPDATE ense470request SET isapproved = 2, approvername = '".$_POST["user1"]."' WHERE requestnum = '".$rn."'";  
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












<!--analysis-->


















 <?php  
 if(isset($_POST["anum"]))  
 {  
      session_start();
      $requestnum = $_POST["anum"];
      $_SESSION['requestnum']=$requestnum;
      
      
      $output = '';  
      $connect = mysqli_connect("localhost","thoma26s","008096","thoma26s");  
      $query = "SELECT * FROM ense470request WHERE requestnum = '".$_POST["anum"]."'";  
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
                <tr>  
                     <td width="30%"><label>Approved by</label></td>  
                     <td width="70%">'.$row["approvername"].'</td>  
                </tr>
               
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
	  
 }  

 ?>


<?php  
 if(isset($_POST["anum1"]))  
 {  
      session_start();
      $requestnum = $_SESSION['requestnum'];
      
      //echo ($requestnum);
      
      $output = '';  
      $connect = mysqli_connect("localhost","thoma26s","008096","thoma26s");  
      $query1 = "SELECT * FROM ense470request WHERE requestnum = '".$requestnum."'";  
      $result1 = mysqli_query($connect, $query1);  
      $requestrow = $result1->fetch_assoc();
      $approver=$requestrow[approvername];
      // echo($approver);
     
      $query2 = "SELECT * FROM ense470approver WHERE approvername = '".$approver."'";  
      $result2 = mysqli_query($connect, $query2);
      $requestrow2 = $result2->fetch_assoc();
      $email=$requestrow2[email];
      $phone=$requestrow2[phone];
      
      // echo($email);
      // echo($phone);

       $output .= '  
      
       <div class="table-responsive">  
            <table class="table table-bordered">';  
      $output .= '  
      <label>TO approve the software request, please confirm with the approver.</label>
      <tr>  
      <td width="30%"><label>Approver</label></td>  
      <td width="70%">'.$approver.'</td>  
 </tr>             
      <tr>  
                      <td width="30%"><label>Email</label></td>  
                      <td width="70%">'.$email.'</td>  
                 </tr>  
      
                 <tr>  
                      <td width="30%"><label>Phone</label></td>  
                      <td width="70%">'.$phone.'</td>  
                 </tr>  
                
               
                 ';  
       
      $output .= "</table></div>";  
      echo $output;  
	  
 }  

 ?>


<?php  
 if(isset($_POST["anum2"]))  
 {  
      session_start();
      $requestnum = $_SESSION['requestnum'];
      
      //echo ($requestnum);
      
      $output = '';  
      $connect = mysqli_connect("localhost","thoma26s","008096","thoma26s");  
      $query1 = "SELECT * FROM ense470request WHERE requestnum = '".$requestnum."'";  
      $result1 = mysqli_query($connect, $query1);  
      $requestrow = $result1->fetch_assoc();
      $approver=$requestrow[approvername];
      // echo($approver);
     
      $query2 = "SELECT * FROM ense470approver WHERE approvername = '".$approver."'";  
      $result2 = mysqli_query($connect, $query2);
      $requestrow2 = $result2->fetch_assoc();
      $email=$requestrow2[email];
      $phone=$requestrow2[phone];
      
      // echo($email);
      // echo($phone);

       $output .= '  
      
       <div class="table-responsive">  
            <table class="table table-bordered">';  
      $output .= '  
      <label>You rejected the pre-approved request from '.$approver.'</label>
      <label>Do you want to contact the approver?</label>

                
               
                 ';  
       
     
      echo $output;  
	  
 }  

 ?>




 <?php  
 if(isset($_POST["rc"]))  
 {  
  session_start();
      $conn = mysqli_connect("localhost","thoma26s","008096","thoma26s");  
      $requestnum = $_SESSION['requestnum'];

	  if ($conn->connect_error) 
	  {
		die("Connection failed: " . $conn->connect_error);
	  } 
      $sql = "UPDATE ense470request SET iscompleted = 1, isverified=1 WHERE requestnum = '".$requestnum."'";  
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
 if(isset($_POST["dc"]))  
 {  
  session_start();
      $conn = mysqli_connect("localhost","thoma26s","008096","thoma26s");  
      $requestnum = $_SESSION['requestnum'];

	  if ($conn->connect_error) 
	  {
		die("Connection failed: " . $conn->connect_error);
	  } 
      $sql = "UPDATE ense470request SET iscompleted = 1, isverified=2 WHERE requestnum = '".$requestnum."'";  
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