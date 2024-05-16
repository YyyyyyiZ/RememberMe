<?php
//查找用户头像
//建立与数据库的连接
require_once('../mysql_connect.php');

//利用cookie获取uid
$uid=$_COOKIE["uid"];

//执行mysql查询语句
$sql="select profile_photo from user where uid='$uid'";
$res=query($sql);

$data=[];
if($res->num_rows==1){
    $row = mysqli_fetch_assoc($res);
    $profile_photo=$row['profile_photo'];
    setcookie("profile_photo", $profile_photo, time()+3600);
    $data['error']=false;
    $data['message']="查询头像成功";
    $data['data']=$row;
}
else{
    $data['error']=true;
    $data['message']="用户尚未上传头像";
}
header("content-type:application/json");
echo json_encode($data);



