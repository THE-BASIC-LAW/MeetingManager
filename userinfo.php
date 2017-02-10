<?php
session_start();
include_once('conn/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript">
	function confirm_exit(){
		if(confirm("确定退出登录吗?")){
			location='logout.php';
		}
	}
	</script>
</head>
<body>
	<b>尊敬的:<?php echo $_SESSION['name'];?>
		您的身份:<?php 
		if($_SESSION['rights']==1){
			echo "管理员";}else{
				echo "普通用户";
			}
			?>     
			当前日期为:<?php echo date('Y-m-d');?>
			上次登录时间:<?php echo $_SESSION['lasttime'];?>
			当前为第 <?php echo  $_SESSION['logincount'];?> 次登录
	</b>

		<a href="javascript:" style="display: inline-block;"><img src="images/over3.png" style="width: 50px; height: 20px; vertical-align: -25%; margin-left: 10px" onclick="confirm_exit()"></a>
	</body>
	</html>