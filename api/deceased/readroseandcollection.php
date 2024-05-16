<?php
//建立与数据库的连接
//查询人物星球玫瑰数和收藏数
require_once('../mysql_connect.php');
//获取前端输入的数据
$sid=$_POST['sid'];

$sql="call p3($sid)";
$res = query($sql);


if ($res->num_rows == 1) {
    $row = mysqli_fetch_assoc($res);

    $data['error'] = false;
    $data['message'] = "查询成功";
    $data['data'] = $row;
} else {
    $data['error'] = true;
    $data['message'] = "该星球还未有送花和收藏记录";
}
header("content-type:application/json");
echo json_encode($data);