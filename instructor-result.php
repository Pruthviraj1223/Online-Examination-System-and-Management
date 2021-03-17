<!-- Here, Instructor can see the list of exam which he/she had created. -->


<?php
session_start();
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=examination',
        'root', '');
    $username = $_SESSION['username'];
    echo "<h1 align='center'>Results</h1>";
    echo "<br>";
    $sql = "SELECT * FROM exam_desc WHERE instructor_username = '$username' ORDER BY exam_date ASC";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '<table class="table table-striped">'."\n";
    echo "<div class='container'>";
    echo("<tr><th>");
    echo('Exam Title');
    echo "</th><th>";
    echo('Date of Exam');
    echo("</th></tr>\n");
    foreach ( $rows as $row ) {
        echo("<tr><td>");
       
         // storing exam title in title variable.
        $title = $row['exam_title'];

        // we are Creating form that will submit selected exam to check1.php page
        echo "<form action='check1.php' method='post'>";
        echo "<input  type='hidden' name='title' value='$title'>";
        echo "<button class='btn btn-success' type='submit' value='$title' name='submit'>$title";
        echo "</button>";
        echo "</form>";
        echo "</td><td>";
        echo($row['exam_date']);
        echo("</td></tr>\n");
    }
    echo "<div>";
    echo "</table>\n";    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Result</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
      body{
          font-family:'verdana';
          width:90%;
          margin:0 auto;
      }
  </style>
</head>
<body>


</body>
</html>