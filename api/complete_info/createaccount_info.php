<?php
//建立与数据库的连接
require_once('mysql_connect.php');

//利用cookie获取uid
$uid=$_COOKIE["uid"];

//得到前端输入的相关信息
$profile=$_POST['profile'];
$name=trim($_POST['input_name']);
$password=trim($_POST['input_password']);

//修改密码
//判断两次密码是否一致
if(trim($_POST['input_password'])!=trim($_POST['input_password2'])){
    echo "两次密码不一致，请重新输入！";
}
else {
    //更新user表
    $sql = "UPDATE user SET profile_photo=$profile,uname=$name,upassword=$password where uid='$uid'";
    $result=query($sql);
    if ($result){
        echo "创建成功！welcome！";
        header("location:"."../pages/homepage.html");
    }
    else{
        echo "创建失败！请重试！";
    }
}
?>