<?php
session_start();
include_once("conn/conn.php");
if($_SESSION[rights]!=1){
	echo "<script>alert('非法操作!');history.go(-1)</script>";
}else{
	if($conn->Execute("delete from tb_meeting_info where meeting_id = $_GET[id]")){
		echo "<script>alert('删除成功!');history.go(-1)</script>";
	}else{
		echo "<script>alert('删除失败!');history.go(-1)</script>";
	}
}
?>