<?php
include_once 'header.php';
session_start();
echo '<br><br>Session successfully ended<br>';
echo '<a href ="main.php"> Login Again!</a> to Play games<br><br>';
session_destroy();
include_once 'footer.php';
?>