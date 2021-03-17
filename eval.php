<!-- Here answers to the questions will be evaluated.
Calculated Total marks will be shown to student after submitting exam. -->


<?php
session_start();


    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=examination',
    'root', '');

    $sql = "SELECT * FROM result WHERE username = '".$_SESSION['username']."' AND exam_title = '".$_SESSION['title']."'";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(count($rows) > 0) {
        echo "<br>";
        echo "<p class='message'>You have already attempted this exam</p>";
        
    } else {
    $total = 0;
    foreach($_POST as $ques => $answer) {
        $sql = "SELECT correct_answer, marks FROM add_question WHERE ques_id = '$ques'";
        $stmt = $pdo->query($sql);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($row[0]['correct_answer'] == $answer) {  
            $total = $total + $row[0]['marks'];         //Total marks is calculating here.
        }
    }

    $title = $_SESSION['title'];
    $sql = "SELECT SUM(marks) FROM add_question WHERE exam_title = '$title'";
    $stmt = $pdo->query($sql);
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $actual_marks  = $row[0]['SUM(marks)'];
   
    echo "<br>";
    echo "<p class='message'>You got ".$total." marks out of ".$actual_marks;
    echo "</p>";
    echo "<br>";

    //Here student's result will be added to the database, so Instructor can see it on their side. 
    $sql = "INSERT INTO result (username, exam_title, marks, total_marks) VALUES".
            " (:username, :exam_title, :marks, :total_marks)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
            ':username' => $_SESSION['username'],
            ':exam_title' => $_SESSION['title'],
            ':marks' => $total,
            ':total_marks' => $actual_marks));
    }


?>
<br>
  <a href='student-login.php'>
   <button type='button' class='btn btn-info'>Back to Dashboard</button>
  </a>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Evaluation Page</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  body{
      font-family:'verdana';
  }

  button{
    margin-left:100px;
    margin-top: -20px;
  }

  .message{
    margin-left:100px;
      font-size:24px;
      color:white;
  }
  @font-face {
  font-family: Clip;
  src: url("https://acupoftee.github.io/fonts/Clip.ttf");
}

body {
  background-color: #141114;
  background-image: linear-gradient(335deg, black 23px, transparent 23px),
    linear-gradient(155deg, black 23px, transparent 23px),
    linear-gradient(335deg, black 23px, transparent 23px),
    linear-gradient(155deg, black 23px, transparent 23px);
  background-size: 58px 58px;
  background-position: 0px 2px, 4px 35px, 29px 31px, 34px 6px;
}

.sign {
  position: absolute;
  visibility: hidden;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 50%;
  height: 50%;
  background-image: radial-gradient(
    ellipse 50% 35% at 50% 50%,
    #6b1839,
    transparent
  );
  transform: translate(-50%, -50%);
  letter-spacing: 2;
  left: 50%;
  top: 50%;
  font-family: "Clip";
  text-transform: uppercase;
  font-size: 6em;
  color: #ffe6ff;
  text-shadow: 0 0 0.6rem #ffe6ff, 0 0 1.5rem #ff65bd,
    -0.2rem 0.1rem 1rem #ff65bd, 0.2rem 0.1rem 1rem #ff65bd,
    0 -0.5rem 2rem #ff2483, 0 0.5rem 3rem #ff2483;
  animation: shine 2s forwards, flicker 3s infinite;
}

@keyframes blink {
  0%,
  22%,
  36%,
  75% {
    color: #ffe6ff;
    text-shadow: 0 0 0.6rem #ffe6ff, 0 0 1.5rem #ff65bd,
      -0.2rem 0.1rem 1rem #ff65bd, 0.2rem 0.1rem 1rem #ff65bd,
      0 -0.5rem 2rem #ff2483, 0 0.5rem 3rem #ff2483;
  }
  28%,
  33% {
    color: #ff65bd;
    text-shadow: none;
  }
  82%,
  97% {
    color: #ff2483;
    text-shadow: none;
  }
}

.flicker {
  animation: shine 2s forwards, blink 3s 2s infinite;
}

.fast-flicker {
  animation: shine 2s forwards, blink 10s 1s infinite;
}

@keyframes shine {
  0% {
    color: #6b1839;
    text-shadow: none;
  }
  100% {
    color: #ffe6ff;
    text-shadow: 0 0 0.6rem #ffe6ff, 0 0 1.5rem #ff65bd,
      -0.2rem 0.1rem 1rem #ff65bd, 0.2rem 0.1rem 1rem #ff65bd,
      0 -0.5rem 2rem #ff2483, 0 0.5rem 3rem #ff2483;
  }
}

@keyframes flicker {
  from {
    opacity: 1;
  }

  4% {
    opacity: 0.9;
  }

  6% {
    opacity: 0.85;
  }

  8% {
    opacity: 0.95;
  }

  10% {
    opacity: 0.9;
  }

  11% {
    opacity: 0.922;
  }

  12% {
    opacity: 0.9;
  }

  14% {
    opacity: 0.95;
  }

  16% {
    opacity: 0.98;
  }

  17% {
    opacity: 0.9;
  }

  19% {
    opacity: 0.93;
  }

  20% {
    opacity: 0.99;
  }

  24% {
    opacity: 1;
  }

  26% {
    opacity: 0.94;
  }

  28% {
    opacity: 0.98;
  }

  37% {
    opacity: 0.93;
  }

  38% {
    opacity: 0.5;
  }

  39% {
    opacity: 0.96;
  }

  42% {
    opacity: 1;
  }

  44% {
    opacity: 0.97;
  }

  46% {
    opacity: 0.94;
  }

  56% {
    opacity: 0.9;
  }

  58% {
    opacity: 0.9;
  }

  60% {
    opacity: 0.99;
  }

  68% {
    opacity: 1;
  }

  70% {
    opacity: 0.9;
  }

  72% {
    opacity: 0.95;
  }

  93% {
    opacity: 0.93;
  }

  95% {
    opacity: 0.95;
  }

  97% {
    opacity: 0.93;
  }

  to {
    opacity: 1;
  }
}
  </style>
</head>
<body>
    
<div class="sign" id="congrats">
      <span class="fast-flicker">co</span>ngratu<span class="flicker">lat</span>ions!
    </div>
    <script>

      // If student get full marks there is something special is waiting for him/her in the background. 

     if(<?= $total?> ===<?=$actual_marks?>) {
         document.getElementById('congrats').style.visibility = "visible";
     }
    </script>
</body>
</html>