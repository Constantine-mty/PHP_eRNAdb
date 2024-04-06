
<?php
include "./templates/base.php";
?>

<body id="body">
<!--include header-->
<?php
include "./templates/header.php";
?>


<div class="container-fluid" >
    <a style="margin-top: 10px;margin-left: 50px; font-style: italic;">For studies with less than 100 cells, only the list of detected circRNAs will be provided.</a>

    <div class="row">
        <div class="col-lg-3">

            <div class="card" id="card_browser_facet" style="margin-top: 20px;margin-bottom: 20px">
                <div class="card-header" id="card-header">
                    Species
                </div>
                <div class="card-body">
                    <div style="text-indent: 2em;">
                        <form action="#">
                            <select id="mySelect">
                                <option>Please Select</option>
                                <option>Human</option>
                                <option>Mouse</option>
                                <option>Human/Mouse</option>
                            </select>
                        </form>
                    </div>
                    <div style="text-indent: 2em;">
                    </div>
                </div>
            </div>
            <div class="card" id="card_browser_facet" style="margin-top: 20px;margin-bottom: 20px">
                <div class="card-header" id="card-header">
                    Platform
                </div>
                <div class="card-body">
                    <div style="text-indent: 2em;">
                        <form action="#">
                            <select id="mySelect2">
                                <option>PleaseSelect</option>
                                <option>Smart-seq2</option>
                                <option>SMARTer</option>
                                <option>Tang</option>
                                <option>RamDA-seq</option>
                                <option>MATQ-seq</option>
                            </select>
                        </form>
                    </div>
                    <div style="text-indent: 2em;">
                    </div>
                </div>
            </div>

            <div class="card" id="card_browser_facet" style="margin-top: 20px;margin-bottom: 20px">
                <div class="card-header" id="card-header">
                    Tissue
                </div>
                <div class="card-body">
                    <div style="text-indent: 2em;">
                        <form action="#">
                            <select id="mySelect3">
                                <option>PleaseSelect</option>
                                <option>Adipose</option>
                                <option>Liver</option>
                                <option>Skin</option>
                            </select>
                        </form>
                    </div>
                    <div style="text-indent: 2em;">
                    </div>
                </div>

            </div>

        </div>

        <!--DataTables pos-->
        <div class="col-lg-9">
            <div class="card" id="card_browser_eRNA" style="margin-top: 20px;margin-bottom: 20px">
                <!--DataTable pos-->
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
</div>



<script>
    //let params = new URLSearchParams(document.location.search.substring(1));
    //let select_specie = params.get("selectedOption"); //sid：这个页面的Study属性；


    var mySelect = document.getElementById("mySelect");

    //选择表单中的option作为参数进行页面跳转
    mySelect.addEventListener("change",function (){
        var selectedOptionText = mySelect.options[mySelect.selectedIndex].text;
        var encodedSelectedOptionText = encodeURIComponent(selectedOptionText);
        var url = "browse.php?selectedOption=" + encodedSelectedOptionText;
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
