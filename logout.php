<!-- Here, by destroying session variable we are logging out and will redirect to the login page. -->


<?php

session_start();
session_destroy();
header("Location: login.php");

?>