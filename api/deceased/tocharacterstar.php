<?php

//查询逝者信息并插入访问记录
//建立与数据库的连接
require_once('../mysql_connect.php');

//获取前端输入的人物星球id
$sid = $_POST['sid'];

//从cookie获得uid
$uid=$_COOKIE["uid"];

//执行mysql查询语句
$sql = "call p4('$sid')";
$res = query($sql);


$sql2 = "call p42($sid,$uid)";
$res2= query($sql2);


$data = [];

if ($res->num_rows == 1) {
    $row = mysqli_fetch_assoc($res);

    $data['error'] = false;
    $data['message'] = "逝者信息查询成功";
    $data['data'] = $row;
} else {
    $data['error'] = true;
    $data['message'] = "逝者信息查询失败";
}

if ($res2){

    echo json_encode("已添加访问信息");
}
else{
    header("content-type:application/json");
    echo json_encode("请重试！");
}
header("content-type:application/json");
echo json_encode($data);
