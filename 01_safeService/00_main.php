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
					<div class="panel-heading">안전거래서비스
					</div>

					<div class="panel-body">








					
		



<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
	<thead>
		<tr>
			<?php	
				$num=0;
				
								
				$name="Num";hd_thead_th($num,$name);$num+=1;
				$name="시뮬레이션명";hd_thead_th($num,$name);$num+=1;
				$name="목적";hd_thead_th($num,$name);$num+=1;
				
				$name="바로가기";hd_thead_th($num,$name);$num+=1;
		
				

				
				
				/*1111010700	
				1123010300207370002*/
			?>
		


		</tr>
	</thead>
<tbody>
<?php

	$temp_list = array(
		array('1','04.물건표시','표시 물건에 대한 정보 확인','test0'	),
		

	)	;			
	for($total_num = 0 ; $total_num < count($temp_list) ; $total_num++){
		
		$num=0;
		echo "<tr>";
			
		$name = $temp_list[$total_num][$num] ;	hd_tbody_td($num,$name);$num+=1;
			$name = $temp_list[$total_num][$num] ;	hd_tbody_td($num,$name);$num+=1;
			$name = $temp_list[$total_num][$num] ;	hd_tbody_td($num,$name);$num+=1;

			$name = "<a href='/BIAS/01_safeService/".$temp_list[$total_num][$num].".php'>테스트하기</a>					" ;	hd_tbody_td($num,$name);








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


