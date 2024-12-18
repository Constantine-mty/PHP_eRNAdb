<?php
include "./base_iframe_test.php";
?>


<body style="overflow-x: hidden;overflow-y: hidden;">
<!-- 第一个表单 -->
<div class="container-fluid">
    <div class="row">

            <form >
                <div class="form-group">
                    <div class="center-block">
                        <label for="specie_lncs" class="font-weight-bold" style="font-size: 14px;"><span style="color: red;">Step1</span>: Please to choose a species</label>
                        <select class="selectpicker form-control" id="Spe"
                                title="Select a species(e.g.'Homo Sapiens')" data-container="body"
                                data-live-search="true" data-hide-disabled="true" data-actions-box="true"
                                data-virtual-scroll="false">
                            <option value="Homo Sapiens">Homo Sapiens</option>
                            <option value="Mus Musculus">Mus Musculus</option>
                            <!--
                            <option value="Gallus gallus">Gallus gallus</option>
                            <option value="Danio rerio">Danio rerio</option>
                            <option value="Caenorhabditis elegans">Caenorhabditis elegans</option>
                            <option value="Drosophila">Drosophila</option>
                            -->
                        </select>

                        <!-- Tech List -->
                        <div class="center-block" id="t1">
                            <label for="specie_lncs" class="font-weight-bold" style="font-size: 14px;"><span style="color: red;">Step2</span>: Please to choose Sequencing Technology</label>
                            <select class="selectpicker form-control" id="Tech"
                                    title="Select a Sequencing type(e.g.'Smart-seq2')" data-container="body"
                                    data-live-search="true" data-hide-disabled="true" data-actions-box="true"
                                    data-virtual-scroll="false">
                            </select>
                        </div>

                        <div class="center-block" id="t2">
                            <!-- Tissue List-->
                            <label  class="font-weight-bold text-justify" style="font-size: 14px;"><span style="color: red;">Step3</span>: Tissue type</label>
                            <select class="selectpicker form-control" id="Tissue"
                                    title="Select Tissue Type" data-container="body"
                                    data-live-search="true" data-hide-disabled="true" data-actions-box="true"
                                    data-virtual-scroll="false">
                            </select>
                        </div>
                        <!-- 结束 -->
                    </div>


                    <div class="mt-2">
                        <a onclick="populateExamples()" class="btn btn-default"><b>Example</b></a>
                        <a class="btn btn-default" type="submit"  onclick="study_url()"><b>Search</b></a>
                        <button class="btn btn-default"  id="reset" ><b>Reset</b></button>
                    </div>
                    <div style="color:darkgray;">
                        <p class="h5 text-justify font-weight-300 dashed border-primary "><strong><i class="ni ni-tag text-warning"></i>Note:</strong></p>
                        <p class="h5 text-justify font-weight-300 dashed border-primary "><strong><i class="ni ni-tag text-warning"></i>1.Species must be selected.</strong></p>
                        <p class="h5 text-justify font-weight-300 dashed border-primary "><strong><i class="ni ni-tag text-warning"></i>2.Step2 and Step3 are advanced search options for refining your search.</strong></p>
                    </div>
                </div>
            </form>




    </div></div>


<div style="color:darkgray;">
    <!-- <p class="h5 text-justify font-weight-300 dashed border-primary "><strong><i class="ni ni-tag text-warning"></i>Note:</strong></p>
    <p class="h5 text-justify font-weight-300 dashed border-primary "><strong><i class="ni ni-tag text-warning"></i>1.Species and health/disease must be selected.</strong></p>
    <p class="h5 text-justify  dashed border-primary"><strong><i class="ni ni-tag text-warning"></i>2.Step3 is an advanced search option for refining your search.</strong></p> -->
</div>


<script>
    $(function(){
        var url =window.location.href;
        $("#reset").click(function(){
            window.location.href=url;
        });
    });
</script>

<script>

    // Tech的级联列表
    function autoselect_tech(Species) {
        if (Species == "") {
            alert('Sorry. No result for your input.');
        }
        else {
            var query = {
                'select_specie': Species,
            };
            $.ajax({
                url: '../../api/auto_select_tech.php',
                cache: false,
                type: 'post',
                dataType: 'json',
                data: query,
                async: true,
                success: function (res) {
                    console.log(res);
                    var data = res;
                    var options = [], _options;
                    // var d0 = 0;
                    for (var i = 0; i < data.length; i++) {
                        var option = '<option value="' + data[i] + '">' + data[i] + '</option>';
                        options.push(option);
                    }
                    var _options = options.join('');
                    $('#Tech')[0].innerHTML = _options;
                    $('#Tech').selectpicker('refresh');
                    $('#Tech').selectpicker('render');
                },
                error: function () {
                    alert('Sorry, no dataset Results.');
                }
            })
        }
    }


    // Study的级联列表
    function autoselect_study(Species,Techtype) {
        if (Species == "" || Techtype == "") {
            // alert('Sorry. No result for your input.');
        }
        else {
            var query = {
                'select_specie': Species,
                'select_experiment': Techtype,
            };
            $.ajax({
                url: '../../api/auto_select_tissue.php',
                cache: false,
                type: 'post',
                dataType: 'json',
                data: query,
                async: true,
                success: function (res) {
                    console.log(res);
                    var data = res;
                    var options = [], _options;
                    // var d0 = 0;
                    for (var i = 0; i < data.length; i++) {
                        var option = '<option value="' + data[i] + '">' + data[i] + '</option>';
                        options.push(option);
                    }
                    var _options = options.join('');
                    $('#Tissue')[0].innerHTML = _options;
                    $('#Tissue').selectpicker('refresh');
                    $('#Tissue').selectpicker('render');
                },
                error: function () {
                    alert('Sorry, no dataset Results.');
                }
            })
        }
    }

    function study_url() {
        // 获取选择的值，这里假设你有一个id为Species的select元素
        //var species = $("#Spe").val();
        //var techtype = $("#Tech").val();
        // 在这里获取其他需要的值，比如NCD，假设有一个id为NCD的select元素
        var sid = $("#Tissue").val();

        // 构造URL
        //var url = '../../detail_study.php?species=' + encodeURIComponent(species) + '&study=' + encodeURIComponent(study) + '&techtype=' + encodeURIComponent(techtype);
        var url = '../../detail_study.php?sid=' + encodeURIComponent(sid);
        // 跳转到新页面
        parent.location.href = url;
    }
</script>

<script>
    $.ajaxSetup({
        cache: false //close AJAX cache
    });
    $(function () {
        $('#t1').on('click', function () {
            autoselect_tech($('#Spe').val());
        });
        $('#t2').on('click', function () {
            autoselect_study($('#Spe').val(),$('#Tech').val());
        });
    })

    function populateExamples() {
        console.log("populateExamples() called"); // 检查函数是否被调用

        // 将 Step 1 填充为示例物种
        console.log("Step 1");
        var speciesSelect = document.getElementById('Spe');
        console.log("Species select element:", speciesSelect); // 检查是否正确获取了下拉列表元素
        var examplespeciesOption = document.createElement('option');
        examplespeciesOption.text = 'Homo Sapiens';
        examplespeciesOption.value = 'Homo Sapiens';
        speciesSelect.appendChild(examplespeciesOption);
        console.log("Disease select innerHTML after adding option:", speciesSelect.innerHTML); // 检查是否正确添加了选项
        speciesSelect.value = 'Homo Sapiens';
        console.log("Disease select value:", speciesSelect.value); // 检查是否正确设置了选中的值




        // 将 Step 2 填充为示例健康/疾病
        console.log("Step 2");
        var techSelect = document.getElementById('Tech');
        console.log("Disease select element:", techSelect); // 检查是否正确获取了下拉列表元素
        var exampletechOption = document.createElement('option');
        exampletechOption.text = 'Smart-seq2';
        exampletechOption.value = 'Smart-seq2';
        techSelect.appendChild(exampletechOption);
        console.log("Disease select innerHTML after adding option:", techSelect.innerHTML); // 检查是否正确添加了选项
        techSelect.value = 'Smart-seq2';
        console.log("Disease select value:", techSelect.value); // 检查是否正确设置了选中的值

        // 将 Step 3 填充为示例健康/疾病
        console.log("Step 3");
        var tissueSelect = document.getElementById('Tissue');
        console.log("Disease select element:", tissueSelect); // 检查是否正确获取了下拉列表元素
        var exampletissueOption = document.createElement('option');
        exampletissueOption.text = 'Spleen';
        exampletissueOption.value = 'Spleen';
        tissueSelect.appendChild(exampletissueOption);
        console.log("Disease select innerHTML after adding option:", tissueSelect.innerHTML); // 检查是否正确添加了选项
        tissueSelect.value = 'Spleen';
        console.log("Disease select value:", tissueSelect.value); // 检查是否正确设置了选中的值


        // 刷新下拉列表
        $('.selectpicker').selectpicker('refresh');
    }

</script>



</body>


</html>
