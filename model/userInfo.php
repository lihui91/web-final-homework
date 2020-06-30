<?php 

session_start();

$arr = $_SESSION['USER'];

echo  $arr["user_name"] . ' ，欢迎！';
