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
		#upd_btn{background: url(images/modify.jpg) no-repeat; width: 52px; height: 24px}

		#del_btn{background: url(images/delete_15.jpg) no-repeat; width: 52px; height: 24px}

		.acc_update th{width: 100px}

		.acc_update td{width: 100px; padding: 10px 0}
	</style>

	<script type="text/javascript">
 		function confirm_del(idName){
 			if(confirm("确定要删除吗?")){
 				location="acc_del.php?id="+idName;
 			}else{}
 		}
	</script>
</head>
<body>
	<div>
		<table class="acc_update">
			<tr>
				<th>用户ID</th>
				<th>用户名称</th>
				<th>用户权限</th>
				<th>是否冻结</th>
				<th>用户所属部门</th>
				<th>修改用户信息</th>
				<th>删除用户信息</th>
			</tr>
			<?php
			$page = empty($_GET["page"])?1:$_GET["page"];
			$len = 10;
			$sqlcount = "select count(*) from tb_meeting_user";
			$rst_count = $conn->Execute($sqlcount)->fields[0];
			$pagetot = ceil($rst_count/$len);
			$offset = $page <= 1 ? 0 : ($page >= $pagetot ? ($pagetot-1) * $len : ($page-1) * $len);
			$prepage = $page - 1;
			$nextpage = $page + 1; 
			$sqlstr = "select * from tb_meeting_user order by userId limit $offset,$len";
			$rst = $conn->Execute($sqlstr);
			while(!$rst->EOF){
				?>
				<tr>
					<td><?php echo $rst->fields[0]?></td>
					<td><?php echo $rst->fields[1]?></td>
					<td><?php if($rst->fields[5] == 1){
						echo "管理员";
					}else{
						echo "普通用户";
					}
					?></td>
					<td><?php if($rst->fields[6] == 1){
						echo "是";
					}else{
						echo "否";
					}
					?></td>
					<td><?php echo $rst->fields[7]?></td>
					<td><a href="update.php?id=<?php echo $count?>"><button name="update" id="upd_btn"></button></a></td>
					<td><button name="delete" id="del_btn" value=<?php echo $rst->fields[0]?> onclick="confirm_del(this.value)"></button></td>
				</tr>
				<?php
				$rst->movenext();
			}
			?>
		</table>
		<?php
		if($page <= 0){
			echo "<h2>当前是第&nbsp".$page."&nbsp页&nbsp<a href=manager.php?lmbs=用户账户管理&page=".$nextpage.">下一页</a>&nbsp|&nbsp共&nbsp".$pagetot."&nbsp页</h2>&nbsp";
		}else if($page >= $pagetot){
			echo "<h2>当前是第&nbsp".$page."&nbsp页&nbsp<a href=manager.php?lmbs=用户账户管理&page=".$prepage.">上一页</a>&nbsp|&nbsp共&nbsp".$pagetot."&nbsp页</h2>&nbsp";
		}else{
			echo "<h2>当前是第&nbsp".$page."&nbsp页&nbsp<a href=manager.php?lmbs=用户账户管理&page=".$prepage.">上一页</a>&nbsp|&nbsp<a href=manager.php?lmbs=用户账户管理&page=".$nextpage.">下一页</a>&nbsp|&nbsp共&nbsp".$pagetot."&nbsp页</h2>&nbsp";
		}
		?>
		<div>点此添加账户>>>>&nbsp<a href="#" onclick="javascript:Wopen=open('addacount.php','','width=550,height=420,scrollbars=no')"><button style="background: url(images/append_15.jpg); width: 52px; height: 24px; vertical-align: -25%"></button></a></div>
	</div>
</div>
</body>
</html>