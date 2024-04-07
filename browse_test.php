

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


                <!--TISSUE-->



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
    var data_Species_ = [
        ["<a title='Homo sapiens' type=\"button\" class=\"list-group-item\" id='Human' data-name=\"Homo sapiens\" data-type='Species'><span class='badge badge-default' style='background-color: #0a53be'>56<\/span> Homo sapiens<\/a>"],
        ["<a title='Mus musculus' type=\"button\" class=\"list-group-item\" id='Mouse' data-name=\"Mus musculus\" data-type='Species'><span class='badge badge-default' style='background-color: #0a53be'>115<\/span> Mus musculus<\/a>"],
        ["<a title='Homo_Mus' type=\"button\" class=\"list-group-item\" id='Human/Mouse' data-name=\"Homo_Mus\" data-type='Species'><span class='badge badge-default' style='background-color: #0a53be'>17<\/span> Homo_Mus<\/a>"]
    ];

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
        data:data_Species_
    } );
</script>


<script>
    // title; id; name
    var data_Experiment_Type_ = [
        ["<a title='Smart-seq2' type=\"button\" class=\"list-group-item\" id='Smart-seq2' data-name=\"Smart-seq2\" data-type='Experiment_Type'><span class='badge badge-default' style='background-color: #0a53be'>152<\/span> Smart-seq2<\/a>"],
        ["<a title='RamDA-seq' type=\"button\" class=\"list-group-item\" id='RamDA-seq' data-name=\"RamDA-seq\" data-type='Experiment_Type'><span class='badge badge-default' style='background-color: #0a53be'>136<\/span> RamDA-seq<\/a>"],
        ["<a title='MATQ-seq' type=\"button\" class=\"list-group-item\" id='MATQ-seq' data-name=\"MATQ-seq\" data-type='Experiment_Type'><span class='badge badge-default' style='background-color: #0a53be'>112<\/span> MATQ-seq<\/a>"],
        ["<a title='Tang' type=\"button\" class=\"list-group-item\" id='Tang' data-name=\"Tang\" data-type='Experiment_Type'><span class='badge badge-default' style='background-color: #0a53be'>79<\/span> Tang<\/a>"],
        ["<a title='C1-CAGE' type=\"button\" class=\"list-group-item\" id='C1-CAGE' data-name=\"C1 CAGE\" data-type='Experiment_Type'><span class='badge badge-default' style='background-color: #0a53be'>64<\/span> C1-CAGE<\/a>"],
        ["<a title='snRandom-seq' type=\"button\" class=\"list-group-item\" id='snRandom-seq' data-name=\"snRandom-seq\" data-type='Experiment_Type'><span class='badge badge-default' style='background-color: #0a53be'>60<\/span> snRandom-seq<\/a>"],
        ["<a title='snHH-seq' type=\"button\" class=\"list-group-item\" id='snHH-seq' data-name=\"snHH-seq\" data-type='Experiment_Type'><span class='badge badge-default' style='background-color: #0a53be'>18<\/span> snHH-seq<\/a>"],
        ["<a title='scGRO-seq' type=\"button\" class=\"list-group-item\" id='scGRO-seq' data-name=\"scGRO-seq\" data-type='Experiment_Type'><span class='badge badge-default' style='background-color: #0a53be'>16<\/span> scGRO-seq<\/a>"],
        ["<a title='VASA-Seq' type=\"button\" class=\"list-group-item\" id='VASA-Seq' data-name=\"VASA-Seq\" data-type='Experiment_Type'><span class='badge badge-default' style='background-color: #0a53be'>13<\/span> VASA-Seq<\/a>"],
        ["<a title='Start-Seq-Total' type=\"button\" class=\"list-group-item\" id='Start-Seq-Total' data-name=\"Start-Seq-Total\" data-type='Experiment_Type'><span class='badge badge-default' style='background-color: #0a53be'>10<\/span> Start-Seq-Total<\/a>"],
        ["<a title='SUPeR-seq' type=\"button\" class=\"list-group-item\" id='SUPeR-seq' data-name=\"SUPeR-seq\" data-type='Experiment_Type'><span class='badge badge-default' style='background-color: #0a53be'>8<\/span> SUPeR-seq<\/a>"],
        ["<a title='SMARTer' type=\"button\" class=\"list-group-item\" id='SMARTer' data-name=\"SMARTer\" data-type='Experiment_Type'><span class='badge badge-default' style='background-color: #0a53be'>8<\/span> SMARTer<\/a>"],
        ["<a title='FIPRESCI' type=\"button\" class=\"list-group-item\" id='FIPRESCI' data-name=\"FIPRESCI\" data-type='Experiment_Type'><span class='badge badge-default' style='background-color: #0a53be'>6<\/span> FIPRESCI<\/a>"]
    ];
</script>


<script>
    $('#Platform_').DataTable( {
        "processing": true,
        "paging": true,
        "pageLength": 3,
        "searching": false,
        "lengthMenu": [ [3, 5, 10, -1], [3, 5, 10, "All"] ],
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
        data:data_Experiment_Type_
    } );

</script>







<script>
    var data_Tissue_Type_ = [
        ["<a title='Adipose' type=\"button\" class=\"list-group-item\" id='Adipose' data-name=\"Adipose\" data-type='Tissue_Type'><span class='badge badge-default'  style='background-color: #0a53be'>330<\/span> Adipose<\/a>"],
        ["<a title='Liver' type=\"button\" class=\"list-group-item\" id='Liver' data-name=\"Liver\" data-type='Tissue_Type'><span class='badge badge-default' style='background-color: #0a53be'>152<\/span> Liver<\/a>"],
        ["<a title='Skin' type=\"button\" class=\"list-group-item\" id='Skin' data-name=\"Skin\" data-type='Tissue_Type'><span class='badge badge-default' style='background-color: #0a53be'>136<\/span> Skin<\/a>"]
    ];
</script>
<script>
    $('#Tissue_Type_').DataTable( {
        "processing": true,
        "paging": true,
        "pageLength": 3,
        "searching": false,
        "lengthMenu": [ [3, 5, 10, -1], [3, 5, 10, "All"] ],
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





