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
					<div class="panel-heading">지정 상권조회
					</div>

					<div class="panel-body">

<?php
	$want_array = array(
		array('key','상가업소번호','10142096','상가업소번호'),
		


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








	$key = isset($_GET['key']) ? $_GET['key'] : null;
	$type = isset($_GET['type']) ? $_GET['type'] : null;

	if($key != Null){								

?>



			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">결과					</div>
					<?php 
						$serviceKey = 'ZRsZF%2FzuUlEALtEeik3hz8Pa14i1Ow3j1SegtsGoqdAGbSbA7PYNa%2Bx3Xse1Iy2DemohfDRE2pwOb6OT0P%2Fiow%3D%3D';
						$url = "https://apis.data.go.kr/B553077/api/open/sdsc2/storeOne?serviceKey=".$serviceKey."&key=".$key."&type=json";
  						        
						
						$response = file_get_contents($url);
						$arr = json_decode($response,true);
						
						$temp_name = array(
							"bizesId","bizesNm","brchNm","indsLclsCd","indsLclsNm","indsMclsCd","indsMclsNm","indsSclsCd","indsSclsNm"	,"ksicCd","ksicNm","ctprvnCd","ctprvnNm","signguCd"	,"signguNm"	,"adongCd","adongNm"
						,"ldongCd" ,"ldongNm","lnoCd","plotSctCd","plotSctNm" ,"lnoMnno","lnoSlno","lnoAdr","rdnmCd","rdnm","bldMnno","bldSlno" ,"bldMngNo","bldNm","rdnmAdr","oldZipcd"	,"newZipcd" ,"dongNo" ,"flrNo" ,"hoNo" 
						,"lon" 	,"lat");
						


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


