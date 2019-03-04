
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" href="./css_files/auth.css">
</head>
<body>
	<div class="lowin">		
		<div class="lowin-wrapper" style="min-height: 457px,width=40%;">
			<div class="lowin-box lowin-login">
				<div class="lowin-box-inner">
					<form action="./login.html">
					<?php
						if(isset($_COOKIE['number'])){
							echo "</br>";
							echo "<p style=\"color:pink;\">检测到".$_COOKIE['number']."已经登录</p>";
							echo "<p>3秒后自动跳转</p>";
							header("refresh:3;url=./login.php");
						}
					?>
						<p>PHP是最好的语言！</p>
						<p>                 </p>
						<p>                  </p>
						<div class="lowin-brand">
						<img src="./image/mouse.jpg" alt="logo">
						</div>
						<p>网站说明</p>
						<p>1.管理员拥有修改和删除数据库的权限</p>
						<p>2.若之前已登录过则可直接进入</p>
						<p>3.网站提示信息要点击确认后页面才会进行跳转</p>
						<p>4.网站设计使用学号作为档案唯一标识</p>
						<p></br></p>
						<button class="lowin-btn login-btn">
							进入
						</button>
						<div class="text-foot">
							这里是主页
						</div>
					</form>
				</div>
			</div>
		</div>
	
		<footer class="lowin-footer">
			Design By 纪志鹏 1120162387 
		</footer>
	</div>

</body></html>