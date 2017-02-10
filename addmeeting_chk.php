<?php
session_start();
include_once("conn/conn.php");
function f_type($f_type,$f_upfiles){
	$is_pass = false;
	$arr_files = explode(".",$f_upfiles);
	$comp_type = $arr_files[count($arr_files)-1];
	$type_num = count($f_type);
	for ($num = 0; $num < $type_num; $num++) {
		if($f_type["$num"] == $comp_type){
			$is_pass = $comp_type;		
		}
	}
	return $is_pass;
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
	$name = $_FILES['meeting_documents']['name'];
	$filepath = "upload/".md5($name).time().".txt";
	$sqlstr = "insert into tb_meeting_info (meeting_name,meeting_department,meeting_place,meeting_date,meeting_host,meeting_present,meeting_saver,meeting_abstract,meeting_address) values ('$_POST[meeting_name]','$_POST[department]','$_POST[meeting_place]','$_POST[mb_y]-$_POST[mb_m]-$_POST[mb_d]','$_POST[meeting_host]','$_POST[meeting_present]','$_POST[meeting_saver]','$_POST[textarea]','$filepath')";
	$is_done = $conn->Execute($sqlstr);
	if($is_done){
		if(f_type(["txt"],$name)!=false){				
			if(move_uploaded_file($_FILES['meeting_documents']['tmp_name'], $filepath)){
				echo "<script>alert('上传成功');location='manager.php'</script>";
			}else{
				echo "<script>alert('上传失败');location='manager.php'</script>";
			}
		}	
	}else{
		echo "<script>alert('上传失败');location='manager.php'</script>";
	}
	?>
</body>
</html>