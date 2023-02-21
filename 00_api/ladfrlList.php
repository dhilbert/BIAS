<?php
	include_once('../lib/session.php');
	include_once('../lib/dbcon_BIAS.php');
	include_once('../contents_header.php');
	include_once('../contents_profile.php');
	include_once('../contents_sidebar.php');
?>




<!--

https://apis.data.go.kr/B553077/api/open/sdsc2/storeZoneOne?
serviceKey=ZRsZF%2FzuUlEALtEeik3hz8Pa14i1Ow3j1SegtsGoqdAGbSbA7PYNa%2Bx3Xse1Iy2DemohfDRE2pwOb6OT0P%2Fiow%3D%3D
&key=9174
&type=xml

-->

			<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
					<?php
					$array = array(
						array('홈','토지 임야 대장')
					);
					breadcrumb($array);
					?>
			<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">토지 임야 대장
					</div>

					<div class="panel-body">

<?php


	$pnu = isset($_GET['pnu']) ? $_GET['pnu'] : 1138010700107330019;
	$numOfRows = isset($_GET['numOfRows']) ? $_GET['numOfRows'] : 2;
	$pageNo = isset($_GET['pageNo']) ? $_GET['pageNo'] : 1;
	


	$want_array = array(
		array('pnu','PNU코드',$pnu,'각 필지를 서로 구별하기 위하여 필지마다 붙이는 고유한 번호'),
		array('numOfRows','페이지당 건수',$numOfRows,'최대 1000'),
		array('pageNo','페이지 번호',$pageNo,'현재 요청 페이지번호')
		
		
	);

?>

URL : https://www.data.go.kr/iim/api/selectAPIAcountView.do
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
						※ PNU코드 = 법정동코드(10)	+ 대지구분(1) + 번(4)+지(4)<br>
						ex) 더비즈 주소 서울특별시 서초구 방배동 924-11	 = 1165010100 + 1 +0924 +0011 = 1165010100109240011



					</form>	

					</div>
				</div>
			</div>


<?php 
/*

?serviceKey=ZRsZF%2FzuUlEALtEeik3hz8Pa14i1Ow3j1SegtsGoqdAGbSbA7PYNa%2Bx3Xse1Iy2DemohfDRE2pwOb6OT0P%2Fiow%3D%3D&pnu=1111010100100890025&numOfRows=10&pageNo=1


*/
	if($pnu != Null){								

?>



			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">결과					</div>
					<div class="panel-body">	
					<?php 
						$serviceKey = 'ZRsZF%2FzuUlEALtEeik3hz8Pa14i1Ow3j1SegtsGoqdAGbSbA7PYNa%2Bx3Xse1Iy2DemohfDRE2pwOb6OT0P%2Fiow%3D%3D';
						$url = "https://apis.data.go.kr/1611000/nsdi/eios/LadfrlService/ladfrlList.xml?serviceKey=".$serviceKey."&pnu=".$pnu."&numOfRows=".$numOfRows."&pageNo=".$pageNo;
						

			
	$response = file_get_contents($url);
	$object = simplexml_load_string($response);


	
	
	$data_arr = $object->ladfrlVOList[0]; 				
	

	$pnu = $data_arr -> pnu;
	$ldCode = $data_arr -> ldCode;
	$ldCodeNm = $data_arr -> ldCodeNm;
	$mnnmSlno = $data_arr -> mnnmSlno;
	$regstrSeCode = $data_arr -> regstrSeCode;
	$regstrSeCodeNm = $data_arr -> regstrSeCodeNm;
	$lndcgrCode = $data_arr -> lndcgrCode;
	$lndcgrCodeNm = $data_arr -> lndcgrCodeNm;
	$lndpclAr = $data_arr -> lndpclAr;
	$posesnSeCode = $data_arr -> posesnSeCode;
	$posesnSeCodeNm = $data_arr -> posesnSeCodeNm;
	$cnrsPsnCo = $data_arr -> cnrsPsnCo;
	$ladFrtlSc = $data_arr -> ladFrtlSc;
	$ladFrtlScNm = $data_arr -> ladFrtlScNm;
	$lastUpdtDt = $data_arr -> lastUpdtDt;
	echo '<br><b>고유번호</b> : '.$pnu;
	echo '<br><b>법정동코드</b> : '.$ldCode;
	echo '<br><b>법정동명</b> : '.$ldCodeNm;
	echo '<br><b>지번</b> : '.$mnnmSlno;
	echo '<br><b>대장구분코드</b> : '.$regstrSeCode;
	echo '<br><b>대장구분명</b> : '.$regstrSeCodeNm;
	echo '<br><b>지목코드</b> : '.$lndcgrCode;
	echo '<br><b>지목명</b> : '.$lndcgrCodeNm;
	echo '<br><b>면적</b> : '.$lndpclAr;
	echo '<br><b>소유구분코드</b> : '.$posesnSeCode;
	echo '<br><b>소유구분명</b> : '.$posesnSeCodeNm;
	echo '<br><b>소유(공유)인수</b> : '.$cnrsPsnCo;
	echo '<br><b>축척구분코드</b> : '.$ladFrtlSc;
	echo '<br><b>축척구분명</b> : '.$ladFrtlScNm;
	echo '<br><b>데이터기준일자</b> : '.$lastUpdtDt;


		

/*
						$response = file_get_contents($url);
						$arr = json_decode($response,true);
						
						$temp_name = array("bizesId","bizesNm"
						,"brchNm"
						,"indsLclsCd"
						,"indsLclsNm"
						,"indsMclsCd"
						,"indsMclsNm"
						,"indsSclsCd"
						,"indsSclsNm"
						,"ksicCd"
						,"ksicNm"
						,"ctprvnCd"
						,"ctprvnNm"
						,"signguCd"
						,"signguNm"
						,"adongCd"
						,"adongNm"
						,"ldongCd"
						,"ldongNm"
						,"lnoCd"
						,"plotSctCd"
						,"plotSctNm"
						,"lnoMnno"
						,"lnoSlno"
						,"lnoAdr"
						,"rdnmCd"
						,"rdnm"
						,"bldMnno"
						,"bldSlno"
						,"bldMngNo"
						,"bldNm"
						,"rdnmAdr"
						,"oldZipcd"
						,"newZipcd"
						,"dongNo"
						,"flrNo"
						,"hoNo"
						,"lon"
						,"lat"
						);
						


						for($ii = 0 ; $ii < count($arr['body']['items']) ;$ii ++ ){
							echo "<p>_________데이터구분____________________<p>";
							
							for($jj = 0 ; $jj < count($arr['body']['items'][$ii]) ;$jj ++ ){
								
								echo "<br><b>".$arr['header']['columns'][$jj]."</b> : ".$arr['body']['items'][$ii][$temp_name[$jj]];
								

							}		
						}
						
*/

						
					?>



					</div>
				</div>					
			</div>
		 
  <?php	
	}
  ?>

	
	</div>
</div>	<!--/.main-->

	
<!--Modal-->
<?php include_once('../contents_footer.php');


?>


