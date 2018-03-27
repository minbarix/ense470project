<?php
session_start();
if($_SESSION["currTier"] == 1){
    header("Location: usersplash.php");
}
elseif($_SESSION["currTier"] == 3){
    header("Location: analystsplash.php");
}
elseif($_SESSION["currTier"] != 2){
    header("Location: login.php");
}



$conn = new mysqli("localhost","chen245j","2380803Q","chen245j");
    if($conn->connect_error){
        die("connection failed: " . $conn->connect_error);
    }

$tempuser = $_SESSION["currUsername"];
$listquery = "SELECT requestnum, owner, software, comments FROM ense470request WHERE iscompleted='0'";
$listResult = $conn->query($listquery);

?>


<!DOCTYPE html>
<html>
<head><link rel="stylesheet" type="text/css" href="ense470.css">

<meta charset="utf-8">
  <meta class="test" name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<title>User Selection</title></head>

<body>
    <header class="brand"> HELL Software</header>

<br><br><br>



<div class="container">
  <h3>List of Pending Software Requests</h3>
  <ul class="nav nav-pills nav-stacked">
    <li class="active"><a href="#">Home</a></li>

<?php    
    while($listRow = $listResult->fetch_assoc()){
	
        
?>

	<li><a id="<?php echo $listRow["requestnum"]; ?>" class="btn btn-info btn-xs view_data" > Request<?php echo $listRow["requestnum"]; ?></a></li>;
	
<?php
    }
?>

  </ul>
</div>




<!-- Modal -->
<div id="infinite" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Request</h4>
      </div>
      <div class="modal-body" id="request_detail">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left reject" data-toggle="modal" data-target="#rejectmodal" data-dismiss="modal">Reject</button>
        <button type="button" class="btn btn-default approve" data-toggle="modal" data-target="#approvemodal" data-dismiss="modal">Approve</button>
      </div>
    </div>

  </div>
</div>

<script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var num = $(this).attr("id");  
           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:{num:num},  
                success:function(data){  
                     $('#request_detail').html(data);  
                     $('#infinite').modal("show");  
                }  
           });  
      });  

	  $('.approve').click(function(){  
            
           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:{num1:3},  
                success:function(data){  
                     $('#approvel_detail').html(data);  
                     $('#approvemodal').modal("show");  
                }  
           });  
      });

	  $('.reject').click(function(){  
            
           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:{num1:3},  
                success:function(data){  
                     $('#rejection_detial').html(data);  
                     $('#rejectmodal').modal("show");  
                }  
           });  
      });


	  $('.accept').click(function(){  
           var num2 = $('.view_data').attr("id");
           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:{num2:num2},  
                success:function(data){  
                  
                     
                }  
           });  
      });


	  $('.acceptreject').click(function(){  
           var num3 = $('.view_data').attr("id");
           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:{num3:num3},  
                success:function(data){  
                  
                    
                }  
           });  
      });






 });  
 </script>









<!-- Modal -->
<div id="approvemodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Request</h4>
      </div>
      <div class="modal-body" id="approvel_detail">
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Go Back</button>
        <button type="button" id="<?php echo $listRow["requestnum"]; ?>" class="btn btn-default accept" data-dismiss="modal">Accept</button>
      </div>
    </div>

  </div>
</div>






<!-- Modal -->
<div id="rejectmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Request 3</h4>
      </div>
      <div class="modal-body" id="rejection_detial">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Go Back</button>
        <button type="button" class="btn btn-default acceptreject" data-dismiss="modal">Accept</button>
      </div>
    </div>

  </div>
</div>
</body>

</html>










