<?php
//查询逝者星球图片和背景图
//建立与数据库的连接
require_once('../mysql_connect.php');

//获取前端输入的人物星球id
$sid = $_POST['sid'];


//执行mysql查询语句
$sql = "call p41($sid)";
$res = query($sql);

$sql1="call p40($sid)";
$res1=query($sql1);

$data = [];
$data1=[];

if ($res->num_rows >= 1) {
    $row = mysqli_fetch_assoc($res);

    $data['error'] = false;
    $data['message'] = "图片查询成功";
    $temp=array();
    while ( $row = mysqli_fetch_assoc($res)){
        $temp[]=$row;
    }
    $data['data'] = $temp;
} else {
    $data['error'] = true;
    $data['message'] = "图片查询失败";
}
if ($res1->num_rows == 1) {
    $row1 = mysqli_fetch_assoc($res1);

    $data1['error'] = false;
    $data1['message'] = "背景图查询成功";
    $data1['data'] = $row1;
} else {
    $data1['error'] = true;
    $data1['message'] = "背景图查询失败";
}
header("content-type:application/json");
echo json_encode($data);
echo json_encode($data1);
