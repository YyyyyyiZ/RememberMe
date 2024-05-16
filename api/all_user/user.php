<?php
//建立数据库连接
require_once('../mysql_connect.php');

//利用cookie得到uid
$uid=$_COOKIE['uid'];

//显示所有信息查询值
$sql1="call p1('uid')";
$result1=query($sql1);

//是否查询成功
if($result1){}
else{
    echo "查询失败";
}
//得到前端的所有更新值
$profile=$_POST['input_profile'];
$name=trim($_POST['input_name']);
$phone=trim($_POST['input_phone']);
$password=trim($_POST['input_password']);

//更新user数据库，内容：头像、用户名、用户id、手机号、密码
$sql="UPDATE user SET profile_photo=$profile, uname=$name, phone=$phone, upassword=$password where uid=$uid";
$result=query($sql);

//是否更新成功
if($result){
    echo "信息修改成功！";
}
else{
    echo "信息修改失败！请重试！";
}

?>