<?php
include_once('lib/session.php');
include_once('lib/dbcon_BIAS.php');
include_once('contents_header.php');
include_once('contents_profile.php');
include_once('contents_sidebar.php');






?>





	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
	
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/BIAS/home.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a> home				
				</li>

			</ol>
		</div>

	<div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">지난 주 공수 </div>
					<div class="panel-body">
<?php 



	$secondDate = date("Y-m-d");
	$check2 = hd_week_ft($secondDate);
	$end_check = $check2[0]-1;
	


?>

											  
<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
	<thead>
		<tr>
			<th data-field="s_99" data-sortable="true" >No </th>
			<th data-field="s_00" data-sortable="true" >이름</th>
			<th data-field="s_1" data-sortable="true" > 지난주 작업 시간 (h)</th>
			<th data-field="s_2" data-sortable="true" > 1 작업당 소요 시간(h)</th>
			<th data-field="s_3" data-sortable="true" > 하루 평균 (h)</th>			
			<th data-field="s_4" data-sortable="true" >정보 확인 </th>

		</tr>
		</tr>
	</thead>
	<tbody>
<?php

$sql = "
	SELECT sum(work_timeSpentSeconds)/3600 AS mamweek,
	AVG(work_timeSpentSeconds)/3600 AS amamweek,
	
	work_author,work_updated
		FROM jira_work_log
	WHERE WEEKOFYEAR(work_updated)=".$end_check."
	GROUP BY work_author
	order by mamweek DESC
	
	;";
	$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));

	$count_n = 0;
	while($info	 = mysqli_fetch_array($res)){
		$count_n += 1;
		echo "
			<tr>
				<td data-field='s_99' data-sortable='true'>".$count_n."</td>
				<td data-field='s_00' data-sortable='true'>".$info['work_author']."</td>
				<td data-field='s_1' data-sortable='true'>".round($info['mamweek'],3)."</td>
				<td data-field='s_2' data-sortable='true'>".round($info['amamweek'],3)."</td>
				<td data-field='s_3' data-sortable='true'>".round($info['mamweek']/5,3)."</td>
				<td data-field='s_4' data-sortable='true'><a href='#'>확인하기(공수중)</a></td>

			</tr>								
		";

	};











/*
		$count_n = 0;	
		$sql	 = "
					select b.admin_name, a.adminmember_idx, a.updateDate, a.DEAL_YMD, a.serviceKey
					from admin_apidata as a
						Join admin_member as b 
					on b.idx = a.adminmember_idx
					ORDER BY a.idx desc	
				;";
		$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));
		
		*/
?>


	</tbody>
</table>

<br>※ 지난주 작업 시간 : 지라에 작업자가 직접 올린 작업시간 
<br>※ 1작업당 작업 시간 : (지난주 작업 시간)/올린 갯수 
<br>   높을수록 1번에 많은 공수를 올림 / 낮을 수록 공수를 자주 올림






					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">이번주 공수 순위</div>
					<div class="panel-body">
					<?php 



$secondDate = date("Y-m-d");
$check2 = hd_week_ft($secondDate);
$end_check = $check2[0];
$week_div_num = date('w');

if($week_div_num ==0){$week_div_num =1;



};


?>

										  
<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
<thead>
	<tr>
		<th data-field="s_99" data-sortable="true" >No </th>
		<th data-field="s_00" data-sortable="true" >이름</th>
		<th data-field="s_1" data-sortable="true" > 이번주 작업 시간 (h)</th>
		<th data-field="s_2" data-sortable="true" > 1 작업당 소요 시간(h)</th>
		<th data-field="s_3" data-sortable="true" > 하루 평균 (h)</th>			
		<th data-field="s_4" data-sortable="true" >정보 확인 </th>

	</tr>
	</tr>
</thead>
<tbody>
<?php

$sql = "
SELECT sum(work_timeSpentSeconds)/3600 AS mamweek,
AVG(work_timeSpentSeconds)/3600 AS amamweek,

work_author,work_updated
	FROM jira_work_log
WHERE WEEKOFYEAR(work_updated)=".$end_check."
GROUP BY work_author
order by mamweek DESC

;";
$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));

$count_n = 0;
while($info	 = mysqli_fetch_array($res)){
	$count_n += 1;
	echo "
		<tr>
			<td data-field='s_99' data-sortable='true'>".$count_n."</td>
			<td data-field='s_00' data-sortable='true'>".$info['work_author']."</td>
			<td data-field='s_1' data-sortable='true'>".round($info['mamweek'],3)."</td>
			<td data-field='s_2' data-sortable='true'>".round($info['amamweek'],3)."</td>
			<td data-field='s_3' data-sortable='true'>".round($info['mamweek']/$week_div_num ,3)."</td>
			<td data-field='s_4' data-sortable='true'><a href='#'>확인하기(공수중)</a></td>
		</tr>								
	";

};











/*
	$count_n = 0;	
	$sql	 = "
				select b.admin_name, a.adminmember_idx, a.updateDate, a.DEAL_YMD, a.serviceKey
				from admin_apidata as a
					Join admin_member as b 
				on b.idx = a.adminmember_idx
				ORDER BY a.idx desc	
			;";
	$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));
	
	*/
?>


</tbody>
</table>
			
					</div>
				</div>
			</div>

		</div><!--/.row-->
		





								
	</div>	<!--/.main-->
<?php include_once('contents_footer.php');?>