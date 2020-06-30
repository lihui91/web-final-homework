<?php
session_start();

include '../init.php';

include DIR_CORE . 'mysqlDB.php';

//获取回帖信息
$rep_pub_id = $_POST['pub_id'];

if(isset($_POST['quote_flag']))
{
$quote_flag=$_POST['quote_flag'];
}
else
{
	$quote_flag=0;
}

if(isset($_POST['floor']))
{
$floor=$_POST['floor'];
}
else{
	$floor=0;
}
// $rep_pub_id=$_POST['rep_pub_id'];

if(isset($_POST['rep_rep_content']))
{
$rep_rep_content=$_POST['rep_rep_content'];
}
else
{
	$rep_rep_content='';
}
$rep_user = $_SESSION['USER']['user_name'];
$rep_content = trim($_POST['rep_content']);
$rep_time = time();

//数据库操作
$sql = "insert into reply values(null,'$quote_flag','$floor','$rep_pub_id','$rep_user','$rep_content','$rep_rep_content','$rep_time')";

if ( !empty($rep_content) ) {
	if ( isset($_SESSION['USER']) ) {
	   $result = $conn->query($sql);
	   if($result) {
	   		jump("./show.php?pub_id=$rep_pub_id&action=reply", '回复成功 正在跳转1s..');
	   }else {
	   		jump("./show.php?pub_id=$rep_pub_id", '回帖失败 发生未知错误~');
	   }
  }
} else {
	jump("./show.php?pub_id=$rep_pub_id", '回帖内容不能为空 请重新发送~！');
}

