<!-- Now Instructor will be asked to add a question and its details like correct answer,marks for question,options for your exam.
After creating list of questions, you can preview them by clicking PREVIEW button.  -->

<?php
session_start();
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=examination','root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Here If all fields of the form is set/filled then we can add that question to the add_question table for respective exams.

if ( isset($_POST['ques']) && isset($_POST['option1']) && isset($_POST['option2']) && isset($_POST['option3']) && isset($_POST['option4']) && isset($_POST['answer']) && isset($_POST['marks'])  ) {
$sql = "INSERT INTO add_question (w_ques, opt_one, opt_two, opt_three, opt_four, correct_answer, marks,subject_name, exam_title) 
VALUES (:ques,:option1, :option2, :option3, :option4, :answer, :marks, :subject_name, :exam_title)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
':ques' => $_POST['ques'],
':option1' => $_POST['option1'],
':option2' => $_POST['option2'],
':option3' => $_POST['option3'],
':option4' => $_POST['option4'],
':answer' => $_POST['answer'],
':marks' => $_POST['marks'],
':subject_name' => $_SESSION['subject'],
':exam_title' => $_SESSION['examtitle']
));
}

if(isset($_POST['preview']))                      // Here Instructor will get redirected to the next page.
{
    header('Location:preview.php');
    return;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
  <title>Add Question</title>
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
      margin: 20px 120px;
    }

    .form-group{
        margin-right:7%;

    }
    </style>
</head>
<body>

    <!-- It will show you the information of your exam which you have given in previous page. -->

    <?php
    echo "<div id='header'>";
        echo "<span>Exam Title:".$_SESSION['examtitle']."</span>";
        echo "<span>Exam Time:".$_SESSION['examtime']."</span>";
        echo "<span>Exam Date:".$_SESSION['examdate']."</span>";
        echo "<span>Exam Duration:".$_SESSION['examdur']."</span>";
        echo "<span>Exam Year:".$_SESSION['year']."</span>";
        echo "</div>";
    ?>

    <div class="container">

    <!-- Here we are creating a form to add question for the exam. -->

  <form method="post">
  <hr>
  <br>
    <div class="form-group">
      <label for="ques">Write Question:</label>
      <input type="text" name="ques"  class="form-control" id="ques" required>
    </div>
    <div class="form-group"  style="width:35%; display:inline-block;">
      <label for="option1">Option A:</label>
      <input type="text" class="form-control" id="option1"   name="option1" required>
    </div>
    <div class="form-group" style="width:35%; display:inline-block;">
      <label for="option2">Option B:</label>
      <input type="text" class="form-control" id="option2"  name="option2" required>
    </div>
    <div class="form-group"style="width:35%; display:inline-block;">
      <label for="option3">Option C:</label>
      <input type="text" class="form-control" id="option3"  name="option3" required>
    </div>
    <div class="form-group" style="width:35%; display:inline-block;">
      <label for="option4">Option D:</label>
      <input type="text" class="form-control" id="option4"  name="option4" required>
    </div>
    <div class="form-group">
      <label for="answer">Correct Answer</label>
      <input type="text" class="form-control" id="answer" style="width:30%" name="answer" required>
    </div>
    <div class="form-group">
      <label for="marks">Marks for correct answer</label>
      <input type="number" class="form-control" id="marks" style="width:30%" name="marks" required>
    </div>

    <input type="submit" name="add" class="btn btn-primary" value="ADD">
    <input type="submit" value="PREVIEW EXAM" class="btn btn-success" name="preview">
  </form>
</div>

</body>
</html>