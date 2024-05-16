<?php
//建立数据库连接
require_once('mysql_connect.php');

//利用cookie获取uid
$uid=$_COOKIE["uid"];

//判断当天是否签到过，未签到则赠送三朵玫瑰
$sql="call p38('$uid')";
$result=query($sql);

if($result){
    echo json_encode("签到成功！");
}
else{
    echo json_encode("今日已签到！");
}

//连续签到功能
$sql1="select sdate from sign where uid='uid'";
$timeArr=query($sql1);

//获取当前日期
$todayTime =date('Y-m-d');

//连续签到次数
$count = 1;

//获取当天时间
$time = date('Y-m-d');

//判断是否连续
$isContinuous = true;

//循环时间数据
foreach ($timeArr as $v){
    //根据循环跳转判断时间
    $time1 = strtotime("-".$count." days", strtotime($todayTime));//前一天时间戳
    $time1 = date('Y-m-d',$time1);
    //判断当前是否连续
    if($isContinuous){
        $v = substr($v,0,10);
        //判断当前时间是否一致
        if($v == $time1){
            $count++;
        }
        //时间不一致结束循环
        else{
            $isContinuous = false;
            break;
        }
    }
}

$msg = "连续签到" . $count . '天';
echo iconv("GB2312","UTF-8",$msg);

//查看有多少玫瑰
$sql2="select rosenum from user where uid='$uid'";
$result2=query($sql2);
if($result2->num_rows>=1){
    $row = mysqli_fetch_assoc($result2);
    $data['error']=false;
    $data['message']="查询成功";
    $data['rosenum']=$row;
}
else{
    $data['error']=true;
    $data['message']="无玫瑰相关信息";
}
echo json_encode($data);

//玫瑰数大于0
$sql3="call trigger rose_zero";
$result3=query($sql3);
//这里的提示还没有做
?>