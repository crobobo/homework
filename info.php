<?php 
    session_start();
    $db_username="root";
    $db_password="";
    $cmd_select_all="select * from info";
    $name=$_SESSION['name'];
    $number=$_SESSION['number'];
    $cmd_select_bynum="select * from info where number=\"".$number."\"";
?>

<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>info</title>
    <link rel="stylesheet" href="./css_files/auth.css">
</head>
<body>

	<div class="lowin">
		<div class="lowin-wrapper" style="min-height: 457px;width:70%;">
			<div class="lowin-box">
				<div class="lowin-box-inner" style="padding: 25px 25px 25px 25px;">
                <?php echo "<p>欢迎你，".$name."同学，你的学号为".$number."<a href=\"./signout.php\">  注销</a></p>";
                        //session_destroy();
                        //unset($_SESSION['name']);
                        //unset($_SESSION['number']);
                        ?>
						<div class="lowin-group" >
							<table border="1" class="lowin-input">
                            <tr>
                                <th>姓名</th>
                                <th>学号</th>
                                <th>年龄</th>
                                <th>账号</th>
                                <th>密码</th>
                                <th>性别</th>
                                <th>身份</th>
                            </tr>
                                <?php
                                $conn=mysqli_connect("localhost",$db_username,$db_password);
                                mysqli_select_db($conn,"userinfo");
                                if($conn){
                                    $data=mysqli_query($conn,$cmd_select_bynum);
                                    $row=mysqli_fetch_assoc($data);
                                    echo "<tr>";
                                    echo "<th>".$row['name']."</th>";
                                    echo "<th>".$row['number']."</th>";
                                    echo "<th>".$row['age']."</th>";
                                    echo "<th>".$row['username']."</th>";
                                    echo "<th>".$row['password']."</th>";
                                    echo "<th>".$row['sex']."</th>";
                                    echo "<th>".$row['identity']."</th>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
						</div>
				</div>
			</div>
		</div>
	
		<footer class="lowin-footer">
			Design By 纪志鹏 1120162387 
		</footer>
	</div>



</body>
</html>