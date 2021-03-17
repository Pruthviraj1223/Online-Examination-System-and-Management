<!-- By successfully logging-In, here we are at Student's dashboard page.
From here Student can,
1) see his/her result of an exam,
2) check list of upcoming exam
3) logout from here.
  -->


<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Page</title>
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
   
    <div>

    <h1 align="center" >Hello student!</h1>
    <br>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="take-exam.php">Take Exam</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="student-result.php">View Result</a></li>
      </li>
     
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
    </ul>
  </div>
</nav>
    </div>
    
    <div class="container">
  <div class="card" style="width:400px">
    <img class="card-img-top" src="card1.jpg" alt="Card image" style="width:70%">
    <div class="card-body">
    </div>
  </div>
    <div>
    <!-- Here we are showing you credentials. -->
    <p>
        Username: <?= $_SESSION['username']; ?>
    </p>
    <p>
        Academic Year:  <?= $_SESSION['ac_year']; ?> 
    </p>
    </div>
</body>
</html>