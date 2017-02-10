<?php
session_start();
include_once("conn/conn.php");
if($_SESSION[rights]!=1){
	echo "<script>alert('非法操作!');history.go(-1)</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		tr:last-child td{text-align: center;}

		tr:last-child input{background: url("images/append_15.jpg"); width: 52px; height: 24px}
	</style>
</head>
<body>
	<div>
		<form action="addacount_chk.php" method="post">
			<table>
				<tr><th colspan="2">用户添加管理</th></tr>
				<tr>
					<td>用户名称:</td>
					<td><input type="text" name="userName"></td>
				</tr>
				<tr>
					<td>用户密码:</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td>确认密码:</td>
					<td><input type="password" name="rep_password"></td>
				</tr>
				<tr>
					<td>用户权限:</td>
					<td>
						<select name="rights">
							<option>管理员</option>
							<option>普通用户</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>是否冻结:</td>
					<td>
						<select name="freezed">
							<option>是</option>
							<option>否</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>用户所属部门:</td>
					<td>
						<select name="department">
							<option>财务部</option>
							<option>销售部</option>
							<option>人力资源部</option>
							<option>工程部</option>
							<option>安全部</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" id="add_mbtn1" value=""></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>