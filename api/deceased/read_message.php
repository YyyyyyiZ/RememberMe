<?php

//查询逝者星球留言和点赞情况
//建立与数据库的连接
require_once('../mysql_connect.php');

//获取前端输入的人物星球id
$sid = $_POST['sid'];


//执行mysql查询语句
$sql = "call p2($sid)";
$res = query($sql);

$data=[];
if($res->num_rows>0){
    $data['error']=false;
    $data['message']="查询成功";
    $temp=array();
   while ( $row = mysqli_fetch_assoc($res)){
       $temp[]=$row;
    }
    $data['data']=$temp;
}
else{
    $data['error']=true;
    $data['message']="无相关星球留言信息";
}
header("content-type:application/json");
echo json_encode($data);