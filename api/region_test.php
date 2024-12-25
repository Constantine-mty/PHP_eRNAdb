<?php
session_start();
$DS = DIRECTORY_SEPARATOR;
require dirname(__DIR__)."{$DS}app{$DS}Db.class.php";
require dirname(__DIR__)."{$DS}app{$DS}Func.php";

/*
$select_specie = $_POST['select_specie'];
$select_experiment = $_POST['select_experiment'];
$select_tissue = $_POST['select_tissue'];
$select_cell = $_POST['select_cell'];
$select_chr = $_POST['select_chr'];
$select_start = $_POST['select_start'];
$select_end = $_POST['select_end'];
*/

$select_specie = 'Homo Sapiens';
$select_experiment = 'Smart-seq2';
$select_tissue = 'lymphoma cell';
$select_cell = 'DG-75 cell';
$select_chr = 'chr1';
$select_start = '1300000';
$select_end = '24000000';


$specie_map = [
    'Homo Sapiens' => 'Homo sapiens',
    'Mus Musculus' => 'Mus musculus'
];

// 如果前端传入的物种在映射中有对应关系，则使用映射后的值
if (array_key_exists($select_specie, $specie_map)) {
    $select_specie = $specie_map[$select_specie];
}

/*

// 根据物种映射，构造查询条件
//$species_to_query = $specie_map[$select_specie];
$map[] = ['Species', '=', $select_specie];
$map[] = ['Seq', '=', $select_experiment];
$map[] = ['Tissue', '=', $select_tissue];
$map[] = ['Cell', '=', $select_cell];

$result = Db::table('sample_detail')->where($map)
    ->field('Study, Sample')->select();

// 从查询结果中提取 project 值
$tech_ids = [];
foreach ($result as $row) {
    $tech_ids[] = $row['Study'];  // 假设您的字段名是 project_id
}
// 去重处理
$unique_tech_ids = array_unique($tech_ids);
// 格式化为数组形式
$response = array_values($unique_tech_ids);  // 保证返回的数组索引从 0 开始
// 返回 JSON 格式
//echo json_encode($response);

*/

$dataSets = [];
$geneList = [];

$map2[] = ['dataset', 'IN', $dataSets];
//$map2[] = ['annotation', 'in', $geneList];
$map2[] = ['chrom', '=', $select_chr];
$map2[] = ['start', '>', $select_start];
$map2[] = ['end', '<', $select_end];



$result2 = Db::table('ernaList')->where($map2)->select();


echo json_encode($result2, JSON_UNESCAPED_UNICODE);
