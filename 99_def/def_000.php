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
						array('홈','건축물 용도등의 확인')
					);
					breadcrumb($array);
					?>
			<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">건축물 용도등의 확인 레퍼런스
					</div>

					<div class="panel-body">





<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
	<thead>
		<tr>
			<?php	
				$num=0;
				
								
				$name="Num";hd_thead_th($num,$name);$num+=1;
				$name="URL ";hd_thead_th($num,$name);$num+=1;
				$name="비고";hd_thead_th($num,$name);$num+=1;
		
				

				
				
				/*1111010700	
				1123010300207370002*/
			?>
		


		</tr>
	</thead>
<tbody>
<?php

	$temp_list = array(
		array('https://easylaw.go.kr/CSP/CnpClsMain.laf?popMenu=ov&csmSeq=1150&ccfNo=2&cciNo=1&cnpClsNo=1','','찾기쉬운 생활 법렬 정보'	),
		

	)	;			
	for($total_num = 0 ; $total_num < count($temp_list) ; $total_num++){
		
		$num = 0;
		echo "<tr>";
			
			$name = $total_num + 1				 ;	hd_tbody_td($num,$name);
			$name = "<a href='".$temp_list[$total_num][$num]."' target='_blank'>".$temp_list[$total_num][2]."</a>		" ;	hd_tbody_td($num,$name);$num+=1;
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


