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
            <div class="card" id="card_browser_ss" style="margin-top: 20px;margin-bottom: 20px">
                <!--DataTables pos-->
                <table id="single_sample" class="display">
                    <thead>
                    <tr>
                        <th>eRNA Region</th>
                        <th>Chrom</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Species</th>
                        <th>Tissue</th>
                        <th>Cell Type</th>
                        <th>Dataset</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>



<script>
    let params = new URLSearchParams(document.location.search.substring(1));
    let select_specie = params.get("Species");
    let select_experiment = params.get("Tech");
    let select_tissue = params.get("Tissue");
    let select_cell = params.get("Cell");
    let select_sample = params.get("Sample");


    console.log(select_specie);
    console.log(select_experiment);
    console.log(select_tissue);
    console.log(select_cell);
    console.log(select_sample);

</script>

<!--客户端分页（逻辑分页）-->
<script>
    $('#single_sample').DataTable( {
        processing: true,
        serverSide: true,
        serverMethod: 'post',
        ajax: {
            url: './api/sample_search.php',
            cache: false,
            type: 'post',
            dataType: 'json',
            data: {
                //'select_specie': select_specie,
                //'select_experiment': select_experiment,
                //'select_tissue' : select_tissue,
                //'select_cell' : select_cell,
                'select_sample' : select_sample,
            },
            async: true,
        },
        dataType:'json',
        dom: "<'top'lBf>rt<'bottom'ip>",
        buttons: [
            {
                extend: 'csv',
                text: 'Download'
            }
        ],
        columns: [
            { data: 'pos',
                render: function ( data, type, row ) {
                    return '<a href="detail_erna.php?pos=' + encodeURIComponent(data) +
                        '&spe=' + select_specie +
                        '&tech=' + select_experiment +
                        '&tissue=' + select_tissue +
                        '&cell=' + select_cell +
                        '&dataset=' + encodeURIComponent(row.dataset) +
                        //'&pos=' + encodeURIComponent(row.pos) +
                        '">' + data + '</a>'
                }
            },
            { data: 'chrom' },
            { data: 'start' },
            { data: 'end' },
            // 新增固定值的列1
            {
                data: null, // data为null，表明这列不依赖服务端数据
                defaultContent: select_specie // 这里是固定的值，所有行都显示 "固定值1"
            },

            // 新增固定值的列2
            {
                data: null,
                defaultContent: select_tissue
            },
            {
                data: null,
                defaultContent: select_cell
            },
            { data: 'dataset' },
            //{ data: 'cell' },
            //{ data: 'tech' },
            //{ data: 'dataset' }
        ],
        columnDefs: [
            { targets: [4, 5, 6], orderable: false }  // 禁用第 1, 2, 3 列的排序
        ]

    } );
</script>







<!--include footer-->
<?php
include "./templates/footer.php";
?>




</body>
</html>
