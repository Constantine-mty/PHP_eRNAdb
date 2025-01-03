<?php
include "./templates/base.php";
?>



<body id="body">
<!--include header-->
<?php
include "./templates/header.php";
?>


<div class="container-fluid" >
    <div class="row">

        <div class="col-lg-12">
            <div class="card" id="card_browser_tc" style="margin-top: 20px;margin-bottom: 20px">
                <!--DataTables pos-->
                <table id="tc_sample" class="display">
                    <thead>
                    <tr>
                        <th>Cell type</th>
                        <th>Dataset ID</th>
                        <th>Sample ID</th>
                        <th>Species</th>
                        <th>Tissue</th>
                        <th>Technology</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>



<script>
    let params = new URLSearchParams(document.location.search.substring(1));
    let select_specie = params.get("species");
    let select_experiment = params.get("techtype");
    let select_cell = params.get("cell");


    console.log(select_specie);
    console.log(select_experiment);
    console.log(select_cell);

</script>

<!--客户端分页（逻辑分页）-->
<script>
    //主表格初始化，返回所有符合筛选条件后的数据
    $('#tc_sample').DataTable( {
        "processing": true,
        "serverSide": true,
        "serverMethod": 'post',
        ajax: {
            url: './api/cell_search.php',
            data:{
                select_specie:select_specie,
                select_cell:select_cell,
                select_experiment:select_experiment,
            },
        },
        dataType:'json',
        //order: [],
        "order": [[ 0, "desc" ]],
        dom: "<'top'lBf>rt<'bottom'ip>",
        buttons: [
            {
                extend: 'csv',
                text: 'Download'
            }
        ],
        lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
        pageLength: 50, // 设置默认显示50行
        columns: [
            { data: 'Cell' },
            { data: 'Study',
                render: function ( data, type, row ) {
                    return '<a href=' + data + '"detail_study-old.php?sid=">' + data + '</a>'
                }
            },
            { data: 'Sample',
                render: function ( data, type, row ) {
                    return '<a href=' + row['Study'] + '"detail_study-old.php?sid=">' + data + '</a>'
                }
            },
            { data: 'Species',},
            { data: 'Tissue' },
            { data: 'Seq' }
        ]
    } );
</script>







<!--include footer-->
<?php
include "./templates/footer.php";
?>




</body>
</html>
