<?php
	include_once('../lib/session.php');
	include_once('../lib/dbcon_BIAS.php');
	include_once('../contents_header.php');
	include_once('../contents_profile.php');
	include_once('../contents_sidebar.php');
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
					<div class="panel-heading">소상공인시장진흥공단_상가
					</div>

					<div class="panel-body">








					
		



<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
	<thead>
		<tr>
			<?php	
				$num=0;
				
								
				$name="Num";hd_thead_th($num,$name);$num+=1;
				$name="오퍼레이션명(영문)";hd_thead_th($num,$name);$num+=1;
				$name="오퍼레이션명(한글)";hd_thead_th($num,$name);$num+=1;
				$name="설명";hd_thead_th($num,$name);$num+=1;
				$name="바로가기";hd_thead_th($num,$name);$num+=1;
		
				

				
				
				/*1111010700	
				1123010300207370002*/
			?>
		


		</tr>
	</thead>
<tbody>
<?php

	$temp_list = array(
		array('1','storeZoneOne','지정 상권조회','전국 약1200개 주요상권의 영역좌표를 조회하는 기능으로 지정된 상권번호에 해당하는 단일 상권정보를 조회한다.'	),
		array('5','storeOne','단일 상가업소 조회','상가업소번호에 대한 업소정보를 조회		단일 업소정보를 출력이 필요한 경우를 위해 설계된 오퍼레이션'	),
		array('9','storeListInPnu','상권내 상가업소 조회	','입력 상권번호에 해당하는 업소목록을 조회	'	),


	)	;			
	for($total_num = 0 ; $total_num < count($temp_list) ; $total_num++){
		
		$num=0;
		echo "<tr>";
			
		$name = $temp_list[$total_num][$num] ;	hd_tbody_td($num,$name);$num+=1;
			$name = $temp_list[$total_num][$num] ;	hd_tbody_td($num,$name);$num+=1;
			$name = $temp_list[$total_num][$num] ;	hd_tbody_td($num,$name);$num+=1;
			$name = "<details>
					<summary><자세히 보기></summary>".$temp_list[$total_num][$num]."</details>" ;	hd_tbody_td($num,$name);

			$name = "<a href='/BIAS/00_api/00_api/".$temp_list[$total_num][1].".php'>확인하기</a>					" ;	hd_tbody_td($num,$name);








		echo "</tr>";


	}



			

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


