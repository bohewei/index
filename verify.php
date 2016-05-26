<?php
/**
 * Created by PhpStorm.
 * UserQQ: 337962552
 * Date: 2016/3/28
 * Time: 9:37
 */
header ("content-type:text/html;charset=utf8");
//print_r($_POST);
$number=$_POST['number'];
$name=$_POST['name'];
//验证姓名
$reg="/^[\x80-\xff]{6,30}$/";
if(!preg_match($reg,$name)) {
    echo "姓名是中文，2到10位";die;
}
$phone=$_POST['phone'];
//验证手机号
$reg_tell="/^1[3,5,8]\d{9}$/";
if(!preg_match($reg_tell,$phone)){
    echo "手机号必须是11位数字组成，以13,15,18开头";die;
}
$lesson_id=$_POST['lesson_id'];
$info_id=$_POST['info_id'];
$dsn = "mysql:host=localhost;dbname=open";
$db = new PDO($dsn, 'root', '1314');
//添加投稿信息
$sql="insert into `count` values(id,'$number','$name','$phone','$lesson_id','$info_id')";
$re=$db->exec($sql);
if($re){
    header("location:list.php");
}