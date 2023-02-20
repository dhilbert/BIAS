<?php
include_once('lib/session.php');
include_once('lib/dbcon_BIAS.php');



$admin_id = isset($_GET['admin_id']) ? $_GET['admin_id'] : 3;
$admin_pw = isset($_GET['admin_pw']) ? $_GET['admin_pw'] : 3;
$now_time =  date("Y-m-d H:i:s");



$sql	 = "select * from admin_member where admin_id ='".$admin_id."';";
$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));
$info	 = mysqli_fetch_array($res);
if($info==Null) {
	echo "<script>
			alert('아이디가 존재 하지 않습니다.');
			parent.location.replace('/BIAS/');
		 </script> ";
		}elseif($info['admin_state']==0){
	
			echo "<script>
				alert('회원 가입이 진행 중입니다. 관리자에게 승인을 요청 하세요. ');
				parent.location.replace('/BIAS/');
			</script> ";
		
		
		
	
	}elseif($info['admin_state']==2){
	
		echo "<script>
			alert('퇴사자는 사용이 불가능 합니다.');
			parent.location.replace('/BIAS/');
		</script> ";
	
	
	
	}else {



	if($info['admin_pw']==MD5($admin_pw)){
			


			$_SESSION['admin_idx']	 = $info['admin_idx'];
			$_SESSION['admin_id']	 = $info['admin_id'];
			$_SESSION['admin_name']  = $info['admin_name'];
			$_SESSION['admin_lv']	 = $info['admin_lv'];
			$_SESSION['division_idx']	 = $info['division_idx'];
			$_SESSION['jira_id']	 = $info['jira_id'];
			

			$sql	 = "update admin_member set 
						lasted_login = '".$now_time."'
			
			where admin_id ='".$admin_id."';";
			$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));

			
			
			echo "<script>
				alert('환영합니다.');
				parent.location.replace('/BIAS/home.php');
			</script> ";



	}else {
	
			echo "<script>
			alert('비밀번호를 확인하세요. ');
			parent.location.replace('/BIAS/');
			</script> ";
		
	}

}




?>	