<?php


$real_hostname="localhost";
$real_username="root";
//$real_password="apmsetup";
$real_password="autoset";

$real_name="thebiz_api";
$real_sock = mysqli_connect($real_hostname, $real_username, $real_password, $real_name);
$real_db = mysqli_select_db($real_sock, $real_name) or die ("데이터베이스 서버에 연결할 수 없습니다.");
mysqli_set_charset($real_sock, 'utf8'); 




//해당요일
/*
$month = '03';
$day = '29';
$year = '2021';
$dayOfTheWeek = date('w',mktime(0,0,0,$month,$day,$year)); 
$dayOfTheWeek1 = date('w',strtotime($year.$month.$day)); 
//주차구하기 

$week = date('W',mktime(0,0,0,$month,$day,$year)); 
$week1 = date('W',strtotime($year.$month.$day)); 

$sd = mktime(0,0,0,$month,$day-$dayOfTheWeek,$year); 
$sd1 = date("Y-m-d H:i:s",$sd); 

/*
//해당주차의 시작일 

$sd = mktime(0,0,0,$month,$day-$dayOfTheWeek,$year); 
$sd1 = date("Y-m-d H:i:s",$sd); 



//해당주차의 종료일 

$ed = mktime(23,59,59,$month,$day+(6-$dayOfTheWeek),$year); 
$ed1 = date("Y-m-d H:i:s",$ed); 



//해당달의 시작일 

$msd = mktime(23,59,59,$month,1,$year); 



//해당월의 마지막 날짜 

$med = mktime(23,59,59,$month,date("t",$msd),$year); 
$med1 = date("Y-m-d H:i:s",$med);

*/





function hd_thead_th($num,$name){
	echo "<th data-field='s_".$num."' data-sortable='true' >".trim($name)."</th>";
}
function hd_tbody_td($num,$name){
	echo "<td data-field='s_".$num."' data-sortable='true' >".trim($name)."</td>";
}





function cute_jy_curl($username,$password,$url){

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_USERPWD, "$username:$password");
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
	$ress=json_decode(curl_exec($curl),true);

	return 	$ress;
}


function cute_jy_work_kind($comments){
	$temp = explode("[",$comments );


}


function sub_cute_jy_curl($username,$password,$url){

	$sub_curl = curl_init();
	curl_setopt($sub_curl, CURLOPT_USERPWD, "$username:$password");
	curl_setopt($sub_curl, CURLOPT_URL, $url);
	curl_setopt($sub_curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($sub_curl, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($sub_curl, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($sub_curl, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($sub_curl,CURLOPT_RETURNTRANSFER,1);
	$ress=json_decode(curl_exec($sub_curl),true);

	return 	$ress;
}








//함수 관리 




























function hd_findertype($temp_name){
	$type = explode("_",$temp_name );
	if($type[2]=='multifamilyhouse'){
		$want = 'da';
	}
	elseif($type[2]=='tenementhouse'){
		$want = 'bil';
	}
	else{
		$want = $type[2];	
	}
	return $want;
}
function hd_findertype_invers($temp_name){
	if($temp_name=='da'){
		$want = 'multifamilyhouse';
	}
	elseif($temp_name=='bil'){
		$want = 'tenementhouse';
	}
	else{
		$want = $temp_name;	
	}
	return $want;
}


function hd_temp_print($value_0,$value_1,$value_2,$value_3){
	echo "<br><label>".$value_0."</label>";
	if($value_3==1){
		$temp = 'readonly ';
	}else{
		$temp = '';
	}
	echo "<input name ='".$value_1."' class='form-control' value = '".$value_2."' ".$temp.">";
}


function hd_int_to_date($temp){
	
	$year = floor($temp/10000);
	$month = floor(($temp-$year*10000)/100);
	$day = $temp-$year*10000-$month*100;
	if($day<10){
		$day = "0".$day;
	}else{
		$day = $day;
	}

	return $year."-".$month."-".$day;
}

function hd_int_to_date2($temp,$temp2){
	$beforeDay = date("Y-m-d", strtotime($temp." -".$temp2." day")); //통계 일자
	$beforeDay = explode("-",$beforeDay);
	$beforeDay = $beforeDay[0]*10000+$beforeDay[1]*100+$beforeDay[2];
	return $beforeDay;
}

function hd_int_to_date3($temp,$temp2){
	$beforeDay = date("Y-m-d", strtotime($temp." -".$temp2." day")); //통계 일자
	$beforeDay = explode("-",$beforeDay);
	$beforeDay = array($beforeDay[0],$beforeDay[1],$beforeDay[2]);
	return $beforeDay;
}


function hd_start_check($num,$real_sock){

	$today_time = date("Y-m-d H:i:s");
	$sqlssssss = "	
		insert admin_apidata_copy set 
			kind		='".$num."',
			startDate		= '".$today_time."'
		";
	$resssssss = mysqli_query($real_sock,$sqlssssss);
}




function hd_end_check($real_sock){
	$sqlsssss = "	
		select idx from  admin_apidata_copy order by idx DESC LIMIT 1
	";
	$resss = mysqli_query($real_sock,$sqlsssss);
	$infossss = mysqli_fetch_array($resss);
	$idx =$infossss['idx'];
	$today_time = date("Y-m-d H:i:s");
	$sqlsssss = "	
		update admin_apidata_copy set 
			updateDate		= '".$today_time."'
			where idx = '".$idx."'
		";


	$ressssss = mysqli_query($real_sock,$sqlsssss);

}

//더비즈 포털사업부 기획_ADMIN/cal_api/community_main.php 에서 사용하는 로직설명 
function hd_community_table($value0,$value1){
	echo "	<table width=100%>
				<tbody>
					<tr>
						<td> <h3> ".$value0."</h3></td>
						<td align='right'><details>
								<summary>로직</summary>
								<p>	".$value1."	</p>
							</details></td>
					</tr>
				</tbody>
			</table>";
}








function hd_text_to_int($deposit){
	$deposit = explode(",",$deposit);
	if(count($deposit)>1){
		$deposit = $deposit[0]*1000+$deposit[1];
	}
	else{
		$deposit = $deposit[0];
	}
	return $deposit;
}









/*
	메가존 프로젝트
*/



function hd_week_ft($temp_date){
	$temp_list	=explode('-',$temp_date);
	$month 		= $temp_list[1];
	$day 		= $temp_list[2];
	$year 		= $temp_list[0];
	$dayOfTheWeek = date('w',mktime(0,0,0,$month,$day,$year)); 
	$dayOfTheWeek1 = date('w',strtotime($year.$month.$day)); 
	$week 			= date('W',mktime(0,0,0,$month,$day,$year)); 
	$week1			 = date('W',strtotime($year.$month.$day)); 
	$sd = mktime(0,0,0,$month,$day-$dayOfTheWeek+1,$year); 
	$sd1 = date("Y-m-d ",$sd); 
	$ed = mktime(23,59,59,$month,$day+(7-$dayOfTheWeek),$year); 
	$ed1 = date("Y-m-d ",$ed); 
	$want_list = array($week ,$sd1,$ed1 );
	return $want_list;
}



?>