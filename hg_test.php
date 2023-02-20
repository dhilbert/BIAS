<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php  


$real_hostname="localhost";
$real_username="root";
//$real_password="apmsetup";
$real_password="autoset";
$real_name="hg_test";
$real_sock = mysqli_connect($real_hostname, $real_username, $real_password, $real_name);
$real_db = mysqli_select_db($real_sock, $real_name) or die ("데이터베이스 서버에 연결할 수 없습니다.");
mysqli_set_charset($real_sock, 'utf8'); 




// 폴더명 지정  
$dir = "C:\Users\yoonhd\OneDrive\바탕 화면\TA정답지작업\전사완료";  
  
// 핸들 획득  
$handle  = opendir($dir);  
  
$files = array();  
  
// 디렉터리에 포함된 파일을 저장한다.  
while (false !== ($filename = readdir($handle))) {  
if($filename == "." || $filename == ".."){  
continue;  
}  
  
// 파일인 경우만 목록에 추가한다.  
if(is_file($dir . "/" . $filename)){  
$files[] = $filename;  
}  
}  
  
// 핸들 해제  
closedir($handle);  
  
// 정렬, 역순으로 정렬하려면 rsort 사용  
sort($files);  
  
// 파일명을 출력한다.  
foreach ($files as $f) {  
	$want_file_name = $f;
	
	//내용을 읽어올 파일명
	$fileName = $dir."\\".$want_file_name;

	$want_text = '';
	if(file_exists($fileName)){
		//파일 열기 
		$fp = fopen($fileName, 'r');
		while(!feof($fp)){ // feof() 함수는 전달받은 파일 포인터가 파일의 끝에 도달하면, true를 반환
			$member = fgets($fp); // 한 줄씩 $member 변수에 저장하고 
			$want_text =$want_text.iconv("EUC-KR", "UTF-8",$member)."<br>";
			
		}
	} else { 
		echo "파일이 존재하지 않습니다."; 
	} //end if_fe

	$sql	 = "
	insert stt_tempdb set 
		file_name = '".$want_file_name."',
		file_text = '".$want_text."'	";
	$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));







}  



















