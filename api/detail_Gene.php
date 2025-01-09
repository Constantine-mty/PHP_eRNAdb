<?php

session_start();
$DS = DIRECTORY_SEPARATOR;
require dirname(__DIR__)."{$DS}app{$DS}Db.class.php";
require dirname(__DIR__)."{$DS}app{$DS}Func.php";

$select_pos = $_POST['select_pos'];
$select_dataset = $_POST['select_dataset'];

//$select_pos = 'chr1:10866244-10868263';
//$select_dataset = 'GSE49321';

// 使用正则表达式解析
if (preg_match('/^([a-zA-Z0-9]+):(\d+)-(\d+)$/', $select_pos, $matches)) {
    // $matches[1] => 染色体名称 (例如 chr1)
    // $matches[2] => 起始位置 (例如 1438079)
    // $matches[3] => 结束位置 (例如 1443214)

    $chromosome = $matches[1];
    $start_position = (int)$matches[2]; // 转换为整数
    $end_position = (int)$matches[3];   // 转换为整数

    //echo $chromosome;
    //echo ('<br>');
    //echo $start_position;
    //echo ('<br>');

$map = [];
$map[] = ['Name', '=', $select_pos];
$map[] = ['Dataset', '=', $select_dataset];


$result = Db::table('TargetGene')->where($map)
    ->field('Genes')
//调用闭包函数query并且允许使用外部变量searchQuery
    ->select();

//echo json($result);
//echo ('<br>');
//echo ('<br>');
//echo ('<br>');

/*
$gene_data = [];
foreach ($result as $row) {
    // 假设每个 Genes 字段内容是 "TARDBP (-145146), CASZ1 (-70606)"
    $genes = explode(',', $row['Genes']);  // 按逗号分隔多个基因

    foreach ($genes as $gene_info) {
        // 使用正则提取基因名称和距离
        if (preg_match('/([A-Za-z0-9_]+) \(([-+]?\d+)\)/', trim($gene_info), $matches)) {
            $gene_name = $matches[1];  // 第一个捕获组是基因名称
            $distance = $matches[2];   // 第二个捕获组是距离
            $gene_data[] = [
                'Name' => $gene_name,
                'Distance' => $distance
            ];
        }
    }
}

// 返回 JSON 格式
echo json_encode(['data' => $gene_data]);
*/


    $gene_data = [];
    foreach ($result as $row) {
        $genes = explode(',', $row['Genes']);  // 按逗号分隔多个基因

        foreach ($genes as $gene_info) {
            if (preg_match('/([A-Za-z0-9_]+) \(([-+]?\d+)\)/', trim($gene_info), $matches2)) {
                $gene_name = $matches2[1];  // 提取基因名称
                $distance = (int)$matches2[2];  // 提取距离，转换为整数

                // 计算启动子区域的坐标
                $promoter_start = max(0, $start_position + $distance - 1000);
                $promoter_end = $start_position + $distance;

                $map2=[];
                $map2[]=['C1','=', $chromosome];
                $map2[]=['C2', '>', $promoter_start];
                $map2[]=['C3', '<', $promoter_end];

                /*
                print_r($map2);
                echo ('<br>');
                echo ('<br>');
                echo ('<br>');
                */


                // 查询启动子区域内的 Alu 序列
                $alu_records = Db::table('hg38_2020_Alu')
                    ->where($map2)
                    ->select();

                $alu_count = count($alu_records);  // Alu 序列的个数

                $gene_data[] = [
                    'Name' => $gene_name,
                    'Distance' => $distance,
                    'AluCount' => $alu_count,
                    'AluDetails' => $alu_records  // 返回详细的 Alu 序列信息
                ];
            }
        }
    }

// 返回 JSON 格式
    echo json_encode(['data' => $gene_data]);

}
