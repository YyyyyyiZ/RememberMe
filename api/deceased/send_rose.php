<?php


//点击送花后在数据库中加入送花信息
//建立与数据库的连接
require_once('../mysql_connect.php');

//获取前端输入的人物星球id
$sid = $_POST['sid'];


//从cookie获得uid
$uid=$_COOKIE["uid"];


//执行mysql查询语句
$sql = "call p43($sid,$uid)";
$res = query($sql);

if ($res){
    header("content-type:application/json");
    echo json_encode("送玫瑰成功");
}
else{
    header("content-type:application/json");
    echo json_encode("账户余额不足");
}