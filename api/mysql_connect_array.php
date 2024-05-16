<?php
/**
 * @desc 传入查询语句，以【二维】关联数组形式返回查询结果
 * @param $querystring
 * @return array
 */
function query($querystring){

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

    //保证汉字进行utf8编码
    $conn->query("set names utf8");

    //执行查询
    $res = $conn->query($querystring);

    //以二维关联数组形式返回查询结果
    $array=$res->fetch_all(MYSQLI_ASSOC);

    //关闭连接
    mysqli_close($conn);

    //关闭结果释放内存
    $res->close();

    //返回查询结果
    return $array;
}
