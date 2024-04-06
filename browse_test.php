

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
                        <tr>
                            <!--number + item-->
                            <td>
                                <a title="Bone marrow" type="button" class="list-group-item" id="Bone_marrow" data-name="Bone marrow" data-type="Tissue_Type"><span class="badge badge-default" style="background-color: #0a53be">146</span> Human</a>
                            </td>
                        </tr>
                        <tr>
                            <!--number + item-->
                            <td>
                                <a title="Bone marrow" type="button" class="list-group-item" id="Bone_marrow" data-name="Bone marrow" data-type="Tissue_Type"><span class="badge badge-default" style="background-color: #0a53be">231</span> Mouse</a>
                            </td>
                        </tr>
                        <tr>
                            <!--number + item-->
                            <td>
                                <a title="Bone marrow" type="button" class="list-group-item" id="Bone_marrow" data-name="Bone marrow" data-type="Tissue_Type"><span class="badge badge-default" style="background-color: #0a53be">66</span> Human/Mouse</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <!--添加分页控件-->
                <ul class="pagination" id="Species__ul"></ul>
                <!--包装返回-->




                <!--PLATFORM-->
                <table class='fenye table-bordered' id="Platform_">
                    <thead>
                    <tr>
                        <th>
                            <div class='list-group-item'>
                                <h4 class='font-weight-bold text-black-50'>Platform<i class='ni ni-zoom-split-in float-right position-relative bottom--2 text-success' id='select_Platform_'></i></h4>

                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <!--number + item-->
                        <td>
                            <a title="Bone marrow" type="button" class="list-group-item" id="Bone_marrow" data-name="Bone marrow" data-type="Tissue_Type"><span class="badge badge-default" style="background-color: #0a53be">146</span> Smart-seq2</a>
                        </td>
                    </tr>
                    <tr>
                        <!--number + item-->
                        <td>
                            <a title="Bone marrow" type="button" class="list-group-item" id="Bone_marrow" data-name="Bone marrow" data-type="Tissue_Type"><span class="badge badge-default" style="background-color: #0a53be">231</span> SMARTer</a>
                        </td>
                    </tr>
                    <tr>
                        <!--number + item-->
                        <td>
                            <a title="Bone marrow" type="button" class="list-group-item" id="Bone_marrow" data-name="Bone marrow" data-type="Tissue_Type"><span class="badge badge-default" style="background-color: #0a53be">66</span> Tang</a>
                        </td>
                    </tr>
                    <tr>
                        <!--number + item-->
                        <td>
                            <a title="Bone marrow" type="button" class="list-group-item" id="Bone_marrow" data-name="Bone marrow" data-type="Tissue_Type"><span class="badge badge-default" style="background-color: #0a53be">66</span> RamDA-seq</a>
                        </td>
                    </tr>
                    <tr>
                        <!--number + item-->
                        <td>
                            <a title="Bone marrow" type="button" class="list-group-item" id="Bone_marrow" data-name="Bone marrow" data-type="Tissue_Type"><span class="badge badge-default" style="background-color: #0a53be">66</span> MATQ-seq</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <ul class="pagination" id="Platform__ul"></ul>


                <!--DATA_TYPE-->
                <table class='fenye table-bordered' id="Data_Type_">
                    <thead>
                    <tr>
                        <th>
                            <div class='list-group-item'>
                                <h4 class='font-weight-bold text-black-50'>Tissue Type<i class='ni ni-zoom-split-in float-right position-relative bottom--2 text-success' id='select_Data_Type_'></i></h4>

                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <!--number + item-->
                        <td>
                            <a title="Bone marrow" type="button" class="list-group-item" id="Bone_marrow" data-name="Bone marrow" data-type="Tissue_Type"><span class="badge badge-default" style="background-color: #0a53be">146</span> Adipose</a>
                        </td>
                    </tr>
                    <tr>
                        <!--number + item-->
                        <td>
                            <a title="Bone marrow" type="button" class="list-group-item" id="Bone_marrow" data-name="Bone marrow" data-type="Tissue_Type"><span class="badge badge-default" style="background-color: #0a53be">231</span> Liver</a>
                        </td>
                    </tr>
                    <tr>
                        <!--number + item-->
                        <td>
                            <a title="Bone marrow" type="button" class="list-group-item" id="Bone_marrow" data-name="Bone marrow" data-type="Tissue_Type"><span class="badge badge-default" style="background-color: #0a53be">66</span> Skin</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <ul class="pagination" id="Tissue__ul"></ul>


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


<script>
    //let params = new URLSearchParams(document.location.search.substring(1));
    //let select_specie = params.get("selectedOption"); //sid：这个页面的Study属性；


    var mySelect = document.getElementById("mySelect");

    //选择表单中的option作为参数进行页面跳转
    mySelect.addEventListener("change",function (){
        var selectedOptionText = mySelect.options[mySelect.selectedIndex].text;
        var encodedSelectedOptionText = encodeURIComponent(selectedOptionText);
        var url = "browse_test.php?selectedOption=" + encodedSelectedOptionText;
        console.log("Selected option: " + selectedOptionText);
        window.location.href = url;
        //window.location.href = 'browse.php' + ;
        //console.log("Select element cliked!");
    })
    //document.getElementById("mySelect").innerHTML = "当前跳转至" + sid + "页面";
</script>




<script>

    //let params = new URLSearchParams(document.location.search.substring(1));
    //let select_specie = params.get("selectedOption"); // 页面的?属性；
    //console.log(select_specie);

</script>

<!--客户端分页（逻辑分页）-->
<script>

    let params = new URLSearchParams(document.location.search.substring(1));
    let select_specie = params.get("selectedOption"); // 页面的?属性；
    console.log(select_specie);

</script>
<script>
    $('#experiments').DataTable( {
        "processing": true,
        "serverSide": true,
        "serverMethod": 'post',
        ajax: {
            url: './api/table_filter.php',
            data:{
                select_specie:select_specie,
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






<!--include footer-->
<?php
include "./templates/footer.php";
?>




</body>
</html>





