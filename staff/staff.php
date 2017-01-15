<?php
header("Content-Type:text/plain;charset=UTF-8");
header("Access-Control-Allow-Origin:*");

$staff = array
(
    array('name' =>'Andy' ,'number' =>'1001','sex' =>'male','job' =>'manager' ),
    array('name' =>'Cher' ,'number' =>'1002','sex' =>'famale','job' =>'secretary' ),
    array('name' =>'Harry' ,'number' =>'1003','sex' =>'male','job' =>'engineer' )
);


//$_SERVER是一个超全局变量
//$_SERVER['REQUEST_METHOD'返回页面使用的请求方法
if($_SERVER['REQUEST_METHOD']=='GET'){
    search();
}elseif ($_SERVER['REQUEST_METHOD']=='POST') {
    create();
}


function search(){
    if(!isset($_GET['number'])||empty($_GET['number'])){
        echo "参数错误";
        return;
    }

    global $staff;

    $number=$_GET['number'];
    $result="没有找到员工";

    foreach ($staff as $value) {
        if($value['number']==$number){
            $result='找到员工。员工编号：'.$value['number'].'员工姓名：'.$value['name'].'员工性别：'.$value['sex'].'员工职位：'.$value['job'];
            break;
        }
    }

    echo $result;
}

function create(){
    if(!isset($_POST['number'])||empty($_POST['number'])||!isset($_POST['name'])||empty($_POST['name'])||!isset($_POST['sex'])||empty($_POST['sex'])||!isset($_POST['job'])||empty($_POST['job'])){

        echo "参数错误，员工信息填写不全";
        return;
    }

    echo "员工：".$_POST['name']."信息保存成功！";
}


?>