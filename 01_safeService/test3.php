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


	$radius = isset($_GET['radius']) ? $_GET['radius'] : 200;
	$cx = isset($_GET['cx']) ? $_GET['cx'] : 127.173301;
	$cy	 = isset($_GET['cy	']) ? $_GET['cy	'] : 37.449826;




	$want_array = array(
		array('radius','PNU코드',$radius,'반경입력, (미터단위, 최대2000 미터)		'),
		array('cx','경도',$cx,' 원형의 중심점의 경도값으로 WGS84 좌표계 사용		'),
		array('cy','위도',$cy,'원형의 중심점의 경도값으로 WGS84 좌표계 사용		')
		
		
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
/*

방배로 107
&key=9174
&type=xml




11680
10400

1168010400


100530007
*/
	if($radius != Null){								

?>



			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">결과					</div>



					<?php 
						$serviceKey = 'ZRsZF%2FzuUlEALtEeik3hz8Pa14i1Ow3j1SegtsGoqdAGbSbA7PYNa%2Bx3Xse1Iy2DemohfDRE2pwOb6OT0P%2Fiow%3D%3D';
						$url = "https://apis.data.go.kr/B553077/api/open/sdsc2/storeListInRadius?serviceKey=".$serviceKey."&pageNo=1&numOfRows=100&type=json";
						$url = $url."&radius=".$radius;
						$url = $url."&cx=".$cx;
						$url = $url."&cy=".$cy;
						
						
						
					?>



					<div class="panel-body">
				
<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
	<thead>
		<tr>
			<?php	



				$names_array = array("상호명","지점명","상가업소번호",	"PNU코드",	"지번주소","건물관리번호"	,"이동"			)	;
				$num=0;
				
										
				$name=$names_array[$num];hd_thead_th($num,$name);$num+=1;
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
		
		$response = file_get_contents($url);
		$arr = json_decode($response,true);

		
		
		for($i = 0 ; $i <  20;$i++){
			$temp_array = $arr['body']['items'][$i];
			$num = 0;
			echo "<tr>";
				$name = $temp_array['bizesNm'] ;	hd_tbody_td($num,$name);$num+=1;
				$name = $temp_array['brchNm'] ;	hd_tbody_td($num,$name);$num+=1;
				$name = $temp_array['bizesId'] ;	hd_tbody_td($num,$name);$num+=1;
				$name = $temp_array['lnoCd'] ;	hd_tbody_td($num,$name);$num+=1; //PUN
				$name = $temp_array['lnoAdr'] ;	hd_tbody_td($num,$name);$num+=1;
				$name = $temp_array['bldMngNo'] ;	hd_tbody_td($num,$name);$num+=1;
				$name = "<a href = 'test3_detail.php?idx=".$temp_array['bizesId']."'>상세정보</a>" ;	hd_tbody_td($num,$name);
				
			echo "</tr>";
			
		}

		
		?>
		
	</tbody>
	</table>	
				
				
				
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


