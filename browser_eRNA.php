
<?php
include "./templates/base.php";
?>

<body id="body">
<!--include header-->
<?php
include "./templates/header.php";
?>

<!--DataTables pos-->
<table id="eRNA_id" class="display">
    <thead>
    <tr>
        <th>Enhancer ID</th>
        <th>Chr.</th>
        <th>Start.</th>
        <th>End. ID</th>
        <th>Tissue</th>
        <th>Score.</th>
    </tr>
    </thead>
</table>


<!--客户端分页（逻辑分页）-->
<script>
    $('#eRNA_id').DataTable( {
        "processing": true,
        "serverSide": true,
        "serverMethod": 'post',
        ajax: {
            url: './api/serverSide.php',
            //url: './api/test.php',
            //type: 'POST',
            //dataSrc: 'data'
        },
        dataType:'json',
        columns: [
            /*
            { data: 'id' },
            { data: 'species' },
            { data: 'project_id' },
            { data: 'title' },
            { data: 'tissue' },
            { data: 'technology' }
            */

            { data: 'enhancerID' },
            { data: 'chrID' },
            { data: 'start' },
            { data: 'end' },
            { data: 'tissue' },
            { data: 'score' }

        ]


    } );
</script>



<!--
$(document).ready(function() {
$('#example').DataTable({
"processing": true,
"serverSide": true,
"ajax": {
"url": "your_server_endpoint",
"type": "POST",
"data": function(data) {
// 传递分页参数到服务器
data.page = data.start / data.length; // 页数
data.limit = data.length; // 每页显示数量
// 您还可以传递其他参数如搜索关键字等
},
"dataSrc": function(json) {
// 处理从服务器返回的数据
return json.data; // 返回数据内容，可以是json.data之类的形式
}
},
"columns": [
{ "data": "id" },
{ "data": "name" },
// 其他列配置
]
});
});
-->



<!--include footer-->
<?php
include "./templates/footer.php";
?>




</body>
</html>
