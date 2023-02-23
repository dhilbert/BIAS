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

	$sigunguCd = isset($_GET['sigunguCd']) ? $_GET['sigunguCd'] : 11680;
	$bjdongCd = isset($_GET['bjdongCd']) ? $_GET['bjdongCd'] : 10300;
	$platGbCd = isset($_GET['platGbCd']) ? $_GET['platGbCd'] : 0;
	$bun = isset($_GET['bun']) ? $_GET['bun'] : '0012';
    
	$ji = isset($_GET['ji']) ? $_GET['ji'] : '0000';
	$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : 20000101;
	$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : date("Ymd");
	$numOfRows = isset($_GET['numOfRows']) ? $_GET['numOfRows'] : 10;
	$pageNo = isset($_GET['pageNo']) ? $_GET['pageNo'] : 1;


	$want_array = array(
		array('sigunguCd','시군구코드',$sigunguCd,'행정표준코드'),
		array('bjdongCd','법정동코드',$bjdongCd,'행정표준코드'),
		array('platGbCd','대지구분코드',$platGbCd,'0:대지 1:산 2:블록'),
		array('bun','번',$bun,'번(4자리로 입력, 4면 00004)'),
		array('ji','지',$ji,'지 (4자리로 입력, 4면 00004)'),
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
						
						$url = "https://apis.data.go.kr/1613000/BldRgstService_v2/getBrTitleInfo?serviceKey=".$serviceKey;
						$url = $url.'&sigunguCd='.$sigunguCd;
						$url = $url.'&bjdongCd='.$bjdongCd;
						$url = $url.'&platGbCd='.$platGbCd;
						$url = $url.'&bun='.$bun;
						$url = $url.'&ji='.$ji;
						$url = $url.'&startDate='.$startDate;
						$url = $url.'&endDate='.$endDate;
						$url = $url.'&numOfRows='.$numOfRows;
						$url = $url.'&pageNo='.$pageNo;
						


						$response = file_get_contents($url);
						$object = simplexml_load_string($response);
						
						
						$totalCount = $object->body->totalCount; 	

						
						

						
						for($ii = 0 ; $ii < $totalCount ; $ii++){
							echo "<br>~~~~~~~~~데이터 구분~~~~~~~~~~~~~<br>";
							$data_arr = $object->body->items->item[$ii]; 	
							$rnum = $data_arr -> rnum;		echo '<br><b>순번</b>    : '.$rnum;
$platPlc = $data_arr -> platPlc;		echo '<br><b>대지위치</b>    : '.$platPlc;
$sigunguCd = $data_arr -> sigunguCd;		echo '<br><b>시군구코드</b>    : '.$sigunguCd;
$bjdongCd = $data_arr -> bjdongCd;		echo '<br><b>법정동코드</b>    : '.$bjdongCd;
$platGbCd = $data_arr -> platGbCd;		echo '<br><b>대지구분코드</b>    : '.$platGbCd;
$bun = $data_arr -> bun;		echo '<br><b>번</b>    : '.$bun;
$ji = $data_arr -> ji;		echo '<br><b>지</b>    : '.$ji;
$mgmBldrgstPk = $data_arr -> mgmBldrgstPk;		echo '<br><b>관리건축물대장PK</b>    : '.$mgmBldrgstPk;
$regstrGbCd = $data_arr -> regstrGbCd;		echo '<br><b>대장구분코드</b>    : '.$regstrGbCd;
$regstrGbCdNm = $data_arr -> regstrGbCdNm;		echo '<br><b>대장구분코드명</b>    : '.$regstrGbCdNm;
$regstrKindCd = $data_arr -> regstrKindCd;		echo '<br><b>대장종류코드</b>    : '.$regstrKindCd;
$regstrKindCdNm = $data_arr -> regstrKindCdNm;		echo '<br><b>대장종류코드명</b>    : '.$regstrKindCdNm;
$newPlatPlc = $data_arr -> newPlatPlc;		echo '<br><b>도로명대지위치</b>    : '.$newPlatPlc;
$bldNm = $data_arr -> bldNm;		echo '<br><b>건물명</b>    : '.$bldNm;
$splotNm = $data_arr -> splotNm;		echo '<br><b>특수지명</b>    : '.$splotNm;
$block = $data_arr -> block;		echo '<br><b>블록</b>    : '.$block;
$lot = $data_arr -> lot;		echo '<br><b>로트</b>    : '.$lot;
$bylotCnt = $data_arr -> bylotCnt;		echo '<br><b>외필지수</b>    : '.$bylotCnt;
$naRoadCd = $data_arr -> naRoadCd;		echo '<br><b>새주소도로코드</b>    : '.$naRoadCd;
$naBjdongCd = $data_arr -> naBjdongCd;		echo '<br><b>새주소법정동코드</b>    : '.$naBjdongCd;
$naUgrndCd = $data_arr -> naUgrndCd;		echo '<br><b>새주소지상지하코드</b>    : '.$naUgrndCd;
$naMainBun = $data_arr -> naMainBun;		echo '<br><b>새주소본번</b>    : '.$naMainBun;
$naSubBun = $data_arr -> naSubBun;		echo '<br><b>새주소부번</b>    : '.$naSubBun;
$dongNm = $data_arr -> dongNm;		echo '<br><b>동명칭</b>    : '.$dongNm;
$mainAtchGbCd = $data_arr -> mainAtchGbCd;		echo '<br><b>주부속구분코드</b>    : '.$mainAtchGbCd;
$mainAtchGbCdNm = $data_arr -> mainAtchGbCdNm;		echo '<br><b>주부속구분코드명</b>    : '.$mainAtchGbCdNm;
$platArea = $data_arr -> platArea;		echo '<br><b>대지면적(㎡)</b>    : '.$platArea;
$archArea = $data_arr -> archArea;		echo '<br><b>건축면적(㎡)</b>    : '.$archArea;
$bcRat = $data_arr -> bcRat;		echo '<br><b>건폐율(%)</b>    : '.$bcRat;
$totArea = $data_arr -> totArea;		echo '<br><b>연면적(㎡)</b>    : '.$totArea;
$vlRatEstmTotArea = $data_arr -> vlRatEstmTotArea;		echo '<br><b>용적률산정연면적(㎡)</b>    : '.$vlRatEstmTotArea;
$vlRat = $data_arr -> vlRat;		echo '<br><b>용적률(%)</b>    : '.$vlRat;
$strctCd = $data_arr -> strctCd;		echo '<br><b>구조코드</b>    : '.$strctCd;
$strctCdNm = $data_arr -> strctCdNm;		echo '<br><b>구조코드명</b>    : '.$strctCdNm;
$etcStrct = $data_arr -> etcStrct;		echo '<br><b>기타구조</b>    : '.$etcStrct;
$mainPurpsCd = $data_arr -> mainPurpsCd;		echo '<br><b>주용도코드</b>    : '.$mainPurpsCd;
$mainPurpsCdNm = $data_arr -> mainPurpsCdNm;		echo '<br><b>주용도코드명</b>    : '.$mainPurpsCdNm;
$etcPurps = $data_arr -> etcPurps;		echo '<br><b>기타용도</b>    : '.$etcPurps;
$roofCd = $data_arr -> roofCd;		echo '<br><b>지붕코드</b>    : '.$roofCd;
$roofCdNm = $data_arr -> roofCdNm;		echo '<br><b>지붕코드명</b>    : '.$roofCdNm;
$etcRoof = $data_arr -> etcRoof;		echo '<br><b>기타지붕</b>    : '.$etcRoof;
$hhldCnt = $data_arr -> hhldCnt;		echo '<br><b>세대수(세대)</b>    : '.$hhldCnt;
$fmlyCnt = $data_arr -> fmlyCnt;		echo '<br><b>가구수(가구)</b>    : '.$fmlyCnt;
$heit = $data_arr -> heit;		echo '<br><b>높이(m)</b>    : '.$heit;
$grndFlrCnt = $data_arr -> grndFlrCnt;		echo '<br><b>지상층수</b>    : '.$grndFlrCnt;
$ugrndFlrCnt = $data_arr -> ugrndFlrCnt;		echo '<br><b>지하층수</b>    : '.$ugrndFlrCnt;
$rideUseElvtCnt = $data_arr -> rideUseElvtCnt;		echo '<br><b>승용승강기수</b>    : '.$rideUseElvtCnt;
$emgenUseElvtCnt = $data_arr -> emgenUseElvtCnt;		echo '<br><b>비상용승강기수</b>    : '.$emgenUseElvtCnt;
$atchBldCnt = $data_arr -> atchBldCnt;		echo '<br><b>부속건축물수</b>    : '.$atchBldCnt;
$atchBldArea = $data_arr -> atchBldArea;		echo '<br><b>부속건축물면적(㎡)</b>    : '.$atchBldArea;
$totDongTotArea = $data_arr -> totDongTotArea;		echo '<br><b>총동연면적(㎡)</b>    : '.$totDongTotArea;
$indrMechUtcnt = $data_arr -> indrMechUtcnt;		echo '<br><b>옥내기계식대수(대)</b>    : '.$indrMechUtcnt;
$indrMechArea = $data_arr -> indrMechArea;		echo '<br><b>옥내기계식면적(㎡)</b>    : '.$indrMechArea;
$oudrMechUtcnt = $data_arr -> oudrMechUtcnt;		echo '<br><b>옥외기계식대수(대)</b>    : '.$oudrMechUtcnt;
$oudrMechArea = $data_arr -> oudrMechArea;		echo '<br><b>옥외기계식면적(㎡)</b>    : '.$oudrMechArea;
$indrAutoUtcnt = $data_arr -> indrAutoUtcnt;		echo '<br><b>옥내자주식대수(대)</b>    : '.$indrAutoUtcnt;
$indrAutoArea = $data_arr -> indrAutoArea;		echo '<br><b>옥내자주식면적(㎡)</b>    : '.$indrAutoArea;
$oudrAutoUtcnt = $data_arr -> oudrAutoUtcnt;		echo '<br><b>옥외자주식대수(대)</b>    : '.$oudrAutoUtcnt;
$oudrAutoArea = $data_arr -> oudrAutoArea;		echo '<br><b>옥외자주식면적(㎡)</b>    : '.$oudrAutoArea;
$pmsDay = $data_arr -> pmsDay;		echo '<br><b>허가일</b>    : '.$pmsDay;
$stcnsDay = $data_arr -> stcnsDay;		echo '<br><b>착공일</b>    : '.$stcnsDay;
$useAprDay = $data_arr -> useAprDay;		echo '<br><b>사용승인일</b>    : '.$useAprDay;
$pmsnoYear = $data_arr -> pmsnoYear;		echo '<br><b>허가번호년</b>    : '.$pmsnoYear;
$pmsnoKikCd = $data_arr -> pmsnoKikCd;		echo '<br><b>허가번호기관코드</b>    : '.$pmsnoKikCd;
$pmsnoKikCdNm = $data_arr -> pmsnoKikCdNm;		echo '<br><b>허가번호기관코드명</b>    : '.$pmsnoKikCdNm;
$pmsnoGbCd = $data_arr -> pmsnoGbCd;		echo '<br><b>허가번호구분코드</b>    : '.$pmsnoGbCd;
$pmsnoGbCdNm = $data_arr -> pmsnoGbCdNm;		echo '<br><b>허가번호구분코드명</b>    : '.$pmsnoGbCdNm;
$hoCnt = $data_arr -> hoCnt;		echo '<br><b>호수(호)</b>    : '.$hoCnt;
$engrGrade = $data_arr -> engrGrade;		echo '<br><b>에너지효율등급</b>    : '.$engrGrade;
$engrRat = $data_arr -> engrRat;		echo '<br><b>에너지절감율</b>    : '.$engrRat;
$engrEpi = $data_arr -> engrEpi;		echo '<br><b>EPI점수</b>    : '.$engrEpi;
$gnBldGrade = $data_arr -> gnBldGrade;		echo '<br><b>친환경건축물등급</b>    : '.$gnBldGrade;
$gnBldCert = $data_arr -> gnBldCert;		echo '<br><b>친환경건축물인증점수</b>    : '.$gnBldCert;
$itgBldGrade = $data_arr -> itgBldGrade;		echo '<br><b>지능형건축물등급</b>    : '.$itgBldGrade;
$itgBldCert = $data_arr -> itgBldCert;		echo '<br><b>지능형건축물인증점수</b>    : '.$itgBldCert;
$crtnDay = $data_arr -> crtnDay;		echo '<br><b>생성일자</b>    : '.$crtnDay;
$rserthqkDsgnApplyYn = $data_arr -> rserthqkDsgnApplyYn;		echo '<br><b>내진 설계 적용 여부</b>    : '.$rserthqkDsgnApplyYn;
$rserthqkAblty = $data_arr -> rserthqkAblty;		echo '<br><b>내진 능력</b>    : '.$rserthqkAblty;


						}
						
						
						

						
/*
						for($ii = 0 ; $ii < count($arr['body']['items']) ;$ii ++ ){
							
							
							for($jj = 0 ; $jj < count($arr['body']['items'][$ii]) ;$jj ++ ){
								
								echo "<br><b>".$arr['header']['columns'][$jj]."</b> : ".$arr['body']['items'][$ii][$temp_name[$jj]];
								

							}		
						}
*/						


						
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


