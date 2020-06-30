<?php
session_start();
$id=$_GET['id'];

include '../init.php';
include DIR_CORE . 'mysqlDB.php';//连接数据库


if($id)
{
    $sql="DELETE FROM user WHERE user_id = $id";
	$result=$conn->query($sql);
	if($result){
        header('location:root.php');
    }
    else{
        die('删除失败');
    }

}