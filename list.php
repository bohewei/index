<?php
/**
 * Created by PhpStorm.
 * UserQQ: 337962552
 * Date: 2016/3/28
 * Time: 12:36
 */
header ("content-type:text/html;charset=utf8");
$dsn = "mysql:host=localhost;dbname=open";
$db = new PDO($dsn, 'root', '1314');
//查询课程
$re=$db->query("select concat(ROUND(count(count.info_id)/(select count(info_id) from count)*100),'%') as num,
info_name from count INNER JOIN info on count.info_id=info.info_id GROUP BY count.info_id");
$lesson = $re->fetchAll(PDO::FETCH_ASSOC);
foreach($lesson as $k){
    echo $k['info_name']."&nbsp;&nbsp;&nbsp;&nbsp;".$k['num']."<br/>";
}
