
<?php
include "./templates/base.php";
?>

<body id="body">
<!--include header-->
<?php
include "./templates/header.php";
?>


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 style="font-size: 180%;margin-top: 3%"><img src="./public/image/phone_ringing.png" height="30px" style="height:30px;margin-top:-4px"/>Please contact us!</h1>
            <hr/>
        </div>
    </div>
    <div class="row" style="height:600px">
        <div class="col-lg-12">
            <p><strong>Associate Professor:</strong> Zhiyun Guo, Ph.D.</p>
            <p><strong>Affiliation:</strong>School of Life Sciences and Engineering,Southwest Jiaotong University, Chengdu 610000, China</p>
            <!-- <p><strong>Phone:</strong> 13438192585</p> -->
            <p><strong>Email: </strong> zhiyunguo@swjtu.edu.cn</p>
            <hr/>
        </div>
        <div class="col-lg-9">
            <!-- <img src="bootstrap-3.4.1-dist/img/校园地图.png" style="height:400px;width:600px;"/> -->
            <iframe width="100%" height="450" align="center" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="./templates/map.php"></iframe>
        </div>
    </div>
</div>


<!--include footer-->
<?php
include "./templates/footer.php";
?>



</body>
</html>
