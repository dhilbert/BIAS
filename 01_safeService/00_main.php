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
						array('홈','안전거래서비스')
					);
					breadcrumb($array);
					?>
			<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">안전거래서비스
					</div>

					<div class="panel-body">





Note That)					대지권비율은 집합건물만 존재!

					
		



<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
	<thead>
		<tr>
			<?php	
				$num=0;
				
								
				$name="Num";hd_thead_th($num,$name);$num+=1;
				$name="시뮬레이션명";hd_thead_th($num,$name);$num+=1;
				$name="목적";hd_thead_th($num,$name);$num+=1;
				
				$name="바로가기";hd_thead_th($num,$name);$num+=1;
				$name="비고";hd_thead_th($num,$name);$num+=1;
		
				

				
				
				/*1111010700	
				1123010300207370002*/
			?>
		


		</tr>
	</thead>
<tbody>
<?php

	$temp_list = array(
		array('0','법정동가져오기','법정동코드 가져오기','test000','시간 오래 걸림'	),

		array('1','안전거래서비스','걱물 소유주를 이용한 내용 확인','test00',''	),
		array('2','04.물건표시','표시 물건에 대한 정보 확인','test0','case1) 전유부 있는 경우 + 대지권 비율 있음 '	),
		array('3','04.물건표시','표시 물건에 대한 정보 확인','test1','case2) 전유부 있는 경우 + 대지권 비율 없음, 대부분 연립 '	),
		array('4','04.물건표시','표시 물건에 대한 정보 확인','test2','case3) 전유부 없음'	),
		array('5','11.01.01.05.권리양수','주소로 상호 검색','test3',''	),
		array('6','표준임대차>04.물건의 표시','표준 임대차 계약서 작성','test4','case1) 전유부 존재 , 미존재시 공적장부에서 불러올수 있는 데이터 없음'	),


		
		
//		array('2','04.물건표시','표시 물건에 대한 정보 확인','test1','case2) 전유부 없는 경우  '	)
		

	)	;			
	for($total_num = 0 ; $total_num < count($temp_list) ; $total_num++){
		
		$num=0;
		echo "<tr>";
			
		$name = $temp_list[$total_num][$num] ;	hd_tbody_td($num,$name);$num+=1;
			$name = $temp_list[$total_num][$num] ;	hd_tbody_td($num,$name);$num+=1;
			$name = $temp_list[$total_num][$num] ;	hd_tbody_td($num,$name);$num+=1;

			$name = "<a href='/BIAS/01_safeService/".$temp_list[$total_num][$num].".php'>테스트하기</a>					" ;	hd_tbody_td($num,$name);$num+=1;

			$name = $temp_list[$total_num][$num] ;	hd_tbody_td($num,$name);$num+=1;






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


