<?php
/**
 * @desc 传入查询内容，针对成功的 SELECT、SHOW、DESCRIBE 或 EXPLAIN 查询，将返回一个 mysqli_result 对象。
 *                  针对其他成功的查询，将返回 TRUE。如果失败，则返回 FALSE。
 *                  建议使用完$res后执行$res->close();语句，关闭结果释放内存
 * @param $querystring
 * @return bool|mysqli_result
 */
function query($querystring){
    //配置本地数据库
    //$dbhost = 'localhost:3306';
    //$dbuser = 'rm';
    //$dbpass = 'rememberme';
    //$dbname = 'remember';

    //配置腾讯云数据库
    $dbhost = 'sh-cdb-oius7d3c.sql.tencentcdb.com:58565';
    $dbuser = 'rm';
    $dbpass = 'RememberMe666';
    $dbname = 'remember';

    //连接数据库
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

    //检查连接
    if (mysqli_connect_errno()) {
        header('location:'."../pages/connect_error.html");
        //die("连接 MySQL 失败: " . mysqli_connect_error());
    }

    //保证汉字进行编码
    mysqli_query($conn, "set names utf8");

    //执行查询
    $res = mysqli_query($conn, $querystring);

    //关闭连接
    mysqli_close($conn);

//    //----------面向对象方法----------
//    //连接数据库
//    $conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
//
//    //检查连接
//    if($conn->connect_error){
//        die("连接 MySQL 失败!");
//    }
//
//    //保证汉字进行编码
//    $conn->query("set names utf8");
//
//    //执行查询
//    $res=$conn->query($querystring);
//
//    //关闭连接
//    $conn->close();

//    //方法3
//    $stmt = $conn->prepare($querystring);
//    $stmt->execute();
//    $res = $stmt->get_result();

    //返回查询结果
    return $res;
}
