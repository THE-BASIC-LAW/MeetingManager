<?php
header("Content_Type: text/html; charset=utf-8");
session_start();
include_once("conn/conn.php");
if($_SESSION[rights]!=1){
	echo "<script>alert('非法操作!');history.go(-1)</script>";
}
$name = $_POST[userName];
if(!($conn->Execute("select * from tb_meeting_user where userName = '$name'")->EOF)){
	echo $name;
	echo "<script>alert('用户名已经存在,请重新输入');history.go(-1)</script>";
}else if($_POST[password]!=$_POST[rep_password]){
	echo "$_POST[password]";
	echo "<br>";
	echo "$_POST[rep_password]";
	echo "<script>alert('两次输入密码不一致,请重新输入');history.go(-1)</script>";

}else{
	echo $_POST[password];
	echo "<br>";
	echo $_POST[rep_password];
	$password = $_POST[password];

	$rights = $_POST[rights] == "管理员"?1:0;
	$freezed = $_POST[freezed] == "是"?1:0;
	$department = $_POST[department];
	$logindate = date("Y-m-d ").date("H:i:s");
	echo "<br>";
	echo $rights;
	echo "<br>";
	echo $freezed;
	echo "<br>";
	echo $department;
	$sqlstr = "insert into tb_meeting_user (userName,userPassword,userLastLoginDate,userRights,userWhether,userDepart) values ('$name','$password','$logindate',$rights,$freezed,'$department')";
	echo "<br>";
	echo $sqlstr;
	if($conn->Execute($sqlstr)){
		echo "<script>alert('用户添加成功');history.go(-1)</script>";
	}else{
		echo "<script>alert('用户添加失败,请重新输入');history.go(-1)</script>";
	}
}
?>