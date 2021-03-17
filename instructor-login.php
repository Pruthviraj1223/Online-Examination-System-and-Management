<!-- This is Instructor's dashboard page.
Here Instructor can,
1) View students result for respective exam.
2) Generate exam.
3) Logout from here. -->


<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Instructor Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  
    p{
        font-size:24px;
    }
  </style>
</head>
<body>
    <h1 align="center" >Hello Instructor!</h1>
    <br>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="gen-exam.php">Generate Exam</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="instructor-result.php">View Result</a></li>
      </li>
     
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
    </ul>
  </div>
</nav>

 
<div class="container">
  <div class="card" style="width:400px">
    <img class="card-img-top" src="card1.jpg" alt="Card image" style="width:70%">
    <div class="card-body">
     
    </div>
  </div>
<br>

   <!-- Here we are showing you credentials. -->

    <p>
        Username: <?= $_SESSION['username']; ?>
    </p>
    <p>
        Subject:  <?= $_SESSION['subject']; ?> 
    </p>
    </div>

    

  
</body>
</html>