<?php
include "./templates/base.php";
?>

<body id="body">
<!--include header-->
<?php
    include "./templates/header.php";
?>

<!--
<button onclick="enterFullscreen()" style="background: transparent; border: none; cursor: pointer;">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
        <g fill="none" stroke="#0284c7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
            <circle cx="12" cy="12" r="10"/>
            <path d="m14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></g>
    </svg>
</button>
-->


<!--index page分区-->
<div class="container-fluid" >
    <!-- Columns are 66% vs 33% wide -->
    <div class="row">
        <div class="col-lg-8 ">
             <div class="card" id="card1">
                 <div class="card-header" id="card-header1">
                     Welcome to eRNA scAtlas
                 </div>
                 <div class="card-body">
                     <div style="text-indent: 2em;">
                         Enhancer RNA (eRNA) is a type of transcribed RNA from distal enhancers, which plays key roles in transcription regulatory circuitry to mediate the activation of target gene. Here, we developed the eRNA database (eRNA scAtlas, which aims to document a large number of available resources of human and mouse eRNAs, provide comprehensive annotation and analyses for eRNAs.
                     </div>
                     <div style="text-indent: 2em;">
                        eRNA scAtlas provides the detailed and abundant (epi) genetic annotations in ChIP-seq based eRNA regions, such as super enhancer, enhancer, common SNPs, motif changes, expression quantitative trait locus (eQTL), risk SNPs, transcription factor binding sites (TFBSs), CRISPR/Cas9 target sites, DNase I hypersensitivity sites (DHSs), chromatin accessibility regions, methylation sites, chromatin interactions regions and TADs. eRNA scAtlas also provides eRNA-associated downstream target genes by mapping eRNA regions into genomes via five methods. We believe that eRNA scAtlas could become a useful and effective platform for exploring potential functions and regulation of eRNAs in diseases and biological processes.
                     </div>
                 </div>
             </div>
        </div>
        <div class="col-lg-4 ">
            <div class="row" style="margin-right: 20px;">
                <div class="card" id="card2" style="padding-right: 0; padding-left: 0;">
                    <div class="card-header" id="card-header2">
                        News and Events:
                    </div>
                    <div class="card-body">
                        <b>2024.03</b>  Database is under development
                        <a href="#">(Release History)</a>...
                        <br/>
                        <b>2024.03</b>  New address: <a href="#">https://</a>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-right: 20px;">
                <div class="card"  id="card3" style="padding-right: 0; padding-left: 0;">
                    <div class="card-header" id="card-header3">
                        Publications:
                    </div>
                    <div class="card-body">
                        <a href="#">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX.</a> ABC. 2024;
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Columns are always 50% wide, on mobile and desktop -->
    <div class="row">
        <div class="col-lg-5">
            <div class="card" id="card4">
                <div class="card-header" id="card-header4">
                    Dataset Summary
                </div>
                <div class="card-body">
                    <div class="row">
                        <!--<img src="./public/image/Summary.png" class="img-responsive" alt="Responsive image">-->
                        <img src="./public/image/modelOrganism.png" class="img-responsive" alt="Responsive image">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card" id="card5">
                <div class="card-header" id="card-header5">
                    Explore eRNA scAltas
                </div>
                <div class="card-body">
                    <div class="row">
                        <img src="./public/image/proccess.png" class="img-responsive" alt="Responsive image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--include footer-->
<?php
    include "./templates/footer.php";
?>




<script>
    window.onload = function() {
        const lastVisit = localStorage.getItem('lastVisit');
        const currentTime = new Date().getTime();

        // 如果上次访问超过 7 天（604800000 毫秒），则弹出提示框
        if (!lastVisit || currentTime - lastVisit > 60000) {
            alert("eRNA scAtlas 建议您使用全屏浏览以获得最佳体验");
            localStorage.setItem('lastVisit', currentTime);  // 更新访问时间
        }
    };
</script>

<!--
<script>
    window.onload = function() {
        const lastVisit = localStorage.getItem('lastVisit');
        const currentTime = new Date().getTime();

        // 如果上次访问超过 7 天（604800000 毫秒），则弹出提示框
        if (!lastVisit || currentTime - lastVisit > 60) {  // 设置为 7 天（604800000 毫秒）
            // 弹出提示框，不自动全屏
            alert("eRNA scAtlas 建议您使用全屏浏览以获得最佳体验！" +
                "点击网页左上角圆形光圈 LOGO可进入全屏");
            localStorage.setItem('lastVisit', currentTime);  // 更新访问时间
        }
    };

    // 进入全屏的函数
    function enterFullscreen() {
        const docElm = document.documentElement;  // 获取页面的根元素

        // 检查当前是否已经处于全屏模式
        if (document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement) {
            return;  // 如果已经全屏，则不再尝试进入全屏
        }

        if (docElm.requestFullscreen) {  // 标准浏览器支持的全屏API
            docElm.requestFullscreen();
        } else if (docElm.mozRequestFullScreen) {  // Firefox支持的全屏API
            docElm.mozRequestFullScreen();
        } else if (docElm.webkitRequestFullscreen) {  // Chrome/Opera支持的全屏API
            docElm.webkitRequestFullscreen();
        } else if (docElm.msRequestFullscreen) {  // IE/Edge支持的全屏API
            docElm.msRequestFullscreen();
        }
    }
</script>
-->



</body>
</html>





