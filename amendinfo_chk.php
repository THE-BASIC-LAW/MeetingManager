<?php
session_start();
include_once("conn/conn.php");
$id = $_SESSION["id"];
$password = $conn->Execute("select userPassword from tb_meeting_user where userId = $id")->fields[0];
if($_POST[old_pwd] == $password && $_POST[new_pwd] == $_POST[confirm_pwd] && $_POST[old_pwd] != $_POST[new_pwd]){
	echo "here!";
	$conn->Execute("update tb_meeting_user set userPassword = '$_POST[new_pwd]' where userId = $id");
	echo "<script>alert('密码修改成功');history.go(-1)</script>";
}else{
	echo "<script>alert('密码修改失败,请仔细核对输入信息!');history.go(-1)</script>";
}
?>