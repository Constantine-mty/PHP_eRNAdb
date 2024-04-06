
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
            <!--
            <div class="card" id="card_browser_facet" style="margin-top: 20px;margin-bottom: 20px">
                <div class="card-header" id="card-header">
                    Species
                </div>
                <div class="card-body">
                    <div style="text-indent: 2em;">
                        <form>
                            <select>
                                <option>A</option>
                                <option>B</option>
                            </select>
                        </form>
                    </div>
                    <div style="text-indent: 2em;">
            </div>
        </div>
    </div>
    <div class="card" id="card_browser_facet" style="margin-top: 20px;margin-bottom: 20px">

    </div>
    <div class="card" id="card_browser_facet" style="margin-top: 20px;margin-bottom: 20px">

    </div>
    -->
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




<!--客户端分页（逻辑分页）-->
<script>
    $('#experiments').DataTable( {
        "processing": true,
        "serverSide": true,
        "serverMethod": 'post',
        ajax: {
            url: './api/serverSide_test.php',
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
