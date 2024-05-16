<?php
//建立与数据库的连接
require_once('../mysql_connect.php');

//从前端获得数据
$tcname2=$_POST['tcname2'];

$sql="select  tname from topic where category='$tcname2'";
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
    $data['message']="请重试";
}
header("content-type:application/json");
echo json_encode($data);