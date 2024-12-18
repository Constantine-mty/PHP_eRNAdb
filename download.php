
<?php
include "./templates/base.php";
?>

<body id="body">
<!--include header-->
<?php
include "./templates/header.php";
?>
<div id="linkContent"></div>
<div class="row">
    <h2 id="title-expression">eRNA Expression</h2>
    <div class="row">
        <div class="container mt-5">
            <form>
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="gene1" class="col-form-label">
                            <div class="row" style="margin-left: 10px">
                                eRNA 1:
                                <span style="background: rgb(217, 0, 27); width: 26px; height: 13px; margin-left: 15px; margin-top: 6px " ></span>
                            </div>
                        </label>
                        <select id="gene1" class="form-select">
                            <!-- class="selectpicker" data-live-search="true"-->
                            <!-- Gene options will be dynamically filled here -->
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="gene2" class="col-form-label">
                            <div class="row" style="margin-left: 10px">
                                eRNA 2:
                                <span style="background: rgb(5, 2, 189); width: 26px; height: 13px; margin-left: 15px; margin-top: 6px " ></span>
                            </div>
                        </label>
                        <select id="gene2" class="form-select">
                            <option value="">Select a gene</option>
                        </select>
                        <span id="clearGene2" class="clear-btn">&#10006;</span>
                    </div>
                </div>
            </form>
        </div>
    </div>





<script>

    $(document).ready(function(){
        $.ajax({
            url: './api/get_eRNA_list.php', // 后端脚本的路径
            type: 'GET', // 请求类型
            dataType: 'json', // 期望的返回数据类型
            success: function(data) {

                var geneList = data;


                var geneDropdown1 = $("#gene1");
                var geneDropdown2 = $("#gene2");

                // Fill gene options in both dropdowns
                geneList.forEach(function(gene) {
                    geneDropdown1.append($("<option></option>").attr("value", gene).text(gene));
                    geneDropdown2.append($("<option></option>").attr("value", gene).text(gene));
                });

                // Set default selection and disable corresponding options
                geneDropdown1.val(geneList[0]); // Set default selection for the first dropdown
                updateDropdowns(); // Update both dropdowns based on the default selection

                // Event handler for changes in the first dropdown
                geneDropdown1.on("change", function() {
                    updateSecondDropdown($(this).val());
                });

                // Event handler for changes in the second dropdown
                geneDropdown2.on("change", function() {
                    updateFirstDropdown($(this).val());
                });

                // Event handler for the clear button
                $("#clearGene2").on("click", function() {
                    geneDropdown2.val('');
                    updateDropdowns(); // Reset dropdowns when cleared
                });

                // Function to update both dropdowns
                function updateDropdowns() {
                    var selectedGene1 = geneDropdown1.val();
                    updateSecondDropdown(selectedGene1);
                    var selectedGene2 = geneDropdown2.val();
                    updateFirstDropdown(selectedGene2);
                }

                // Function to update the second dropdown based on the first dropdown's selection
                function updateSecondDropdown(selectedGene1) {
                    $("#gene2 option").prop('disabled', false).removeClass('disabled');
                    $("#gene2 option").filter(function() {
                        return $(this).val() === selectedGene1;
                    }).prop('disabled', true).addClass('disabled');
                }

                // Function to update the first dropdown based on the second dropdown's selection
                function updateFirstDropdown(selectedGene2) {
                    $("#gene1 option").prop('disabled', false).removeClass('disabled');
                    $("#gene1 option").filter(function() {
                        return $(this).val() === selectedGene2;
                    }).prop('disabled', true).addClass('disabled');
                }

            },
        })
    });

</script>



<!--include footer-->
<?php
include "./templates/footer.php";
?>




</body>
</html>
