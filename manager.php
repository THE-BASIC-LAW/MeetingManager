<?php
session_start();
include_once("conn/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理页面</title>
	<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js">

	</script>
	<style type="text/css">
		a{text-decoration: none}

		img{width: 100%; height: 220px;}

		*{margin: 0; padding: 0; font-size: 12px; line-height: 20px; text-align: center; box-sizing: border-box;}

		input{text-align: left;}

		ul{padding:0 20px}


		li{list-style: none; background: url('images/amend.ico') no-repeat 0px 3px ; line-height: 22px; border-bottom: 1px dashed #06F}

		h4{border-bottom: 1px solid #06F; font-size: 15px}

		a:link{color:#F90;}

		span{font-size: 15px; position: absolute; left: 5px; bottom: 0; font-weight: bold;}

		table{margin:10px auto;}

		.uli{background: url(images/amendinfo.png) no-repeat 0px 3px;}

		.left_div{width: 180px; height: 600px; border: 1px solid #06f; float: left;}

		.right_div{width: 800px; height: 600px; border: 1px solid #06f; float: left; margin-left: 10px;}

		.right_div::after{content: ""; clear: both;}

		.wrapper{width: 990px; text-align: center; margin: 0 auto}

		.header{height: 38px; width: 100%; background: url('images/bg_info.bmp'); margin: 0 auto 5px; border: 1px solid #06f; line-height: 38px}

		.current_position{height: 50px; border-bottom: 1px dotted #03f; position: relative;}

	</style>
</head>
<?php
if(empty($_SESSION["name"]) or empty($_SESSION["id"])){
	echo "<script>alert('请先登录后在执行相关操作!');location.href='login.php';</script>";
}
?>
<body>
	<div class="wrapper">
		<img src="images/Title.png">

		<div class="header" id="div1">
			<?php
			include('userinfo.php')
			?></div>
			<div>
				<div class="left_div">
					<table>
						<tr>
							<td width="180">
								<h4>分类操作</h4>
								<ul>
									<li><a href="manager.php?lmbs=添加会议记录">添加会议记录</a></li>
									<li><a href="manager.php?lmbs=浏览会议记录">浏览会议记录</a></li>
									<li><a href="manager.php?lmbs=查找会议记录">查找会议记录</a></li>
									<li><a href="manager.php?lmbs=用户信息管理">管理用户信息</a></li>
								</ul>
								<p>&nbsp</p>
								<?php
								if($_SESSION["rights"] == 1){
									?>
									<h4>管理操作</h4>
									<ul>
										<li class="uli"><a href="manager.php?lmbs=用户账户管理">用户账户管理</a></li>
										<li class="uli"><a href="manager.php?lmbs=会议信息管理">会议信息管理</a></li>
										<li class="uli"><a href="manager.php?lmbs=部门管理">部门管理</a></li>
									</ul>
									<?php
								}
								?>
								<table>
									<tr>
										<td style="height: 60px"></td>
									</tr>
									<tr>
										<td style="height: 60px"><img src="images/fbook.gif" style="height: 45px"></td>
									</tr>
									<tr>
										<td style="height: 60px"><img src="images/mingrisoft.gif" style="height: 45px"></td>
									</tr>
									<tr>
										<td style="height: 60px"><img src="images/mrbbs.gif" style="height: 45px"></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
				<div class="right_div">
					<div class="current_position">
						<span>当前位置&nbsp>>&nbsp<?php
							if(!isset($_GET['lmbs'])){
								echo "首页";
							}else{
								echo $_GET['lmbs'];
							}
							?></span>
						</div>
						<div class="include"> 
							<?php
							switch ($_GET['lmbs']) {
								case '添加会议记录':
								include("addmeeting.php");
								break;
								case '浏览会议记录':
								include("viewmeeting.php");
								break;
								case '查找会议记录':
								include("found.php");
								break;
								case '用户信息管理':
								include("amendinfo.php");
								break;
								case '用户账户管理':
								include("acc_manager.php");
								break;
								case '会议信息管理':
								include("recordmanager.php");
								break;
								case '部门管理':
								include("departmanager.php");
								break;
								case '查找会议结果':
								include("show.php");
								break;
								default:
								include("welcome.php");
								break;
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</body>
		</html>