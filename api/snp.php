<?php

    session_start();
    $DS = DIRECTORY_SEPARATOR;
    require dirname(__DIR__)."{$DS}app{$DS}Db.class.php";
    require dirname(__DIR__)."{$DS}app{$DS}Func.php";



    //提取表单变量，附值给新变量
    /*
    $chr = $_GET["chr"];
    $start = $_GET["start"];
    $end = $_GET["end"];
    $tissue = $_GET["tissue"];
    $gene = $_GET["gene"];
    $cell_type = $_GET["cell_type"];
    $experiment = $_GET["experiment"];
    */


    //测试Db.class调用情况
    //  $result = Db::table('snp')->where([
    //  ["chr","=","chr1"],
    //  ["start","=","712228"],
    //  ["end","=","rs559206294"],
    //  ])->select();


    $result = Db::table('snp')->where([
        ["chr","=",$_GET["chr"]],
        ["start","=",$_GET["start"]],
        ["end","=",$_GET["end"]],
    ])->select();



print_r(json($result));



    //var_dump($_GET);
    //echo "<br/>";
    //var_dump($_POST);
    //echo "<br/>";
    //var_dump($_REQUEST);
    //echo "<br/>";
    //var_dump($_GET["end"]);




