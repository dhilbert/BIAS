<?php
	include_once('g_header.php');
	include_once('lib/dbcon_BIAS.php');
?>
<body>
	<div id="wrapper">
		<!-- start header -->
		<header>
			<div class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>


							
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php"><span>더비즈 포털사업부 기획</span> API 정리</a>
					</div>
				
				</div>
			</div>
		</header>
	


	<section id="featured">
7	<!-- start slider -->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
	<!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">

                <img src="img/slides/1.jpg" alt="" />
				
            </ul>
			
        </div>
			</div>
		</div>
	</div>	
	
	

	</section>

<section class="callaction">
	<div class="container">
		<div class="row">
						<h2>
						<form name="frm" role="form" method="get" action="index_proc.php">
								<?php     echo '현재 PHP 버전: ' . phpversion();?>
								<h5><br>id : leadkim <br>			pw : asdf1020<br>								</h5>
							   <input class="form-control" placeholder="아이디를 입력 하세요" name="admin_id">
						       <input class="form-control" type='password' placeholder="비밀번호를 입력하세요" name="admin_pw">

						       <input  type='submit' class="btn btn-success login-btn" type="submit" value="Log in">

							     </form>
						 </h2>
<!--
						 <a href="#" data-toggle="modal" data-target="#myModal2" class="btn btn-success login-btn"> 회원 가입 요청</a>
-->					       


		</div>
	

	<!--	<p>
	<p>
	<p>
	<h4>회원 가입 요청 중인 사용자</h4>

	<?php
    header('Content-Type: text/html; charset=UTF-8');
?>
											  
	<table  border = 1 width="100%">
		<thead>
			<tr>
				<th data-field="s_99" data-sortable="true" >No </th>
				<th data-field="s_00" data-sortable="true" >아이디</th>
				<th data-field="s_00" data-sortable="true" >이름</th>
				<th data-field="s_1" data-sortable="true" > 회사 </th>
				<th data-field="s_2" data-sortable="true" > 부서</th>
				<th data-field="s_3" data-sortable="true" > 요청 시간</th>			
				

			</tr>
			</tr>
			
		</thead>
		<tbody>
			<?php 
		function changeCharset(&$item) {
			if(is_string($item)==true) { $encoding = array('UTF-8'); if(detectEncoding($item, $encoding)!='UTF-8') $item = iconv('EUC-KR', 'UTF-8', $item); }
		}
		function detectEncoding($str, $encodingSet) {
			foreach ($encodingSet as $v) { $tmp = iconv($v, $v, $str); if(md5($tmp) == md5($str)) return $v; } return false;
		}
		

				$no = 0;
				$sql	 = "select a.admin_id,a.admin_name,a.lasted_login,b.company_name,c.division_name
				
								from admin_member as a 
									join admin_company_info as b
								on a.company_idx = b.company_idx
									join admin_division_info as c
								on a.division_idx = c.division_idx		
								
								where a.admin_state = 0;";
										
				$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));
				while($info	 = mysqli_fetch_array($res)){
					$no +=1;
					echo "<tr>";
						echo "<td>".$no."</td>";
						echo "<td>".$info['admin_id']."</td>";						
						
						
						echo "<td>".$info['admin_name']."</td>";
						echo "<td>".$info['company_name']."</td>";						
						echo "<td>".$info['division_name']."</td>";	
						
						echo "<td>".$info['lasted_login']."</td>";

					echo "</tr>";

					



				};

	
			
			
			
			?>
		</tbody>
	</table>
 	
			-->




	<p>
	<p>
	<p>


	</div>


	</section>


	

<?php
include_once('g_footer.php');



?>




<div class="modal fade" id="myModal2" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<strong>	회원가입 요청</strong>
			</div>
			<div class="modal-body">
				<form name="frm" role="form" method="get" action="signup_proc.php">
						<label>아이디</label><font color='red'>※ 6자리 ~24자리 로 설정해야 함.</font> 
							<input class='form-control'		placeholder='아이디를 입력하세요' name = 'admin_id'	style='background-color:'><p><br>
						
						<label>이름</label>
							<input class='form-control'		placeholder='이름를 입력하세요' name = 'admin_name'	style='background-color:'><p><br>
						<label>패스워드 </label> <font color='red'>※ 8자리 ~16자리 로 설정해야 함.</font> 
							<input class='form-control'		type="password"		name = 'admin_pw'		style='background-color:'>
							
						<label>패스워드확인 </label>
							<input class='form-control'		type="password"		name = 'admin_pw_re'	style='background-color:'><p><br>

						<div class="form-group">
						<label>회사 선택</label>
							<select class="form-control" name = 'company_idx'>
							<?php
								$admin_company_info_sql	 = "select * from admin_company_info;";
								$admin_company_info_res	=  mysqli_query($real_sock,$admin_company_info_sql) or die(mysqli_error($real_sock));
								while($admin_company_info_info	 = mysqli_fetch_array($admin_company_info_res)){
										echo "<option value = '".$admin_company_info_info['company_idx']."'>".$admin_company_info_info['company_name']."</option>";
								};
							?>
							</select>
						</div>
						<p><br>
						<div class="form-group">
							<label>회사 선택</label>
							<select class="form-control" name = 'division_idx'>
							<?php								
								$admin_company_info_sql	 = "select * from admin_division_info;";
								$admin_company_info_res	=  mysqli_query($real_sock,$admin_company_info_sql) or die(mysqli_error($real_sock));
								while($admin_company_info_info	 = mysqli_fetch_array($admin_company_info_res)){
										echo "<option value = '".$admin_company_info_info['division_idx']."'>".$admin_company_info_info['division_name']."</option>";									
								};
							?>
							</select>
						</div>














				


			</div>
			<div class="modal-footer">
				<input  type='submit' class="btn btn-success login-btn" type="submit" value="회원 가입 요청">
				</form>

				 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>