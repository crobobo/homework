<?php

$already=false;
$db_username="root";
$db_password="";
$sign_true="<script type=\"text/javascript\">alert(\"登录成功! 点击确定后进入信息页面\")</script>";
$sign_false="<script type=\"text/javascript\">alert(\"登录失败，用户名或密码错误 点击确定后返回登陆\")</script>";
$cmd_select_all="select * from info";

$conn=mysqli_connect("localhost",$db_username,$db_password);

if($conn){
    mysqli_select_db($conn,"userinfo");
    if(isset($_COOKIE['number'])&&(!isset($_POST['username'])||!isset($_POST['password']))){
        $number=$_COOKIE['number'];
        $cmd_select_bynum="select * from info where number=\"".$number."\"";
        $data=mysqli_query($conn,$cmd_select_bynum);
        $row=mysqli_fetch_assoc($data);
        $already=true;
        session_start();
        $_SESSION['name']=$row['name'];
        $_SESSION['number']=$row['number'];
        echo $sign_true;
        //setcookie("number",$row['number'],time()+300);
        if($row['identity']=="user"){
            header("refresh:0;url=./info.php");
        }else{
            header("refresh:0;url=./info_admin.php");
        }

    }else{
        $data=mysqli_query($conn,$cmd_select_all);
        if(!isset($_POST['username'])||!isset($_POST['password'])){
            header("refresh:0;url=./login.html");
            exit();
        }
        $username=$_POST['username'];
        $password=$_POST['password'];
        while($row=mysqli_fetch_assoc($data)){
            if($username==$row['username']&&$password==$row['password']){
                echo $sign_true;
                setcookie("number",$row['number'],time()+300);
                if($row['identity']=="user"){
                    header("refresh:0;url=./info.php");
                }else{
                    header("refresh:0;url=./info_admin.php");
                }
                $already=true;
                session_start();
                $_SESSION['name']=$row['name'];
                $_SESSION['number']=$row['number'];
                break;
        }
    }
}
    if(!$already){
        echo $sign_false;
        header("refresh:0;url=./login.html");
    }

}
?>