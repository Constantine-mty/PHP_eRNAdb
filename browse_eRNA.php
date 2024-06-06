
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
        <div class="col-lg-3">
            <div class="card" id="card_browser_facet" style="margin-top: 20px;margin-bottom: 20px">

            </div>
        </div>
        <div class="col-lg-9">
            <div class="card" id="card_browser_eRNA" style="margin-top: 20px;margin-bottom: 20px">
<!--DataTables pos-->
                <table id="eRNA_id" class="display">
                    <thead>
                        <tr>
                            <th>Enhancer ID.</th>
                            <th>Chr.</th>
                            <th>Start.</th>
                            <th>End.</th>
                            <th>Tissue.</th>
                            <th>Score.</th>
                        </tr>
                        </thead>
                    </table>
            </div>
        </div>
    </div>
</div>


<!--客户端分页（逻辑分页）-->
<script>
    $('#eRNA_id').DataTable( {
        "processing": true,
        "serverSide": true,
        "serverMethod": 'post',
        ajax: {
            url: './api/serverSide.php',
            //url: './api/test.php',
            //type: 'POST',
            //dataSrc: 'data'
        },
        dataType:'json',
        dom: 'lBfrtip',
        columns: [
            { data: 'enhancerID' },
            { data: 'chrID' },
            { data: 'start' },
            { data: 'end' },
            { data: 'tissue' },
            { data: 'score' }
        ]


    } );
</script>







<!--include footer-->
<?php
include "./templates/footer.php";
?>




</body>
</html>
