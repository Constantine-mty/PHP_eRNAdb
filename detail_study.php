
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

        <div class="col-lg-2" style="margin-right: 0px">
                <ul id="ul-sidenav1" class="ul-sidenav">
                    <li id="section1" class="li-sidebar" >
                        <a href="#title-summary">Summary</a>
                    </li>
                    <li id="section2" class="li-sidebar">
                        <a href="#title-expression">Expression</a>
                    </li>
                    <li id="section3" class="li-sidebar">
                        <a href="#title-violin">Violin</a>
                    </li>
                    <li id="section4" class="li-sidebar">
                        <a href="#title-statistic">Statistic</a>
                    </li>
                    <li id="section5" class="li-sidebar">
                        <a href="#title-marker">Marker features</a>
                    </li>
                </ul>
	</div>

        <div class="col-lg-10">
            <div class="row">
                <h2 id="title-summary">Summary</h2>
                <h5>Tissue:</h5>
                <h5>Species:</h5>
                <h5>PMID:</h5>
                <h5>Technology:</h5>
                <h5>Dataset Summary:</h5>
                <hr>
            </div>
            <div class="row">
                <h2 id="title-expression">Expression</h2>
                <div class="row">
                    <div class="col-lg-6">
                        <div>
                        	<iframe src="https://lcbb.swjtu.edu.cn/dash_app/umap1/" height="600px" width='600px' scrolling="no">
				</iframe>
				<a>position for datatable</a>
			</div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                        	<iframe src="https://lcbb.swjtu.edu.cn/dash_app/umap2/" height="600px" width='600px' scrolling="no">
				</iframe>
				<a>position for datatable</a>
			</div>
                    </div>
                </div>

                <hr>
            </div>
            <div class="row">
                <h2 id="title-violin">Violin</h2>
                <a> Violin plot for each eRNA expression </a>
                
                    <iframe src="https://lcbb.swjtu.edu.cn/dash_app/violin/" height="600px" width='1200px' scrollng="no">
                    </iframe>
		
		<hr>
            </div>
            <div class="row">
                <h2 id="title-statistic">Statistic</h2>
                <!--插入质控图片-->
                <img id="QC_Image" src="" alt="Dynamic Image">

                <a> Violin plot of some of the computed quality measures:</a>
                <a> The total counts per cell.</a>
                <hr>
            </div>
            <div class="row">
                <h2 id="title-marker">Marker features</h2>
                <h5> Cluster Markers</h5>
                <a> The marker genes of each cluster were calculated by scanpy.tl.rank_genes_groups with the "wilcoxon" method. If the original annotation information of dataset is available, we use the original one, if not, we get the annotation information through scanpy.tl.leiden.</a>
                <hr>
                <div class="btn-group mt-3" role="group" aria-label="Image Buttons">
                    <button type="button" class="btn btn-primary" id="btnA">Top10 eRNAs</button>
                    <button type="button" class="btn btn-primary" id="btnB">Top10 Genes</button>
                    <button type="button" class="btn btn-primary" id="btnC">All eRNAs</button>
                    <button type="button" class="btn btn-primary" id="btnD">All Genes</button>
                </div>
                <a> Heatmap of the expression of the top 10 marker eRNAs (bottom) for each cluster (left).</a>
                <!--插入质控图片-->
                <img id="eRNA_Image" src="" alt="Dynamic Image">
                <a>position for datatable</a>
            </div>
        </div>
    </div>
</div>









<!--测试接受传参数-->
<div>
    <p style="text-align: center">测试接受传参数</p>
    <p id="project_id" style="text-align: center; color: red" ></p>
</div>












<script>
    let params = new URLSearchParams(document.location.search.substring(1));
    let sid = params.get("sid"); //sid：这个页面的Study属性；
    console.log(sid);
    // 动态生成图片URL
    let QC_imageURL = `./public/image/${sid}/violin_QC_${sid}.png`;
    let eRNA_imageURL = `./public/image/${sid}/heatmap_top10_eRNA_${sid}.png`;
    document.getElementById("project_id").innerHTML = "当前跳转至" + sid + "页面";
</script>

<script>
    // 将动态生成的图片URL赋值给<img>的src属性
    document.getElementById("QC_Image").src = QC_imageURL;
    document.getElementById("eRNA_Image").src = eRNA_imageURL;

    // 按钮点击事件处理，根据不同按钮切换展示不同图片
    $("#btnA").click(function() {
        $("#eRNA_Image").attr("src", `./public/image/${sid}/heatmap_top10_eRNA_${sid}.png`);
    });

    $("#btnB").click(function() {
        $("#eRNA_Image").attr("src", `./public/image/${sid}/heatmap_top_gene_${sid}.png`);
    });

    $("#btnC").click(function() {
        $("#eRNA_Image").attr("src", `./public/image/${sid}/heatmap_eRNA_${sid}.png`);
    });

    $("#btnD").click(function() {
        $("#eRNA_Image").attr("src", `./public/image/${sid}/heatmap_gene_${sid}.png`);
    });
</script>


<script>
    // 获取所有的导航项
    const navItems = document.querySelectorAll('#ul-sidenav1 .li-sidebar');

    // 为每个导航项添加点击事件监听器
    navItems.forEach(item => {
        item.addEventListener('click', function() {
            // 移除所有li的激活状态
            navItems.forEach(nav => {
                nav.classList.remove('active');
            });
            // 给当前点击的li添加激活状态
            this.classList.add('active');
            // 跳转到对应的页面部分
            document.querySelector(`#${this.id}`).scrollIntoView({ behavior: 'smooth' });
        });
    });
</script>




<!--include footer-->
<?php
include "./templates/footer.php";
?>




</body>
</html>
