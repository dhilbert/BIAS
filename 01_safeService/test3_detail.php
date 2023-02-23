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

	$serviceKey = 'ZRsZF%2FzuUlEALtEeik3hz8Pa14i1Ow3j1SegtsGoqdAGbSbA7PYNa%2Bx3Xse1Iy2DemohfDRE2pwOb6OT0P%2Fiow%3D%3D';
						$url = "https://apis.data.go.kr/B553077/api/open/sdsc2/storeOne?serviceKey=".$serviceKey."&key=".$idx."&type=json";
  						        
						
						$response = file_get_contents($url);
						$arr = json_decode($response,true);
						$want_array =$arr['body']['items'][0];


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
					<div class="panel-heading"><?php echo $want_array['bizesNm'] ; 
						 		
						 
					
					?>			
					
					
					</div>
					

					<div class="panel-body">
					식별자<br> 
					<?php 





						echo "상가 번호 : ".$idx."<br>";
						

					
					
					
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
	
								$temps = array('04.01','소재지', $want_array['lnoAdr'],'이실장 주소 규칙에 따름','','');
								hd_temps_test0($temps);

								$temps = array('04.16','상호명', $want_array['bizesNm'],'9.상권내 상가업소 조회','bizesNm','');
								hd_temps_test0($temps);


								$temps = array('','상가면적', '','직접입력','','');
								hd_temps_test0($temps);
								$temps = array('04.18','업종', $want_array['indsSclsNm'],'9.상권내 상가업소 조회','indsSclsNm','');
								hd_temps_test0($temps);

								$temps = array('04.19','허가신고번호', $want_array['bizesId'],'9.상권내 상가업소 조회','bizesId','해당 상가업소에 부여된 일련번호');
								hd_temps_test0($temps);



	


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


