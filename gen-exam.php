<!-- Here, Instructor can generate exam by filling information field like exam year,exam title,duration of exam etc.
Instructor must have unique exam title other that is not used in past,
Otherwise it won't allow instructor to generate the exam of same title.
After filling all information instructor need to select GO AHEAD button.  -->


<?php
session_start();
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=examination','root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(isset($_POST['submit'])) {
  $sql = "SELECT * FROM exam_desc WHERE exam_title = '".$_POST['examtitle']."'";           // It will fetch the data from exam description table by using exam title attribute.
  $stmt = $pdo->query($sql);
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if(count($rows) > 0) {              // If instructor are not having different exam title then it will not allow you to generate exam.
      $_SESSION["error"] = "An exam with the same title already exists. Please try giving a different exam title.";
      header('Location: gen-exam.php');
      return;
  } else {
  
    // Here, If all atrribute is set then we will insert data into our exam description table. 
    if ( isset($_POST['examtitle']) && isset($_POST['examtime']) && isset($_POST['examdate']) && isset($_POST['examdur']) && isset($_POST['year'])) {
      $sql = "INSERT INTO exam_desc (exam_date, exam_title, exam_dur, exam_time, exam_year, instructor_username , subject_name) 
      VALUES (:exam_date,:exam_title, :exam_dur, :exam_time, :exam_year, :instructor_username, :subject_name)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
      ':exam_date' => $_POST['examdate'],
      ':exam_title' => $_POST['examtitle'],
      ':exam_dur' => $_POST['examdur'],
      ':exam_time' => $_POST['examtime'],
      ':exam_year' => $_POST['year'],
      ':instructor_username' => $_SESSION['username'],
      ':subject_name' => $_SESSION['subject']
      ));
      $_SESSION['examtitle'] = $_POST['examtitle'];
      $_SESSION['examtime'] = $_POST['examtime'];
      $_SESSION['examdate'] = $_POST['examdate'];
      $_SESSION['examdur'] = $_POST['examdur'];
      $_SESSION['year'] = $_POST['year'];
      header('Location:add-ques.php');                // Here we are redirecting instuctor to next page to add question.
      return;
    }
  }
}

if(isset($_POST['cancel']))                           // If instructor clicks 'Cancel' button it will redirect you to dashboard page.
{
    header('Location:instructor-login.php');
    return;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Generate Exam</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
    #cancel {
      width:105px;
    }
  </style>
</head>
<body>
<h1 align="center">Exam Description</h1>
<?php
    if ( isset($_SESSION["error"]) ) {
      echo '<div class="alert alert-danger">';
        echo('<b style="color:red">'.$_SESSION["error"]."</b>\n");
        echo "</div>";
        unset($_SESSION["error"]);
    }
?>
    <div class="container">
  <form method="post">

    <div class="form-group">
      <label for="examtitle">Exam Title:</label>
      <input type="text" class="form-control" id="examtitle"  name="examtitle" required>
    </div>

    <div class="form-group">
      <label for="examtime">Time of Exam:</label>
      <input type="time" class="form-control" id="examtime"  name="examtime" required>
    </div>

    <div class="form-group">
      <label for="examdate">Date of Exam</label>
      <input type="date" class="form-control" id="examdate"  name="examdate" required>
    </div>

    <div class="form-group">
      <label for="examdur">Duration of Exam (in minutes):</label>
      <input type="number" class="form-control" id="examdur"  name="examdur" required>
    </div>


    <div class="form-group">
      <label for="year">Exam Year:</label>
      <input type="number" class="form-control" id="year"  name="year" required>
    </div>
    <div class="form-group">
    <button type="submit" value="SUBMIT" name="submit" class="btn btn-primary">GO AHEAD</button>
    </div>

  </form>

  <a href="instructor-login.php">
  <button class="btn btn-dark" id="cancel">CANCEL</button>
  </a>
</div>
    
</body>
</html>