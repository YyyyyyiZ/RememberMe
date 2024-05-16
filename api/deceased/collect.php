<?php
//点击收藏后在数据库中加入收藏信息,如果已经收藏则取消收藏
//建立与数据库的连接
require_once('../mysql_connect.php');

//获取前端输入的人物星球id
$sid = $_POST['sid'];


//从cookie获得uid
$uid=$_COOKIE["uid"];


//查找用户是否已经收藏过
$sql = "call p23_1_1($sid,$uid)";
$res = query($sql);

if($res){
    echo"收藏成功";
}
else {
    $sql2 = "delete from collection where uid='$uid' and sid='$sid'";
    $res2 = query($sql2);
    if ($res2){
        header("content-type:application/json");
        echo json_encode("取消收藏成功");
    }
    else{
        header("content-type:application/json");
        echo json_encode("取消收藏失败");
    }

}
