<?php
if(isset($_COOKIE['number'])){
    setcookie('number',$_COOKIE['number'],time()-500);
    echo "<script type=\"text/javascript\">alert(\"成功注销! 点击确定后返回主页\")</script>";
    header("refresh:0;url=./index.php");
}else{
    echo "<script type=\"text/javascript\">alert(\"成功注销! 点击确定后返回主页\")</script>";
    header("refresh:0;url=./index.php");
}
?>