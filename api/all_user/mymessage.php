<?php
require_once("../mysql_connect.php");
//获取uid
$uid=$_COOKIE['uid'];

//我的星球的信息

$sql="SELECT
	`message1`.`uid` AS `人物星球留言id`,
	`message1`.`cname` AS `人物星球名称`,
	`message1`.`mcontent` AS `人物星球留言`,
	`message1`.`mtime` AS `人物星球留言时间`,
	`message2`.`uid` AS `事件id`,
	`message2`.`mcontent` AS `事件留言`,
	`message2`.`mtime` AS `事件留言时间`,
	`message2`.`tname` AS `事件名称`,
	`message1`.`创建者` AS `人物星球创建者id`,
	`message2`.`创建者id` AS `事件创建者id`,
	`rose`.`uid` AS `送花用户id`,
	`rose`.`sid` AS `被送花星球id`,
	`rose`.`rosetime` AS `送花时间`,
	`collection`.`uid` AS `收藏用户id`,
	`collection`.`sid` AS `收藏星球id`,
	`collection`.`cotime` AS `收藏时间` 
FROM
	(((
				`message1`
				JOIN `message2` 
				)
			JOIN `rose` 
		)
	JOIN `collection`);
";
$result=query($sql);
if ($result->num_rows>=1){
    $row = mysqli_fetch_assoc($result);
    $data['error']=false;
    $data['message']="查询成功";
    $data['uid1']=$result['人物星球留言id'];
    $data['cname']=$result['人物星球名称'];
    $data['mcontent1']=$result['人物星球留言'];
    $data['mtime1']=$result['人物星球留言时间'];
    $data['createid']=$result['人物星球创建者id'];
    $data['uid2']=$result['事件id'];
    $data['tname']=$result['事件名称'];
    $data['mcontent2']=$result['事件留言'];
    $data['mtime2']=$result['事件留言时间'];
    $data['createid2']=$result['事件创建者id'];
    $data['rose_uid']=$result['送花用户id'];
    $data['rose_sid']=$result['被送花星球id'];
    $data['rose_ime']=$result['送花时间'];
    $data['collection_uid']=$result['收藏用户id'];
    $data['collection_sid']=$result['收藏星球id'];
    $data['collection_time']=$result['收藏时间'];
}
else{
    $data['error']=true;
    $data['message']="无相关信息";
}

echo json_encode($data);

//其他星球消息
$sql1="SELECT
	`message4`.`mid` AS `点赞留言id`,
	`message4`.`留言用户` AS `留言用户`,
	`message4`.`sid` AS `点赞星球id`,
	`message4`.`mcontent` AS `点赞留言内容`,
	`message4`.`点赞用户` AS `点赞用户`,
	`message4`.`点赞时间` AS `点赞时间`,
	`message4`.`点赞id` AS `点赞id`,
	`message5`.`mid` AS `举报留言id`,
	`message5`.`uid` AS `被举报用户`,
	`message5`.`sid` AS `举报星球id`,
	`message5`.`mcontent` AS `举报留言内容`,
	`message5`.`reasons` AS `举报原因`,
	`message5`.`retime` AS `举报时间`,
	`message5`.`举报id` AS `举报id` 
FROM
(
    `message4`
	JOIN `message5`);";
$result1=query($sql1);

if ($result1->num_rows>=1){
    $row1 = mysqli_fetch_assoc($result1);
    $data1['error']=false;
    $data1['message']="查询成功";
    $data1['mid1']=$result1['点赞留言id'];
    $data1['留言用户']=$result1['留言用户'];
    $data1['sid1']=$result1['点赞星球id'];
    $data1['mcontent1']=$result1['点赞留言内容'];
    $data1['点赞用户']=$result1['点赞用户'];
    $data1['点赞时间']=$result1['点赞时间'];
    $data1['点赞id']=$result1['点赞id'];
    $data1['mid2']=$result1['举报留言id'];
    $data1['uid2']=$result1['被举报用户'];
    $data1['sid2']=$result1['举报星球id'];
    $data1['mcontent2']=$result1['举报留言内容'];
    $data1['reasons']=$result1['举报原因'];
    $data1['retime']=$result1['举报时间'];
    $data1['reid']=$result1['举报id'];
}
else{
    $data1['error']=true;
    $data1['message']="无相关信息";
}

echo json_encode($data1);
?>