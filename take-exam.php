<!-- Here list of exams will be displayed to the student for respective subjects.
Student will attempt the exam.
Student needs to click on the exam title to take the respective exam. -->



<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Take Exam</title>
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
    <?php
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=examination',
        'root', '');

    echo "<h3 align='center'>List of exams</h3>";
    echo "<br>";
    $date = date('Y-m-d');
    $sql = "SELECT * FROM exam_desc WHERE exam_year = ".$_SESSION['ac_year']." AND exam_date >= '$date' ORDER BY exam_date ASC";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '<table class="table table-striped" >'."\n";
    echo "<div class='container'>";
    echo("<tr><th>");
    echo('Exam Title');
    echo "</th><th>";
    echo('Date of Exam');
    echo("</th><th>");
    echo('Time of Exam');
    echo("</th><th>");
    echo('Subject');
    echo("</th><th>");
    echo('Exam Instructor');
    echo("</th></tr>\n");
    foreach ( $rows as $row ) {
        echo("<tr><td>");
      
        // storing exam title in title variable.
        $title = $row['exam_title'];

        // creating form that will submit selected exam to check.php page
        echo "<form action='check.php' method='post'>";
        echo "<input type='hidden' name='title' value='$title'>";
        echo "<button type='submit' class='btn btn-success'  value='$title' name='submit'>$title";
        echo "</button>";
        echo "</form>";
        echo "</td><td>";
        echo($row['exam_date']);
        echo("</td><td>");
        echo($row['exam_time']);
        echo("</td><td>");
        echo($row['subject_name']);
        echo("</td><td>");
        echo($row['instructor_username']);
        echo("</td></tr>\n");
    }
    echo "</table>\n";  
    echo "<div>";  
    echo "<a href='student-login.php'>";
    echo "<button type='button' class='btn btn-info'>Back to Dashboard</button>";
    echo "</a>";  
    ?>
</body>
</html>