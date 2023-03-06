<?php
	include_once('../lib/session.php');
	include_once('../lib/dbcon_BIAS.php');

	function temp_hd_ft($LAWD_CD,$DEAL_YMD){
	
		
		$serviceKey = 'ZRsZF%2FzuUlEALtEeik3hz8Pa14i1Ow3j1SegtsGoqdAGbSbA7PYNa%2Bx3Xse1Iy2DemohfDRE2pwOb6OT0P%2Fiow%3D%3D';
		$url = "http://openapi.molit.go.kr:8081/OpenAPI_ToolInstallPackage/service/rest/RTMSOBJSvc/getRTMSDataSvcSHTrade?serviceKey=".$serviceKey."&LAWD_CD=".$LAWD_CD."&DEAL_YMD=".$DEAL_YMD;
		$response = file_get_contents($url);
	
		$object = simplexml_load_string($response);
		

		$data_arr =$object -> body -> items ->item;

	
		
		$total_count = count($data_arr);
		$data_arr =$object -> body -> items;
		$want_array = array($total_count,$data_arr);
	

		return $want_array;
	

	}

	$main_sql	 = "SELECT * FROM main_add AS a 
					WHERE floor(a.sigunguCd/1000) = 11
					AND a.bjdongCd = 0 Limit 1
					";
	$main_res	=  mysqli_query($real_sock,$main_sql) or die(mysqli_error($real_sock));
	while($main_info	 = mysqli_fetch_array($main_res)){
		$LAWD_CD = $main_info['sigunguCd'];
		for($year = 2020 ;$year<2024 ; $year++ ){
			for($month = 1 ;$month<13 ; $month++ ){
				$DEAL_YMD =$year*100+ $month;
				
				$want_array = temp_hd_ft($LAWD_CD,$DEAL_YMD);	
				$want_sql = 'INSERT INTO lease_da(DealAmount,Plottage,	Dong,TotalFloorArea,TRanTotalFloorArea,	DealMonth,	DealDay,HouseType,sigunguCd,Dealyear	)
				Values ';

				for($i =0 ; $i <  $want_array[0]   ;$i++ ){

					$data_arr =$want_array[1] ->item[$i];
					
					$DealAmount = $data_arr ->거래금액 ;
					$Plottage	= $data_arr ->대지면적;
					$Dong	= $data_arr->동;
					$TotalFloorArea= $data_arr->연면적;
					$TRanTotalFloorArea= floor($TotalFloorArea/33)*10;
					$DealMonth= $data_arr->월;
					$DealDay= $data_arr->일;
					$HouseType= $data_arr->주택유형;
					$sigunguCd= $LAWD_CD;
					

					$want_sql =$want_sql."('".$DealAmount."','".$Plottage."','".$Dong."','".$TotalFloorArea."','".$TRanTotalFloorArea."','".$DealMonth."','".$DealDay."','".$HouseType."','".$sigunguCd."','".$year ."'),";


				}
				if($want_array[0] ==0){}
				else{
					$want_sql = substr($want_sql, 0, -1);
					$want_res	=  mysqli_query($real_sock,$want_sql) or die(mysqli_error($real_sock));
				}


				break;


			

				if($year==2023 and $month == 2){
					break;
				}
				
				

			}
		}


	};


	
	
	
	
	
	
	
	
	
	
	
	/*


	$LAWD_CD = '11350';
	$DEAL_YMD = '202111';
	$want_array = temp_hd_ft($LAWD_CD,$DEAL_YMD);	
	$data_arr =$want_array[1] ->item[0];
	print_r($data_arr);;







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
			name_1			 = '".$arr['시군구명']."',
			name_2			 = '".$arr['시도명']."',
			name_3			 = '".$arr['읍면동명']."',
			name_4			 = '".$arr['리명']."',
			bjdongCd   		 = '".$bjdongCd."',
			sigunguCd   	 = '".$sigunguCd."'
			
			";
			$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));
		}
		
		


	}

	*/







						
						
						

?>