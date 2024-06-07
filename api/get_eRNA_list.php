<?php

session_start();
$DS = DIRECTORY_SEPARATOR;
require dirname(__DIR__)."{$DS}app{$DS}Db.class.php";
require dirname(__DIR__)."{$DS}app{$DS}Func.php";



//$sid = $_POST['sid'];



$result = Db::table('ernaList')->where([
    //['Dataset','=',$sid],
    ['dataset','=','GSE83139'],
])->field('ernaName')->select();




//echo $result;
echo json_encode($result,JSON_UNESCAPED_UNICODE);
