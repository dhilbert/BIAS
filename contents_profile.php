
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/BIAS/home.php"><span>TheBiz</span>api test </a>
				
				
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>  <span class="caret"></span>
						<?php
						
							echo $admin_name ;
						?>
						</a>
						<ul class="dropdown-menu" role="menu">
						

							<li><a href="#" data-toggle="modal" data-target="#myModal2"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> 정보 수정</a></li>
							<li><a href="/BIAS/"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>





			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		

<!-- Modal -->
<div class="modal fade" id="myModal2" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<?php  echo $admin_name ?>님의 정보
			</div>
			<div class="modal-body">

				<form name="frm" role="form" method="get" action="modify_user_proc.php">

						<?php						
							$sql	 = "select * from admin_member where admin_id ='".$admin_id."';";
							$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));
							$info	 = mysqli_fetch_array($res);
					
						?>
						
						
						<label>아이디</label>
							<input class='form-control' placeholder='이름를 입력하세요' name = 'admin_id'	value='<?php echo $info['admin_id']?>'	style='background-color:'>
						
						<label>이름</label>
							<input class='form-control'  placeholder='이름' name = 'admin_name'	value='<?php echo $info['admin_name']?>'	style='background-color:'>
						<label>패스워드확인 </label>
							<input class='form-control' type='password' placeholder='패스워드(비밀번호를 입력해서 수정 가능)' name = 'admin_pw'	value=''	style='background-color:'>
						<label>패스워드확인 </label>
							<input class='form-control' type='password' placeholder='패스워드(비밀번호를 입력해서 수정 가능)' name = 're_admin_pw'	value=''	style='background-color:'>
							<input class='form-control' type='hidden' name = 'admin_idx'	value='<?php echo $info['admin_idx']?>'	style='background-color:'>

				


			</div>
			<div class="modal-footer">
				<input  type='submit' class="btn btn-success login-btn" type="submit" value="수정">
				</form>

				 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>