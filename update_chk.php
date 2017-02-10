<?php
session_start();
include_once("conn/conn.php");
if($_SESSION[rights]!=1){
	echo "<script>alert('非法操作!');history.go(-1)</script>";
}else{
	$id = $_POST[id];
	$rights = $_POST[rights] == "管理员"?1:0;
	$freezed = $_POST[freezed] == "是"?1:0;
	$department = $_POST[department];
	$strsql = "update tb_meeting_user set userRights = $rights, userWhether = $freezed, userDepart = '$department' where userId = $id";
	if($conn->Execute($strsql)){
		echo "<script>alert('修改成功');history.go(-1</script>";
	}else{
		echo "<script>alert('修改失败');history.go(-1</script>";
	}
	echo $conn->ErrorMsg();
}
?>