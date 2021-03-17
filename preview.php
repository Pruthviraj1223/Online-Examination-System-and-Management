<!-- Here Instructor can preview those questions which Instructor has added in exam.
Instructor can delete/modify the questions and their details as well.
By clicking CREATE EXAM, exam will get created and will be added to the database 
and also will get added to the student's exam list onto the student side. So they can see it.. -->


<?php
session_start();
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=examination','root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<html>
<head>
<title>Preview Question</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  a{
    margin:20px;
  }
  .table {
    margin: 0 auto;
    width:90%;
  }
  .btn{
    margin:20px 0px 0px 50px; 
  }
  td, th{
    text-align:left;
  }
  </style>
</head>
<body>
<?php
if ( isset($_SESSION['error']) ) {
  echo "<div class='alert alert-danger'>";
    echo '<b><p style="color:red">'.$_SESSION['error']."</p></b>\n";
    echo "</div>";
    unset($_SESSION['error']);
}
if ( isset($_SESSION['success']) ) {
    echo "<div class='alert alert-success'>";
    echo '<b><p style="color:green">'.$_SESSION['success']."</p></b>\n";
    echo "</div>";
    unset($_SESSION['success']);
}
echo('<table class="table table-striped" >'."\n");
echo "<div class='container'>";
echo "<br>";
echo "<tr><th>";
echo("Sr. No.");
echo("</th><th>");
echo("Question");
echo("</th><th>");
echo("Option A");
echo("</th><th>");
echo("Option B");
echo("</th><th>");
echo("Option C");
echo("</th><th>");
echo("Option D");
echo("</th><th>");
echo("Correct Answer");
echo("</th><th>");
echo("Marks");
echo("</th><th>");
echo('Operations');
echo("</th></tr>\n");
$title = $_SESSION['examtitle'];
$sql = "SELECT * FROM add_question WHERE exam_title = '$title'";
$stmt = $pdo->query($sql);
$count = 1;
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr><td>";
    echo($count);
    echo("</td><td>");
    echo(htmlentities($row['w_ques']));
    echo("</td><td>");
    echo(htmlentities($row['opt_one']));
    echo("</td><td>");
    echo(htmlentities($row['opt_two']));
    echo("</td><td>");
    echo(htmlentities($row['opt_three']));
    echo("</td><td>");
    echo(htmlentities($row['opt_four']));
    echo("</td><td>");
    echo(htmlentities($row['correct_answer']));
    echo("</td><td>");
    echo(htmlentities($row['marks']));
    echo("</td><td>");
    echo('<a href="edit-ques.php?ques_id='.$row['ques_id'].'">EDIT</a> / ');
    echo('<a href="del-ques.php?ques_id='.$row['ques_id'].'">DELETE</a>');
    echo("</td></tr>\n");
    $count = $count + 1;
}
?>
</table>
</div>
<br>


<!-- After clicking this button you will be redirected to the dashboard page. -->

<a href='instructor-login.php'>       
    <button type='button' class='btn btn-success'>CREATE EXAM</button>
    </a>  
    
</body>
</html>
