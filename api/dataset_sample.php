<?php

session_start();
$DS = DIRECTORY_SEPARATOR;
require dirname(__DIR__)."{$DS}app{$DS}Db.class.php";
require dirname(__DIR__)."{$DS}app{$DS}Func.php";

//表单输入
$draw = $_POST['draw']; //绘制计数器。这个是用来确保Ajax从服务器返回的是相对应的（Ajax是异步的，因此返回的顺序是不确定的）
$row = $_POST['start']; //分页第一条数据的起始位置，比如0代表第一条数据
$rowperpage = $_POST['length']; // Rows display per page| 表格在当前绘制显示多少条数据。服务器返回的记录将等于该数目，除非服务器返回的记录数较少。
$columnIndex = $_POST['order'][0]['column']; // Column index | 那些列需要应用排序。这是对columns 数组的索引引用，并且也会提交到服务端
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name | columns 绑定的数据源，由 columns.dataOption 定义
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc | 对应列的排序方向。 desc 降序， asc升序。
$searchValue = $_POST['search']['value']; // Search value | 全局的搜索值。值会应用到每一列

$searchQuery = '%'.$searchValue.'%';


$sid = $_POST['sid'];

$map = [];
$map[] = ['DatasetID', '=', $sid];

$totalRecords = Db::table('OverallSample')->where($map)->count();


$totalRecordwithFilter = Db::table('OverallSample')->where($map)->
    where(function ($query) use ($searchQuery) {
        $query->whereOr([
            ["CellType", "like", $searchQuery],
            ["SampleID", "like", $searchQuery],
        ]);
    })->count();



$result = Db::table('OverallSample')->where($map)->

//调用闭包函数query并且允许使用外部变量searchQuery
where(function ($query) use ($searchQuery) {
    $query->whereOr([
        ["CellType", "like", $searchQuery],
        ["SampleID", "like", $searchQuery],
    ]);
})->
order($columnName . ' ' . $columnSortOrder)->
limit($row, $rowperpage)->select();



//$data
$data = array();

$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $result
);

echo json_encode($response, JSON_UNESCAPED_UNICODE);
