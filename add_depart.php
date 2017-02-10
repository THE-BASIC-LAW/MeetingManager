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
		table{margin: auto}

		td{padding-top: 20px}

		tr:last-child td{text-align: center;}

		tr:last-child input{background: url("images/append_15.jpg"); width: 52px; height: 24px;}
	</style>
</head>
<body>
	<div>
		<form action="add_depart_chk.php" method="post">
			<table>
				<tr><th colspan="2">部门添加管理</th></tr>
				<tr>
					<td>新部门名称:</td>
					<td><input type="text" name="depart_name"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" id="add_mbtn1" value=""></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>