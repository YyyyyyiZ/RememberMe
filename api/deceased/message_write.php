<?php
//往数据库中写入星球留言
//建立与数据库的连接
require_once('../mysql_connect.php');
//获取前端输入的数据
$sid=$_POST['sid'];

$mcontent=$_POST['mcontent'];

$mpublic=$_POST['mpublic'];

//利用cookie获取uid
$uid=$_COOKIE["uid"];

$sql="call p23_3($sid,$uid,'$mcontent','$mpublic') ";
$res = query($sql);

if ($res){
    header("content-type:application/json");
    echo json_encode("已发送留言");
}
else{
    header("content-type:application/json");
    echo json_encode("请重试！");
}