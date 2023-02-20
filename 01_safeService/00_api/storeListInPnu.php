<?php
	include_once('../../lib/session.php');
	include_once('../../lib/dbcon_BIAS.php');
	include_once('../../contents_header.php');
	include_once('../../contents_profile.php');
	include_once('../../contents_sidebar.php');
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
						array('홈','소상공인시장진흥공단_상가')
					);
					breadcrumb($array);
					?>
			<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">지번 단위 상가업소 조회	
					</div>

					<div class="panel-body">

<?php


	$key = isset($_GET['key']) ? $_GET['key'] : 1168010400100530007;
	$indsLclsCd = isset($_GET['indsLclsCd']) ? $_GET['indsLclsCd'] : 'Q';
	$indsMclsCd = isset($_GET['indsMclsCd']) ? $_GET['indsMclsCd'] : 'Q12';
	$indsSclsCd = isset($_GET['indsSclsCd']) ? $_GET['indsSclsCd'] : 'Q12A01';
	$numOfRows = isset($_GET['numOfRows']) ? $_GET['numOfRows'] : 2;
	$pageNo = isset($_GET['pageNo']) ? $_GET['pageNo'] : 1;
	$type = isset($_GET['type']) ? $_GET['type'] : 'json';


	$want_array = array(
		array('key','PNU코드',$key,'시도는 시도코드값, 시군구는 시군구코드값, 행정동은 행정동코드값을 사용'),
		array('indsLclsCd','상권업종대분류코드',$indsLclsCd ,'입력된 대분류 업종에 해당하는 것만 조회'),
		array('indsMclsCd','상권업종중분류코드',$indsMclsCd,'입력된 중분류 업종에 해당하는 것만 조회'),
		array('indsSclsCd','상권업종소분류코드',$indsSclsCd,'입력된 소분류 업종에 해당하는 것만 조회'),
		array('numOfRows','페이지당 건수',$numOfRows,'최대 1000'),
		array('pageNo','페이지 번호',$pageNo,'현재 요청 페이지번호'),
		array('type','타입',$type,'xml / json'),
		
		
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
						※ PNU코드 = 법정동코드(10)	+ 대지구분(1) + 번(4)+지(4)<br>
						ex) 더비즈 주소 서울특별시 서초구 방배동 924-11	 = 1165010100 + 1 +0924 +0011 = 1165010100109240011



					</form>	

					</div>
				</div>
			</div>


<?php 
/*

방배로 107
&key=9174
&type=xml




11680
10400

1168010400


100530007
*/
	if($key != Null){								

?>



			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">결과					</div>
					<?php 
						$serviceKey = 'ZRsZF%2FzuUlEALtEeik3hz8Pa14i1Ow3j1SegtsGoqdAGbSbA7PYNa%2Bx3Xse1Iy2DemohfDRE2pwOb6OT0P%2Fiow%3D%3D';
						$url = "https://apis.data.go.kr/B553077/api/open/sdsc2/storeListInPnu?serviceKey=".$serviceKey."&key=".$key."&indsLclsCd=".$indsLclsCd."&indsMclsCd=".$indsMclsCd."&indsSclsCd=".$indsSclsCd."&numOfRows=".$numOfRows."&pageNo=".$pageNo."&type=".$type;
						

						
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


