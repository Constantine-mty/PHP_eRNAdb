
<?php
include "./templates/base.php";
?>

<body id="body">
<!--include header-->
<?php
include "./templates/header.php";
?>



<!--测试接受传参数-->
<div>
    <p style="text-align: center">测试接受传参数</p>
    <p id="project_id" style="text-align: center; color: red" ></p>
</div>







<script>
    let params = new URLSearchParams(document.location.search.substring(1));
    let sid = params.get("sid"); //sid：这个页面的Study属性；
    console.log(sid);

    document.getElementById("project_id").innerHTML = "当前跳转至" + sid + "页面";
</script>




<!--include footer-->
<?php
include "./templates/footer.php";
?>




</body>
</html>
