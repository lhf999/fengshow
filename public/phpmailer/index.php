<?php
header("Content-Type:text/html;charset=utf-8");
require_once("./functions.php");
$flag = sendMail('1243290242@qq.com','欢迎加入php中文网学习',
    '<span style="color:skyblue;">哈哈哈</span><br/>');
if($flag){
    echo "发送邮件成功！";
}else{
    echo "发送邮件失败！";
}
?>