<?php
header("Content_Type: text/html; charset=utf-8");
session_start();
include_once("conn/conn.php");
if($_SESSION[rights]!=1){
	echo "<script>alert('非法操作!');history.go(-1)</script>";
}elseif(empty($_POST[depart_name])){
	echo "<script>alert('部门名称不能为空!');history.go(-1)</script>";
}else{
	$sqlstr = "insert into tb_meeting_depart (department_name) values ('$_POST[depart_name]')";
	echo "<br>";
	echo $sqlstr;
	if($conn->Execute($sqlstr)){
		echo "<script>alert('添加成功');history.go(-1)</script>";
	}else{
		echo "<script>alert('添加失败,请重新输入');history.go(-1)</script>";
	}
}
?>