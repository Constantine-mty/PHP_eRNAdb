

<?php
include "./templates/base.php";
?>


<body id="body">
<!--include header-->
<?php
include "./templates/header.php";
?>



<div class="container" id="body">
    <div class="row">
        <div class="col-lg-12">
            <br>
        </div>
    </div>

    <div class="row flex-xl-nowrap">
        <!--get筛选开始-->
        <div class="col-lg-3 bd-sidebar">
            <nav class="bd-links" style="background-color: navajowhite">

                <!--SPECIES-->
                <!--设置id，table-->
                <table class='fenye table-bordered' style="background-color: white" id="Species_">
                    <thead style="background-color: #0dcaf0">
                    <tr>
                        <th>
                            <div class='list-group-item'>
                                <h4>Species</h4>
                                <!--函数：selectMenu; 点击显示所有选项栏-->
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody style="background-color: white">
                    </tbody>
                </table>

                <!--包装返回-->




                <!--PLATFORM-->
                <table class='fenye table-bordered' id="Platform_">
                    <thead style="background-color: #0dcaf0">
                    <tr>
                        <th>
                            <div class='list-group-item'>
                                <h4>Platform</h4>

                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <ul class="pagination" id="Platform__ul"></ul>


                <!--DATA_TYPE-->
                <table class='fenye table-bordered' id="Tissue_Type_">
                    <thead style="background-color: #0dcaf0">
                    <tr>
                        <th>
                            <div class='list-group-item'>
                                <h4>Tissue Type</h4>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody style="background-color: white">
                    </tbody>
                </table>


                <!--TEST-->


                </div>
        <div class="col-lg-9 bd-content" id="bd-content">
            <!--这里将左侧选择过的筛选选项，列在表格上端-->
            <!--<div class='user_select'>SELECT</div>
            <div onclick='select_data(this)' data-name='inDrop' data-type='Platform' class="label label-primary">
                <div>X</div> inDrop</div>-->
            <hr>
            <!--表格开始-->
            <!--改------------------------------>
            <table id="experiments" class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th>Species</th>
                    <th>Study</th>
                    <th>project ID</th>
                    <th>Tissue</th>
                    <th>Technology</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>






<!--客户端分页（逻辑分页）-->
<script>

    let params = new URLSearchParams(document.location.search.substring(1));
    let select_specie = params.get("selectedOption_Species"); // 页面的?属性；
    let select_experiment = params.get("selectedOption_Experiment"); // 页面的?属性；
    let select_tissue = params.get("selectedOption_Tissue"); // 页面的?属性；
    console.log(select_specie);
    console.log(select_experiment);
    console.log(select_tissue);

</script>

<script>
    let filter_species; // 全局作用域
    let filter_tissue; // 全局作用域
    let filter_technology; // 全局作用域
</script>

<script>
        $(document).ready(function() {
        //var filter_data;

        $.ajax({
        url: './api/filter_return.php',  // 后端 PHP 文件路径
        method: 'POST',
        data: { select_specie: select_specie,
                select_experiment: select_experiment,
                select_tissue:select_tissue},
        success: function(response) {
        // 成功接收后端返回的数据
        console.log('Response from PHP:', response);

        // JSON 数据解析
        const filter_data = JSON.parse(response);
        filter_species = filter_data.species;
        filter_tissue = filter_data.tissue;
        filter_technology = filter_data.technology;

        // 在控制台打印变量内容
        console.log('Species:', filter_species);
        console.log('Tissue:', filter_tissue);
        console.log('Technology:', filter_technology);

        // 保存到后续可以直接使用的变量中
        //saveResults(filter_species, filter_tissue, filter_technology);
    },
        error: function(xhr, status, error) {
        // 错误处理
        console.error('Error:', error);
    }
    });
        /*
            function saveResults(species, tissue, technology) {
                // 将获取的值保存到后面可以直接使用的变量中
                // 可以在这里对保存的值进行进一步处理或者执行其他操作
                window.saved_species = species;
                window.saved_tissue = tissue;
                window.saved_technology = technology;

                console.log('Saved Species:', window.saved_species);
                console.log('Saved Tissue:', window.saved_tissue);
                console.log('Saved Technology:', window.saved_technology);

            }

         */
    });
</script>

<script>

</script>

<script>
<!--函数对filter_species\tissue\technology操作，复制给var变量data_Species_、data_Experiment_Type_、data_Tissue_Type_-->
function formatSpeciesData(speciesData) {
    var data_Species_ = [];

    // 处理每个物种的数据
    Object.keys(speciesData).forEach(function(species) {
        var speciesCount = speciesData[species]; // 物种数量

        // 根据物种生成 HTML 结构
        var speciesName = "";
        var speciesID = "";
        switch (species) {
            case 'Mouse':
                speciesName = 'Mus musculus';
                speciesID = 'Mouse';
                break;
            case 'Human':
                speciesName = 'Homo sapiens';
                speciesID = 'Human';
                break;
            case 'Human/Mouse':
                speciesName = 'Homo_Mus';
                speciesID = 'Human/Mouse';
                break;
            default:
                speciesName = species;
                speciesID = species;
        }

        var speciesHTML = "<a title='" + speciesName + "' type='button' class='list-group-item' id='" + speciesID + "' data-name='" + speciesName + "' data-type='Species'>" +
            "<span class='badge badge-default' style='background-color: #0a53be'>" + speciesCount + "</span> " + speciesName + "</a>";

        // 将 HTML 结构添加到数组中
        data_Species_.push([speciesHTML]);
    });

    return data_Species_;
}

function formatTissueData(tissueData) {
    var data_Tissue_ = [];

    // 处理每个组织的数据
    Object.keys(tissueData).forEach(function(tissue) {
        var tissueCount = tissueData[tissue]; // 组织数量

        // 根据组织生成 HTML 结构
        var tissueName = tissue;
        var tissueID = tissue;

        var tissueHTML = "<a title='" + tissueName + "' type='button' class='list-group-item' id='" + tissueID + "' data-name='" + tissueName + "' data-type='Tissue'>" +
            "<span class='badge badge-default' style='background-color: #0a53be'>" + tissueCount + "</span> " + tissueName + "</a>";

        // 将 HTML 结构添加到数组中
        data_Tissue_.push([tissueHTML]);
    });

    return data_Tissue_;
}

function formatTechnologyData(technologyData) {
    var data_Technology_ = [];

    // 处理每种技术的数据
    Object.keys(technologyData).forEach(function(technology) {
        var technologyCount = technologyData[technology]; // 技术数量

        // 根据技术生成 HTML 结构
        var technologyName = technology;
        var technologyID = technology;

        var technologyHTML = "<a title='" + technologyName + "' type='button' class='list-group-item' id='" + technologyID + "' data-name='" + technologyName + "' data-type='Technology'>" +
            "<span class='badge badge-default' style='background-color: #0a53be'>" + technologyCount + "</span> " + technologyName + "</a>";

        // 将 HTML 结构添加到数组中
        data_Technology_.push([technologyHTML]);
    });

    return data_Technology_;
}





</script>




<script>
// 假设您已经获取到 species 数据存储在 species 变量中
const species = {Mouse: 109, 'Human/Mouse': 7, Human: 55};
//const species = window.filter_species;

var formattedSpeciesData = formatSpeciesData(species);
console.log(formattedSpeciesData);

// formattedSpeciesData 就是生成的数组，按照您所需的格式存储了处理后的 species 数据
</script>



<script>
    $('#Species_').DataTable( {
        "processing": true,
        "paging": true,
        "pageLength": 3,
        "searching": false,
        "lengthChange": false,
        //"serverSide": true,
        //"serverMethod": 'post',
        //ajax: {
        //  url: './api/filter_return.php',
        //data:{
        //  select_specie:select_specie,
        //},
        //},
        //dataType:'json',
        //dom: 'lBfrtip',
        order:[],
        data:formattedSpeciesData
    } );
</script>


<script>
    // title; id; name
    var data_Experiment_Type_ = [];
</script>


<script>
    $('#Platform_').DataTable( {
        "processing": true,
        "paging": true,
        "pageLength": 3,
        "searching": false,
        "lengthMenu": [ [3, 5, 10, -1], [3, 5, 10, "All"] ],
        order:[],
        data:data_Experiment_Type_
    } );

</script>







<script>
    var data_Tissue_Type_ = [];
</script>
<script>
    $('#Tissue_Type_').DataTable( {
        "processing": true,
        "paging": true,
        "pageLength": 3,
        "searching": false,
        "lengthMenu": [ [3, 5, 10, -1], [3, 5, 10, "All"] ],
        order:[],
        data:data_Tissue_Type_
    } );

</script>



<script>
    $('#experiments').DataTable( {
        "processing": true,
        "serverSide": true,
        "serverMethod": 'post',
        ajax: {
            url: './api/table_filter2.php',
            data:{
                select_specie:select_specie,
                select_experiment:select_experiment,
                select_tissue:select_tissue,
            },
        },
        dataType:'json',
        dom: 'lBfrtip',
        columns: [
            { data: 'species' },
            { data: 'title' },
            { data: 'project_id',
                render: function ( data, type, row ) {
                    return '<a href="detail_study.php?sid=' + data + '">' + data + '</a>'
                }
            },
            { data: 'tissue' },
            { data: 'technology' }
        ]
    } );
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);
        var selectedOption = urlParams.get('selectedOption_Species');

        if (selectedOption) {
            var activeButton = document.getElementById(selectedOption);
            if (activeButton) {
                activeButton.style.backgroundColor = "red"; // 设置激活状态的样式
            }
        }

        function handleButtonClick(event) {
            var id = event.target.id;
            var newUrl = currentPage;

            if (id === selectedOption) {
                newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Species=' + id + '(&?)'), '$1').replace(/&$/, '');
            } else {
                newUrl += (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Species=' + id;
            }

            window.location.href = newUrl;
        }

        document.addEventListener("click", function(event) {
            if (event.target && event.target.getAttribute("data-type") === "Species") {
                handleButtonClick(event);
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);
        var selectedOption = urlParams.get('selectedOption_Experiment');

        if (selectedOption) {
            var activeButton = document.getElementById(selectedOption);
            if (activeButton) {
                activeButton.style.backgroundColor = "red"; // 设置激活状态的样式
            }
        }

        function handleButtonClick(event) {
            var id = event.target.id;
            var newUrl = currentPage;

            if (id === selectedOption) {
                newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Experiment=' + id + '(&?)'), '$1').replace(/&$/, '');
            } else {
                newUrl += (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Experiment=' + id;
            }

            window.location.href = newUrl;
        }

        document.addEventListener("click", function(event) {
            if (event.target && event.target.getAttribute("data-type") === "Experiment_Type") {
                handleButtonClick(event);
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = window.location.href;
        var urlParams = new URLSearchParams(window.location.search);
        var selectedOption = urlParams.get('selectedOption_Tissue');

        if (selectedOption) {
            var activeButton = document.getElementById(selectedOption);
            if (activeButton) {
                activeButton.style.backgroundColor = "red"; // 设置激活状态的样式
            }
        }

        function handleButtonClick(event) {
            var id = event.target.id;
            var newUrl = currentPage;

            if (id === selectedOption) {
                newUrl = newUrl.replace(new RegExp('([?&])selectedOption_Tissue=' + id + '(&?)'), '$1').replace(/&$/, '');
            } else {
                newUrl += (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Tissue=' + id;
            }

            window.location.href = newUrl;
        }

        document.addEventListener("click", function(event) {
            if (event.target && event.target.getAttribute("data-type") === "Tissue_Type") {
                handleButtonClick(event);
            }
        });
    });
</script>




<!-- 第二次实现，功能为激活按钮，并且退回上一次的路由

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = window.location.href;

        // 获取 URL 中的 selectedOption_Species 参数值
        var urlParams = new URLSearchParams(window.location.search);
        var selectedOption = urlParams.get('selectedOption_Species');

        // 根据参数值激活对应的按钮
        if (selectedOption) {
            var activeButton = document.getElementById(selectedOption);
            if (activeButton) {
                activeButton.style.backgroundColor = "red"; // 设置激活状态的样式
            }
        }

        document.addEventListener("click", function(event) {
            if (event.target && event.target.getAttribute("data-type") === "Species") {
                var id = event.target.id;
                if (id === selectedOption) {
                    window.history.back(); // 如果再次点击已激活的按钮，则返回上一页
                } else {
                    var newUrl = currentPage + (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Species=' + id;
                    window.location.href = newUrl;
                }
            }
        });
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = window.location.href;

        // 获取 URL 中的 selectedOption_Species 参数值
        var urlParams = new URLSearchParams(window.location.search);
        var selectedOption = urlParams.get('selectedOption_Experiment');

        // 根据参数值激活对应的按钮
        if (selectedOption) {
            var activeButton = document.getElementById(selectedOption);
            if (activeButton) {
                activeButton.style.backgroundColor = "red"; // 设置激活状态的样式
            }
        }

        document.addEventListener("click", function(event) {
            if (event.target && event.target.getAttribute("data-type") === "Experiment_Type") {
                var id = event.target.id;
                if (id === selectedOption) {
                    window.history.back(); // 如果再次点击已激活的按钮，则返回上一页
                } else {
                    var newUrl = currentPage + (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Experiment=' + id;
                    window.location.href = newUrl;
                }
            }
        });
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentPage = window.location.href;

        // 获取 URL 中的 selectedOption_Species 参数值
        var urlParams = new URLSearchParams(window.location.search);
        var selectedOption = urlParams.get('selectedOption_Tissue');

        // 根据参数值激活对应的按钮
        if (selectedOption) {
            var activeButton = document.getElementById(selectedOption);
            if (activeButton) {
                activeButton.style.backgroundColor = "red"; // 设置激活状态的样式
            }
        }

        document.addEventListener("click", function(event) {
            if (event.target && event.target.getAttribute("data-type") === "Tissue_Type") {
                var id = event.target.id;
                if (id === selectedOption) {
                    window.history.back(); // 如果再次点击已激活的按钮，则返回上一页
                } else {
                    var newUrl = currentPage + (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Tissue=' + id;
                    window.location.href = newUrl;
                }
            }
        });
    });
</script>
-->


<!-- 第一次实现，只是按钮功能
<script>
    document.addEventListener("click", function(event) {
        if (event.target && event.target.getAttribute("data-type") === "Experiment_Type") {
            var id = event.target.id;
            if (id) {
                var currentPage = window.location.href;
                var newUrl = currentPage + (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Experiment=' + id;
                window.location.href = newUrl;
            } else {
                console.log("Button does not have an ID.");
            }
        }
    });
</script>


<script>
    document.addEventListener("click", function(event) {
        if (event.target && event.target.getAttribute("data-type") === "Tissue_Type") {
            var id = event.target.id;
            if (id) {
                var currentPage = window.location.href;
                var newUrl = currentPage + (currentPage.indexOf('?') !== -1 ? '&' : '?') + 'selectedOption_Tissue=' + id;
                window.location.href = newUrl;
            } else {
                console.log("Button does not have an ID.");
            }
        }
    });
</script>
-->



<!--include footer-->
<?php
include "./templates/footer.php";
?>




</body>
</html>





