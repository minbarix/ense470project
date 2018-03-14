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
  <h3>List of Confirmed Requests</h3>
  <ul class="nav nav-pills nav-stacked">
    <li class="active"><a href="#">Home</a></li>
    <li><a class="pills" href="#">Request 1</a></li>
    <li><a class="pills" href="#">Request 2</a></li>
    <li><a class="pills" data-toggle="modal" data-target="#myModal">Request 3</a></li>
  </ul>
</div>





<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Request 3</h4>
      </div>
      <div class="modal-body">
        <p>Request From: Tim</p>
        <p>Software: Web Utility Table</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Go Back</button>
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#emailmodal" data-dismiss="modal">Send Email</button>
      </div>
    </div>

  </div>
</div>






<!-- Modal -->
<div id="emailmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Request 3</h4>
      </div>
      <div class="modal-body">
        <p>(send email form)</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Send</button>
      </div>
    </div>

  </div>
</div>

</body>

</html>
