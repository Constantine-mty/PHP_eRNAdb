<?php
include "./base_iframe_test.php";
?>

<style>
.custom-border {
    border: 3px dashed #0295ff; /* 虚线边框，颜色蓝色，宽度3px */
    /*border-radius: 10px;     /* 可选：为边框添加圆角 */
    padding: 20px;           /* 内部间距，确保内容不会紧贴边框 */
    margin: 10px 0;          /* 外部间距，确保与其他元素有一定距离 */
}
</style>


	<body style="overflow-x: hidden;overflow-y: hidden;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
        <form>
		    <div class="form-group">
				<label for="specie_lncs" class="font-weight-bold" style="font-size: 14px;"><span style="color: red;">Step1</span>: Choose a species</label>
				<select class="selectpicker form-control" id="Spe"
				    title="Select a species(e.g.'Homo Sapiens')" data-container="body"
				    data-live-search="true" data-hide-disabled="true" data-actions-box="true"
				    data-virtual-scroll="false">
				    <option value="Homo Sapiens">Homo Sapiens</option>
				    <option value="Mus Musculus">Mus Musculus</option>
                    <option value="Gallus gallus">Gallus gallus</option>
                    <option value="Danio rerio">Danio rerio</option>
                    <option value="Caenorhabditis elegans">Caenorhabditis elegans</option>
                    <option value="Drosophila">Drosophila</option>
				</select>

		        <label for="end" class="font-weight-bold" style="font-size: 14px;"><span style="color: red;">Step2</span>: Input genome region</label>
		        <input type="text" class="form-control" name="Region" id="Region" placeholder="eg:chr1:1438079-1641840">
		        <div class="mt-2">
                    <a onclick="search_region_example()" class="btn btn-default"><b>Example</b></a>
					<a id='op2' class="btn btn-default" onclick="Turn()"  type="submit"><b>Search</b></a>
				<button class="btn btn-default"  id="rese"><b>Reset</b></button>
		        </div>
				<div style="color:darkgray;">
				<p class="h5 text-justify font-weight-300 dashed border-primary "><strong><i class="ni ni-tag text-warning"></i>Note:</strong></p>
				<p class="h5 text-justify font-weight-300 dashed border-primary "><strong><i class="ni ni-tag text-warning"></i>1.Step 1: Select the chromosome number the user wishes to search for.</strong></p>
				<p class="h5 text-justify font-weight-300 dashed border-primary "><strong><i class="ni ni-tag text-warning"></i>2.Steps 2 and 3 entail inputting the chromosome region the user wants to search for.</strong></p>
				</div>
		    </div>
		</form>
            </div>

            <div class="col-lg-6">
                <div class="custom-border text-justify font-weight-400 px-4 py-2">
                    <h5 class="text-danger font-weight-bold"><i class="ni ni-tag text-warning"></i> Function introduction:</h5>
                    <p class="text-dark font-weight-400">
                        In the sample-based advanced query, users determine the scope of the eRNA query by determining the sample and genome location for the results of interest.
                    </p>
                    <h5 class="text-danger font-weight-bold"><i class="ni ni-tag text-warning"></i> Parameter explanation:</h5>
                    <p class="text-dark font-weight-400">1) Species: Select Homo sapiens or Mus musculus.</p>
                    <p class="text-dark font-weight-400">2) Genomic region: Chromosome,at the start of the chromosome and at the end of the chromosome..</p>
                </div>
            </div>

        </div>
    </div>
		<div style="color:darkgray;">
		<!-- <p class="h5 text-justify font-weight-300 dashed border-primary "><strong><i class="ni ni-tag text-warning"></i>Note:</strong></p> -->
		<!-- <p class="h5 text-justify font-weight-400 dashed border-primary"><strong><i class="ni ni-tag text-warning"></i>Select a chromosome number and input appropriate start and end sites.</strong></p> -->
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
									function search_region_example() {
                                        $('#Region').val("chr1:1438079-1641840")
												}
								</script>
								<script>
									function Turn() {

                                        var region = $('#Region').val(); // 获取Region的值
                                        var parts = region.split(':'); // 分割字符串，得到["chr1", "1438079-1641840"]
                                        var Chr = parts[0]; // 染色体编号
                                        var range = parts[1].split('-'); // 分割字符串，得到["1438079", "1641840"]
                                        var Start = range[0]; // 起始位置
                                        var End = range[1]; // 结束位置

                                        var	Species = $('#Spe').val();
												//var	Chr = $('#Chr').val();
												//var Start = $('#Start').val();
												//var End = $('#End').val();
											    parent.location.href = '../../search_region.php?Chr=' + Chr + '&Start=' + Start + '&End=' + End  + '&Species=' + Species +  "";
											}
								</script>

	</body>
</html>
