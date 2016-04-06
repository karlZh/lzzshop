<?php
$redis = new Redis();
$redis->connect("127.0.0.1","6379");
$redis->set("test","Hello World");
$redis -> lPush('xm',1000);
$redis -> lPush('xm',2000);
$redis -> lPush('xm',3000);
$result = array();
//for($i=0;$i<5;$i++)
//{
    $arr = $redis -> brpoplpush('xm','xm',10);
//    $result[$i] = $arr;
//}
$result = $redis -> lRange('xm',0,-1);
echo 'brpoplpush:';
var_dump($arr);
echo '<br>';
echo 'lrange:';
var_dump($result);

?>