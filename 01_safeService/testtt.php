<?php
	include_once('../lib/session.php');
	include_once('../lib/dbcon_BIAS.php');

	function temp_hd_ft($page){
	
		$perPage = 100;
		$serviceKey = 'ZRsZF%2FzuUlEALtEeik3hz8Pa14i1Ow3j1SegtsGoqdAGbSbA7PYNa%2Bx3Xse1Iy2DemohfDRE2pwOb6OT0P%2Fiow%3D%3D';
		$url = "https://api.odcloud.kr/api/15063424/v1/uddi:6d7fd177-cc7d-426d-ba80-9b137edf6066?serviceKey=".$serviceKey."&page=".$page."&perPage=".$perPage;
		$response = file_get_contents($url);
		$arr = json_decode($response,true);
		return $arr;
	

	}

	$t_sql	 = " truncate  main_add ";
	$t_res	=  mysqli_query($real_sock,$t_sql) or die(mysqli_error($real_sock));

	$page=1;
	$arr = temp_hd_ft($page);
	$total_count = floor($arr['totalCount']/100);

	
	


	for($page = 1 ; $page <$total_count+1 ;  $page++){
		$temp_arr = temp_hd_ft($page);


		for($i = 0 ;  $i < 100 ; $i++){
			$arr = $temp_arr['data'][$i];
			
			$sigunguCd  = floor($arr['법정동코드']/100000);
			$bjdongCd   = $arr['법정동코드']- floor($arr['법정동코드']/100000)*100000;
			$sql	 = " insert  main_add set 
			
			
			pre_main_code	 = '".$arr['과거법정동코드']."',
			main_code		 = '".$arr['법정동코드']."',
			deldate		 	 = '".$arr['삭제일자']."',
			genarationdate	 = '".$arr['생성일자']."',
			name_2			 = '".$arr['시군구명']."',
			name_1			 = '".$arr['시도명']."',
			name_3			 = '".$arr['읍면동명']."',
			name_4			 = '".$arr['리명']."',
			bjdongCd   		 = '".$bjdongCd."',
			sigunguCd   	 = '".$sigunguCd."'
			
			";
			if($arr['삭제일자'] ==''){
				$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));
			}
		}
		
		


	}








	echo "<script>
	alert('재설정 완료');
	parent.location.replace('/BIAS/01_safeService/test000.php');
	</script> ";
						
						
						

?>