<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <link href="/bootstrap5/css/bootstrap.min.css" rel="stylesheet">

        <title>Hello, world!</title>
        <!--
        <style>
            div{background-color: rgba(0, 0, 255, 0.178);padding: 10px;margin: 10px;}
        </style>
        -->
    </head>
    <body>
    <h1>Bootstrap5开发模板</h1>
        <div class="text-center text-success fs-1">居中，颜色绿色表示起作用了！</div>
<!--
        <div class="container">    默认容器  </div>
        <div class="container-sm">container-sm 100% wide until small breakpoint</div>
        <div class="container-md">container-md 100% wide until medium breakpoint</div>
        <div class="container-lg">container-lg 100% wide until large breakpoint</div>
        <div class="container-xl">container-xl 100% wide until extra large breakpoint</div>
        <div class="container-xxl">container-xxl 100% wide until extra extra large breakpoint</div>
        <div class="container-fluid"> 流式容器 </div>
-->
    <!--表单基本实例-->
    <div class="container-fluid">
        <div class="row">
            <form action="/api/snp.php" method="get" id="submit_form" >
                <div class="form-group">
                    <lable for="Chr">Chr: </lable>
                    <input type="text" class="form-control" id="Chr" placeholder="chr:1-22" name="chr">
                </div>
                <div class="form-group">
                    <lable for="Start">Start: </lable>
                    <input type="text" class="form-control" id="Start" placeholder="pos:start" name="start">
                </div>
                <div class="form-group">
                    <lable for="End">End: </lable>
                    <input type="text" class="form-control" id="End" placeholder="pos:end" name="end">
                </div>
                <div class="form-group">
                    <lable for="Tissue">Tissue:</lable>
                    <select class="form-control" name="tissue">
                    <!--<select multiple class="form-control">-->
                        <option value="">点击下拉选择：</option>
                        <option value="Brain">Brain</option>
                        <option value="Embryo">Embryo</option>
                        <option value="PBMC">PBMC</option>
                    </select>
                </div>
            <br>
                <!--<input type="submit" value="提交">-->
                <button type="submit" class="btn btn-primary">提交</button>
            </form>
        </div>
    </div>



<script>

</script>




    <!-- JAVASCRIPT -->
    <!-- jquery and popper -->
    <script src="/bootstrap5/js/jquery-3.6.1.js"></script>
    <script src="/bootstrap5/js/bootstrap.bundle.min.js" ></script>
    <!-- datatables -->
    <script src="/bootstrap5/js/jquery.dataTables.min.js"></script>
    </body>
</html>
