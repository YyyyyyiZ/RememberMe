<?php
//建立与数据库的连接
require_once('../mysql_connect.php');

//从cookie获得uid
$uid=$_COOKIE["uid"];

//从前端获得数据
$cname = $_POST['cname'];

$gender = $_POST['gender'];

$nation = $_POST['nation'];

$native_place = $_POST['native_place'];

$birth = $_POST['birth'];

$death = $_POST['death'];

$lifetime = $_POST['lifetime'];

$epitaph = $_POST['epitaph'];

$public = $_POST['public'];

$platfrom = $_POST['platform'];

$homepage = $_POST['homepage'];

$sql="insert into star set uid='$uid'";
$res = query($sql);
$sql1="call p44('$cname','$gender','$nation','$native_place','$birth','$death','$lifetime','$epitaph',$uid,'$public','$platfrom','$homepage')";
$res1= query($sql1);


if ($res1){
    header("content-type:application/json");
    echo json_encode("创建星球成功");
}
else{
    header("content-type:application/json");
    echo json_encode("请重试");
}