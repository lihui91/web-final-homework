<?php
session_start();

include '../init.php';

include DIR_CORE . 'mysqlDB.php';


if( isset($_SESSION['USER']) ){

    $sql = "select user_id,user_name,user_password from `user`";
    $records = $conn->query($sql);
}


include DIR_VIEW . 'root.html'; 


