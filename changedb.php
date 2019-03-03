<?php
session_start();

$number=$_POST['number'];
$already=false;
$db_username="root";
$db_password="";
$sign_true="<script type=\"text/javascript\">alert(\"修改成功! 点击确定后进入信息页面\")</script>";
$sign_false="<script type=\"text/javascript\">alert(\"修改失败！点击确定后返回信息页面\")</script>";
$sign_del_true="<script type=\"text/javascript\">alert(\"删除成功! 点击确定后进入信息页面\")</script>";
$sign_del_false="<script type=\"text/javascript\">alert(\"删除失败！点击确定后返回信息页面\")</script>";
$sign_loss_false="<script type=\"text/javascript\">alert(\"缺少信息！点击确定后返回信息页面\")</script>";
$cmd_select_all="select * from info";
$cmd_select_bynum="select * from info where number=\"".$number."\"";
$cmd_delete="delete from info where number=\"".$number."\"";
$conn=mysqli_connect("localhost",$db_username,$db_password);

if($conn){
    mysqli_select_db($conn,"userinfo");
    if(isset($_POST['number'])){
        $data=mysqli_query($conn,$cmd_select_bynum);
        if(isset($_POST['name'])){
            $name=$_POST['name'];
            $age=$_POST['age'];
            $username=$_POST['username'];
            $password=$_POST['password'];
            $sex=$_POST['sex'];
            $identity=$_POST['identity'];
            $cmd_update=" update info set name='$name',number='$number',age='$age',username='$username',password='$password',sex='$sex',identity='$identity' where number='$number';";

            $data=mysqli_query($conn,$cmd_update);
            if($data){
                echo $sign_true;
                header("refresh:0;url=./info_admin.php");
            }else{
                echo $sign_false;
                header("refresh:0;url=./info_admin.php");
            }
        }else{
            $data=mysqli_query($conn,$cmd_delete);
            if($data){
                echo $sign_del_true;
                header("refresh:0;url=./info_admin_del.php");
            }else{
                echo $sign_del_false;
                header("refresh:0;url=./info_admin_del.php");
            }
        }
    }else{
        echo $sign_loss_false;
        header("refresh:0;url=./info_admin.php");
    }

}
?>