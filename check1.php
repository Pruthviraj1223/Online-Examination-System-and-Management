<!-- we are storing exam title into the session variable. -->

<?php
session_start();
        $_SESSION['title'] = $_POST['title'];
        header('Location:instructor-result-view.php');
        return;
?>