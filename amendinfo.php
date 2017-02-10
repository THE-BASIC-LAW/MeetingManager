<?php
session_start();
include_once("conn/conn.php");
$id = $_SESSION["id"];
$old_password = $conn->Execute("select userPassword from tb_meeting_user where userId = $id")->fields[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		.change_password{margin-top:10px auto;}

		.change_password td{width: 100px; padding: 10px;}

		.change_password img{width: 48px; height: 20px;}

		tr:last-child input{background: url(images/modify.jpg) no-repeat; width: 52px; height: 24px}
	</style>
</head>
<body>
	<div>
		<form action="amendinfo_chk.php" method="post">
			<table class="change_password">
			<tr><th colspan="2">用户修改密码</th></tr>
				<tr>
					<td>请输入原密码:</td>
					<td><input type="password" name="old_pwd"></td>
				</tr>
				<tr>
					<td>请输入新密码:</td>
					<td><input type="password" name="new_pwd"></td>
				</tr>
				<tr>
					<td>请确认新密码:</td>
					<td><input type="password" name="confirm_pwd"></td>
				</tr>
				<tr><td colspan="2"><input type="submit" name="modify" value=""></td></tr>
			</table>
		</form>
	</div>
</body>
</html>