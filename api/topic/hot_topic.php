<?php
//建立与数据库的连接
//查询点击量前九的事件
require_once('../mysql_connect.php');

$sql="call p9()";
$res=query($sql);

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
    $data['message']="请重试";
}
header("content-type:application/json");
echo json_encode($data);