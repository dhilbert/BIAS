<?php
	include_once('../lib/session.php');
	include_once('../lib/dbcon_BIAS.php');
	include_once('../contents_header.php');
	include_once('../contents_profile.php');
	include_once('../contents_sidebar.php');

	
function hd_temps_test0($temps){
	echo "<tr>";
		for($i = 0 ; $i < count($temps) ; $i++){
			echo "<td>".$temps[$i]."</td>";


		}

	echo "</tr>";

}


	$idx = isset($_GET['idx']) ? $_GET['idx'] : 1;




	$dohocheck = array();
	$sql	 = "select 	*
	
		from api_test_gun_2
		
		
		where idx = ".$idx.";";
	$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));
	$main_info	 = mysqli_fetch_array($res);

	$sigunguCd 	=  $main_info['sigunguCd'];
	$bjdongCd 	=  $main_info['bjdongCd'];
	$bun 		=  $main_info['bun'];
	$ji			=  $main_info['ji'];





	// 토지 임야 대장!!!
	$pnu = $main_info['sigunguCd'].$main_info['bjdongCd']."1".$main_info['bun'].$main_info['ji'];
	$serviceKey = 'ZRsZF%2FzuUlEALtEeik3hz8Pa14i1Ow3j1SegtsGoqdAGbSbA7PYNa%2Bx3Xse1Iy2DemohfDRE2pwOb6OT0P%2Fiow%3D%3D';
	$url = "https://apis.data.go.kr/1611000/nsdi/eios/LadfrlService/ladfrlList.xml?serviceKey=".$serviceKey."&pnu=".$pnu."&numOfRows=20&pageNo=1";
	$response = file_get_contents($url);
	$object = simplexml_load_string($response);
	$data_arr = $object->ladfrlVOList[0]; 				
	$lndcgrCodeNm = $data_arr -> lndcgrCodeNm;
	$lndpclAr = $data_arr -> lndpclAr;

	/*
	대지권 등록 조회 삭제
	$numOfRows = 100;		$pageNo = 1;
	$temp_hoNm = $main_info['hoNm'];
	$serviceKey = 'ZRsZF%2FzuUlEALtEeik3hz8Pa14i1Ow3j1SegtsGoqdAGbSbA7PYNa%2Bx3Xse1Iy2DemohfDRE2pwOb6OT0P%2Fiow%3D%3D';

	$url = "https://apis.data.go.kr/1611000/nsdi/eios/LdaregService/buldHoCoList.xml?serviceKey=".$serviceKey."&pnu=".$pnu."&numOfRows=".$numOfRows."&pageNo=".$pageNo;
	if($main_info['dongNm']!=Null or ''){
		$url = $url."&buldDongNm=".urlencode($main_info['dongNm']);
	}
	if($main_info['hoNm']!=Null or ''){
		$url = $url."&buldHoNm=".urlencode($temp_hoNm);
	}
	

	$response = file_get_contents($url);
	$object = simplexml_load_string($response);
	
	$data_arr = $object->LdaregVOList[0]; 		
	if(	$data_arr !=Null){
		$ldaQotaRate = $data_arr -> ldaQotaRate;
	}
	else{
		$ldaQotaRate = "<font color ='red'>대지권 정보 없음</font>";

	}
	
	전유부 면적 구하는 거 
	$total_area =0;
	$max_area = 0;
		$area_sql	 = "
		SELECT area,mainAtchGbCd
		from api_test_gun_5		
		where sigunguCd = '".$sigunguCd."'
		and bjdongCd = '".$bjdongCd."'
		and bun = '".$bun."'
		and ji = '".$ji."'
		and hoNm = '".$hoNm."'
		and dongNm = '".$dongNm."';";
		

		$area_res	=  mysqli_query($real_sock,$area_sql) or die(mysqli_error($real_sock));
		while($area_info	 = mysqli_fetch_array($area_res)){
			if($area_info['mainAtchGbCd']==0){
				$total_area +=$area_info['area'];
				if($area_info['area']>$max_area){
					$max_area = $area_info['area'];
				}
				else{
					$max_area = $max_area;
				}
			}
			
		}

*/


?>










			<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
					<?php
					$array = array(
						array('홈','상세화면')
					);
					breadcrumb($array);
					?>
			<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading"><?php echo $main_info['platPlc']."  ".$dongNm."  ".$hoNm ; 
						 		
						 
					
					?>			
					
					
					</div>
					

					<div class="panel-body">
					식별자<br> 
					<?php 





						echo "PNU : ".$pnu."<br>";
						echo "시군구코드: ".$sigunguCd."<br>";
						echo "읍면동코드 : ".$bjdongCd."<br>";
						echo "번  : ".$bun."<br>";
						echo "지  : ".$ji."<br>";
						


						echo "개인서버 idx  : ".$idx."<br>";
					
					
						?>	


					<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
							<thead>
								<tr>
									<?php	



										$names_array = array("NO","정보명",'데이터','데이터 출처','영문컬럼명','비고'				)	;
										$num=0;
										
																
										$name=$names_array[$num];hd_thead_th($num,$name);$num+=1;
										$name=$names_array[$num];hd_thead_th($num,$name);$num+=1;
										$name=$names_array[$num];hd_thead_th($num,$name);$num+=1;
										$name=$names_array[$num];hd_thead_th($num,$name);$num+=1;
										$name=$names_array[$num];hd_thead_th($num,$name);$num+=1;
										$name=$names_array[$num];hd_thead_th($num,$name);

										
									?>
								

								</tr>
							</thead>
							<tbody>
							<?php 

								$temps = array('04.01','소재지', $main_info['platPlc'],'이실장 주소 규칙에 따름','','');
								hd_temps_test0($temps);

								$want_text = "pnu = sigunguCd+bjdongCd+1+bun+ji ";
								
								
								$temps = array('04.02','토지>지목',$lndcgrCodeNm,'토지임야대장','lndcgrCodeNm',$want_text);
								hd_temps_test0($temps);


								$temps = array('04.03','토지>면적',$lndpclAr,'토지임야대장','lndpclAr','');
								hd_temps_test0($temps);


								/*
								$temps = array('04.04','토지>대지권 종류','- ','','','등기부등본상에 표시, KMS 문의 필요');
								hd_temps_test0($temps);

								$temps = array('04.05','토지>대지권 비율',$ldaQotaRate,'대지권등록정보 조회','ldaQotaRate','');
								hd_temps_test0($temps);	

								*/




								$temps = array('04.06','건물>구조',	$main_info['strctCdNm'],'건축물대장 > 표제부','strctCdNm','');
								hd_temps_test0($temps);	

								$temps = array('04.07','건물>용도',	$main_info['mainPurpsCdNm'],'건축물대장 > 표제부','mainPurpsCdNm','');
								hd_temps_test0($temps);	
							

								
								$temps = array('04.07','건물>용도',	$main_info['etcPurps'],'건축물대장 > 표제부','etcPurps','');
								
	
								hd_temps_test0($temps);	

								$temps = array(' -','건물 > 면적(공급)','','','','건축물대장으로 산출 불가능');
								hd_temps_test0($temps);									

								$temps = array(' -','건물 > 면적(전용)',''	,'','','건축물대장으로 산출 불가능');
								hd_temps_test0($temps);									

								/*
								$temps = array(' -','건물 > 면적(공급)',	$total_area,'건축물대장 > 전유부','area 값의 합','');
								hd_temps_test0($temps);									

								$temps = array(' -','건물 > 면적(전용)',$max_area 	,'건축물대장 > 전유부','Max(area)','');
								hd_temps_test0($temps);									
*/
							?>
							</tbody>
					</table>							























					</div>
				</div>
			</div>



		 
  

	
	</div>
</div>	<!--/.main-->

	
<!--Modal-->
<?php include_once('../contents_footer.php');


?>

