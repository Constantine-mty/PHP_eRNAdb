
<?php
include "./templates/base.php";
?>

<body id="body">
<!--include header-->
<?php
include "./templates/header.php";
?>

<!--DataTables pos-->


<table id="experiments" class="display">
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


<!--客户端分页（逻辑分页）-->
<script>
    $('#experiments').DataTable( {
        ajax: {
            url: './api/experiments.json',
            dataSrc: ''
        },
        columns: [
            { data: 'species' },
            { data: 'title' },
            { data: 'project_id' },
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
