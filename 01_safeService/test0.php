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
					<div class="panel-heading">04.물건의 표시(건축물대장 표제부 조회 )
					</div>

					<div class="panel-body">

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
		$sql	 = "
		
		SELECT a.sigunguCd,a.platPlc,a.bldNm,a.platGbCd,a.bjdongCd,a.bun,a.ji,a.mainPurpsCdNm,a.etcPurps,	b.idx,

		b.dongNm,b.hoNm
			from api_test_gun_2 AS a
				JOIN api_test_gun_5 AS b
			ON a.sigunguCd = b.sigunguCd
			AND a.bjdongCd = b.bjdongCd
			and a.bun =b.bun
			and a.ji = b.ji 
		where 		REGEXP_REPLACE(b.dongNm, '[가-힣]', '') >0
		and REGEXP_REPLACE(b.hoNm, '[가-힣]', '') < 300
		and b.dongNm !=a.bldNm
		and b.mainAtchGbCd = 0
		
		and (a.etcPurps Like '%아파트%' or a.etcPurps Like '%빌라%'  or a.etcPurps Like '%도시형생활주택%' )
		and (a.etcPurps not Like '%관리실%' )

		
		group by b.hoNm
		Limit 1000
		
		;";
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


			
			$name = "<a href = 'test0_detail.php?idx=".$info['idx']."'>상세정보</a>" ;	hd_tbody_td($num,$name);
				
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


