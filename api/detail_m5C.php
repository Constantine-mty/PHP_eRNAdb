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


$select_pos = $_POST['select_pos'];
//$select_pos = 'chr10:65501113-75501632';

// 使用正则表达式解析
if (preg_match('/^([a-zA-Z0-9]+):(\d+)-(\d+)$/', $select_pos, $matches)) {
    // $matches[1] => 染色体名称 (例如 chr1)
    // $matches[2] => 起始位置 (例如 1438079)
    // $matches[3] => 结束位置 (例如 1443214)

    $chromosome = $matches[1];
    $start_position = (int)$matches[2]; // 转换为整数
    $end_position = (int)$matches[3];   // 转换为整数

    // 输出解析结果

    //echo "Chromosome: $chromosome<br>";
    //echo "Start Position: $start_position<br>";
    //echo "End Position: $end_position<br>";

    $map = [];
    $map[] = ['C1', '=', $chromosome];
    $map[] = ['C2', '>', $start_position];
    $map[] = ['C2', '<', $end_position];



// 构建查询
//$data = Db::name('your_table_name')->where($map)->select();

//$totalRecords 总条目的数量计数
    $totalRecords = Db::table('human_m5C')->where($map)->count();


//$totalRecordwithFilter 符合筛选条件的条目的数量统计
    $totalRecordwithFilter = Db::table('human_m5C')->where($map)->


//调用闭包函数query并且允许使用外部变量searchQuery
    where(function ($query) use ($searchQuery) {
        $query->whereOr([
            ["C4", "like", $searchQuery],
            ["C1", "like", $searchQuery],
        ]);
    })->
    field('C1, C3, C4, C6, C7')->count();



    $result = Db::table('human_m5C')->where($map)->

//调用闭包函数query并且允许使用外部变量searchQuery
    where(function ($query) use ($searchQuery) {
        $query->whereOr([
            ["C4", "like", $searchQuery],
            ["C1", "like", $searchQuery],
        ]);
    })->
    field('C1, C3, C4, C6, C7')->
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








} else {
    echo "Invalid format for position.";
}





















