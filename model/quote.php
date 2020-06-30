<?php
session_start();
//引用页

include '../init.php';

$module_id=$_GET['module_id'];
$area=$_GET['area'];
$pub_id=$_GET['pub_id'];
$quote_flag=$_GET['quote_flag'];
$floor=$_GET['floor']-1;
$rep_pub_id=$_GET['rep_pub_id'];
$rep_rep_content=$_GET['rep_rep_content'];
if(isset($_GET['pub_content'])){
$pub_content=$_GET['pub_content'];
}
else {
$pub_content='';
}
include DIR_VIEW . 'quote.html';
