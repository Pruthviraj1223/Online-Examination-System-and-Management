<!-- At this page, Instructor can edit the question and its detail. -->


<?php
session_start();
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=examination','root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ( ! isset($_GET['ques_id']) ) {
    $_SESSION['error'] = "Missing user_id";
    header('Location: add-ques.php');
    return;
}  

if ( isset($_POST['ques']) && isset($_POST['option1']) && isset($_POST['option2']) && isset($_POST['option3']) && isset($_POST['option4']) && isset($_POST['answer']) && isset($_POST['marks'])  ) {

// update query

$sql = "UPDATE add_question SET w_ques = :ques,                
opt_one = :option1, opt_two = :option2, opt_three = :option3,
opt_four = :option4, correct_answer = :answer, marks = :marks 
WHERE ques_id = :ques_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
':ques' => $_POST['ques'],
':option1' => $_POST['option1'],
':option2' => $_POST['option2'],
':option3' => $_POST['option3'],
':option4' => $_POST['option4'],
':answer' => $_POST['answer'],
':marks' => $_POST['marks'],
':ques_id' => $_GET['ques_id']));
$_SESSION['success'] = 'Record updated';
header( 'Location: preview.php' ) ;
return;
}

$stmt = $pdo->prepare("SELECT * FROM add_question where ques_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['ques_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for ques_id';
    header( 'Location: preview.php' ) ;
    return;
}

// Flash pattern
if ( isset($_SESSION['error']) ) {
  echo "<div class='alert alert-danger'>";
    echo '<b><p style="color:red">'.$_SESSION['error']."</p></b>\n";
    echo "</div>";
    unset($_SESSION['error']);
}

$q = htmlentities($row['w_ques']);
$one = htmlentities($row['opt_one']);
$two = htmlentities($row['opt_two']);
$three = htmlentities($row['opt_three']);
$four = htmlentities($row['opt_four']);
$ans = htmlentities($row['correct_answer']);
$marks = htmlentities($row['marks']);
$ques_id = $row['ques_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Question</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    body{
        font-family:verdana;
    }
    span{
        font-size:20px;
        font-family:verdana;
        margin:10px;
        margin-top:20px;
    }
    
    #header{
        margin-top:20px;    
        margin-left:60px;
    }

    .form-group{
        margin-right:7%;

    }
    #cancel{
      margin:10px 0px 0px 127px;
    }
    </style>
</head>
<body>

    <div class="container">
  <form method="post">
  <br>
    <div class="form-group">
      <label for="ques">Write Question:</label>
      <input type="text" name="ques"  class="form-control" id="ques" value="<?= $q ?>" required>
    </div>
    <div class="form-group"  style="width:35%; display:inline-block;">
      <label for="option1">Option A:</label>
      <input type="text" class="form-control" id="option1"   name="option1" value="<?= $one ?>" required>
    </div>
    <div class="form-group" style="width:35%; display:inline-block;">
      <label for="option2">Option B:</label>
      <input type="text" class="form-control" id="option2"  name="option2" value="<?= $two ?>" required>
    </div>
    <div class="form-group"style="width:35%; display:inline-block;">
      <label for="option3">Option C:</label>
      <input type="text" class="form-control" id="option3"  name="option3" value="<?= $three ?>" required>
    </div>
    <div class="form-group" style="width:35%; display:inline-block;">
      <label for="option4">Option D:</label>
      <input type="text" class="form-control" id="option4"  name="option4" value="<?= $four ?>" required>
    </div>
    <div class="form-group">
      <label for="answer">Correct Answer</label>
      <input type="text" class="form-control" id="answer" style="width:30%" name="answer" value="<?= $ans ?>" required>
    </div>
    <div class="form-group">
      <label for="marks">Marks for correct answer</label>
      <input type="number" class="form-control" id="marks" style="width:30%" name="marks" value="<?= $marks ?>" required>
    </div>

    <input type="submit" value="UPDATE" class="btn btn-success" name="update">
  </form>
</div>

<a href="preview.php">
<button class="btn btn-dark" id="cancel">CANCEL</button>
</a>

</body>
</html>