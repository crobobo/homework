<?php
$name=$_POST['name'];
$number=$_POST['number'];
$age=$_POST['age'];
$username=$_POST['username'];
$password=$_POST['password'];
$sex=$_POST['sex'];
$identity=$_POST['identity'];

$already=false;
$db_username="root";
$db_password="";
$sign_true="<script type=\"text/javascript\">alert(\"注册成功!点击确定返回登录\")</script>";
$sign_false="<script type=\"text/javascript\">alert(\"注册失败，用户名或者学号已经存在！\")</script>";
$cmd_select_all="select * from info";
$cmd_insert=" insert into info(name,number,age,username,password,sex,identity) values('$name','$number','$age','$username','$password','$sex','$identity');";

$conn=mysqli_connect("localhost",$db_username,$db_password);

if($conn){
    mysqli_select_db($conn,"userinfo");
    $data=mysqli_query($conn,$cmd_select_all);
    while($row=mysqli_fetch_assoc($data)){
        if($number==$row['number']||$username==$row['username']){
            echo $sign_false;
            header("refresh:0;url=./login.html");
            $already=true;
            break;
        }
    }
    if(!$already){
        $data=mysqli_query($conn,$cmd_insert);
        if($data){
            echo $sign_true;
            header("refresh:0;url=./login.html");
        }
    }

}
?>