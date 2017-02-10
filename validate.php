<?php
session_start();
	//加载数据库连接文件
include_once("conn/conn.php");
if(empty($_POST["username"]) or empty($_POST["password"])){
	echo "<script>alert('用户名和密码不能为空');history.go(-1);</script>";
}else{
	$username = $_POST["username"];
	$password = $_POST["password"];
		//判断登录用户民是否存在
	$sqltest = "select * from tb_meeting_user where userName = '$username'";
		$testrst = $conn->Execute($sqltest); //执行查询操作
		if(!$testrst->EOF){
			$sqlstr = "select * from tb_meeting_user where userName = '$username' and userPassword = '$password'";
			$rst = $conn->Execute($sqlstr);
			if(!$rst->EOF){					  //判断登录用户名和密码是否正确
				if($rst->fields[6]==0){		  //判断登录用户是否被冻结
					$_SESSION["id"] = $rst->fields[0];		//赋值给session变量
					$_SESSION["name"] = $rst->fields[1];
					$_SESSION["rights"] = $rst->fields[5];
					$_SESSION["lasttime"] = $rst->fields[3];
					$logindate = date("Y-m-d ").date("H:i:s");		//当前登录时间
					$logincount = $rst->fields[4];			//当前登录次数
					$logincount++;			//登录次数自增1
					$_SESSION["logincount"] = $logincount;
					$sqlstrud = "update tb_meeting_user set userLoginCount = $logincount, userLastLoginDate = '$logindate' where userId = $_SESSION[id]";	
					$conn->Execute($sqlstrud);		//更新登录时间和次数
					echo "<meta http-equiv = \"refresh\" content=\"2;url=manager.php\"  />";
				}else if($rst->fields[6]==1){
					echo "<script>alert('该用户账号已被冻结 请联系管理员!');history.go(-1);</script>";
				}
			}else{
				echo "<script>alert('密码错误 请重新登录');history.go(-1)</script>";
			}
		}else{
			echo "<script>alert('用户名不存在 请重新输入');history.go(-1)</script>";
		}
	}
?>