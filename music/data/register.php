<?php
/**接收客户端提交的用户名和密码，验证是否正确，向客户端输出ok或err**/
header('Content-Type: text/plain');

$uname = $_REQUEST['uname'];
$upwd = $_REQUEST['upwd'];

//连接数据库
include('0_config.php'); //包含指定文件的内容在当前位置
$conn = mysqli_connect($db_url, $db_user, $db_pwd, $db_name, $db_port);

//提交SQL
$sql = "SET NAMES UTF8";
mysqli_query($conn, $sql);
$sql = "INSERT INTO `music_user` VALUES (null,'$uname','$upwd')";
$result = mysqli_query($conn, $sql);

if($result===false){ //SQL语句执行失败
	echo 'sqlerr';
}else {  //SQL语句执行成功
	echo 'ok';
}

