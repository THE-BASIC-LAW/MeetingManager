<?php
session_start();
include_once("conn/conn.php");
if($_SESSION[rights]!=1){
	echo "<script>alert('非法操作!');history.go(-1)</script>";
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	$sqlstr = "update tb_meeting_info set meeting_name = '$_POST[meeting_name]',meeting_department = '$_POST[department]',meeting_place = '$_POST[meeting_place]',meeting_date = '$_POST[mb_y]-$_POST[mb_m]-$_POST[mb_d]',meeting_host = '$_POST[meeting_host]',meeting_present = '$_POST[meeting_present]',meeting_saver = '$_POST[meeting_saver]',meeting_abstract = '$_POST[textarea]',meeting_address = '$_POST[filepath]' where meeting_id = $_POST[meeting_id]";
	if($conn->Execute("$sqlstr")){
				echo "<script>alert('修改成功!');history.go(-1)</script>";
			}else{
				echo "<script>alert('修改失败!');history.go(-1)</script>";
			}
	?>
</body>
</html>