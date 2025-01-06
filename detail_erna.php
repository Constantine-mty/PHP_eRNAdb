<?php
include "./templates/base.php";
?>

<style>
    /* 导航标签容器样式 */
    .nav-tabs {
        display: flex;                /* 水平布局 */
        list-style: none;             /* 去掉默认列表样式 */
        padding: 0;                   /* 去掉内边距 */
        margin: 0;                    /* 去掉外边距 */
        border-bottom: 2px solid #ffffff;  /* 下方边框 #ddd;*/
    }

    /* 单个导航项样式 */
    .nav-tabs .nav-item {
        margin-right: 10px;           /* 间距 */
    }

    /* 链接基础样式 */
    .nav-tabs .nav-item a {
        display: inline-block;        /* 行内块 */
        padding: 10px 20px;           /* 内边距 */
        margin-bottom: 5px;
        text-decoration: none;        /* 去掉下划线 */
        color: #333;                  /* 默认文字颜色 */
        border: 1px solid transparent; /* 初始无边框 */
        border-color: #dec2c2;
        border-radius: 0 0 0 0 ;   /* 上圆角 5px 5px 5px 5px;*/
        background-color: #ffffff;    /* 默认背景色 #f8f9fa*/
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* 添加阴影 */
        transition: all 0.3s ease;    /* 平滑过渡效果 */
    }

    /* 激活状态 */
    .nav-tabs .nav-item.active a {
        background-color: #286ea7;    /* 激活背景色 #286ea7 #629ad5*/
        color: white;                 /* 激活文字颜色 */
        border-color: #007bff #007bff #fff; /* 激活边框 */
        font-weight: bold;            /* 字体加粗 */
    }

    /* 悬停状态 */
    .nav-tabs .nav-item a:hover {
        background-color: #e9ecef;    /* 悬停背景色 */
        color: #007bff;               /* 悬停文字颜色 */
        border-color: #007bff;        /* 悬停边框 */
    }

    /* 标签的内容样式 */
    .tab-content {
        padding: 20px;
        border: 1px solid #ddd;       /* 内容边框 */
        border-top: none;             /* 去掉顶部边框 */
        border-radius: 0 0 5px 5px;   /* 下圆角 0 0 5px 5px;  */
        background-color: #fff;       /* 内容背景色 */
    }
</style>

<body id="body">
<!--include header-->
<?php
include "./templates/header.php";
?>

<div class="row">
    <div class="col-lg-12" style="width: 80%; margin: 0 auto;">


<div class="row">
    <div class="col-lg-12" style="width: 100%; margin: 0 auto;">
        <table id="summary" class="display" style="width:100%">
            <thead>
            <tr>
                <th>Summary</th>
                <th></th>

            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</div>





<div class="panel-heading " style="background: #286ea7;margin-top: 10px;margin-bottom: 10px;height: 30px;">
    <div class="panel-tittle">
        <h2 style="text-align: center;font-size: 20px;margin-top: 5px;color: white;font-size: 23px;"><span class="glyphicon glyphicon-book"></span>Annotation&nbsp;information</h2>
    </div>
</div>

<div class="panel panel-info">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12" style="width: 100%; margin: 0 auto;" >
                <!-- 导航标签 -->
                <ul class="nav nav-tabs" role="tablist" id="myTabs">

                    <li role="presentation" class="nav-item active" id="tab_commonsnp">
                        <a href="#CommonSNP" aria-controls="CommonSNP" role="tab" data-toggle="tab">
                            <abbr style="text-decoration: none;cursor: inherit;border-bottom: none;">Common SNP</abbr>
                        </a>
                    </li>

                    <li role="presentation" class="nav-item" id="tab_risksnp">
                        <a href="#RiskSNP" aria-controls="RiskSNP" role="tab" data-toggle="tab">
                            <abbr style="text-decoration: none;cursor: inherit;border-bottom: none;">Risk SNP</abbr>
                        </a>
                    </li>

                    <li role="presentation" class="nav-item" id="tab_cas9">
                        <a href="#cas9" aria-controls="cas9" role="tab" data-toggle="tab">
                            <abbr style="text-decoration: none;cursor: inherit;border-bottom: none;">Crispr/cas9 Site</abbr>
                        </a>
                    </li>

                    <li role="presentation" class="nav-item" id="tab_rnainteraction">
                        <a href="#rnainteraction" aria-controls="rnainteraction" role="tab" data-toggle="tab">
                            <abbr style="text-decoration: none;cursor: inherit;border-bottom: none;">RNA Interaction Site</abbr>
                        </a>
                    </li>

                    <li role="presentation" class="nav-item" id="tab_repeat">
                        <a href="#repeat" aria-controls="repeat" role="tab" data-toggle="tab">
                            <abbr style="text-decoration: none;cursor: inherit;border-bottom: none;">Repeat Mask</abbr>
                        </a>
                    </li>

                    <li role="presentation" class="nav-item" id="tab_alu">
                        <a href="#alu" aria-controls="alu" role="tab" data-toggle="tab">
                            <abbr style="text-decoration: none;cursor: inherit;border-bottom: none;">Alu family</abbr>
                        </a>
                    </li>

                    <li role="presentation" class="nav-item" id="tab_caQTL">
                        <a href="#caQTL" aria-controls="caQTL" role="tab" data-toggle="tab">
                            <abbr style="text-decoration: none;cursor: inherit;border-bottom: none;">caQTL</abbr>
                        </a>
                    </li>

                    <li role="presentation" class="nav-item" id="tab_eQTL">
                        <a href="#eQTL" aria-controls="eQTL" role="tab" data-toggle="tab">
                            <abbr style="text-decoration: none;cursor: inherit;border-bottom: none;">eQTL</abbr>
                        </a>
                    </li>

                    <li role="presentation" class="nav-item" id="tab_haQTL">
                        <a href="#haQTL" aria-controls="haQTL" role="tab" data-toggle="tab">
                            <abbr style="text-decoration: none;cursor: inherit;border-bottom: none;">haQTL</abbr>
                        </a>
                    </li>

                    <li role="presentation" class="nav-item" id="tab_m5c">
                        <a href="#m5c" aria-controls="m5c" role="tab" data-toggle="tab">
                            <abbr style="text-decoration: none;cursor: inherit;border-bottom: none;">m5C</abbr>
                        </a>
                    </li>

                    <li role="presentation" class="nav-item" id="tab_m6a">
                        <a href="#m6a" aria-controls="m6a" role="tab" data-toggle="tab">
                            <abbr style="text-decoration: none;cursor: inherit;border-bottom: none;">m6A</abbr>
                        </a>
                    </li>

                    <li role="presentation" class="nav-item" id="tab_meth">
                        <a href="#meth" aria-controls="meth" role="tab" data-toggle="tab">
                            <abbr style="text-decoration: none;cursor: inherit;border-bottom: none;">DNA Methylation</abbr>
                        </a>
                    </li>

                    <li role="presentation" class="nav-item" id="tab_atac">
                        <a href="#atac" aria-controls="meth" role="tab" data-toggle="tab">
                            <abbr style="text-decoration: none;cursor: inherit;border-bottom: none;">Chromatin Accessibility Region</abbr>
                        </a>
                    </li>

                    <li role="presentation" class="nav-item" id="tab_tfbs">
                        <a href="#tfbs" aria-controls="tfbs" role="tab" data-toggle="tab">
                            <abbr style="text-decoration: none;cursor: inherit;border-bottom: none;">TFBS</abbr>
                        </a>
                    </li>

                    <li role="presentation" class="nav-item" id="tab_rbp">
                        <a href="#rbp" aria-controls="rbp" role="tab" data-toggle="tab">
                            <abbr style="text-decoration: none;cursor: inherit;border-bottom: none;">RBP</abbr>
                        </a>
                    </li>
                </ul>




                <!-- 提示信息（如果没有数据时显示） -->
                <div class="alert alert-danger" id="no-data-message" style="display: none;">
                    No data available for the selected position.
                </div>


                <!-- Risk SNP Tab 内容 -->
                <div class="tab-pane" id="CommonSNP">
                    <!--
                    <p class="h4 text-justify font-weight-300 dashed" style="color:black">
                        <strong>SNP sites on <font color="red" id="note2">enh1</font></strong>
                    </p>
                    -->
                    <table id="table-CommonSNP" class="table table-striped table-bordered" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                        <thead>
                        <tr>
                            <th style="text-align:center">ID</th>
                            <th style="text-align:center">Chrom</th>
                            <th style="text-align:center">Position</th>
                            <th style="text-align:center">Reference Allele</th>
                            <th style="text-align:center">Alternative Allele</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- 数据由 DataTable 动态加载 -->
                        </tbody>
                    </table>
                </div>

                <!-- Risk SNP Tab 内容 -->
                <div class="tab-pane" id="RiskSNP">
                    <!--
                    <p class="h4 text-justify font-weight-300 dashed" style="color:black">
                        <strong>SNP sites on <font color="red" id="note2">enh1</font></strong>
                    </p>
                    -->
                    <table id="table-RiskSNP" class="table table-striped table-bordered" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                        <thead>
                        <tr>
                            <th style="text-align:center">ID</th>
                            <th style="text-align:center">Chrom</th>
                            <th style="text-align:center">Position</th>
                            <th style="text-align:center">Reference Allele</th>
                            <th style="text-align:center">Alternative Allele</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- 数据由 DataTable 动态加载 -->
                        </tbody>
                    </table>
                </div>

                <!-- Cas9 Tab 内容 -->
                <div class="tab-pane" id="cas9">
                    <!--
                    <p class="h4 text-justify font-weight-300 dashed" style="color:black">
                        <strong>Crispr-sites on <font color="red" id="note6">enh1</font></strong>
                    </p>
                    -->
                    <table id="table-cas9" class="table table-striped table-bordered" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                        <thead>
                        <tr>
                            <th style="text-align:center">Chrom</th>
                            <th style="text-align:center">Start</th>
                            <th style="text-align:center">End</th>
                            <th style="text-align:center">Source</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- 数据由 DataTable 动态加载 -->
                        </tbody>
                    </table>
                </div>

                <!-- RNA Interaction Tab 内容 -->
                <div class="tab-pane" id="rnainteraction">
                    <!--
                    <p class="h4 text-justify font-weight-300 dashed" style="color:black">
                        <strong>Crispr-sites on <font color="red" id="note6">enh1</font></strong>
                    </p>
                    -->
                    <table id="table-rnainteraction" class="table table-striped table-bordered" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                        <thead>
                        <tr>
                            <th style="text-align:center">A_Chrom</th>
                            <th style="text-align:center">A_Start</th>
                            <th style="text-align:center">A_End</th>
                            <th style="text-align:center">B_Chrom</th>
                            <th style="text-align:center">B_Start</th>
                            <th style="text-align:center">B_End</th>
                            <th style="text-align:center">Cell Type</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- 数据由 DataTable 动态加载 -->
                        </tbody>
                    </table>
                </div>

                <!-- Repeat Tab 内容 -->
                <div class="tab-pane" id="repeat">
                    <!--
                    <p class="h4 text-justify font-weight-300 dashed" style="color:black">
                        <strong>Crispr-sites on <font color="red" id="note6">enh1</font></strong>
                    </p>
                    -->
                    <table id="table-repeat" class="table table-striped table-bordered" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                        <thead>
                        <tr>
                            <th style="text-align:center">Chrom</th>
                            <th style="text-align:center">Start</th>
                            <th style="text-align:center">End</th>
                            <th style="text-align:center">Element</th>
                            <th style="text-align:center">Length</th>
                            <th style="text-align:center">Strand</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- 数据由 DataTable 动态加载 -->
                        </tbody>
                    </table>
                </div>

                <!-- Alu Tab 内容 -->
                <div class="tab-pane" id="alu">
                    <!--
                    <p class="h4 text-justify font-weight-300 dashed" style="color:black">
                        <strong>Crispr-sites on <font color="red" id="note6">enh1</font></strong>
                    </p>
                    -->
                    <table id="table-alu" class="table table-striped table-bordered" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                        <thead>
                        <tr>
                            <th style="text-align:center">Chrom</th>
                            <th style="text-align:center">Start</th>
                            <th style="text-align:center">End</th>
                            <th style="text-align:center">Alu Type</th>
                            <th style="text-align:center">Length</th>
                            <th style="text-align:center">Strand</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- 数据由 DataTable 动态加载 -->
                        </tbody>
                    </table>
                </div>

                <!-- caQTL Tab 内容 -->
                <div class="tab-pane" id="caQTL">
                    <div style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
                    <!--
                    <p class="h4 text-justify font-weight-300 dashed" style="color:black">
                        <strong>Crispr-sites on <font color="red" id="note6">enh1</font></strong>
                    </p>
                    -->
                    <table id="table-caQTL" class="table table-striped table-bordered" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                        <thead>
                        <tr>
                            <th style="text-align:center">SNP</th>
                            <th style="text-align:center">Chr</th>
                            <th style="text-align:center">Position</th>
                            <th style="text-align:center">Ref</th>
                            <th style="text-align:center">Alt</th>
                            <!--
                            <th style="text-align:center">Gene</th>
                            <th style="text-align:center">distance To TSS</th>
                            <th style="text-align:center">Annotation</th>
                            <th style="text-align:center">Effect size</th>
                            <th style="text-align:center">Cell type</th>
                            <th style="text-align:center">GWASID</th>
                            <th style="text-align:center">Trait</th>
                            -->
                        </tr>
                        </thead>
                        <tbody>
                        <!-- 数据由 DataTable 动态加载 -->
                        </tbody>
                    </table>
                    </div>
                </div>

                <!-- eQTL Tab 内容 -->
                <div class="tab-pane" id="eQTL">
                    <!--
                    <p class="h4 text-justify font-weight-300 dashed" style="color:black">
                        <strong>SNP sites on <font color="red" id="note2">enh1</font></strong>
                    </p>
                    -->
                    <table id="table-eQTL" class="table table-striped table-bordered" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                        <thead>
                        <tr>
                            <th style="text-align:center">ID</th>
                            <th style="text-align:center">Chrom</th>
                            <th style="text-align:center">Position</th>
                            <th style="text-align:center">Reference Allele</th>
                            <th style="text-align:center">Alternative Allele</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- 数据由 DataTable 动态加载 -->
                        </tbody>
                    </table>
                </div>

                <!-- haQTL Tab 内容 -->
                <div class="tab-pane" id="haQTL">
                    <!--
                    <p class="h4 text-justify font-weight-300 dashed" style="color:black">
                        <strong>SNP sites on <font color="red" id="note2">enh1</font></strong>
                    </p>
                    -->
                    <table id="table-haQTL" class="table table-striped table-bordered" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                        <thead>
                        <tr>
                            <th style="text-align:center">ID</th>
                            <th style="text-align:center">Chrom</th>
                            <th style="text-align:center">Position</th>
                            <th style="text-align:center">Reference Allele</th>
                            <th style="text-align:center">Alternative Allele</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- 数据由 DataTable 动态加载 -->
                        </tbody>
                    </table>
                </div>

                <!-- m5C Tab 内容 -->
                <div class="tab-pane" id="m5c">
                    <!--
                    <p class="h4 text-justify font-weight-300 dashed" style="color:black">
                        <strong>SNP sites on <font color="red" id="note2">enh1</font></strong>
                    </p>
                    -->
                    <table id="table-m5c" class="table table-striped table-bordered" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                        <thead>
                        <tr>
                            <th style="text-align:center">Chrom</th>
                            <th style="text-align:center">Position</th>
                            <th style="text-align:center">Modification ID</th>
                            <th style="text-align:center">Strand</th>
                            <th style="text-align:center">Modification Type</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- 数据由 DataTable 动态加载 -->
                        </tbody>
                    </table>
                </div>

                <!-- m6A Tab 内容 -->
                <div class="tab-pane" id="m6a">
                    <!--
                    <p class="h4 text-justify font-weight-300 dashed" style="color:black">
                        <strong>SNP sites on <font color="red" id="note2">enh1</font></strong>
                    </p>
                    -->
                    <table id="table-m6a" class="table table-striped table-bordered" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                        <thead>
                        <tr>
                            <th style="text-align:center">Chrom</th>
                            <th style="text-align:center">Position</th>
                            <th style="text-align:center">Modification ID</th>
                            <th style="text-align:center">Strand</th>
                            <th style="text-align:center">Modification Type</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- 数据由 DataTable 动态加载 -->
                        </tbody>
                    </table>
                </div>

                <!-- TFBS Tab 内容 -->
                <div class="tab-pane" id="tfbs">
                    <!--
                    <p class="h4 text-justify font-weight-300 dashed" style="color:black">
                        <strong>SNP sites on <font color="red" id="note2">enh1</font></strong>
                    </p>
                    -->
                    <table id="table-tfbs" class="table table-striped table-bordered" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                        <thead>
                        <tr>
                            <th style="text-align:center">Chrom</th>
                            <th style="text-align:center">Start</th>
                            <th style="text-align:center">End</th>
                            <th style="text-align:center">TF Name</th>
                            <th style="text-align:center">Strand</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- 数据由 DataTable 动态加载 -->
                        </tbody>
                    </table>
                </div>


                <!-- RBP Tab 内容 -->
                <div class="tab-pane" id="rbp">
                    <!--
                    <p class="h4 text-justify font-weight-300 dashed" style="color:black">
                        <strong>SNP sites on <font color="red" id="note2">enh1</font></strong>
                    </p>
                    -->
                    <table id="table-rbp" class="table table-striped table-bordered" style="width: 100%;max-width: 100%; overflow-x: auto; table-layout: auto;">
                        <thead>
                        <tr>
                            <th style="text-align:center">Chrom</th>
                            <th style="text-align:center">Start</th>
                            <th style="text-align:center">End</th>
                            <th style="text-align:center">Strand</th>
                            <th style="text-align:center">RBP Name</th>
                            <th style="text-align:center">Capture Method</th>
                            <th style="text-align:center">Cell type</th>
                            <th style="text-align:center">RBP ID</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- 数据由 DataTable 动态加载 -->
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
        </div>
    </div>

    </div>
</div>
</div>










<script>

    let params = new URLSearchParams(document.location.search.substring(1));
    let select_pos = params.get("pos");
    let select_specie = params.get("spe");
    let select_experiment = params.get("tech");
    let select_tissue = params.get("tissue");
    //let select_cell = params.get("cell");
    let select_dataset = params.get("dataset");

    // 提取起始位置和结束位置，计算长度
    let length = 0;
    if (select_pos) {
        let match = select_pos.match(/:(\d+)-(\d+)/); // 正则提取数字
        if (match) {
            let start = parseInt(match[1], 10); // 起始位置
            let end = parseInt(match[2], 10);   // 结束位置
            length = end - start;              // 计算长度
        }
    }

    var data = [
        ["Position", select_pos],
        ["Species", select_specie],
        ["Experiment", select_experiment],
        ["Tissue", select_tissue],
        //["Cell", select_cell],
        ["Dataset", select_dataset],
        ["Length(bp)", length]
    ];

    // Initialize DataTable with transposed data
    $(document).ready(function() {
        $('#summary').DataTable({
            data:data,
            paging: false,       // 禁用分页
            searching: false,    // 禁用搜索框
            info: false,         // 禁用底部信息显示
            ordering: false,     // 禁用列排序
            dom: 't'             // 仅显示表格主体

        });
    });
</script>



<!--snp-->
<!--
<script>

    $(document).ready(function () {
        var table = $('#table-SNP').DataTable({
            processing: true,
            serverSide: true,
            serverMethod: 'post',
            ajax: {
                url: './api/detail_SNP.php',
                cache: false,
                type: 'post',
                dataType: 'json',
                data: {
                    'select_pos' : select_pos
                },
                async: true,
            },
            dataType:'json',
            dom: 'lBfrtip',
            columns: [
                { data: 'C4',},
                { data: 'C1' },
                { data: 'C2' },
                { data: 'C5' },
                { data: 'C6' }],
            drawCallback: function(settings) {
                // 检查返回的数据
                var api = this.api();
                if (api.data().length === 0) {
                    // 如果没有数据，显示提示消息
                    $('#no-data-message').show();
                } else {
                    // 如果有数据，隐藏提示消息
                    $('#no-data-message').hide();
                }
            }
        });
    })

</script>
-->

<!--crispr-->
<!--
<script>

    $(document).ready(function () {
        var table = $('#table-cas9').DataTable({
            processing: true,
            serverSide: true,
            serverMethod: 'post',
            ajax: {
                url: './api/detail_cas9.php',
                cache: false,
                type: 'post',
                dataType: 'json',
                data: {
                    'select_pos' : select_pos
                },
                async: true,
            },
            dataType:'json',
            dom: 'lBfrtip',
            columns: [
                { data: 'C1',},
                { data: 'C2' },
                { data: 'C3' },
                { data: 'C4' },
                ],
            drawCallback: function(settings) {
                // 检查返回的数据
                var api = this.api();
                if (api.data().length === 0) {
                    // 如果没有数据，显示提示消息
                    $('#no-data-message').show();
                } else {
                    // 如果有数据，隐藏提示消息
                    $('#no-data-message').hide();
                }
            }
        });
    })

</script>
-->


<script>
    $(document).ready(function () {
        var commonsnpTable, risksnpTable, cas9Table,rnainteractionTable, repeatTable, aluTable, caQTLTable, eQTLTable, haQTLTable, m5cTable, m6aTable, tfbsTable, rbpTable;

        // 切换到 SNP 标签时初始化表格
        $('#tab_commonsnp').click(function() {

            $('.nav-item').removeClass('active'); // 移除所有选项卡的 active 类
            $(this).addClass('active'); // 为当前点击的选项卡添加 active 类

            // 如果表格还没有初始化，才进行初始化
            if (!commonsnpTable) {
                commonsnpTable = $('#table-CommonSNP').DataTable({
                    processing: true,
                    serverSide: true,
                    serverMethod: 'post',

                    ajax: {
                        url: './api/detail_Common_SNP.php',
                        type: 'post',
                        dataType: 'json',
                        data: function(d) {
                            d.select_pos = select_pos;  // 传递查询参数
                        },
                        async: true,
                    },
                    dom: "<'top'lBf>rt<'bottom'ip>",
                    buttons: [
                        {
                            extend: 'csv',
                            text: 'Download'
                        }
                    ],
                    //stripeClasses: [], // 禁用奇偶行样式
                    columns: [
                        { data: 'C4' },
                        { data: 'C1' },
                        { data: 'C2' },
                        { data: 'C5' },
                        { data: 'C6' }
                    ],
                    drawCallback: function(settings) {
                        var api = this.api();
                        if (api.data().length === 0) {
                            $('#no-data-message').show();  // 如果没有数据，显示提示消息
                        } else {
                            $('#no-data-message').hide();  // 有数据时隐藏提示消息
                        }
                    }
                });
            } else {
                commonsnpTable.ajax.reload();  // 如果已经初始化，则重新加载数据
            }

            //$('#SNP').fadeIn();  // 显示 SNP 表格
            //$('#cas9').fadeOut();  // 隐藏 cas9 表格


            $('#CommonSNP').show();
            $('#RiskSNP').hide();
            $('#cas9').hide();
            $('#rnainteraction').hide();
            $('#repeat').hide();
            $('#alu').hide();
            $('#caQTL').hide();
            $('#eQTL').hide();
            $('#haQTL').hide();
            $('#m5c').hide();
            $('#m6a').hide();
            $('#tfbs').hide();
            $('#rbp').hide();
        });

        // 切换到 Risk SNP 标签时初始化表格
        $('#tab_risksnp').click(function() {

            $('.nav-item').removeClass('active'); // 移除所有选项卡的 active 类
            $(this).addClass('active'); // 为当前点击的选项卡添加 active 类

            // 如果表格还没有初始化，才进行初始化
            if (!risksnpTable) {
                risksnpTable = $('#table-RiskSNP').DataTable({
                    processing: true,
                    serverSide: true,
                    serverMethod: 'post',
                    ajax: {
                        url: './api/detail_RiskSNP.php',
                        type: 'post',
                        dataType: 'json',
                        data: function(d) {
                            d.select_pos = select_pos;  // 传递查询参数
                        },
                        async: true,
                    },
                    dom: "<'top'lBf>rt<'bottom'ip>",
                    buttons: [
                        {
                            extend: 'csv',
                            text: 'Download'
                        }
                    ],
                    columns: [
                        { data: 'C4' },
                        { data: 'C1' },
                        { data: 'C2' },
                        { data: 'C5' },
                        { data: 'C6' }
                    ],
                    drawCallback: function(settings) {
                        var api = this.api();
                        if (api.data().length === 0) {
                            $('#no-data-message').show();  // 如果没有数据，显示提示消息
                        } else {
                            $('#no-data-message').hide();  // 有数据时隐藏提示消息
                        }
                    }
                });
            } else {
                risksnpTable.ajax.reload();  // 如果已经初始化，则重新加载数据
            }

            //$('#SNP').fadeIn();  // 显示 SNP 表格
            //$('#cas9').fadeOut();  // 隐藏 cas9 表格

            $('#CommonSNP').hide();
            $('#RiskSNP').show();
            $('#cas9').hide();
            $('#rnainteraction').hide();
            $('#repeat').hide();
            $('#alu').hide();
            $('#caQTL').hide();
            $('#eQTL').hide();
            $('#haQTL').hide();
            $('#m5c').hide();
            $('#m6a').hide();
            $('#tfbs').hide();
            $('#rbp').hide();
        });

        // 切换到 Cas9 标签时初始化表格
        $('#tab_cas9').click(function() {

            $('.nav-item').removeClass('active'); // 移除所有选项卡的 active 类
            $(this).addClass('active'); // 为当前点击的选项卡添加 active 类
            // 如果表格还没有初始化，才进行初始化
            if (!cas9Table) {
                cas9Table = $('#table-cas9').DataTable({
                    processing: true,
                    serverSide: true,
                    serverMethod: 'post',
                    ajax: {
                        url: './api/detail_cas9.php',
                        type: 'post',
                        dataType: 'json',
                        data: function(d) {
                            d.select_pos = select_pos;  // 传递查询参数
                        },
                        async: true,
                    },
                    dom: "<'top'lBf>rt<'bottom'ip>",
                    buttons: [
                        {
                            extend: 'csv',
                            text: 'Download'
                        }
                    ],
                    columns: [
                        { data: 'C1' },
                        { data: 'C2' },
                        { data: 'C3' },
                        { data: 'C4' }
                    ],
                    drawCallback: function(settings) {
                        var api = this.api();
                        if (api.data().length === 0) {
                            $('#no-data-message').show();  // 如果没有数据，显示提示消息
                        } else {
                            $('#no-data-message').hide();  // 有数据时隐藏提示消息
                        }
                    }
                });
            } else {
                cas9Table.ajax.reload();  // 如果已经初始化，则重新加载数据
            }

            //$('#cas9').fadeIn();  // 显示 cas9 表格
            //$('#SNP').fadeOut();  // 隐藏 SNP 表格

            $('#cas9').show();
            $('#CommonSNP').hide();
            $('#RiskSNP').hide();
            $('#rnainteraction').hide();
            $('#repeat').hide();
            $('#alu').hide();
            $('#caQTL').hide();
            $('#eQTL').hide();
            $('#haQTL').hide();
            $('#m5c').hide();
            $('#m6a').hide();
            $('#tfbs').hide();
            $('#rbp').hide();
        });

        // 切换到 RNA interaction 标签时初始化表格
        $('#tab_rnainteraction').click(function() {

            $('.nav-item').removeClass('active'); // 移除所有选项卡的 active 类
            $(this).addClass('active'); // 为当前点击的选项卡添加 active 类
            // 如果表格还没有初始化，才进行初始化
            if (!rnainteractionTable) {
                rnainteractionTable = $('#table-rnainteraction').DataTable({
                    processing: true,
                    serverSide: true,
                    serverMethod: 'post',
                    ajax: {
                        url: './api/detail_RNA_interaction.php',
                        type: 'post',
                        dataType: 'json',
                        data: function(d) {
                            d.select_pos = select_pos;  // 传递查询参数
                        },
                        async: true,
                    },
                    dom: "<'top'lBf>rt<'bottom'ip>",
                    buttons: [
                        {
                            extend: 'csv',
                            text: 'Download'
                        }
                    ],
                    columns: [
                        { data: 'A_Chr' },
                        { data: 'A_Start' },
                        { data: 'A_End' },
                        { data: 'B_Chr' },
                        { data: 'B_Start' },
                        { data: 'B_End' },
                        { data: 'Cell_type' }
                    ],
                    drawCallback: function(settings) {
                        var api = this.api();
                        if (api.data().length === 0) {
                            $('#no-data-message').show();  // 如果没有数据，显示提示消息
                        } else {
                            $('#no-data-message').hide();  // 有数据时隐藏提示消息
                        }
                    }
                });
            } else {
                rnainteractionTable.ajax.reload();  // 如果已经初始化，则重新加载数据
            }

            //$('#cas9').fadeIn();  // 显示 cas9 表格
            //$('#SNP').fadeOut();  // 隐藏 SNP 表格

            $('#rnainteraction').show();
            $('#CommonSNP').hide();
            $('#RiskSNP').hide();
            $('#cas9').hide();
            $('#repeat').hide();
            $('#alu').hide();
            $('#caQTL').hide();
            $('#eQTL').hide();
            $('#haQTL').hide();
            $('#m5c').hide();
            $('#m6a').hide();
            $('#tfbs').hide();
            $('#rbp').hide();
        });


        // 切换到 Repeat 标签时初始化表格
        $('#tab_repeat').click(function() {

            $('.nav-item').removeClass('active'); // 移除所有选项卡的 active 类
            $(this).addClass('active'); // 为当前点击的选项卡添加 active 类
            // 如果表格还没有初始化，才进行初始化
            if (!repeatTable) {
                repeatTable = $('#table-repeat').DataTable({
                    processing: true,
                    serverSide: true,
                    serverMethod: 'post',
                    ajax: {
                        url: './api/detail_repeat.php',
                        type: 'post',
                        dataType: 'json',
                        data: function(d) {
                            d.select_pos = select_pos;  // 传递查询参数
                        },
                        async: true,
                    },
                    dom: "<'top'lBf>rt<'bottom'ip>",
                    buttons: [
                        {
                            extend: 'csv',
                            text: 'Download'
                        }
                    ],
                    columns: [
                        { data: 'C1' },
                        { data: 'C2' },
                        { data: 'C3' },
                        { data: 'C4' },
                        { data: 'C5' },
                        { data: 'C6' },
                    ],
                    drawCallback: function(settings) {
                        var api = this.api();
                        if (api.data().length === 0) {
                            $('#no-data-message').show();  // 如果没有数据，显示提示消息
                        } else {
                            $('#no-data-message').hide();  // 有数据时隐藏提示消息
                        }
                    }
                });
            } else {
                repeatTable.ajax.reload();  // 如果已经初始化，则重新加载数据
            }

            //$('#cas9').fadeIn();  // 显示 cas9 表格
            //$('#SNP').fadeOut();  // 隐藏 SNP 表格

            $('#repeat').show();
            $('#CommonSNP').hide();
            $('#RiskSNP').hide();
            $('#cas9').hide();
            $('#rnainteraction').hide();
            $('#alu').hide();
            $('#caQTL').hide();
            $('#eQTL').hide();
            $('#haQTL').hide();
            $('#m5c').hide();
            $('#m6a').hide();
            $('#tfbs').hide();
            $('#rbp').hide();
        });

        // 切换到 Repeat (Alu)标签时初始化表格
        $('#tab_alu').click(function() {

            $('.nav-item').removeClass('active'); // 移除所有选项卡的 active 类
            $(this).addClass('active'); // 为当前点击的选项卡添加 active 类
            // 如果表格还没有初始化，才进行初始化
            if (!aluTable) {
                aluTable = $('#table-alu').DataTable({
                    processing: true,
                    serverSide: true,
                    serverMethod: 'post',
                    ajax: {
                        url: './api/detail_Alu.php',
                        type: 'post',
                        dataType: 'json',
                        data: function(d) {
                            d.select_pos = select_pos;  // 传递查询参数
                        },
                        async: true,
                    },
                    dom: "<'top'lBf>rt<'bottom'ip>",
                    buttons: [
                        {
                            extend: 'csv',
                            text: 'Download'
                        }
                    ],
                    columns: [
                        { data: 'C1' },
                        { data: 'C2' },
                        { data: 'C3' },
                        { data: 'C4' },
                        { data: 'C5' },
                        { data: 'C6' },
                    ],
                    drawCallback: function(settings) {
                        var api = this.api();
                        if (api.data().length === 0) {
                            $('#no-data-message').show();  // 如果没有数据，显示提示消息
                        } else {
                            $('#no-data-message').hide();  // 有数据时隐藏提示消息
                        }
                    }
                });
            } else {
                aluTable.ajax.reload();  // 如果已经初始化，则重新加载数据
            }

            //$('#cas9').fadeIn();  // 显示 cas9 表格
            //$('#SNP').fadeOut();  // 隐藏 SNP 表格

            $('#alu').show();
            $('#CommonSNP').hide();
            $('#RiskSNP').hide();
            $('#cas9').hide();
            $('#rnainteraction').hide();
            $('#repeat').hide();
            $('#caQTL').hide();
            $('#eQTL').hide();
            $('#haQTL').hide();
            $('#m5c').hide();
            $('#m6a').hide();
            $('#tfbs').hide();
            $('#rbp').hide();
        });

        // 切换到 caQTL标签时初始化表格
        $('#tab_caQTL').click(function() {

            $('.nav-item').removeClass('active'); // 移除所有选项卡的 active 类
            $(this).addClass('active'); // 为当前点击的选项卡添加 active 类
            // 如果表格还没有初始化，才进行初始化
            if (!caQTLTable) {
                caQTLTable = $('#table-caQTL').DataTable({
                    processing: true,
                    serverSide: true,
                    serverMethod: 'post',
                    ajax: {
                        url: './api/detail_caQTL.php',
                        type: 'post',
                        dataType: 'json',
                        data: function(d) {
                            d.select_pos = select_pos;  // 传递查询参数
                        },
                        async: true,
                    },
                    dom: "<'top'lBf>rt<'bottom'ip>",
                    buttons: [
                        {
                            extend: 'csv',
                            text: 'Download'
                        }
                    ],
                    columns: [
                        { data: 'SNP' },
                        { data: 'CHR_SNP' },
                        { data: 'Position' },
                        { data: 'Ref_allele' },
                        { data: 'Alt_allele' },
                        //{ data: 'Gene' },
                        //{ data: 'distanceToTSS' },
                        //{ data: 'Annotation' },
                        //{ data: 'Effect_size' },
                        //{ data: 'Celltype' },
                        //{ data: 'GWASID' },
                        //{ data: 'Trait' },
                    ],
                    drawCallback: function(settings) {
                        var api = this.api();
                        if (api.data().length === 0) {
                            $('#no-data-message').show();  // 如果没有数据，显示提示消息
                        } else {
                            $('#no-data-message').hide();  // 有数据时隐藏提示消息
                        }
                    }
                });
            } else {
                caQTLTable.ajax.reload();  // 如果已经初始化，则重新加载数据
            }

            //$('#cas9').fadeIn();  // 显示 cas9 表格
            //$('#SNP').fadeOut();  // 隐藏 SNP 表格

            $('#caQTL').show();
            $('#CommonSNP').hide();
            $('#alu').hide();
            $('#repeat').hide();
            $('#RiskSNP').hide();
            $('#cas9').hide();
            $('#rnainteraction').hide();
            $('#eQTL').hide();
            $('#haQTL').hide();
            $('#m5c').hide();
            $('#m6a').hide();
            $('#tfbs').hide();
            $('#rbp').hide();
        });

        // 切换到 eQTL标签时初始化表格
        $('#tab_eQTL').click(function() {

            $('.nav-item').removeClass('active'); // 移除所有选项卡的 active 类
            $(this).addClass('active'); // 为当前点击的选项卡添加 active 类
            // 如果表格还没有初始化，才进行初始化
            if (!eQTLTable) {
                eQTLTable = $('#table-eQTL').DataTable({
                    processing: true,
                    serverSide: true,
                    serverMethod: 'post',
                    ajax: {
                        url: './api/detail_eQTL.php',
                        type: 'post',
                        dataType: 'json',
                        data: function(d) {
                            d.select_pos = select_pos;  // 传递查询参数
                        },
                        async: true,
                    },
                    dom: "<'top'lBf>rt<'bottom'ip>",
                    buttons: [
                        {
                            extend: 'csv',
                            text: 'Download'
                        }
                    ],
                    columns: [
                        { data: 'C4' },
                        { data: 'C1' },
                        { data: 'C2' },
                        { data: 'C5' },
                        { data: 'C6' }
                    ],
                    drawCallback: function(settings) {
                        var api = this.api();
                        if (api.data().length === 0) {
                            $('#no-data-message').show();  // 如果没有数据，显示提示消息
                        } else {
                            $('#no-data-message').hide();  // 有数据时隐藏提示消息
                        }
                    }
                });
            } else {
                eQTLTable.ajax.reload();  // 如果已经初始化，则重新加载数据
            }

            //$('#cas9').fadeIn();  // 显示 cas9 表格
            //$('#SNP').fadeOut();  // 隐藏 SNP 表格

            $('#eQTL').show();
            $('#CommonSNP').hide();
            $('#RiskSNP').hide();
            $('#cas9').hide();
            $('#rnainteraction').hide();
            $('#repeat').hide();
            $('#alu').hide();
            $('#caQTL').hide();
            $('#haQTL').hide();
            $('#m5c').hide();
            $('#m6a').hide();
            $('#tfbs').hide();
            $('#rbp').hide();
        });

        // 切换到 haQTL标签时初始化表格
        $('#tab_haQTL').click(function() {

            $('.nav-item').removeClass('active'); // 移除所有选项卡的 active 类
            $(this).addClass('active'); // 为当前点击的选项卡添加 active 类
            // 如果表格还没有初始化，才进行初始化
            if (!haQTLTable) {
                haQTLTable = $('#table-haQTL').DataTable({
                    processing: true,
                    serverSide: true,
                    serverMethod: 'post',
                    ajax: {
                        url: './api/detail_haQTL.php',
                        type: 'post',
                        dataType: 'json',
                        data: function(d) {
                            d.select_pos = select_pos;  // 传递查询参数
                        },
                        async: true,
                    },
                    dom: "<'top'lBf>rt<'bottom'ip>",
                    buttons: [
                        {
                            extend: 'csv',
                            text: 'Download'
                        }
                    ],
                    columns: [
                        { data: 'Chr' },
                        { data: 'Pos' },
                        { data: 'Ref' },
                        { data: 'Alt' },
                        { data: 'Tissue' }
                    ],
                    drawCallback: function(settings) {
                        var api = this.api();
                        if (api.data().length === 0) {
                            $('#no-data-message').show();  // 如果没有数据，显示提示消息
                        } else {
                            $('#no-data-message').hide();  // 有数据时隐藏提示消息
                        }
                    }
                });
            } else {
                haQTLTable.ajax.reload();  // 如果已经初始化，则重新加载数据
            }

            //$('#cas9').fadeIn();  // 显示 cas9 表格
            //$('#SNP').fadeOut();  // 隐藏 SNP 表格

            $('#haQTL').show();
            $('#eQTL').hide();
            $('#CommonSNP').hide();
            $('#RiskSNP').hide();
            $('#cas9').hide();
            $('#rnainteraction').hide();
            $('#repeat').hide();
            $('#alu').hide();
            $('#caQTL').hide();
            $('#m5c').hide();
            $('#m6a').hide();
            $('#tfbs').hide();
            $('#rbp').hide();
        });

        // 切换到 m5c标签时初始化表格
        $('#tab_m5c').click(function() {

            $('.nav-item').removeClass('active'); // 移除所有选项卡的 active 类
            $(this).addClass('active'); // 为当前点击的选项卡添加 active 类
            // 如果表格还没有初始化，才进行初始化
            if (!m5cTable) {
                m5cTable = $('#table-m5c').DataTable({
                    processing: true,
                    serverSide: true,
                    serverMethod: 'post',
                    ajax: {
                        url: './api/detail_m5C.php',
                        type: 'post',
                        dataType: 'json',
                        data: function(d) {
                            d.select_pos = select_pos;  // 传递查询参数
                        },
                        async: true,
                    },
                    dom: "<'top'lBf>rt<'bottom'ip>",
                    buttons: [
                        {
                            extend: 'csv',
                            text: 'Download'
                        }
                    ],
                    columns: [
                        { data: 'C1' },
                        { data: 'C3' },
                        { data: 'C4' },
                        { data: 'C6' },
                        { data: 'C7' }
                    ],
                    drawCallback: function(settings) {
                        var api = this.api();
                        if (api.data().length === 0) {
                            $('#no-data-message').show();  // 如果没有数据，显示提示消息
                        } else {
                            $('#no-data-message').hide();  // 有数据时隐藏提示消息
                        }
                    }
                });
            } else {
                m5cTable.ajax.reload();  // 如果已经初始化，则重新加载数据
            }

            //$('#cas9').fadeIn();  // 显示 cas9 表格
            //$('#SNP').fadeOut();  // 隐藏 SNP 表格

            $('#CommonSNP').hide();
            $('#RiskSNP').hide();
            $('#cas9').hide();
            $('#rnainteraction').hide();
            $('#repeat').hide();
            $('#alu').hide();
            $('#caQTL').hide();
            $('#eQTL').hide();
            $('#haQTL').hide();
            $('#m5c').show();
            $('#m6a').hide();
            $('#tfbs').hide();
            $('#rbp').hide();
        });

        // 切换到 m6a标签时初始化表格
        $('#tab_m6a').click(function() {

            $('.nav-item').removeClass('active'); // 移除所有选项卡的 active 类
            $(this).addClass('active'); // 为当前点击的选项卡添加 active 类
            // 如果表格还没有初始化，才进行初始化
            if (!m6aTable) {
                m6aTable = $('#table-m6a').DataTable({
                    processing: true,
                    serverSide: true,
                    serverMethod: 'post',
                    ajax: {
                        url: './api/detail_m6A.php',
                        type: 'post',
                        dataType: 'json',
                        data: function(d) {
                            d.select_pos = select_pos;  // 传递查询参数
                        },
                        async: true,
                    },
                    dom: "<'top'lBf>rt<'bottom'ip>",
                    buttons: [
                        {
                            extend: 'csv',
                            text: 'Download'
                        }
                    ],
                    columns: [
                        { data: 'C1' },
                        { data: 'C3' },
                        { data: 'C4' },
                        { data: 'C6' },
                        { data: 'C7' }
                    ],
                    drawCallback: function(settings) {
                        var api = this.api();
                        if (api.data().length === 0) {
                            $('#no-data-message').show();  // 如果没有数据，显示提示消息
                        } else {
                            $('#no-data-message').hide();  // 有数据时隐藏提示消息
                        }
                    }
                });
            } else {
                m6aTable.ajax.reload();  // 如果已经初始化，则重新加载数据
            }

            //$('#cas9').fadeIn();  // 显示 cas9 表格
            //$('#SNP').fadeOut();  // 隐藏 SNP 表格

            $('#CommonSNP').hide();
            $('#RiskSNP').hide();
            $('#cas9').hide();
            $('#rnainteraction').hide();
            $('#repeat').hide();
            $('#alu').hide();
            $('#caQTL').hide();
            $('#eQTL').hide();
            $('#haQTL').hide();
            $('#m5c').hide();
            $('#m6a').show();
            $('#tfbs').hide();
            $('#rbp').hide();
        });

        // 切换到 TFBS标签时初始化表格
        $('#tab_tfbs').click(function() {

            $('.nav-item').removeClass('active'); // 移除所有选项卡的 active 类
            $(this).addClass('active'); // 为当前点击的选项卡添加 active 类
            // 如果表格还没有初始化，才进行初始化
            if (!tfbsTable) {
                tfbsTable = $('#table-tfbs').DataTable({
                    processing: true,
                    serverSide: true,
                    serverMethod: 'post',
                    ajax: {
                        url: './api/detail_TFBS.php',
                        type: 'post',
                        dataType: 'json',
                        data: function(d) {
                            d.select_pos = select_pos;  // 传递查询参数
                        },
                        async: true,
                    },
                    dom: "<'top'lBf>rt<'bottom'ip>",
                    buttons: [
                        {
                            extend: 'csv',
                            text: 'Download'
                        }
                    ],
                    columns: [
                        { data: 'chrom' },
                        { data: 'start' },
                        { data: 'end' },
                        { data: 'TF' },
                        { data: 'strand' }
                    ],
                    drawCallback: function(settings) {
                        var api = this.api();
                        if (api.data().length === 0) {
                            $('#no-data-message').show();  // 如果没有数据，显示提示消息
                        } else {
                            $('#no-data-message').hide();  // 有数据时隐藏提示消息
                        }
                    }
                });
            } else {
                tfbsTable.ajax.reload();  // 如果已经初始化，则重新加载数据
            }

            //$('#cas9').fadeIn();  // 显示 cas9 表格
            //$('#SNP').fadeOut();  // 隐藏 SNP 表格

            $('#CommonSNP').hide();
            $('#RiskSNP').hide();
            $('#cas9').hide();
            $('#rnainteraction').hide();
            $('#repeat').hide();
            $('#alu').hide();
            $('#caQTL').hide();
            $('#eQTL').hide();
            $('#haQTL').hide();
            $('#m5c').hide();
            $('#m6a').hide();
            $('#tfbs').show();
            $('#rbp').hide();
        });

        // 切换到 RBP标签时初始化表格
        $('#tab_rbp').click(function() {

            $('.nav-item').removeClass('active'); // 移除所有选项卡的 active 类
            $(this).addClass('active'); // 为当前点击的选项卡添加 active 类
            // 如果表格还没有初始化，才进行初始化
            if (!rbpTable) {
                rbpTable = $('#table-rbp').DataTable({
                    processing: true,
                    serverSide: true,
                    serverMethod: 'post',
                    ajax: {
                        url: './api/detail_RBP.php',
                        type: 'post',
                        dataType: 'json',
                        data: function(d) {
                            d.select_pos = select_pos;  // 传递查询参数
                        },
                        async: true,
                    },
                    dom: "<'top'lBf>rt<'bottom'ip>",
                    buttons: [
                        {
                            extend: 'csv',
                            text: 'Download'
                        }
                    ],
                    columns: [
                        { data: 'C1' },
                        { data: 'C2' },
                        { data: 'C3' },
                        { data: 'C4' },
                        { data: 'C5' },
                        { data: 'C6' },
                        { data: 'C7' },
                        { data: 'C8' },
                    ],
                    drawCallback: function(settings) {
                        var api = this.api();
                        if (api.data().length === 0) {
                            $('#no-data-message').show();  // 如果没有数据，显示提示消息
                        } else {
                            $('#no-data-message').hide();  // 有数据时隐藏提示消息
                        }
                    }
                });
            } else {
                rbpTable.ajax.reload();  // 如果已经初始化，则重新加载数据
            }

            //$('#cas9').fadeIn();  // 显示 cas9 表格
            //$('#SNP').fadeOut();  // 隐藏 SNP 表格

            $('#CommonSNP').hide();
            $('#RiskSNP').hide();
            $('#cas9').hide();
            $('#rnainteraction').hide();
            $('#repeat').hide();
            $('#alu').hide();
            $('#caQTL').hide();
            $('#eQTL').hide();
            $('#haQTL').hide();
            $('#m5c').hide();
            $('#m6a').hide();
            $('#tfbs').hide();
            $('#rbp').show();
        });


        // 默认点击 SNP 标签，显示 SNP 表格
        $('#tab_commonsnp').click();

    });
</script>



<!--include footer-->
<?php
include "./templates/footer.php";
?>




</body>

