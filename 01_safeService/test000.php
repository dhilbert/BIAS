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
					<div class="panel-heading">법정동 코드 정보
					</div>

					<div class="panel-body">
					<a href="#" data-toggle="modal" data-target="#myModal3"> 법정동 다시</a>

					

					<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
	<thead>
		<tr>
			<?php	

				$names_array = array("시도명","시군구명","읍면동명","리명","법정동코드"	)	;
				$num=0;
				
										
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
		
		SELECT * from main_add

		;";
		$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));
		while($info	 = mysqli_fetch_array($res)){
	
			echo "<tr>";		

			$num = 0;
			$name = $info['name_1'] ;	hd_tbody_td($num,$name);$num+=1;
			$name = $info['name_2'] ;	hd_tbody_td($num,$name);$num+=1;
			$name = $info['name_3'] ;	hd_tbody_td($num,$name);$num+=1;
			$name = $info['name_4'] ;	hd_tbody_td($num,$name);$num+=1;
			$name = $info['main_code'] ;	hd_tbody_td($num,$name);$num+=1;

				
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



<!-- Modal -->
<div class="modal fade" id="myModal3" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
			법정동 코드 가져오기 
			</div>
			<div class="modal-body">
					시간 오래 걸림
				
					<form name="frm" role="form" method="get" action="testtt.php">

			</div>
			<div class="modal-footer">
			
				<input  type='submit' class="btn btn-success login-btn" type="submit" value="다시받기">
				</form>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>