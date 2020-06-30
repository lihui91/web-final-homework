<?php

// 1  加载项目初始化文件
include './init.php';
session_start();


$config = include './config/config.php';

//数据库连接
$conn = new mysqli($config['servername'],$config['username'],$config['password'],$config['db']);

if ( $conn->connect_error ) {
	die('数据库连接失败');
}
// 今日发帖数




$sql = "select count(*) as cnt_vue_tdy from publish where `module_id`='web技术' and `area`='Vue大法好' and DAYOFMONTH(FROM_UNIXTIME(pub_time))=DAYOFMONTH(now()) and MONTH(FROM_UNIXTIME(pub_time))=MONTH(now()) and year(FROM_UNIXTIME(pub_time))=year(now()) ";
$result = mysqli_query($conn,$sql);

$row = $result->fetch_assoc();

$cnt_vue_tdy = $row['cnt_vue_tdy']; //执行错误,woc


//发帖数
$sql = "select count(*) as cnt_vue from `publish` where `module_id`='web技术' and `area`='Vue大法好'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cnt_vue = $row['cnt_vue'];//可以执行




$sql = "select count(*) as cnt_php_tdy from `publish` where `module_id`='web技术' and `area`='PHP真香' and DAYOFMONTH(FROM_UNIXTIME(pub_time))=DAYOFMONTH(now()) and MONTH(FROM_UNIXTIME(pub_time))=MONTH(now()) and year(FROM_UNIXTIME(pub_time))=year(now())";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cnt_php_tdy = $row['cnt_php_tdy'];

$sql = "select count(*) as cnt_php from `publish` where `module_id`='web技术' and `area`='PHP真香'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cnt_php = $row['cnt_php'];

$sql = "select count(*) as cnt_uni_tdy from `publish` where `module_id`='web技术' and `area`='Uni_App专区' and DAYOFMONTH(FROM_UNIXTIME(pub_time))=DAYOFMONTH(now()) and MONTH(FROM_UNIXTIME(pub_time))=MONTH(now()) and year(FROM_UNIXTIME(pub_time))=year(now())";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cnt_uni_tdy = $row['cnt_uni_tdy'];

$sql = "select count(*) as cnt_uni from `publish` where `module_id`='web技术' and `area`='Uni_App专区'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cnt_uni = $row['cnt_uni'];

$sql = "select count(*) as cnt_spring_tdy from `publish` where `module_id`='web技术' and `area`='Spring_boot' and DAYOFMONTH(FROM_UNIXTIME(pub_time))=DAYOFMONTH(now()) and MONTH(FROM_UNIXTIME(pub_time))=MONTH(now()) and year(FROM_UNIXTIME(pub_time))=year(now())";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cnt_spring_tdy = $row['cnt_spring_tdy'];

$sql = "select count(*) as cnt_spring from `publish` where `module_id`='web技术' and `area`='Spring_boot'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cnt_spring = $row['cnt_spring'];

$sql = "select count(*) as cnt_armor_tdy from `publish` where `module_id`='军事' and `area`='神装铁甲' and DAYOFMONTH(FROM_UNIXTIME(pub_time))=DAYOFMONTH(now()) and MONTH(FROM_UNIXTIME(pub_time))=MONTH(now()) and year(FROM_UNIXTIME(pub_time))=year(now())";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cnt_armor_tdy = $row['cnt_armor_tdy'];

$sql = "select count(*) as cnt_armor from `publish` where `module_id`='军事' and `area`='神装铁甲'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cnt_armor = $row['cnt_armor'];

$sql = "select count(*) as cnt_gun_tdy from `publish` where `module_id`='军事' and `area`='枪械之美' and DAYOFMONTH(FROM_UNIXTIME(pub_time))=DAYOFMONTH(now()) and MONTH(FROM_UNIXTIME(pub_time))=MONTH(now()) and year(FROM_UNIXTIME(pub_time))=year(now())";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cnt_gun_tdy = $row['cnt_gun_tdy'];

$sql = "select count(*) as cnt_gun from `publish` where `module_id`='军事' and `area`='枪械之美'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cnt_gun = $row['cnt_gun'];

$sql = "select count(*) as cnt_history_tdy from `publish` where `module_id`='军事' and `area`='军史解密' and DAYOFMONTH(FROM_UNIXTIME(pub_time))=DAYOFMONTH(now()) and MONTH(FROM_UNIXTIME(pub_time))=MONTH(now()) and year(FROM_UNIXTIME(pub_time))=year(now())";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cnt_history_tdy = $row['cnt_history_tdy'];

$sql = "select count(*) as cnt_history from `publish` where `module_id`='军事' and `area`='军史解密'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cnt_history = $row['cnt_history'];

$sql = "select count(*) as cnt_horn_tdy from `publish` where `module_id`='军事' and `area`='冲锋号' and DAYOFMONTH(FROM_UNIXTIME(pub_time))=DAYOFMONTH(now()) and MONTH(FROM_UNIXTIME(pub_time))=MONTH(now()) and year(FROM_UNIXTIME(pub_time))=year(now())";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cnt_horn_tdy = $row['cnt_horn_tdy'];

$sql = "select count(*) as cnt_horn from `publish` where `module_id`='军事' and `area`='冲锋号'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cnt_horn = $row['cnt_horn'];

// 2  加载视图文件

include './view/index.html';
