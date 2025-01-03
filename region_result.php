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
            <div class="card" id="card_browser_rigion" style="margin-top: 20px;margin-bottom: 20px">
                <!--DataTables pos-->
                <table id="region_erna" class="display">
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
                        <!--<th>Tissue</th>
                        <th>Cell Type</th>
                        <th>Experiment Type</th>
                        <th>Dataset</th>-->
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>



<script>
    let params = new URLSearchParams(document.location.search.substring(1));
    let species = params.get("Species");
    let tech = params.get("Tech");
    let tissue = params.get("Tissue");
    let cell = params.get("Cell");
    let chr = params.get("Chr");
    let start = params.get("Start");
    let end = params.get("End");
    console.log(species);
    console.log(tech);
    console.log(tissue);
    console.log(cell);
    console.log(chr);
    console.log(start);
    console.log(end);
</script>

<!--客户端分页（逻辑分页）-->
<script>
    $('#region_erna').DataTable( {
        processing: true,
        serverSide: true,
        serverMethod: 'post',
        ajax: {
            url: './api/region.php',
            cache: false,
            type: 'post',
            dataType: 'json',
            data: {
                'select_specie': species,
                'select_experiment': tech,
                'select_tissue' : tissue,
                'select_cell' : cell,
                'select_chr' : chr,
                'select_start' : start,
                'select_end' : end,
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
                        '&spe=' + species +
                        '&tech=' + tech +
                        '&tissue=' + tissue +
                        '&cell=' + cell +
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
                defaultContent: species // 这里是固定的值，所有行都显示 "固定值1"
            },

            // 新增固定值的列2
            {
                data: null,
                defaultContent: tissue
            },
            {
                data: null,
                defaultContent: cell
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


