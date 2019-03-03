<?php
$username=$_POST['username'];
$password=$_POST['password'];

$already=false;
$db_username="root";
$db_password="";
$sign_true="<script type=\"text/javascript\">alert(\"登录成功! 点击确定后进入信息页面\")</script>";
$sign_false="<script type=\"text/javascript\">alert(\"登录失败，用户名或密码错误 点击确定后返回登陆\")</script>";
$cmd_select_all="select * from info";

$conn=mysqli_connect("localhost",$db_username,$db_password);

if($conn){
    mysqli_select_db($conn,"userinfo");
    $data=mysqli_query($conn,$cmd_select_all);
    while($row=mysqli_fetch_assoc($data)){
        if($username==$row['usename']&&$password==$row['password']){
            echo $sign_true;
            header("url=./info.php");
            $already=true;
            break;
        }
    }
    if(!$already){
        echo $sign_false;
        header("url=./login.html");
    }

}
?>