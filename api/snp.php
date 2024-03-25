<?php

    session_start();
    $DS = DIRECTORY_SEPARATOR;
    require dirname(__DIR__)."{$DS}app{$DS}Db.class.php";
    require dirname(__DIR__)."{$DS}app{$DS}Func.php";

    //多条件测试1：
    $result1 = Db::table('enhancer')->where([
        ["chrID","=",$_GET["chr"]],
        ["start",">=",$_GET["start"]],
        ["end","<=",$_GET["end"]],
        ["tissue","=",$_GET["tissue"]],
    ])->field('enhancerID, score, H1')->
    order('enhancerID ASC')->
    limit(0,10)->select();


    //多条件测试2:
    $result2 = Db::table('publish')->
    where([
        ["technology","=",$_GET["experiment"]],
    ])->
    field('project_id, tissue, species')->
    order('id DESC')->
    limit(4,10)->select();

$totalRecords = Db::table('enhancer')->count();


//多条件测试3:
$result3 = Db::table('publish')->
field('project_id, tissue, species')->
order('id DESC')->
limit(4,10)->select();

    print_r(json($result1));
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    print_r(json($result2));
echo "<br/>";
echo "<br/>";
echo "<br/>";
print_r(json($totalRecords));
echo "<br/>";
echo "<br/>";
echo "<br/>";
print_r(json($result3));


    //解析表单传递的$_POST/$_GET变量，另附值给新变量
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


    //var_dump($_GET);
    //echo "<br/>";
    //var_dump($_POST);
    //echo "<br/>";
    //var_dump($_REQUEST);
    //echo "<br/>";
    //var_dump($_GET["end"]);




