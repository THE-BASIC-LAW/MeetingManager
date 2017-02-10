<?php
session_start();
include_once("conn/conn.php");
if($_SESSION[rights]!=1){
	echo "<script>alert('非法操作!');history.go(-1</script>";
}else{
$id = $_GET[id];
$rst = $conn->Execute("select * from tb_meeting_user where userId = $id");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		table{margin: auto;}

		td{padding: 10px}

		#add_mbtn1{width: 52px; height: 24px; background-image: url(images/modify.jpg);}

		tr:last-child td{text-align: center;}
	</style>
</head>
<body>
	<div>
		<form action="update_chk.php" method="post">
			<table>
				<tr><th colspan="2">用户帐户管理</th></tr>
				<tr>
					<td>用户ID:</td>
					<td><?php echo $id ?><input type="hidden" name="id" value="<?php echo $id ?>"></td>
				</tr>
				<tr>
					<td>用户名称:</td>
					<td><?php echo $rst->fields[1] ?></td>
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