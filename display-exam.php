<!-- Here list of questions will be display to the student for respective exam.
Student need to submit the exam before deadline.
Otherwise exam will get submit, automatically.
Immediateliy, student will get their marks at the next page.
It will desplay exam to the student only if the exam is active. -->



<?php
session_start();
function minutes($time){
    $time = explode(':', $time);
    return ($time[0]*60) + ($time[1]) + ($time[2]/60);
}


date_default_timezone_set("Asia/Kolkata");
$now_date = date('Y-m-d');
$now_time = date("H:i:s");


$dur = (minutes($_SESSION['exam_time']) + $_SESSION['exam_dur'] - minutes($now_time)) * 60 * 1000;


if($now_time >= $_SESSION['exam_time'] && $now_date >= $_SESSION['exam_date']) {
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=examination',
'pruthviraj', 'jadeja');
$title = $_SESSION['title'];


echo "<h2 align='center'>".$title."</h2>";
echo "<h3>Exam duration: ".$_SESSION['exam_dur']." minutes</h3>";
echo "<hr>";

$sql = "SELECT * FROM add_question WHERE exam_title = '$title'";
$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$link ="eval.php";
echo "<form action=$link method='post'>";
echo "<div class='container'>";
$count = 1;
foreach($rows as $row) {
    $id = $row['ques_id'];
    echo "<p>".$count.". ".$row['w_ques']." (Marks:".$row['marks'].")</p>";
    echo "<div class='radio'>";
    $one = $row['opt_one'];
    echo "<input type='radio' value='$one' name=".$id.">".$row['opt_one']."<br>";
    echo "</div>";
    echo "<div class='radio'>";
    $two = $row['opt_two'];
    echo "<input type='radio' value='$two' name=".$id.">".$row['opt_two']."<br>";
    echo "</div>";
    echo "<div class='radio'>";
    $three = $row['opt_three'];
    echo "<input type='radio' value='$three' name=".$id.">".$row['opt_three']."<br>";
    echo "</div>";
    echo "<div class='radio'>";
    $four = $row['opt_four'];
    echo "<input type='radio' value='$four' name=".$id.">".$row['opt_four']."<br>";
    echo "</div>";
    echo "<br>";
    $count++;
}
echo "<br><input type='submit' class='button btn btn-primary' value='SUBMIT EXAM'>";
echo "</form>";
echo "</div>";
}

else {
echo "<p class='alert alert-danger'>Oops! Exam has not started yet. Please try again on scheduled time.</p>";
echo "<a href='student-login.php'>";
echo "<button type='button' class='btn btn-info' style='margin-left:20px'>Back to Dashboard</button>";
echo "</a>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Display Exam</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<script type="text/javascript">

// This script perfoms auto-submit functionality

    $(function(){  // document.ready function...
    setTimeout(function(){
        $('form').submit();
        }, <?= $dur ?>);
    });
</script>

<style>
.radio {
  margin-left:50px;
  font-size:20px;
}
hr {
  background: black;
  height:2px;
}
body{
  font-family:'verdana';    
  user-select:none;
}

p{
  font-size:24px;
  margin:20px;
}

div{
  font-size:20px;
}
.button{
margin:20px;
font-size:100%;
}
  </style>
</head>
<body>

</body>
</html>
