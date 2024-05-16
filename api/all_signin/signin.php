
<?php
require_once('mysql_connect.php');
//获取手机号
$phonenumber=$_POST["input_phone"];

//查询密码和uid
$sql = "select upassword,uid FROM user where phone=$phonenumber";
$res = query($sql);

//查询到结果
if($res->num_rows==1){
    //获取第一行结果
    $row = mysqli_fetch_assoc( $res );
    //$row=array_shift($res);
    //判断密码是否正确
    if($row['upassword']==$_POST["password"])
    {
        //设置cookie
        $uid=$row['uid'];
        //setcookie(name, value, expire, path, domain);
        setcookie("uid", $uid, time()+3600);

        //跳转至homepage
        header('location:'."../pages/createaccount_info.html");
    }
    else{
        //密码错误
        exit('密码输入错误！');
    }
}
//查询不到结果，用户名不存在
else {
    exit('用户不存在！');
}

