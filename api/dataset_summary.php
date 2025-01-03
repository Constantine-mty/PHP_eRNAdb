<?php

session_start();
$DS = DIRECTORY_SEPARATOR;
require dirname(__DIR__)."{$DS}app{$DS}Db.class.php";
require dirname(__DIR__)."{$DS}app{$DS}Func.php";


$sid = $_POST['sid'];


$map = [];
$map[] = ['Accessions', '=', $sid];

$result = Db::table('OverallSummary')->where($map)->
select();


echo json_encode($result, JSON_UNESCAPED_UNICODE);