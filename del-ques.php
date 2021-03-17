<!-- This page will come into the picture if Instructor has clicked the delete button in PREVIEW page.
Instructor can delete the question for which Instructor has clicked. -->


<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=examination','root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

session_start();

if ( isset($_POST['delete']) && isset($_POST['ques_id']) ) { // By clicking 'Confirm deleting' button , question will get deleted from the table.
    $sql = "DELETE FROM add_question WHERE ques_id = :zip";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['ques_id']));
    $_SESSION['success'] = 'Record deleted';
    header( 'Location: preview.php' ) ;
    return;
}

// Guardian: Make sure that ques_id is present
if ( ! isset($_GET['ques_id']) ) {
  $_SESSION['error'] = "Missing ques_id";
  header('Location: preview.php');
  return;
}

$stmt = $pdo->prepare("SELECT w_ques, ques_id FROM add_question where ques_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['ques_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for ques_id';
    header( 'Location: preview.php' ) ;
    return;
}

?>
<html>

<head>
<title>Delete Question</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    body{
      margin:40px;
    }
    #cancel{
      margin:0;
      width:80px;
    }
  </style>
</head>
<body>
<h2>Confirm Deleting: <?= htmlentities($row['w_ques']) ?></h2>
<form method="post">
<input type="hidden" name="ques_id" value="<?= $row['ques_id'] ?>">
<button class="btn btn-danger" type="submit" value="DELETE" name="delete">DELETE</button>
<br>
</form>


<!-- By clicking this button, you will go to the PREVIEW page. -->
<a href="preview.php">                         
<button id="cancel" class="btn btn-dark">CANCEL</button>
</a>

</body>
</html>