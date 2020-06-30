<?php
session_start();

include '../init.php';
    include DIR_CORE . 'mysqlDB.php';

$id=$_GET['id'];
if($id)
{
    $sql = "SELECT user_id,user_name,user_password FROM user WHERE user_id = $id ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc(); // 还是一个数组
   
}

	
include DIR_VIEW . 'modify.html';