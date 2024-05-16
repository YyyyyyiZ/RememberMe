<?php
//建立与数据库的连接
require_once('../mysql_connect.php');

//从cookie获得uid
$uid=$_COOKIE["uid"];

//从前端获得数据
$category=$_POST['category'];

$ttime=$_POST['ttime'];

$tname=$_POST['tname'];

$tconent=$_POST['tcontent'];

$sql="insert into star set uid='$uid'";
$res = query($sql);
$sql1="call p45('$category','$ttime','$tname','$tconent',$uid)";
$res1= query($sql1);

if ($res1){
    header("content-type:application/json");
    echo json_encode("创建星球成功");
}
else{
    header("content-type:application/json");
    echo json_encode("请重试");
}
