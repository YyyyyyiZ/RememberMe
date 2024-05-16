<?php
//读取事件图片、收藏量、事件描述、访问量加一
//建立与数据库的连接
require_once('../mysql_connect.php');
//获取前端输入的数据
$sid=$_POST['sid'];

//从cookie获得uid
$uid=$_COOKIE["uid"];

$sql="call p3($sid)";
$res = query($sql);

$sql1="select tcontent,cover from topic where sid='$sid'";
$res1 = query($sql1);

$sql2 = "call p42($sid,$uid)";
$res2= query($sql2);

$data = [];
$data1=[];

if ($res->num_rows == 1) {
    $row = mysqli_fetch_assoc($res);

    $data['error'] = false;
    $data['message'] = "查询收藏玫瑰记录成功";
    $data['data'] = $row;
} else {
    $data['error'] = true;
    $data['message'] = "该星球还未有送花和收藏记录";
}

if ($res1->num_rows == 1) {
    $row1 = mysqli_fetch_assoc($res1);

    $data1['error'] = false;
    $data1['message'] = "查询事件信息记录成功";
    $data1['data'] = $row1;
} else {
    $data1['error'] = true;
    $data1['message'] = "未查询到该星球信息";
}

if ($res2){
    header("content-type:application/json");
    echo json_encode("已添加访问信息");
}
else{
    header("content-type:application/json");
    echo json_encode("请重试！");
}
header("content-type:application/json");
echo json_encode($data);
echo json_encode($data1);