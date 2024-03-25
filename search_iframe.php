
<?php
include "./templates/base.php";
?>




<body id="body">
<!--include header-->
<?php
include "./templates/header.php";
?>

<!-- 1 id=test(Tissue/Cell line) -->
<script type="text/javascript">
    function reinitIframe(){
        var iframe = document.getElementById("test");
        try{
            var bHeight = iframe.contentWindow.document.body.scrollHeight;
            var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
            var height = Math.max(bHeight, dHeight);
            iframe.height = height;
// console.log(height);
        }catch (ex){}
    }
    window.setInterval("reinitIframe()", 500);
</script>

<!-- 2 id=tes -->
<script type="text/javascript">
    function reinitIfram(){
        var iframe = document.getElementById("tes");
        try{
            var bHeight = iframe.contentWindow.document.body.scrollHeight;
            var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
            var height = Math.max(bHeight, dHeight);
            iframe.height = height;
// console.log(height);
        }catch (ex){}
    }
    window.setInterval("reinitIfram()", 500);
</script>

<!-- 3 id=te -->
<script type="text/javascript">
    function reinitIfra(){
        var iframe = document.getElementById("te");
        try{
            var bHeight = iframe.contentWindow.document.body.scrollHeight;
            var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
            var height = Math.max(bHeight, dHeight);
            iframe.height = height;
// console.log(height);
        }catch (ex){}
    }
    window.setInterval("reinitIfra()", 200);
</script>

<!-- 4 点击触发下拉栏 -->
<script>
    $(document).ready(function(){
        $('.card-header').click(function(){
            var $collapse = $(this).next('.collapse');
            $collapse.collapse('toggle');
        });
    });
</script>




<div class="container" id="body">
    <div id="accordion">


        <!-- Tissue/Cell line search开始 | cell:test;tissue:tes-->
        <div class="card mt-1">
            <div class="card-header bg-gradient-freestyle" style="line-height:0.1;" >
                <a class="card-link font-weight-bold h5" data-toggle="collapse" href="#collapseCellTissue">
                    Search by <span style="color: #63938c;">Cell line/Tissue Source</span>
                </a>
            </div>
            <div id="collapseCellTissue" class="collapse show" data-parent="#accordion" style="margin-top: 0px;">
                <div class="row">
                    <div class="col-lg-6 ">
                        <div class="card-body">
                            <h1 style="font-size: 14px;">Search by cell line</h1>
                            <iframe src="./templates/iframe/iframe_c.php" frameborder="no" height="300px" width='100%' id="test"></iframe>
                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="card-body">
                            <h1 style="font-size: 14px;">Search by tissue</h1>
                            <iframe src="./templates/iframe/iframe_t.php" frameborder="no" height="300px" width='100%' id="tes"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tissue/Cell line search结束 -->


        <!-- Genomic Region search开始 id:te-->
        <div class="card mt-0">
            <div class="card-header bg-gradient-freestyle" style="line-height:0.1;">
                <a class="card-link font-weight-bold h5" data-toggle="collapse" href="#collapseGenomicRegion">
                    Search by <span style="color: #63938c;"> Genomic Region</span>
                </a>
            </div>
            <div id="collapseGenomicRegion" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <iframe src="./templates/iframe/iframe_region.php" frameborder="no" height="250px" width='100%' id="te"></iframe>
                </div>
            </div>
        </div>
        <!-- Genomic Region search结束 -->


        <!-- Study search开始 no id -->
        <div class="card mt-0">
            <div class="card-header bg-gradient-freestyle" style="line-height:0.1;">
                <a class="card-link font-weight-bold h5" data-toggle="collapse" href="#collapseStudy">
                    Search by <span style="color: #63938c;">Study</span>
                </a>
            </div>
            <div id="collapseStudy" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <iframe src="./templates/iframe/iframe_studyid.php" frameborder="no" height="290px" width='100%'></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Study search结束-->


        <!-- eRNA id search开始 id:te-->
        <div class="card mt-0">
            <div class="card-header bg-gradient-freestyle" style="line-height:0.1;">
                <a class="card-link font-weight-bold h5" data-toggle="collapse" href="#collapseEccDnaID">
                    <i class="ni ni-zoom-split-in text-white-50"></i> <span class="glyphicon glyphicon-arrow-down"></span>Search by <span style="color: #63938c;">eRNA ID</span>
                </a>
            </div>
            <div id="collapseEccDnaID" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <iframe src="./templates/iframe/iframe_ecdnaid.php" frameborder="no" height="238px" width='100%' id="te"></iframe>
                </div>
            </div>
        </div>
        <!-- eRNA id search结束 -->

    </div>
</div>






<!--include footer-->
<?php
include "./templates/footer.php";
?>






</body>
</html>
