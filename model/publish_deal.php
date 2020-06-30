<?php

//发帖处理

session_start();

include '../init.php';

include DIR_CORE . 'mysqlDB.php';

//接收发帖数据
//过滤标签内容
$module_id = escapeString($_POST['module_id']);//论坛名
$area = escapeString($_POST['area']);//分区名
$pub_title = escapeString( $_POST['pub_title'] );//论坛细分
$pub_content = escapeString( $_POST['pub_content'] );//一楼发言


//获取当前发帖者的个人信息
$pub_owner = $_SESSION['USER']['user_name'];

//获取当前的发帖时间
$pub_time = time();

//数据库操作
$sql = "insert into `publish` values (null,'$module_id','$area','$pub_title','$pub_content', '$pub_owner', '$pub_time', default) ";


//发帖的业务逻辑

if ( empty("$pub_title") || empty("$pub_content") ) {
	jump('./publish.php', '内容和标题不能为空 ！~~~');
}else 
{
	if($module_id=='军事')
	{
	$result = mysqli_query($conn,$sql);

	if ( $result ) {
		header("location:./list_father.php?module_id=$module_id&area=$area");
		echo "<script>alert('发帖成功！正在跳转 1s...')</script>";
		// jump('./list_father.php?module_id='+$module_id, '发帖成功 ！ 正在跳转 1s...' );
	} else {
		
		jump('./publish.php', '发生未知错误QAQ~');
	}
	}
	

	else if($module_id=='web技术')
	{
	$result = mysqli_query($conn,$sql);

	if ( $result ) {
		header("location:./list_father.php?module_id=$module_id&area=$area");
		echo "<script>alert('发帖成功！正在跳转 1s...')</script>";
		// jump('./list_father.php?module_id='+$module_id, '发帖成功 ！ 正在跳转 1s...' );
	} else {
		
		jump('./publish.php', '发生未知错误QAQ~');
	}
	}
}

