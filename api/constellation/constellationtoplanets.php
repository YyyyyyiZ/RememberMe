<?php
//查询星座中的星球图片、id、名称
//建立与数据库的连接
require_once('../mysql_connect.php');
//获取前端输入的星座名称
$con_name=$_POST['con_name'];
$con_name='白羊座';
//执行mysql查询语句
$sql="call p12('$con_name')";
$res=query($sql);

$data=[];
if($res->num_rows>0){
   // $row = mysqli_fetch_assoc($res);

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
    $data['message']="无该星座星球信息";
}
header("content-type:application/json");
echo json_encode($data);