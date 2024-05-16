<?php
//往数据库中写入举报信息
//建立与数据库的连接
require_once('../mysql_connect.php');
//获取前端输入的数据
$mid=$_POST['mid'];
$mid=1;
$reasons=$_POST['reasons'];
$reasons='物是人非';
$sid=$_POST['sid'];
$sid=1;
//利用cookie获取uid
$uid=$_COOKIE["uid"];
$uid=1;
$sql="call p46($mid,$uid,'$reasons',$sid) ";
$res = query($sql);

if ($res){
    header("content-type:application/json");
    echo json_encode("已发送举报");
}
else{
    header("content-type:application/json");
    echo json_encode("请重试！");
}