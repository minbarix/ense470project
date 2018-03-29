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

$conn = new mysqli("localhost","thoma26s","008096","thoma26s");
    if($conn->connect_error){
        die("connection failed: " . $conn->connect_error);
    }

$tempuser = $_SESSION["currUsername"];
$listquery = "SELECT requestnum, owner, software, comments FROM ense470request WHERE isverified='0'";
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
    <header class="brand2"> HELL Software</header>

<br>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Choose Option:</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="analystsplash.php">Pending Requests</a></li>
      <li><a href="approvedlist.php">Completed Requests</a></li>
      <li><a href="analystenter.php">Manual Entry</a></li>
    </ul>
  </div>
</nav>



<div class="container">
  <h3>List of Pre-Approved Software Requests</h3>
  <ul class="nav nav-pills nav-stacked">
    <li class="active"><a href="#">Home</a></li>

    <?php    
    while($listRow = $listResult->fetch_assoc()){
	
        
?>

	<li><a id="<?php echo $listRow["requestnum"]; ?>" class="btn btn-info btn-xs view_data" > Request<?php echo $listRow["requestnum"]; ?></a></li>
	
<?php
    }
?>
  </ul>
</div>





<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
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
        <button type="button" class="btn btn-default pull-left deny" data-toggle="modal" data-target="#rejectmodal" data-dismiss="modal">Deny Request</button>
        <button type="button" class="btn btn-default confirm" data-toggle="modal" data-target="#confirmmodal" data-dismiss="modal">Confirm Request</button>
      </div>
    </div>

  </div>
</div>







<script>  
 $(document).ready(function(){  
    $('.view_data').click(function(){  
           var anum = $(this).attr("id");  //right request number
           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:{anum:anum},  
                success:function(data){  
                     $('#request_detail').html(data);  
                     $('#myModal').modal("show");  
                }  
           });  
      });  

	  $('.confirm').click(function(){  
      
            var anum1 = 1;
            

           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:{anum1:anum1},  
                success:function(data){  
                     $('#confirm_detail').html(data);  
                     $('#confirmmodal').modal("show");  
                }  
           });  
      });
      $('.rc').click(function(){  
          
           
           var rc = 1;
           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:
                {
                  
                  rc:rc
                

                },  
                success:function(data){  
                  
                  
                }  
           });  
      });

	  	  $('.deny').click(function(){  
            
            $.ajax({  
                 url:"select.php",  
                 method:"post",  
                 data:{anum2:1},  
                 success:function(data){  
                      $('#rejection_detial').html(data);  
                      $('#rejectmodal').modal("show");  
                 }  
            });  
       });

       $('.dc').click(function(){  
          
           
          var dc = 1;
          $.ajax({  
               url:"select.php",  
               method:"post",  
               data:
               {
                 
                 dc:dc
               

               },  
               success:function(data){  
                 
                 
               }  
          });  
     });

     $('.yes').click(function(){  
          
           
          var anum1 = 1;
          $.ajax({  
               url:"select.php",  
               method:"post",  
               data:
               {
                 
                 anum1:anum1
               

               },  
               success:function(data){  
                 $('#confirm_detail').html(data);  
                     $('#confirmmodal').modal("show");
                 
               }  
          });  
     });






 });  
 </script>




<!-- Modal -->
<div id="confirmmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Request</h4>
      </div>
      <div class="modal-body" id="confirm_detail">
        <!-- <p>To approve the software request, please contact the approver.</p>
        <p>Approver Contact Information</p>
        <div>Email: dot.matricks@hell.com<br>Phone: (888)555-4555<br></div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Go Back</button>
        <button type="button" class="btn btn-default rc" data-dismiss="modal">Request Confirm</button>
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
        <h4 class="modal-title">Request</h4>
      </div>
      <div class="modal-body" id="rejection_detial">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Go Back</button>
        <button type="button" class="btn btn-default pull-center yes" data-toggle="modal" data-target="#confirmmodal" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-default dc" data-dismiss="modal">Reject</button>
      </div>
    </div>

  </div>
</div>
</body>

</html>
