<!-- This page is retrieving information using title vairable from the 'exam_desc' table 
and storing it into session varible.  -->

<?php
session_start();
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=examination',
        'root', '');
        $title = $_POST['title'];
        $sql = "SELECT * FROM exam_desc WHERE exam_title = '".$title."'";
        echo $sql;
        $stmt = $pdo->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['title'] = $rows[0]['exam_title'];
        $_SESSION['exam_time'] = $rows[0]['exam_time'];
        $_SESSION['exam_date'] = $rows[0]['exam_date'];
        $_SESSION['exam_dur'] = $rows[0]['exam_dur'];
        header('Location:display-exam.php');
        return;
?>