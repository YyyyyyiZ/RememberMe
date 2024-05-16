<?php
//往数据库中点赞留言信息
//建立与数据库的连接
require_once('../mysql_connect.php');
//获取前端输入的留言id
$mid=$_POST['mid'];

//利用cookie获取uid
$uid=$_COOKIE["uid"];

$sql="call p23_4($mid,$uid) ";
$res = query($sql);

if ($res){
    echo"点赞成功";
}
else{
    $sql1 = "delete from likes where uid='$uid' and mid='$mid'";
    $res1 = query($sql1);
    if ($res1){
        header("content-type:application/json");
        echo json_encode("取消点赞成功");
    }
    else{
        header("content-type:application/json");
        echo json_encode("取消点赞失败");
    }
}
