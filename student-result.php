<!-- Here Student can see result of different exams for which he/she has appeared. -->


<?php
session_start();
?>
<?php
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=examination',
        'root', '');
    $username = $_SESSION['username'];
    echo "<h2 align='center'>Results</h2>";
    $sql = "SELECT * FROM result WHERE username = '$username'";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '<table class="table table-striped" >'."\n";
    echo "<div class='container'>";
    echo("<tr><th>");
    echo('Exam Title');
    echo "</th><th>";
    echo('Marks obtained');
    echo "</th><th>";
    echo('Total marks');
    echo("</th></tr>\n");
    foreach ( $rows as $row ) 
    {
        echo("<tr><td>");
        echo($row['exam_title']);
        echo "</td><td>";
        echo($row['marks']);
        echo "</td><td>";
        echo($row['total_marks']);
        echo("</td></tr>\n");
    }
    echo "</table>\n";  
    echo "<div>";  
    echo "<a href='student-login.php'>";
    echo "<button type='button' class='btn btn-info'>Back to Dashboard</button>";
    echo "</a>";  
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Result</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
      body{
          font-family:'verdana';
          width:90%;
          margin: 0 auto;
      }
  </style>
</head>
<body>
    
</body>
</html>