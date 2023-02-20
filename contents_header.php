<?php
if(!$_SESSION['admin_lv']){
	echo "<script>alert('잘못된 접근입니다.');parent.location.replace('/BIAS/');</script> ";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- 메타 데이터 -->
<title>더비즈 포털사업부 기획</title>
<meta name="description" content="" />
<meta name="author" content="YoonHD" />


<link href="/BIAS/css/bootstrap.min.css" rel="stylesheet">

<link href="/BIAS/css/datepicker3.css" rel="stylesheet">
<link href="/BIAS/css/styles.css" rel="stylesheet">


<link href="/BIAS/css/bootstrap-table.css" rel="stylesheet">
<link href="/BIAS/css/bootstrap-table.css" rel="stylesheet">

<script src="/BIAS/js/lumino.glyphs.js"></script>

<script type="text/javascript" src="/BIAS/js/loader.js"></script>

</head>



<?php
function breadcrumb($array){
?>
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/BIAS/home.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				

				<?php
				for($i = 0 ; $i < count($array)-1 ; $i++ ){
					echo "<li><a href='".$array[$i][0]."'>".$array[$i][1]."</a></li>";
				}
				echo "<li class='active'>".$array[count($array)-1][1]."</a></li>";
				?>
			</ol>
		</div><!--/.row-->
<?php
}





?>