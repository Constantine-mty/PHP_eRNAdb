<?php
include "./templates/base.php";
?>



<style>
    .datatable-wrapper {
        overflow-x: auto;  /* 水平滚动 */
        -webkit-overflow-scrolling: touch; /* 在触摸设备上提供平滑滚动 */
    }

    #dataset_sample{
        width: 800px;
    }

    #marker_features.table {
        table-layout: fixed; /* 固定列宽 */
        width: 100%;
        max-width: 100%; /* 限制表格最大宽度 */
    }

    #marker_features. td, th {
        word-wrap: break-word;
        overflow: hidden;
        text-overflow: ellipsis; /* 超出部分显示省略号 */
    }
</style>


<style>

    #downloadContainer.container {
        display: flex;
        flex-wrap: wrap;
        gap: 60px;
        justify-content: center;
        align-items: center;
        max-width: 1000px;
    }
    .box {
        width: 240px;
        height: 120px;
        background: linear-gradient(45deg, #1e3c72, #f8cdda);
        /*background: linear-gradient(45deg, #f8cdda, #1e3c72);*/
        /*background: linear-gradient(45deg, #ff5f6d, #ffc3a0);*/
        border-radius: 7px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-size: 12px;
        font-weight: bold;
        cursor: pointer;
        transition: transform 0.2s ease-in-out;
    }
    .box:hover {
        transform: scale(1.1);
    }
    .box:active {
        transform: scale(0.95);
    }
    .box p {
        margin: 0;
    }

</style>


<style>
    /* 按钮的基础样式 */
    .btn-primary {
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        background: linear-gradient(45deg, #00B4D8, #48C9B0); /* 从深蓝到浅绿色的渐变 */
        /*background: linear-gradient(45deg, #ff7e5f, #feb47b); /* 渐变背景 */
        color: white;
        border-radius: 0;
    }

    /* 悬停效果 */
    .btn-primary:hover {
        background: linear-gradient(45deg, #ff512f, #dd2476); /* 鼠标悬停时交换渐变方向 */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* 增加阴影 */
        transform: translateY(-2px); /* 轻微向上移动 */
    }

    /* 按下按钮时的效果 */
    /*btn-primary:active*/
    #btnA.active, #btnB.active,#btnC.active,#btnD.active
    {
        background: linear-gradient(45deg, #ff512f, #dd2476); /* 按钮点击时的颜色 */
        /*transform: translateY(2px); /* 向下移动效果 */
    }

    /* 为按钮组添加间距 */
    .btn-group {
        display: flex;
        justify-content: center;
        gap: 15px; /* 按钮之间的间距 */
    }

    /* 响应式调整，确保按钮在小屏幕上也能居中显示 */
    @media (max-width: 768px) {
        .btn-group {
            flex-direction: column;
            align-items: center;
        }
    }
</style>


<body id="body">
<!--include header-->
<?php
include "./templates/header.php";
?>

<div class="row">
    <div class="col-lg-12" style="width: 80%; margin: 0 auto;">

        <div class="container-fluid" >
            <div class="row">

                <!--Summary-->
                <div class="card" id="content" style="margin-top:10px; margin-bottom: 10px">

                </div>

                <!--Sample List-->
                <div class="card" id="c1" style="margin-bottom:10px">
                    <!--<div class="table-responsive">-->
                    <div class="datatable-wrapper">
                    <table id="dataset_sample" class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Dataset ID</th>
                            <th>Sample ID</th>
                            <th>Sample Name</th>
                            <th>Source</th>
                            <th>Species</th>
                            <th>Tissue</th>
                            <th>Organ_parts</th>
                            <th>Development_stage</th>
                            <th>Disease</th>
                            <th>Sex</th>
                            <th>Technology</th>
                            <th>Platforms</th>
                            <th>Cell type</th>
                            <th>Treatment</th>
                            <th>Phenotype</th>
                        </tr>
                        </thead>
                    </table>
                    </div>
                    <!--</div>-->
                </div>

                <!--eRNA List-->
                <div class="card" id="c2" style="margin-bottom:10px">
                    <!--<div class="table-responsive">-->
                    <div class="datatable-wrapper">
                        <table id="dataset_erna" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>eRNA ID</th>
                                <th>Chrom</th>
                                <th>Start</th>
                                <th>End</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <!--</div>-->
                </div>

                <!--UMAP-->

                <h1>Embedding Scatter Dash in PHP</h1>
                <!--<iframe src="http://localhost:8051?select_value=GSE44618" width="100%" height="600px"></iframe>-->
                <!-- iframe with dynamic src -->
                <iframe id="dash-umap" height="600px" width="100%"></iframe>

                <h1>Embedding Violin Dash in PHP</h1>
                <!--<iframe src="http://localhost:8052?select_value=GSE44618" width="100%" height="600px"></iframe>-->
                <iframe id="dash-violin" height="600px" width="100%"></iframe>

                <!--QC-->
                <div class="card" style="margin-bottom: 10px">
                <div class="row">
                    <h2 id="title-statistic">Statistic</h2>
                    <hr>
                    <h4 style="color: #df4759">QC info</h4>
                    <!--插入质控图片-->
                    <div class="row" style="width: 100%" >
                        <img id="QC_Image" src="" alt="Dynamic Image">
                    </div>
                </div>

                    <a> Violin plot of some of the computed quality measures:</a>
                    <a> The total counts per cell.</a>
                    <hr>


                <!--Statistic-->
                <div class="row">
                    <h4 style="color: #0dcaf0">Cluster info</h4>
                    <div class="col-lg-6">
                        <div id="cell_num_cluster" style="width: 400px; height: 300px"></div>
                    </div>
                    <div class="col-lg-6">
                        <div id="eRNA_num_cluster" style="width: 400px;height: 300px"></div>
                    </div>
                </div>

                </div>
                <!--Marker plot-->
                <div class="card" style="margin-bottom: 10px">
                <div class="row">
                    <h2 id="title-marker">Marker features</h2>
                    <h5> Cluster Markers</h5>
                    <a> The marker eRNAs/genes of each cluster were calculated by scanpy.tl.rank_genes_groups with the "wilcoxon" method. If the original annotation information of dataset is available, we use the original one, if not, we get the annotation information through scanpy.tl.leiden.</a>

                    <div class="btn-group mt-3" role="group" aria-label="Image Buttons" style="margin-bottom: 15px">
                        <button type="button" class="btn btn-primary" id="btnA">Top10 Genes</button>
                        <button type="button" class="btn btn-primary" id="btnB">Top10 eRNAs</button>

                        <button type="button" class="btn btn-primary" id="btnC">All Genes</button>
                        <button type="button" class="btn btn-primary" id="btnD">All eRNAs</button>

                    </div>
                    <a id="a-marker" style="font-weight: bolder; margin-bottom: 5px"> Heatmap of the expression of the top 10 marker genes (bottom) for each cluster (left).</a>

                    <div style="display: flex; justify-content: flex-end; width: 100%;">
                        <button id="downloadBtn" style="padding: 2px 16px;  background-color: #FFFFFF; color: #243675; border: none; border-radius: 5px; cursor: pointer; display: flex; align-items: center;">
                            <!-- SVG下载图标 -->
                            <svg width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16" style="margin-right: 8px;">
                                <path d="M8 0a.5.5 0 0 1 .5.5v8.793l2.354-2.354a.5.5 0 1 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 8.293V.5A.5.5 0 0 1 8 0z"/>
                                <path d="M0 13a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-1z"/>
                            </svg>
                            Download Figure
                        </button>
                    </div>
                    <!--插入图片-->
                    <div style="display: flex; justify-content: center; align-items: center;">
                    <img id="eRNA_Image" src="" alt="Dynamic Image" style="max-height: 400px; max-width: 100%; width: auto">
                    </div>
                    <!-- 下载按钮和SVG图标 -->

                </div>
<hr>
                <!--Marker Table-->
                <div class="row">
                    <table id="marker_features" class="table table-hover table-striped table-bordered">
                        <!--class="table table-hover table-striped table-bordered"-->
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>p_val_adj</th>
                            <th>p-value</th>
                            <th>LogFoldChanges</th>
                            <th>Cluster</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                </div>



                <!--Data Download Resources-->
                <div class="card" style="margin-bottom: 15px">
                    <div class="row">
                        <div class="col-lg-12" style="display: flex; align-items: center; margin-bottom: 10px">
                            <h2>&nbsp;Data</h2><h2 style="color:#ffc107">&nbsp;R</h2><h2>esources</h2>
                        </div>
                    </div>
                    <div class="container" id="downloadContainer" style="padding-bottom: 10px">
                        <!--
                        <div class="box" onclick="downloadFile('file1.txt')">
                            <p>metadata.csv</p>
                        </div>
                        <div class="box" onclick="downloadFile('file2.pdf')">
                            <p>eRNA.bed</p>
                        </div>
                        <div class="box" onclick="downloadFile('file3.jpg')">
                            <p>eRNA_exp_matrix.csv</p>
                        </div>
                        <div class="box" onclick="downloadFile('file4.zip')">
                            <p>eRNA_cluster_exp.csv</p>
                        </div>
                        <div class="box" onclick="downloadFile('file5.mp4')">
                            <p>gene_DE.csv</p>
                        </div>
                        <div class="box" onclick="downloadFile('file6.docx')">
                            <p>eRNA_DE.csv</p>
                        </div>
                        <div class="box" onclick="downloadFile('file7.mp4')">
                            <p>File 7</p>
                        </div>
                        <div class="box" onclick="downloadFile('file8.docx')">
                            <p>File 8</p>
                        </div>
                        -->
                    </div>
                </div>

            </div>
        </div>


    </div>
</div>



<script>
    let params = new URLSearchParams(document.location.search.substring(1));
    let sid = params.get("sid"); //sid：这个页面的Study属性；
    console.log(sid);

    // 动态生成图片URL
    let QC_imageURL = `./public/figures/violin_QC_${sid}.png`;
    console.log(QC_imageURL);
    let eRNA_imageURL = `./public/figures/heatmap_top_gene_${sid}.png`;

</script>

<script>
    // 定义全局变量
    let globalTissue, globalSpecies, globalTechnology, globalAccessions;
</script>

<script>



    $(document).ready(function () {
        // 发送 AJAX 请求
        $.ajax({
            url: './api/dataset_summary.php', // 替换为你的 PHP 后端地址
            type: 'POST',
            data: {sid: sid},
            dataType: 'json',
            success: function (response) {
                // 调用函数生成内容
                renderContent(response);
            },
            error: function () {
                $('#content').html('<p style="color:red;">Failed to load data.</p>');
            }
        });

            // 动态生成内容
            function renderContent(dataArray) {
                const container = $('#content');
                container.empty(); // 清空内容容器

                // 遍历数据数组
                //dataArray.forEach((item, index) => {
                dataArray.forEach((item) => {
                        const { Tissue, Species, PMID, Platform, Technology,Contributors, SubmissionDate,UpdateDate, DatasetSummary, OverallDesign, Accessions } = item;

                    // 将需要的数据赋值给全局变量
                    globalTissue = Tissue;
                    console.log("Tissue:", globalTissue);  // 检查输出
                    globalSpecies = Species;
                    globalTechnology = Technology;
                    globalAccessions = Accessions;

                        // 添加条目标题
                        //container.append(`<h3>Summary ${index + 1}</h3>`);
                        container.append(`<h3>Summary</h3>`);

                        // 渲染前四个字段：Tissue, Species, PMID, Platform
                        container.append(`
                    <div class="row">
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="width: 50%; font-weight: bold;">Tissue:</div>
                            <div style="width: 50%;">${Tissue || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="width: 50%; font-weight: bold;">Species:</div>
                            <div style="width: 50%;">${Species || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="width: 50%; font-weight: bold;">PMID:</div>
                            <div style="width: 50%;">${PMID || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="width: 50%; font-weight: bold;">Platform:</div>
                            <div style="width: 50%;">${Platform || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="width: 50%; font-weight: bold;">Technology:</div>
                            <div style="width: 50%;">${Technology || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="width: 50%; font-weight: bold;">Contributors:</div>
                            <div style="width: 50%;">${Contributors || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="width: 50%; font-weight: bold;">Submission Date:</div>
                            <div style="width: 50%;">${SubmissionDate || 'N/A'}</div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 10px;">
                            <div style="width: 50%; font-weight: bold;">Update Date:</div>
                            <div style="width: 50%;">${UpdateDate || 'N/A'}</div>
                        </div>
                    </div>
                `);

                        // 渲染 Summary 和 Design 字段
                        container.append(`
                    <div style="margin-bottom: 10px;">
                        <div style="font-weight: bold;">Summary:</div>
                        <p>${DatasetSummary || 'N/A'}</p>
                    </div>
                    <div style="margin-bottom: 10px;">
                        <div style="font-weight: bold;">Design:</div>
                        <p>${OverallDesign || 'N/A'}</p>
                    </div>
                    <div style="margin-bottom: 10px;">
                        <div style="font-weight: bold;">Design:</div>
                        <p>GEO Series Accessions: ${Accessions || 'N/A'}</p>
                    </div>
                `);
                    });
                }
            }
    );
</script>

<script>
    //主表格初始化，返回所有符合筛选条件后的数据
    $('#dataset_sample').DataTable( {
        //"scrollX": true, // 启用水平滚动
        //"scrollY": 200,
        "lengthChange": false, //禁止show框
        "pageLength": 5,
        "processing": true,
        "serverSide": true,
        "serverMethod": 'post',
        ajax: {
            url: './api/dataset_sample.php',
            data:{
                sid: sid
            },
        },
        dataType:'json',
        stripeClasses: [],
        "order": [[ 0, "desc" ]],
        dom: "<'top'Bf>rt<'bottom'ip>", //"<'top'Bf>rt<'bottom'ilp>"
        buttons: [
            {
                extend: 'csv',
                text: 'Download'
            }
        ],
        columns: [
            { data: 'DatasetID' },
            { data: 'SampleID' },
            { data: 'SampleName',},
            { data: 'Source' },
            { data: 'Species' },
            { data: 'Tissue' },
            { data: 'Organ_parts' },
            { data: 'Development_stage' },
            { data: 'Disease' },
            { data: 'sex' },
            { data: 'Technology' },
            { data: 'Platforms' },
            { data: 'CellType' },
            { data: 'Treatment' },
            { data: 'Phenotype' }

        ]
    } );
</script>

<script>
    $(document).ready(function() {
    //主表格初始化，返回所有符合筛选条件后的数据
    $('#dataset_erna').DataTable( {
        //"scrollX": true, // 启用水平滚动
        //"scrollY": 200,
        "lengthChange": false, //禁止show框
        "pageLength": 10,
        "processing": true,
        "serverSide": true,
        "serverMethod": 'post',
        ajax: {
            url: './api/dataset_erna.php',
            data:{
                sid: sid
            },
        },
        dataType:'json',
        stripeClasses: [],
        "order": [[ 1, "asc" ]],
        dom: "<'top'Bf>rt<'bottom'ip>", //"<'top'Bf>rt<'bottom'ilp>"
        buttons: [
            {
                extend: 'csv',
                text: 'Download'
            }
        ],
        columns: [
            { data: 'ID',
                render: function ( data, type, row ) {
                    //console.log(row); // 输出 row 对象到控制台
                    let pos = row.chrom && row.start && row.end ? row.chrom + ':' + row.start + '-' + row.end : 'N/A';
                    return '<a href="detail_erna.php?pos=' + encodeURIComponent(pos) +
                        '&spe=' + encodeURIComponent(globalSpecies) +
                        '&tech=' + encodeURIComponent(globalTechnology) +
                        '&tissue=' + encodeURIComponent(globalTissue) +
                        '&dataset=' + encodeURIComponent(sid) +
                        '">' + data + '</a>'
                }
            },
            { data: 'chrom' },
            { data: 'start',},
            { data: 'end' },
        ],
    } );
    });
</script>

<script>
    // 获取当前页面 URL 中的 sid 参数
    if (sid) {
        // 动态设置第一个 iframe（dash-umap）的 src
        const iframeUmap = document.getElementById('dash-umap');
        //iframeUmap.src = `https://lcbb.swjtu.edu.cn/dash-umap/?select_value=${sid}`;
        iframeUmap.src = `http://localhost:8050?select_value=${sid}`;

        // 动态设置第二个 iframe（dash-violin）的 src
        const iframeViolin = document.getElementById('dash-violin');
        //iframeViolin.src = `https://lcbb.swjtu.edu.cn/dash-violin/?select_value=${sid}`;
        iframeViolin.src = `http://localhost:8051?select_value=${sid}`;
    } else {
        console.error("No sid parameter found in the URL.");
    }
</script>

<script>
    document.getElementById("QC_Image").src = QC_imageURL;
</script>

<!--ECharts-->
<script type="text/javascript">

    //var colors = ['#FFAEBC', '#FFA78C', '#FF7A45', '#FF9770', '#FFC4A3'];
    var colors = ['#7EB5D6', '#99CEDF', '#B5E7E8', '#FFE6E8', '#FFCACA'];

    // 基于准备好的dom，初始化echarts实例
    var ClusterCell_Chart = echarts.init(document.getElementById('cell_num_cluster'));
    var ClustereRNA_Chart = echarts.init(document.getElementById('eRNA_num_cluster'));

    $.post('./api/get_cluster_info.php', {sid:sid}).done(function (data){

        // 解析返回的数据为 JSON 对象
        var responseData = JSON.parse(data);
        console.log(responseData.clusters);
        console.log(responseData.cells);

        // 构建颜色映射函数
        var colorMapping = function (params) {
            var dataIndex = params.dataIndex;
            return colors[dataIndex % colors.length];
        };

        // 指定图表的配置项和数据
        ClusterCell_Chart.setOption({
            title: {
                text: 'The number of Cell',
            },
            tooltip: {
                trigger: 'axis',
            },
            yAxis: {  // 将原先的 xAxis 改为 yAxis
                type: 'category',
                data: responseData.clusters,
            },
            xAxis: {  // 将原先的 yAxis 改为 xAxis
                type: 'value',
            },
            series: [{
                name: 'Cell number',
                data: responseData.cells,
                type: 'bar',
                itemStyle: {
                    color: colorMapping
                }
            }]
        });

        ClustereRNA_Chart.setOption({
            title: {
                text: 'The number of eRNAs',
            },
            tooltip: {
                trigger: 'axis',
            },
            xAxis: {
                type: 'category',
                data: responseData.clusters,
            },
            yAxis: {
                type: 'value',
            },
            series: [{
                name: 'eRNA number',
                data: responseData.eRNAs,
                type: 'bar',
                itemStyle: {
                    color: colorMapping
                }
            }]
        });
    });



</script>

<script>
    document.getElementById("eRNA_Image").src = eRNA_imageURL;

</script>

<script>
    $(document).ready(function () {
        //const sid = sid; // 替换为实际的 SID 参数
        const table = $('#marker_features').DataTable({
            "processing": true,
            "serverSide": true,
            "serverMethod": 'post',
            "autoWidth": true, // 启用自动调整列宽
            ajax: {
                url: './api/get_marker_genes.php', // 默认数据源
                data: function (d) {
                    d.sid = sid;
                    //d.feature_type = currentFeatureType; // 动态传递 feature_type 参数
                }
            },
            dataType: 'json',
            dom: "<'top'Bf>rt<'bottom'ip>",
            buttons: [
                {
                    extend: 'csv',
                    text: 'Download'
                }
            ],
            columns: [
                { data: 'names' },
                { data: 'p_val_adj' },
                { data: 'p-value' },
                { data: 'LogFoldChanges' },
                { data: 'Cluster' }
            ]
        });

        // 定义按钮配置
        const buttonConfigs = {
            btnA: {
                imgSrc: `./public/figures/heatmap_top_gene_${sid}.png`,
                description: 'Heatmap of the expression of the top 10 marker genes (bottom) for each cluster (left).',
                url: './api/get_marker_genes.php', // 数据源
                //featureType: 'eRNA'
            },
            btnB: {
                imgSrc: `./public/figures/heatmap_top10_eRNA_${sid}.png`,
                description: 'Heatmap of the expression of the top 10 eRNAs (bottom) for each cluster (left).',
                url: './api/get_marker_features.php', // 数据源
                //featureType: 'gene'
            },
            btnC: {
                imgSrc: `./public/figures/heatmap_gene_${sid}.png`,
                description: 'Heatmap of the expression of the marker genes (bottom) for each cluster (left).',
                url: './api/get_marker_genes.php', // 数据源
                //featureType: 'protein'
            },
            btnD: {
                imgSrc: `./public/figures/heatmap_eRNA_${sid}.png`,
                description: 'Heatmap of the expression of the marker eRNAs (bottom) for each cluster (left).',
                url: './api/get_marker_features.php', // 数据源
                //featureType: 'miRNA'
            }
        };

        //let currentFeatureType = 'eRNA'; // 默认类型
        //let currentUrl = './api/get_marker_features.php'; // 默认数据源

        // 按钮点击事件
        $('button').click(function () {
            const buttonId = this.id;
            const config = buttonConfigs[buttonId];

            // 先移除所有按钮的 active 类
            $('button').removeClass('active');

            // 添加当前按钮的 active 类
            $(this).addClass('active');

            if (config) {
                // 切换图片
                $("#eRNA_Image").attr("src", config.imgSrc);
                $("#a-marker").text(config.description);

                // 切换表格数据源
                //currentFeatureType = config.featureType;
                //currentUrl = config.url;

                // 使用新的数据源刷新表格
                //table.ajax.url(currentUrl).load();
                //table.ajax.url(config.url).load();

                // 切换表格数据源
                table.ajax.url(config.url).load(function () {
                    table.columns.adjust().draw(); // 刷新列宽
                });
            }

        });

        $('#btnA').click();
    });
</script>

<script>
    // 假设 sid 是你从后端获取的值
    //const sid = "SID12345";  // 替换为实际的sid值

    const files = [
        { file: "metadata.csv", label: "metadata.csv" },
        { file: "eRNA.bed", label: "eRNA.bed" },
        { file: "eRNA_exp_matrix.csv", label: "eRNA_exp_matrix.csv" },
        { file: "eRNA_cluster_exp.csv", label: "eRNA_cluster_exp.csv" },
        { file: "gene_DE.csv", label: "gene_DE.csv" },
        { file: "eRNA_DE.csv", label: "eRNA_DE.csv" }
    ];

    function renderDownloadBoxes() {
        const container = document.getElementById("downloadContainer");

        files.forEach(file => {
            const box = document.createElement("div");
            box.className = "box";
            box.onclick = function() {
                downloadFile(sid, file.file);
            };

            const p = document.createElement("p");
            p.textContent = sid + "_" + file.label;  // 显示文件名和 sid 前缀
            box.appendChild(p);

            container.appendChild(box);
        });
    }

    // 下载文件的功能
    function downloadFile(sid, filename) {
        const link = document.createElement('a');
        link.href = `./download/files/${sid}_${filename}`;  // 使用 sid 前缀构建文件路径
        link.download = sid + "_" + filename;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    // 渲染所有文件的下载方块
    renderDownloadBoxes();
</script>


<!-- 图片下载功能 -->
<script>
    document.getElementById('downloadBtn').addEventListener('click', function() {
        // 获取图片的src路径
        const imageSrc = document.getElementById('eRNA_Image').src;

        // 创建一个链接并设置为图片的src
        const a = document.createElement('a');
        a.href = imageSrc;
        a.download = 'eRNA_Figure.jpg';  // 设置下载的文件名
        a.click();  // 模拟点击下载
    });
</script>

<!--include footer-->
<?php
include "./templates/footer.php";
?>




</body>
</html>
