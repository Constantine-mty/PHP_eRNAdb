

<?php
include "./templates/base.php";
?>




<body id="body">
<!--include header-->
<?php
include "./templates/header.php";
?>

<!-- 1 -->
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

<!-- 2 -->
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


<!-- 3 -->
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



<!-- 4 -->
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


        <!-- 第四类search开始 -->
        <div class="card mt-0">
            <div class="card-header bg-gradient-freestyle" style="line-height:0.1;">
                <a class="card-link text-white font-weight-bold h5" data-toggle="collapse" href="#collapseGenomicRegion">
                    <i class="ni ni-zoom-split-in text-white-50"></i><span class="glyphicon glyphicon-arrow-down"></span> Search by <span style="color: #63938c;"> Genomic Region</span>
                </a>
            </div>
            <div id="collapseGenomicRegion" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <iframe src="./templates/iframe/iframe_region.php" frameborder="no" height="250px" width='100%' id="te"></iframe>
                </div>
            </div>
        </div>
        <!-- 第四类search结束 -->

        <!-- 第五类search开始 -->
        <div class="card mt-0">
            <div class="card-header bg-gradient-freestyle" style="line-height:0.1;">
                <a class="card-link text-white font-weight-bold h5" data-toggle="collapse" href="#collapseEccDnaID">
                    <i class="ni ni-zoom-split-in text-white-50"></i> <span class="glyphicon glyphicon-arrow-down"></span>Search by <span style="color: #63938c;">eccDNA ID</span>
                </a>
            </div>
            <div id="collapseEccDnaID" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <iframe src="./templates/iframe/iframe_ecdnaid.php" frameborder="no" height="238px" width='100%' id="te"></iframe>
                </div>
            </div>
        </div>
        <!-- 第五类search结束 -->
    </div>
</div>








<!--include footer-->
<?php
include "./templates/footer.php";
?>






</body>
</html>
