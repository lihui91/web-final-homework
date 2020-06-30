<?php
session_start();

include '../init.php';
    include DIR_CORE . 'mysqlDB.php';

if(!empty($_POST['user_name']) && !empty($_POST['SN'])):
    $user_name=$_POST['user_name'];
    $user_password=$_POST['SN'];
    $id=$_GET['id'];

	//连接数据库
	$sql = "UPDATE user SET `user_name`='$user_name', `user_password`='$user_password' WHERE user_id=$id ";
	
	$result = $conn->query($sql);

	if( $result ):
 echo "<script type=text/javascript>alert ('修改用户信息成功');
    window.location.href='root.php'
 </script>";
  else:
    echo "<script type=text/javascript>alert ('修改用户信息失败');</script>";
	endif;
	endif;
?>
