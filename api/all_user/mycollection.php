<?php
require_once("../mysql_connect.php");
//利用cookie得到uid
$uid=$_COOKIE['uid'];

//查询星球图片和名字
$sql="call p10('$uid')";
$result=query($sql);

if ($result){}
else{
    echo "收藏夹为空";
}

?>