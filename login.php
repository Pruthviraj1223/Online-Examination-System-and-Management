<!-- This page performs the login process for instructor and student respectively.
If person is already logged in then it will logout that person.
Here we fetch the data from the database and check for correct credentials.
After successful log-in process, it will redirect you to the next page respectively. -->


<?php
    session_start();
    // LogIn Process for Instructor
    if(isset($_POST['instructor']) and isset($_POST['username']) and isset($_POST['password'])) {
        $pdo = new PDO('mysql:host=localhost;port=3306;dbname=examination','root', '');
    
    $stmt = $pdo->query("SELECT username, password, subject FROM info"); // Fetching Instructor's data from instructor table.
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if(($row['username'] == $_POST['username']) and ($row['password'] == $_POST['password'])){           // checking credentials.
            $_SESSION['username'] = $row['username'];             // storing username into the session variable.
            $_SESSION['subject'] = $row['subject'];               // storing subject into the session variable.
            header('Location: instructor-login.php');             // Redirecting to instructor dashboard page
            return;
        }   
    }

    $_SESSION["error"] = "Incorrect Username or  Password.";
    header( 'Location: login.php' ) ;
    return;
}

// LogIn Process for student

    if(isset($_POST['student']) and isset($_POST['username']) and isset($_POST['password'])) {
        $pdo = new PDO('mysql:host=localhost;port=3306;dbname=examination',
        'vatsal', 'jain');
    
    $stmt = $pdo->query("SELECT * FROM sinfo");                     // Fetching student's data from student table
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if($row['username'] == $_POST['username'] and $row['password'] == $_POST['password']) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['ac_year'] = $row['ac_year'];
            header('Location: student-login.php');                   // Redirecting to student dashboard page
            return;
        } 
    }
    $_SESSION["error"] = "Incorrect Username or Password.";
    header( 'Location: login.php' ) ;
    return;
}
?>

<html lang="en">
<head>
  <title>LogIn Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .ud {
      display:inline-block;
      margin-right:20px
    }
    .container {
      margin:60px auto;
      width:30%;
    }
    .input-group{
      margin-bottom:20px;
    }
    .btn {
      font-size:16px;
      font-weight:600;
    }
  </style>

</head>
<body>
    <h1 align="center">Online Examination</h1>
    <?php
    if ( isset($_SESSION["error"]) ) {                  // if error variable is set, it means we are having some error.
      echo '<div class="alert alert-danger">';
        echo('<b style="color:red">'.$_SESSION["error"]."</b>\n");
        echo "</div>";
        unset($_SESSION["error"]);
    }
    ?>
   


    
<div class="container">
  <form method="post">
    <div class="input-group"><br><br>
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <label for="username">Username:</label><br>
      <input type="text" class="form-control"  name="username" id="username"><br><br>
    </div>
    <br>
    <div class="input-group"><br><br>
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <label for="password">Password:</label>
      <input type="text" class="form-control" name="password" id="password"><br><br>
    </div>
    <br>
    <div class="input-group ud">
    <button type="submit" value="Log In Instructor"   name="instructor"  class="btn btn-info">Log In as Instructor</button>
      </div>
      <div class="input-group ud">
      <button type="submit" value="Log In student" name="student" class="btn btn-info">Log In as Student</button>
    </div>
  </form>
  <br>


</body>
</html>