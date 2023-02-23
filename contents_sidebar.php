<?php
function hd_active($input){
	$uri=explode('/',$_SERVER['REQUEST_URI']);
		if($uri[2]==$input){
		echo "class='active'";}
}
function hd_drop($num,$grobal,$sub_name,$sub_url){
?>

<li class="parent ">
		<a href="#">
		<span data-toggle="collapse" href="#sub-item-<?php echo $num;?>"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg> <?php echo $grobal?> </span>
		</a>
		<ul class="children collapse" id="sub-item-<?php echo $num;?>">
		<?php
		for($i = 0 ; $i <count($sub_name);$i++){
		?>
			<li>
				<a class="" href="<?php echo $sub_url[$i];?>">
					<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> <?php echo $sub_name[$i];?>
				</a>
			</li>
		<?php
		}?>
		</ul>
	</li>
<?php
}
?>


	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
				
			</div>

		</form>






		<ul class="nav menu" >
		<li <?php hd_active("home.php");?>><a href="/BIAS/home.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg>Home</a></li>
		
		
		
		




		<?php
			$num		='hq-00';
			$grobal		= '공공데이터포탈';
			$sub_name	= array('소상공인시장진흥공단_상가(상권)','토지임야대장','대지권등록정보조회서비스','건축물대장');
			$sub_url	= array("/BIAS/00_api/00_main.php","/BIAS/00_api/ladfrlList.php"
			,"/BIAS/00_api/01_main.php","/BIAS/00_api/02_main.php"			);	 					

			hd_drop($num,$grobal,$sub_name,$sub_url);


			$num		='hq-98';
			$grobal		= '데이터 시뮬레이션';
			$sub_name	= array('안전거래서비스');
			$sub_url	= array("/BIAS/01_safeService/00_main.php");
			hd_drop($num,$grobal,$sub_name,$sub_url);

			$num		='hq-99';
			$grobal		= '데이터적 용어 정의 ';
			$sub_name	= array('건축물 용도 등의 확인','면적','대지권비율');
			$sub_url	= array("/BIAS/99_def/def_000.php","/BIAS/99_def/def_001.php","/BIAS/99_def/def_002.php");
			hd_drop($num,$grobal,$sub_name,$sub_url);



			$num		='hq-02';
			$grobal		= '데이터 확인';
			$sub_name	= array('전유부 존재하는 데이터 확인 ');
			$sub_url	= array("/BIAS/00_api_test/01_main.php"		);
		
		


		?>				
		
		
		<!--
		<li <?php hd_active("02_loreal.php");?>><a href="/BIAS/02_weekreport/02_loreal.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg>주간 보고</a></li>
						-->							


	</ul>
</div>