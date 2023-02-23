<?php
	include_once('../lib/session.php');
	include_once('../lib/dbcon_BIAS.php');
	include_once('../contents_header.php');
	include_once('../contents_profile.php');
	include_once('../contents_sidebar.php');





	$idx = isset($_GET['idx']) ? $_GET['idx'] :Null;


?>










			<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
					<?php
					$array = array(
						array('홈','면적')
					);
					breadcrumb($array);
					?>
			<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">1. 전용 면적 / 공용 면적 / 그 밖의 면적
					</div>

					<div class="panel-body">
					
						조건 : 건축물 대장 전유부 존재 <br>
						계산식 : (공급 면적)전유부의 주용도가(mainPurpsCd ) 주 건축물(0)인 행의 area 값의 합 <br>
						         (전용면적)전유부의 주용도가(mainPurpsCd ) 주 건축물(0)인 행의 area 값중 가장 큰값<br>
								 ※ etcPurps 값으로 찾아야 하는데, 전용 면적은 계단실,벽체, 승강기, 홀등의 정보가 들아가지 않으므로, 가장 큰 값을 전용 면적으로 봐도 무관!!<br>

								 (그밖의 면적)전유부의 주용도가(mainPurpsCd ) 주 건축물(0)이 아닌 행의 area 값의 합 <br>

						
<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
	<thead>
		<tr>
			<?php	



				$names_array = array("대지위치","동","호","빌딩명","시군구코드",	"법정동코드",	"대지구분코드","번","지",'주용도코드명','기타용도','이동'				)	;
				$num=0;
				
										
				$name=$names_array[$num];hd_thead_th($num,$name);$num+=1;
				$name=$names_array[$num];hd_thead_th($num,$name);$num+=1;
				$name=$names_array[$num];hd_thead_th($num,$name);$num+=1;
				$name=$names_array[$num];hd_thead_th($num,$name);$num+=1;
				$name=$names_array[$num];hd_thead_th($num,$name);$num+=1;
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
		$temp_kind = array('대지','산','블록');

		if($idx == Null){
			$sql	 = "
			
			SELECT a.sigunguCd,a.platPlc,a.bldNm,a.platGbCd,a.bjdongCd,a.bun,a.ji,a.mainPurpsCdNm,a.etcPurps,	b.idx,

			b.dongNm,b.hoNm
				from api_test_gun_2 AS a
					JOIN api_test_gun_5 AS b
				ON a.sigunguCd = b.sigunguCd
				AND a.bjdongCd = b.bjdongCd
				and a.bun =b.bun
				and a.ji = b.ji 
			where REGEXP_REPLACE(b.dongNm, '[가-힣]', '') >0
			and b.mainAtchGbCd = 0
			and REGEXP_REPLACE(b.hoNm, '[가-힣]', '') <300
			and a.etcPurps in ( '아파트','공동주택(아파트)')
			and a.bldNm ='응암푸르지오'
			group by b.hoNm
			Limit 100
			;";
		}
		else{
			$sql	 = "
			
			SELECT a.sigunguCd,a.platPlc,a.bldNm,a.platGbCd,a.bjdongCd,a.bun,a.ji,a.mainPurpsCdNm,a.etcPurps,	b.idx,			b.dongNm,b.hoNm
				from api_test_gun_2 AS a
					JOIN api_test_gun_5 AS b
				ON a.sigunguCd = b.sigunguCd
				AND a.bjdongCd = b.bjdongCd
				and a.bun =b.bun
				and a.ji = b.ji 
			where b.idx = '".$idx."'
			Limit 1
			
			
			;";
			

		}
		$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));
		while($info	 = mysqli_fetch_array($res)){
	
			echo "<tr>";		

			$num = 0;
			$name = $info['platPlc'] ;	hd_tbody_td($num,$name);$num+=1;
			$name = $info['dongNm'] ;	hd_tbody_td($num,$name);$num+=1;
			$name = $info['hoNm'] ;	hd_tbody_td($num,$name);$num+=1;


			$name = $info['bldNm'] ;	hd_tbody_td($num,$name);$num+=1;
			$name = $info['sigunguCd'] ;	hd_tbody_td($num,$name);$num+=1;
			$name = $info['bjdongCd'] ;	hd_tbody_td($num,$name);$num+=1;
			$name = $temp_kind[$info['platGbCd']] ;	hd_tbody_td($num,$name);$num+=1;


			$name = $info['bun'] ;	hd_tbody_td($num,$name);$num+=1;
			$name = $info['ji'] ;	hd_tbody_td($num,$name);$num+=1;
			$name = $info['mainPurpsCdNm'] ;	hd_tbody_td($num,$name);$num+=1;
			$name = $info['etcPurps'] ;	hd_tbody_td($num,$name);$num+=1;


			
			$name = "<a href='?idx=".$info['idx']."'>적용</a>" ;	hd_tbody_td($num,$name);
				
			echo "</tr>";

			$sigunguCd = $info['sigunguCd'];
			$bjdongCd  = $info['bjdongCd'];
			$bun 	   = $info['bun'];
			$ji		   = $info['ji'];
			$hoNm 	   = $info['hoNm'];
			$dongNm 	= $info['dongNm'];
		}






	


			

?>

	</tbody>
</table>	
<h2> 전용 / 공용 면적</H2>
			
<table border =1>
	<thead>
		<th> 주용도</th>
		<th> 면적</th>
		<th> 기타 용도</th>
		
	</thead>
	<tbody>

	<?php 
		
		$total_area =0;
		$max_area = 0;
		$etc_area = 0;
		if($idx != Null){
			$sub_sql	 = "
				
			SELECT mainAtchGbCdNm,area,etcPurps,mainAtchGbCd
			from api_test_gun_5
			
			where sigunguCd = '".$sigunguCd."'
			and bjdongCd = '".$bjdongCd."'
			and bun = '".$bun."'
			and ji = '".$ji."'
			and hoNm = '".$hoNm."'
			and dongNm = '".$dongNm."'
			
			;";
	

			$sub_res	=  mysqli_query($real_sock,$sub_sql) or die(mysqli_error($real_sock));
			while($sub_info	 = mysqli_fetch_array($sub_res)){


				echo "<tr>";
					echo "<td>".$sub_info['mainAtchGbCdNm']."</td>";
					echo "<td>".$sub_info['area']."</td>";
					echo "<td>".$sub_info['etcPurps']."</td>";
				echo "</tr>";

				if($sub_info['mainAtchGbCd']==0){
					$total_area += $sub_info['area'];
					if($sub_info['area']>$max_area){
						$max_area = $sub_info['area'];
					}
					else{
						$max_area = $max_area;
					}
				}
				else{
					$etc_area += $sub_info['area'];

				}
				
			}
		}
		
	?>

	</tbody>
</table>

<?php 
	echo "공급 면적 : ".$total_area;
	echo "<br>전용 면적 : ".$max_area;
	echo "<br>그밖의 면적: ".$etc_area;
	
?>











</div>

				</div>
			</div>





			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">2. 분양 면적 / 전용 면적 
					</div>

					<div class="panel-body">






 - 분양전의 매물 상태 <br>
 - 전용 면적 = 전용면적, 공용면적 = 분양 면적













					</div>
				</div>
			</div>



		 
  

	
	</div>
</div>	<!--/.main-->

	
<!--Modal-->
<?php include_once('../contents_footer.php');


?>


