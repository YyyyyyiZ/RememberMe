<?php
//通过姓名模糊查询逝者姓名和id
//建立与数据库的连接
require_once('../mysql_connect.php');
//获取前端输入的查询逝者的姓名
$cname=$_POST['cname'];

//执行mysql查询语句
$sql="call p39('$cname')";
$res=query($sql);

$data=[];
if($res->num_rows>=1){
    $row = mysqli_fetch_assoc($res);

    $data['error']=false;
    $data['message']="查询成功";
    $data['data']=$row;
}
else{
    $data['error']=true;
    $data['message']="无相关星球";
}
header("content-type:application/json");
echo json_encode($data);