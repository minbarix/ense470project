<?php
session_start();




if(isset($_POST['search'])){
	$response="<ul><li>No data found!</ul></li>";
	$conn = new mysqli("localhost","thoma26s","008096","thoma26s");
	$q = $conn->real_escape_string($_POST['q']);
	$sql = $conn->query("SELECT softwarename FROM ense470software WHERE softwarename LIKE '$q%'");
	if ($sql->num_rows>0){
		$response = "<ul>";

		while($data= $sql->fetch_array())
			$response .= "<li>".$data['softwarename']."</li>";

		$response .= "</ul>";
	}
	exit($response);
}





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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
ul
{
	float:left;
	list-style:none;
	padding:0px;
	border:1px solid black;
	margin-top: 0px;
	margin-left:45%; 
    margin-right:35%;

}
li:hover
{
	color:silver;
}
</style>






<body>
    <header class="brand"> HELL Software</header>

<br><br><br>
<form action="createRequest.php" id="softwareR" method="post">
Software Name: <input type="text" class="comment" id="softwarename" name="softwarename" size=50 /><br><br>



<div id="response"></div>



<textarea name="usercomment" class="comment" rows="5" cols="36">Other Comments</textarea><br><br>
<input type="submit" value="Submit Software Request" />
</form>








<script type="text/javascript">  
 $(document).ready(function(){  
      $('#softwarename').keyup(function(){  
           var query = $('#softwarename').val();  
		   
		   if (query.length>0){
				$.ajax(
				{
					url:'usersplash.php',
					method:'POST',
					data:{
						search:1,
						q:query
					},
					success:function(data){
						$("#response").html(data);
				
					},
					dataType: 'text'
				
				}

				);
		   }


      });  


      $(document).on('click','li',function(){
		var software = $(this).text();	
		$("#softwarename").val(software);
		$("#response").html("");
		});
 });  
 </script>  
 






</body>

</html>


