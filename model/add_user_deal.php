<?php
    
    include '../init.php';
    include DIR_CORE . 'mysqlDB.php';

    
    
    
    $user_name=$_POST['user_name'];
    $user_password=md5($_POST['SN']);

	//连接数据库
    $sql = "INSERT INTO `user` (user_name,user_password) VALUES ('$user_name','$user_password')";
    $result = $conn->query($sql);

	if( $result )
    jump('./root.php', '用户添加成功！~');
    else
        echo "添加用户失败";
?>
