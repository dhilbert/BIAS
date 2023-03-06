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
					<div class="panel-heading">건물 소유주 정보 확인
					</div>

					<div class="panel-body">
<?php

		$sql	 = "
		
			SELECT sigunguCd,bjdongCd,bun,ji	from api_test_so_0 
			where quota2 > 1
			group by sigunguCd,bjdongCd,bun,ji
			Limit 2
		
		;";
		$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));
		while($info	 = mysqli_fetch_array($res)){
			$sigunguCd   = $info['sigunguCd'];
			$bjdongCd   = $info['bjdongCd'];
			$bun   = $info['bun'];
			$ji   = $info['ji'];

			echo "<p>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~<p>";
			echo "<br>[소유자 정보]<br>";
			echo "<br>-소유주 구분 : 공동<br>";
			$want = '';
			$kind_want = '';



			$sub_sql	 = "
		
				SELECT sigunguCd,bjdongCd,bun,ji	from api_test_so_0 
					where quota2 > 1
					and quota2 !=""
					and quota1 !=""
				group by sigunguCd,bjdongCd,bun,ji
		
		
				;";
			$sub_res	=  mysqli_query($real_sock,$sub_sql) or die(mysqli_error($real_sock));
			while($sub_info	 = mysqli_fetch_array($sub_res)){
				echo $sub_info['quota1'];
				$ratio = $sub_info['quota1']/$sub_info['quota1']*100;
				$want = $want.$sub_info	['nm']."(지분률 <font color = 'red'>".$ratio."<font> <br>";
				$kind_want = $sub_info['own_gb_nm'];

			}
			echo "<br>-소유형태 : ".$kind_want."<br>";
			echo $want;

		}






	


			

?>



















					</div>
				</div>
			</div>



		 
  

	
	</div>
</div>	<!--/.main-->

	
<!--Modal-->
<?php include_once('../contents_footer.php');


?>


