<?php
	include_once('../../lib/session.php');
	include_once('../../lib/dbcon_BIAS.php');
	include_once('../../contents_header.php');
	include_once('../../contents_profile.php');
	include_once('../../contents_sidebar.php');
?>





			<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
					<?php
					$array = array(
						array('홈','건축물 대장 표제부')
					);
					breadcrumb($array);
					?>
			<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">건축물 대장 표제부
					</div>

					<div class="panel-body">

<?php

	$sigunguCd = isset($_GET['sigunguCd']) ? $_GET['sigunguCd'] : 11260;
	$bjdongCd = isset($_GET['bjdongCd']) ? $_GET['bjdongCd'] : 10100;
	$platGbCd = isset($_GET['platGbCd']) ? $_GET['platGbCd'] : 0;
	$bun = isset($_GET['bun']) ? $_GET['bun'] : '1527';
    
	$ji = isset($_GET['ji']) ? $_GET['ji'] : '0000';
	$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : 20000101;
	$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : date("Ymd");
	$numOfRows = isset($_GET['numOfRows']) ? $_GET['numOfRows'] : 100;
	$pageNo = isset($_GET['pageNo']) ? $_GET['pageNo'] : 1;

	$dongNm = isset($_GET['dongNm']) ? $_GET['dongNm'] : '102동';
	$hoNm = isset($_GET['hoNm']) ? $_GET['hoNm'] : 201;



	$want_array = array(
		array('sigunguCd','시군구코드',$sigunguCd,'행정표준코드'),
		array('bjdongCd','법정동코드',$bjdongCd,'행정표준코드'),
		array('platGbCd','대지구분코드',$platGbCd,'0:대지 1:산 2:블록'),
		array('bun','번',$bun,'번(4자리로 입력, 4면 00004)'),
		array('ji','지',$ji,'지 (4자리로 입력, 4면 00004)'),
		array('dongNm','동',$dongNm,'동'),
		array('hoNm','호',$hoNm,'호'),
	
	
	
		array('startDate','검색시작일',$startDate,'YYYYMMDD'),
		array('endDate','검색종료일',$endDate,'YYYYMMDD'),
		array('numOfRows','리스트수',$numOfRows,'페이지당 목록수'),
		array('pageNo','페이지번호',$pageNo,'페이지번호')	
		
	);

?>


			<form name="frm" role="form" method="get" action="#">
						<table border= 1 width = 100%>		
							<thead>
								<tr>
									<th>	항목명</th>
									<th>	샘플 데이터</th>
									<th>	설명</th>
								</tr>
							<thead>
							<tbody bgcolor = 'E0E0E0'>	

								<?php 

								
									for($hd_api_i = 0 ; $hd_api_i < count($want_array) ;$hd_api_i++){
										$temps_array = $want_array[$hd_api_i];
										echo "
											<tr>
												<td>".$temps_array[1]."</td>
												<td><input class='form-control'  name='".$temps_array[0]."' value ='".$temps_array[2]."'  style='background-color: #CCFFFF;'  ></td>
												<td>".$temps_array[3]."</td>											
											</tr>		
										";

									}
								
								
								?>
							<tr bgcolor = 'white'>
								<td colspan=3>
							   		<input  type='submit' class="btn btn-success login-btn" type="submit" value="미리보기" style='width : 100%'  >
								</td>
							</tr>			


							<tbody>	
						</table>
					

					</form>	

					</div>
				</div>
			</div>


<?php 



	if($sigunguCd != Null){								

?>



			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">결과					</div>
					<?php 


						
					
						$serviceKey = 'ZRsZF%2FzuUlEALtEeik3hz8Pa14i1Ow3j1SegtsGoqdAGbSbA7PYNa%2Bx3Xse1Iy2DemohfDRE2pwOb6OT0P%2Fiow%3D%3D';
						
						$url = "http://apis.data.go.kr/1613000/BldRgstService_v2/getBrExposPubuseAreaInfo?serviceKey=".$serviceKey;
						$url = $url.'&sigunguCd='.$sigunguCd;
						$url = $url.'&bjdongCd='.$bjdongCd;
						$url = $url.'&platGbCd='.$platGbCd;
						$url = $url.'&bun='.$bun;
						$url = $url.'&ji='.$ji;
						$url = $url.'&startDate='.$startDate;
						$url = $url.'&endDate='.$endDate;
						$url = $url.'&numOfRows='.$numOfRows;
						$url = $url.'&pageNo='.$pageNo;
						$url = $url.'&dongNm='.urlencode($dongNm);
						$url = $url.'&hoNm='.urlencode($hoNm);
						


						
						$response = file_get_contents($url);
						$object = simplexml_load_string($response);
						
						
						$totalCount = $object->body->totalCount; 	
						
						
						

						$want_text ='';
						for($ii = 0 ; $ii < $totalCount ; $ii++){
							$want_text = $want_text."<br>~~~~~~~~~데이터 구분~~~~~~~~~~~~~<br>";
							$data_arr = $object->body->items->item[$ii]; 	
							
							$rnum = $data_arr -> rnum;		$want_text=$want_text.'<br><b>순번</b>    : '.$rnum;
							$platPlc = $data_arr -> platPlc;		$want_text=$want_text.'<br><b>대지위치</b>    : '.$platPlc;
							$sigunguCd = $data_arr -> sigunguCd;		$want_text=$want_text.'<br><b>시군구코드</b>    : '.$sigunguCd;
							$bjdongCd = $data_arr -> bjdongCd;		$want_text=$want_text.'<br><b>법정동코드</b>    : '.$bjdongCd;
							$platGbCd = $data_arr -> platGbCd;		$want_text=$want_text.'<br><b>대지구분코드</b>    : '.$platGbCd;
							$bun = $data_arr -> bun;		$want_text=$want_text.'<br><b>번</b>    : '.$bun;
							$ji = $data_arr -> ji;		$want_text=$want_text.'<br><b>지</b>    : '.$ji;
							$mgmBldrgstPk = $data_arr -> mgmBldrgstPk;		$want_text=$want_text.'<br><b>관리건축물대장PK</b>    : '.$mgmBldrgstPk;
							$regstrGbCd = $data_arr -> regstrGbCd;		$want_text=$want_text.'<br><b>대장구분코드</b>    : '.$regstrGbCd;
							$regstrGbCdNm = $data_arr -> regstrGbCdNm;		$want_text=$want_text.'<br><b>대장구분코드명</b>    : '.$regstrGbCdNm;
							$regstrKindCd = $data_arr -> regstrKindCd;		$want_text=$want_text.'<br><b>대장종류코드</b>    : '.$regstrKindCd;
							$regstrKindCdNm = $data_arr -> regstrKindCdNm;		$want_text=$want_text.'<br><b>대장종류코드명</b>    : '.$regstrKindCdNm;
							$newPlatPlc = $data_arr -> newPlatPlc;		$want_text=$want_text.'<br><b>도로명대지위치</b>    : '.$newPlatPlc;
							$bldNm = $data_arr -> bldNm;		$want_text=$want_text.'<br><b>건물명</b>    : '.$bldNm;
							$splotNm = $data_arr -> splotNm;		$want_text=$want_text.'<br><b>특수지명</b>    : '.$splotNm;
							$block = $data_arr -> block;		$want_text=$want_text.'<br><b>블록</b>    : '.$block;
							$lot = $data_arr -> lot;		$want_text=$want_text.'<br><b>로트</b>    : '.$lot;
							$naRoadCd = $data_arr -> naRoadCd;		$want_text=$want_text.'<br><b>새주소도로코드</b>    : '.$naRoadCd;
							$naBjdongCd = $data_arr -> naBjdongCd;		$want_text=$want_text.'<br><b>새주소법정동코드</b>    : '.$naBjdongCd;
							$naUgrndCd = $data_arr -> naUgrndCd;		$want_text=$want_text.'<br><b>새주소지상지하코드</b>    : '.$naUgrndCd;
							$naMainBun = $data_arr -> naMainBun;		$want_text=$want_text.'<br><b>새주소본번</b>    : '.$naMainBun;
							$naSubBun = $data_arr -> naSubBun;		$want_text=$want_text.'<br><b>새주소부번</b>    : '.$naSubBun;
							$dongNm = $data_arr -> dongNm;		$want_text=$want_text.'<br><b>동명칭</b>    : '.$dongNm;
							$hoNm = $data_arr -> hoNm;		$want_text=$want_text.'<br><b>호명칭</b>    : '.$hoNm;
							$flrGbCd = $data_arr -> flrGbCd;		$want_text=$want_text.'<br><b>층구분코드</b>    : '.$flrGbCd;
							$flrGbCdNm = $data_arr -> flrGbCdNm;		$want_text=$want_text.'<br><b>층구분코드명</b>    : '.$flrGbCdNm;
							$flrNo = $data_arr -> flrNo;		$want_text=$want_text.'<br><b>층번호</b>    : '.$flrNo;
							$flrNoNm = $data_arr -> flrNoNm;		$want_text=$want_text.'<br><b>층번호명</b>    : '.$flrNoNm;
							$exposPubuseGbCd = $data_arr -> exposPubuseGbCd;		$want_text=$want_text.'<br><b>전유공용구분코드</b>    : '.$exposPubuseGbCd;
							$exposPubuseGbCdNm = $data_arr -> exposPubuseGbCdNm;		$want_text=$want_text.'<br><b>전유공용구분코드명</b>    : '.$exposPubuseGbCdNm;
							$mainAtchGbCd = $data_arr -> mainAtchGbCd;		$want_text=$want_text.'<br><b>주부속구분코드</b>    : '.$mainAtchGbCd;
							$mainAtchGbCdNm = $data_arr -> mainAtchGbCdNm;		$want_text=$want_text.'<br><b>주부속구분코드명</b>    : '.$mainAtchGbCdNm;
							$strctCd = $data_arr -> strctCd;		$want_text=$want_text.'<br><b>구조코드</b>    : '.$strctCd;
							$strctCdNm = $data_arr -> strctCdNm;		$want_text=$want_text.'<br><b>구조코드명</b>    : '.$strctCdNm;
							$etcStrct = $data_arr -> etcStrct;		$want_text=$want_text.'<br><b>기타구조</b>    : '.$etcStrct;
							$mainPurpsCd = $data_arr -> mainPurpsCd;		$want_text=$want_text.'<br><b>주용도코드</b>    : '.$mainPurpsCd;
							$mainPurpsCdNm = $data_arr -> mainPurpsCdNm;		$want_text=$want_text.'<br><b>주용도코드명</b>    : '.$mainPurpsCdNm;
							$etcPurps = $data_arr -> etcPurps;		$want_text=$want_text.'<br><b>기타용도</b>    : '.$etcPurps;
							$area = $data_arr -> area;		$want_text=$want_text.'<br><b>면적(㎡)</b>    : '.$area;
							$crtnDay = $data_arr -> crtnDay;		$want_text=$want_text.'<br><b>생성일자</b>    : '.$crtnDay;
							

						}
						
						
						
echo $want_text;


						
					?>



					<div class="panel-body">	</div>
				</div>					
			</div>
		 
  <?php	
	}
  ?>

	
	</div>
</div>	<!--/.main-->

	
<!--Modal-->
<?php include_once('../../contents_footer.php');


?>


