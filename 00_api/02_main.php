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








					url : https://www.data.go.kr/tcs/dss/selectApiDataDetailView.do?publicDataPk=15044713
		



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
		array('3','getBrTitleInfo','건축물대장 표제부 조회	','전국 자치단체의 건축행정정보시스템(세움터)를 통해 생성된 건축물대장 표제부의 지번주소 및 새주소, 주/부속구분, 대지면적, 건축면적, 건폐율, 용적율, 구조, 용도, 지붕구조, 주차대수 등의 정보를 제공한다.	'	),
		array('6','getBrExposPubuseAreaInfo','국토교통부_건축물대장 전유공용면적 조회	','전국 자치단체의 건축행정정보시스템(세움터)를 통해 생성된 건축물대장과 관련된 전유/공용면적의 층구분, 층번호, 전유/공용구분, 구조, 용도 등의 정보를 제공한다.	'	),
		


	)	;			
	for($total_num = 0 ; $total_num < count($temp_list) ; $total_num++){
		
		$num=0;
		echo "<tr>";
			
		$name = $temp_list[$total_num][$num] ;	hd_tbody_td($num,$name);$num+=1;
			$name = $temp_list[$total_num][$num] ;	hd_tbody_td($num,$name);$num+=1;
			$name = $temp_list[$total_num][$num] ;	hd_tbody_td($num,$name);$num+=1;
			$name = "<details>
					<summary><자세히 보기></summary>".$temp_list[$total_num][$num]."</details>" ;	hd_tbody_td($num,$name);

			$name = "<a href='/BIAS/00_api/02_api/".$temp_list[$total_num][1].".php'>확인하기</a>					" ;	hd_tbody_td($num,$name);








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


