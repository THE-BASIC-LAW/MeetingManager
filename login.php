<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录界面</title>
	<style type="text/css">
		body{font-size: 12px}
		label{margin: 5px;font-weight: bold; display: block;}
		input{vertical-align: middle;}
	</style>
</head>
<body>
	<form action="validate.php" method="post">
		<table>
			<tr>
				<td><label>用户名：<input type="text" name="username" placeholder="请输入用户名"></label></td>
				<td><label><input type="checkbox" name="isAutoLogin">自动登录</label></td>
			</tr>
			<tr>
				<td><label>密　码：<input type="password" name="password" placeholder="请输入密码"></label></td>
				<td style="text-align: center;"><label><input type="submit" name="Login" value="登录"></label></td>
			</tr>
		</table>
	</form>
</body>
</html>