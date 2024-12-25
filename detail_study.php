
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

        <div class="col-lg-2" style="margin-right: 0px">
                <ul id="ul-sidenav1" class="ul-sidenav">
                    <li id="section1" class="li-sidebar" >
                        <a href="#title-summary">Summary</a>
                    </li>
                    <li id="section2" class="li-sidebar">
                        <a href="#title-expression">Expression</a>
                    </li>
                    <li id="section3" class="li-sidebar">
                        <a href="#title-violin">Violin</a>
                    </li>
                    <li id="section4" class="li-sidebar">
                        <a href="#title-statistic">Statistic</a>
                    </li>
                    <li id="section5" class="li-sidebar">
                        <a href="#title-marker">Marker features</a>
                    </li>
                </ul>
	</div>

        <div class="col-lg-10">
            <div class="row" style="margin-right: 10px;">
                <div class="card" style="padding-right: 0; padding-left: 0;">
                    <div class="card-body">
                        <div class="col-lg-5">
                            <!--
                            <h2 id="title-summary">Summary</h2>
                            <h5>Tissue:</h5>
                            <h5>Species:</h5>
                            <h5>PMID:</h5>
                            <h5>Technology:</h5>
                            <h5>Dataset Summary:</h5>
                            -->
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <td><strong>Project ID:</strong></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong>Tissue:</strong></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong>Species:</strong></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong>Technology:</strong></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong> Summary:</strong></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-5">

                        </div>
                    </div>
                </div>

                <hr>
            </div>
            <div class="row">
                <h2 id="title-expression">eRNA Expression</h2>
                <div class="row">
                    <div class="container mt-5">
                        <form>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="gene1" class="col-form-label">
                                        <div class="row" style="margin-left: 10px">
                                            eRNA 1:
                                            <span style="background: rgb(217, 0, 27); width: 26px; height: 13px; margin-left: 15px; margin-top: 6px " ></span>
                                        </div>
                                    </label>
                                    <select id="gene1" class="form-select">
                                        <!-- Gene options will be dynamically filled here -->
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="gene2" class="col-form-label">
                                        <div class="row" style="margin-left: 10px">
                                            eRNA 2:
                                            <span style="background: rgb(5, 2, 189); width: 26px; height: 13px; margin-left: 15px; margin-top: 6px " ></span>
                                        </div>
                                    </label>
                                    <select id="gene2" class="form-select">
                                        <option value="">Select a gene</option>
                                    </select>
                                    <span id="clearGene2" class="clear-btn">&#10006;</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div>
                        	<iframe src="https://lcbb.swjtu.edu.cn/dash_app/umap1/" height="600px" width='500px' scrolling="no">
				</iframe>
				<a>position for datatable</a>
			</div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                        	<iframe src="https://lcbb.swjtu.edu.cn/dash_app/umap2/" height="600px" width='500px' scrolling="no">
				</iframe>
				<a>position for datatable</a>
			</div>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-lg-6">

                    </div>
                    <div class="col-lg-6">

                    </div>
                </div>
                <br />
                <br />
                <br />
            </div>
            <div class="row">
                <h2 id="title-violin">Violin</h2>
                <a> Violin plot for each eRNA expression </a>
                
                    <iframe src="https://lcbb.swjtu.edu.cn/dash_app/violin/" height="600px" width='1200px' scrollng="no">
                    </iframe>
		
		<hr>
            </div>
            <div class="row">
                <h2 id="title-statistic">Statistic</h2>
                <hr>
                <h4 style="color: #df4759">QC info</h4>
                <!--插入质控图片-->
                <div class="card" style="width: 50%">
                    <img id="QC_Image" src="" alt="Dynamic Image">
                </div>
                <a> Violin plot of some of the computed quality measures:</a>
                <a> The total counts per cell.</a>
                <hr>
                <div class="row">
                    <h4 style="color: #0dcaf0">Cluster info</h4>
                    <div class="col-lg-6">
                        <div id="cell_num_cluster" style="width: 600px;height:400px;"></div>
                    </div>
                    <div class="col-lg-6">
                        <div id="eRNA_num_cluster" style="width: 600px;height:400px;"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <h2 id="title-marker">Marker features</h2>
                <h5> Cluster Markers</h5>
                <a> The marker eRNAs/genes of each cluster were calculated by scanpy.tl.rank_genes_groups with the "wilcoxon" method. If the original annotation information of dataset is available, we use the original one, if not, we get the annotation information through scanpy.tl.leiden.</a>
                <hr>
                <div class="btn-group mt-3" role="group" aria-label="Image Buttons">
                    <button type="button" class="btn btn-primary" id="btnA">Top10 eRNAs</button>
                    <button type="button" class="btn btn-primary" id="btnB">Top10 Genes</button>
                    <button type="button" class="btn btn-primary" id="btnC">All eRNAs</button>
                    <button type="button" class="btn btn-primary" id="btnD">All Genes</button>
                </div>
                <a id="a-marker"> Heatmap of the expression of the top 10 marker eRNAs (bottom) for each cluster (left).</a>
                <!--插入质控图片-->
                <img id="eRNA_Image" src="" alt="Dynamic Image">




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
    </div>
</div>









<!--测试接受传参数-->
<!--
<div>
    <p style="text-align: center">测试接受传参数</p>
    <p id="project_id" style="text-align: center; color: red" ></p>
</div>
-->











<script>
    let params = new URLSearchParams(document.location.search.substring(1));
    let sid = params.get("sid"); //sid：这个页面的Study属性；
    console.log(sid);
    // 动态生成图片URL
    let QC_imageURL = `./public/image/${sid}/violin_QC_${sid}.png`;
    let eRNA_imageURL = `./public/image/${sid}/heatmap_top10_eRNA_${sid}.png`;

    //document.getElementById("project_id").innerHTML = "当前跳转至" + sid + "页面";
</script>
<!--
<script>
    //eRNA1和eRNA2的表单逻辑；
    $(document).ready(function(){
        // Assume geneList is the array of genes obtained from the backend
        var geneList = ["chr1:1270291-1271430", "chr1:9318012-9318451", "eRNA3"]; // Sample gene list
        //var geneList = [];
        var selectedGene2 = ""; // To store the selected gene in dropdown 2


        // Fill gene options in both dropdowns
        var geneDropdown1 = $("#gene1");
        var geneDropdown2 = $("#gene2");

        geneList.forEach(function(gene) {
            geneDropdown1.append($("<option></option>").attr("value", gene).text(gene));
            geneDropdown2.append($("<option></option>").attr("value", gene).text(gene));
        });

        // Set default selection for the first dropdown
        geneDropdown1.val(geneList[0]);

        // Disable same options in the second dropdown
        geneDropdown1.on("change", function() {
            var selectedGene1 = $(this).val();
            $("#gene2 option").prop('disabled', false).removeClass('disabled'); // Enable all options
            $("#gene2 option").each(function() {
                if ($(this).val() === selectedGene1) {
                    $(this).prop('disabled', true).addClass('disabled'); // Disable and gray out selected gene in dropdown 2
                    if ($(this).val() === selectedGene2) {
                        selectedGene2 = ""; // Reset selected gene in dropdown 2 if it is the same as dropdown 1
                        $("#gene2").val('');
                    }
                }
            });
        });

        // Store the selected gene in dropdown 2
        geneDropdown2.on("change", function() {
            selectedGene2 = $(this).val();
        });

        $("#clearGene2").on("click", function() {
            $("#gene2").val(''); // Set the value of dropdown 2 to empty
        });
    });
</script>
-->


<script>

    $(document).ready(function(){
        $.ajax({
            url: './api/get_eRNA_list.php', // 后端脚本的路径
            type: 'GET', // 请求类型
            dataType: 'json', // 期望的返回数据类型
            success: function(data) {

                var geneList = data;
                // 提取 ernaName 的值作为列表
                //var geneList = data.map(function(item) {
                //    return item.ernaName;
                //});
                //var geneList = ["chr1:1270291-1271430", "chr1:9318012-9318451", "eRNA3"];


                var geneDropdown1 = $("#gene1");
                var geneDropdown2 = $("#gene2");

                // Fill gene options in both dropdowns
                geneList.forEach(function(gene) {
                    geneDropdown1.append($("<option></option>").attr("value", gene).text(gene));
                    geneDropdown2.append($("<option></option>").attr("value", gene).text(gene));
                });

                // Set default selection and disable corresponding options
                geneDropdown1.val(geneList[0]); // Set default selection for the first dropdown
                updateDropdowns(); // Update both dropdowns based on the default selection

                // Event handler for changes in the first dropdown
                geneDropdown1.on("change", function() {
                    updateSecondDropdown($(this).val());
                });

                // Event handler for changes in the second dropdown
                geneDropdown2.on("change", function() {
                    updateFirstDropdown($(this).val());
                });

                // Event handler for the clear button
                $("#clearGene2").on("click", function() {
                    geneDropdown2.val('');
                    updateDropdowns(); // Reset dropdowns when cleared
                });

                // Function to update both dropdowns
                function updateDropdowns() {
                    var selectedGene1 = geneDropdown1.val();
                    updateSecondDropdown(selectedGene1);
                    var selectedGene2 = geneDropdown2.val();
                    updateFirstDropdown(selectedGene2);
                }

                // Function to update the second dropdown based on the first dropdown's selection
                function updateSecondDropdown(selectedGene1) {
                    $("#gene2 option").prop('disabled', false).removeClass('disabled');
                    $("#gene2 option").filter(function() {
                        return $(this).val() === selectedGene1;
                    }).prop('disabled', true).addClass('disabled');
                }

                // Function to update the first dropdown based on the second dropdown's selection
                function updateFirstDropdown(selectedGene2) {
                    $("#gene1 option").prop('disabled', false).removeClass('disabled');
                    $("#gene1 option").filter(function() {
                        return $(this).val() === selectedGene2;
                    }).prop('disabled', true).addClass('disabled');
                }

            },
        })
    });

</script>




<!-- Flask dash plotly -->
<script>
    $.ajax({
        type: 'POST',
        //url: '/eRNAdb',
        url: '/dash_app'
        data: { sid: sid },
        success: function() {
            console.log('Data sent successfully');
        }
    });
</script>


<script>
    // 将动态生成的图片URL赋值给<img>的src属性
    document.getElementById("QC_Image").src = QC_imageURL;
    document.getElementById("eRNA_Image").src = eRNA_imageURL;

    // 按钮点击事件处理，根据不同按钮切换展示不同图片
    $("#btnA").click(function() {
        $("#eRNA_Image").attr("src", `./public/figures/heatmap_top10_eRNA_${sid}.png`);
        $("#a-marker").text('Heatmap of the expression of the top 10 marker eRNAs (bottom) for each cluster (left).');
    });

    $("#btnB").click(function() {
        $("#eRNA_Image").attr("src", `./public/figures/heatmap_top_gene_${sid}.png`);
        $("#a-marker").text('Heatmap of the expression of the top 10 marker genes (bottom) for each cluster (left).');
    });

    $("#btnC").click(function() {
        $("#eRNA_Image").attr("src", `./public/figures/heatmap_eRNA_${sid}.png`);
        $("#a-marker").text('Heatmap of the expression of the marker eRNAs (bottom) for each cluster (left).');
    });

    $("#btnD").click(function() {
        $("#eRNA_Image").attr("src", `./public/figures/heatmap_gene_${sid}.png`);
        $("#a-marker").text('Heatmap of the expression of the marker genes (bottom) for each cluster (left).');
    });
</script>


<!--4. 结果数据JSON的获取，通过get_marker_features.php后端-->
<script>
    //主表格初始化，返回所有符合筛选条件后的数据
    $('#marker_features').DataTable( {
        "processing": true,
        "serverSide": true,
        "serverMethod": 'post',
        ajax: {
            url: './api/get_marker_features.php',
            data:{
                sid:sid,
                //feature_type:select_experiment,
            },
        },
        dataType:'json',
        //ordering: 'false', //禁止点击排序
        //order: [],
        //"order": [[ 0, "desc" ]],
        dom: 'lBfrtip',
        columns: [
            { data: 'names' },
            { data: 'p_val_adj' },
            { data: 'p-value' },
            { data: 'LogFoldChanges' },
            { data: 'Cluster' }
        ]
    } );
</script>


<!--5. ECharts绘制Statistic plot-->
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




<!--6. 左侧滚动导览逻辑-->
<script>
    // 获取所有的导航项
    const navItems = document.querySelectorAll('#ul-sidenav1 .li-sidebar');

    // 为每个导航项添加点击事件监听器
    navItems.forEach(item => {
        item.addEventListener('click', function() {
            // 移除所有li的激活状态
            navItems.forEach(nav => {
                nav.classList.remove('active');
            });
            // 给当前点击的li添加激活状态
            this.classList.add('active');
            // 跳转到对应的页面部分
            document.querySelector(`#${this.id}`).scrollIntoView({ behavior: 'smooth' });
        });
    });
</script>




<!--include footer-->
<?php
include "./templates/footer.php";
?>




</body>
</html>
