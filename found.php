<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="manager.php?lmbs=查找会议结果" method="post">
		<table>
			<tr><th colspan="2">查找会议记录</th></tr>
			<tr><td><br></td></tr>
			<tr>
				<td>查询内容:</td>
				<td><input type="text" name="found_content"></td>
			</tr>
			<tr><td></td></tr>
			<tr>
				<td>查询条件:</td>
				<td>
					<select style="width: 150px" name="found_type">
						<option>请选择查询条件</option>
						<option>按会议编号查询</option>
						<option>按会议名称查询</option>
					</select>
				</td>
			</tr>
			<tr><td></td></tr>
			<tr><td colspan="2"><input type="submit" name="found" value="" style="background: url(images/search.jpg) no-repeat; width: 52px; height: 24px"></td></tr>
		</table>
	</form>
</body>
</html>