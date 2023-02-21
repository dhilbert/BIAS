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


	$pnu = isset($_GET['pnu']) ? $_GET['pnu'] : 1111010100100010000;
	$numOfRows = isset($_GET['numOfRows']) ? $_GET['numOfRows'] : 1000;
	$pageNo = isset($_GET['pageNo']) ? $_GET['pageNo'] : 1;
	


	$want_array = array(
		array('pnu','PNU코드',$pnu,'시도는 시도코드값, 시군구는 시군구코드값, 행정동은 행정동코드값을 사용'),
		array('numOfRows','페이지당 건수',$numOfRows,'최대 1000'),
		array('pageNo','페이지 번호',$pageNo,'현재 요청 페이지번호'),
		
		
		
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
	if($pnu != Null){								

?>



			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">결과					</div>
					<?php 
					
						$serviceKey = 'ZRsZF%2FzuUlEALtEeik3hz8Pa14i1Ow3j1SegtsGoqdAGbSbA7PYNa%2Bx3Xse1Iy2DemohfDRE2pwOb6OT0P%2Fiow%3D%3D';
						$url = "https://apis.data.go.kr/1611000/nsdi/eios/LdaregService/ldaregList.xml?serviceKey=".$serviceKey."&pnu=".$pnu."&numOfRows=".$numOfRows."&pageNo=".$pageNo;
						$response = file_get_contents($url);
						$object = simplexml_load_string($response);

						$totalCount = $object->totalCount; 	
						for($ii = 0 ; $ii < $totalCount ; $ii++){
							$data_arr = $object->LdaregVOList[$ii]; 	
							$pnu = $data_arr -> pnu;
							$agbldgSn = $data_arr -> agbldgSn;
							$liCode = $data_arr -> liCode;
							$liCodeNm = $data_arr -> liCodeNm;
							$mnnmSlno = $data_arr -> mnnmSlno;
							$regstrSeCode = $data_arr -> regstrSeCode;
							$regstrSeCodeNm = $data_arr -> regstrSeCodeNm;
							$buldNm = $data_arr -> buldNm;
							$buldDongNm = $data_arr -> buldDongNm;
							$buldFloorNm = $data_arr -> buldFloorNm;
							$buldHoNm = $data_arr -> buldHoNm;
							$buldRoomNm = $data_arr -> buldRoomNm;
							$ldaQotaRate = $data_arr -> ldaQotaRate;
							$clsSeCode = $data_arr -> clsSeCode;
							$clsSeCodeNm = $data_arr -> clsSeCodeNm;
							$relateLdEmdLiCode = $data_arr -> relateLdEmdLiCode;
							$lastUpdtDt = $data_arr -> lastUpdtDt;
							echo "<p>_________데이터구분____________________<p>";
							echo '<br><b>고유번호</b> : '.$pnu;
							echo '<br><b>대지권일련번호</b> : '.$agbldgSn;
							echo '<br><b>법정동코드</b> : '.$liCode;
							echo '<br><b>법정동명</b> : '.$liCodeNm;
							echo '<br><b>지번</b> : '.$mnnmSlno;
							echo '<br><b>대장구분코드</b> : '.$regstrSeCode;
							echo '<br><b>대장구분명</b> : '.$regstrSeCodeNm;
							echo '<br><b>건축물명</b> : '.$buldNm;
							echo '<br><b>동명</b> : '.$buldDongNm;
							echo '<br><b>층명</b> : '.$buldFloorNm;
							echo '<br><b>호명</b> : '.$buldHoNm;
							echo '<br><b>실명</b> : '.$buldRoomNm;
							echo '<br><b>대지권비율</b> : '.$ldaQotaRate;
							echo '<br><b>폐쇄구분코드</b> : '.$clsSeCode;
							echo '<br><b>폐쇄구분명</b> : '.$clsSeCodeNm;
							echo '<br><b>관련토지소재지코드</b> : '.$relateLdEmdLiCode;
							echo '<br><b>데이터기준일자</b> : '.$lastUpdtDt;




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


