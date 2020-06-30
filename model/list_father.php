<?php

include '../init.php';

include DIR_CORE . 'mysqlDB.php';



$module_id = $_GET['module_id'];
$area = $_GET['area'];//传递过来的参数



// 以下的代码跟分页有关
// 接收当前页码数
$pageNum = isset($_GET['num']) ? $_GET['num'] : 1;
// 定义每一页显示的记录数
$rowsPerPage = 4;
// 查询总记录数
// $sql = "select count(pub_id) as sum from publish where module_id= $module_id and area= $area";

//今日帖子数
$sql_tdy = "select count(*) as sum_tdy from `publish` where `module_id`='$module_id' and `area`='$area' and DAYOFMONTH(FROM_UNIXTIME(pub_time))=DAYOFMONTH(now()) and MONTH(FROM_UNIXTIME(pub_time))=MONTH(now()) and year(FROM_UNIXTIME(pub_time))=year(now())";
$result_tdy = $conn->query($sql_tdy);
$row_tdy= $result_tdy->fetch_assoc(); // 还是一个数组
$rowCount_tdy = $row_tdy['sum_tdy']; // 得到总记录数

//总帖子数
$sql = "select count(*) as sum from `publish` where `module_id`='$module_id' and `area`='$area'";
$result = $conn->query($sql);
$row= $result->fetch_assoc(); // 还是一个数组
$rowCount = $row['sum']; // 得到总记录数

// 计算总页数
$pages = ceil($rowCount/$rowsPerPage);
// 拼凑出页码字符串
$strPage = '';
// 拼凑出“首页”
$strPage .= "<a href='./list_father.php?num=1&module_id=$module_id&area=$area'>首页</a>";
// 拼凑出“上一页”
$preNum = $pageNum == 1 ? 1 : $pageNum - 1;
if ($pageNum != 1) {
	$strPage .= "<a href='./list_father.php?num=$preNum&module_id=$module_id&area=$area'><<上一页</a>";
}

// 确定显示的第1个页码$startNum的值
if ($pageNum <= 3) {
	$startNum = 1;
} else {
	$startNum = $pageNum - 2;
}
// 确定$startNum的最大值
if ($startNum > $pages - 4) {
	$startNum = $pages - 4;
}
// 防止$startNum出现负值
if ($startNum <= 1) {
	$startNum = 1;
}
// 确定显示的最后1个页码$endNum的值
$endNum = $startNum + 4;
// 防止$endNum越界
if ($endNum > $pages) {
	$endNum = $pages;
}

// 拼凑出中间的页码
for ($i = $startNum; $i <= $endNum; $i++) {
	if ($i == $pageNum) {
		$strPage .= "<a href='./list_father.php?num=$i&module_id=$module_id&area=$area' style='background:#105cb6;color:white;'>$i</a>";
	} else {
		$strPage .= "<a href='./list_father.php?num=$i&module_id=$module_id&area=$area'>$i</a>";
	}
}
// 拼凑出“下一页”
$nextNum = $pageNum == $pages? $pages : $pageNum + 1;
if ($pageNum != $pages) {
	$strPage .= "<a href='./list_father.php?num=$nextNum&module_id=$module_id&area=$area'>下一页>></a>";
}
// 拼凑出“尾页”
$strPage .= "<a href='./list_father.php?num=$pages&module_id=$module_id&area=$area'>尾页</a>";
// 拼凑出“总页数”
$strPage .= "总页数:$pages";

// 分页到此结束

// 3, 提取publish表的数据
$offset = ($pageNum - 1) * $rowsPerPage;






if ($module_id == 'web技术' && $area == 'Vue大法好') {
	$sql = "select pub_id,pub_title,pub_content,pub_owner,pub_time,pub_hits from `publish` where `module_id`='web技术' and `area`='Vue大法好' order by pub_time desc limit $offset, $rowsPerPage";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		$row  = array('pub_content' => '信息消失了~', 'pub_owner' => '');
	}


	include DIR_VIEW . 'list_father.html';
}

else if ($module_id == 'web技术' && $area == 'PHP真香') {
	$sql = "select pub_id,pub_title,pub_content,pub_owner,pub_time,pub_hits from `publish` where `module_id`='web技术' and `area`='PHP真香' order by pub_time desc limit $offset, $rowsPerPage";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		$row  = array('pub_content' => '信息消失了~', 'pub_owner' => '');
	}


	include DIR_VIEW . 'list_father.html';
}

else if ($module_id == 'web技术' && $area == 'Uni_App专区') {
	$sql = "select pub_id,pub_title,pub_content,pub_owner,pub_time,pub_hits from `publish` where `module_id`='web技术' and `area`='Uni_App专区' order by pub_time desc limit $offset, $rowsPerPage";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		$row  = array('pub_content' => '信息消失了~', 'pub_owner' => '');
	}


	include DIR_VIEW . 'list_father.html';
}

else if ($module_id == 'web技术' && $area == 'Spring_boot') {
	$sql = "select pub_id,pub_title,pub_content,pub_owner,pub_time,pub_hits from `publish` where `module_id`='web技术' and `area`='Spring_boot' order by pub_time desc limit $offset, $rowsPerPage";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		$row  = array('pub_content' => '信息消失了~', 'pub_owner' => '');
	}


	include DIR_VIEW . 'list_father.html';
}

else if ($module_id == '军事' && $area == '神装铁甲') {
	$sql = "select pub_id,pub_title,pub_content,pub_owner,pub_time,pub_hits from publish where module_id='军事' and `area`='神装铁甲' order by pub_time desc limit $offset, $rowsPerPage";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		$row  = array('pub_content' => '信息消失了~', 'pub_owner' => '');
	}


	include DIR_VIEW . 'list_father.html';
}

else if ($module_id == '军事' && $area == '枪械之美') {
	$sql = "select pub_id,pub_title,pub_content,pub_owner,pub_time,pub_hits from publish where module_id='军事' and `area`='枪械之美' order by pub_time desc limit $offset, $rowsPerPage";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		$row  = array('pub_content' => '信息消失了~', 'pub_owner' => '');
	}


	include DIR_VIEW . 'list_father.html';
}

if ($module_id == '军事' && $area == '军史解密') {
	$sql = "select pub_id,pub_title,pub_content,pub_owner,pub_time,pub_hits from publish where module_id='军事' and `area`='军史解密' order by pub_time desc limit $offset, $rowsPerPage";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		$row  = array('pub_content' => '信息消失了~', 'pub_owner' => '');
	}


	include DIR_VIEW . 'list_father.html';
}

else if ($module_id == '军事' && $area == '冲锋号') {
	$sql = "select pub_id,pub_title,pub_content,pub_owner,pub_time,pub_hits from publish where module_id='军事' and `area`='冲锋号' order by pub_time desc limit $offset, $rowsPerPage";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		$row  = array('pub_content' => '信息消失了~', 'pub_owner' => '');
	}


	include DIR_VIEW . 'list_father.html';
}