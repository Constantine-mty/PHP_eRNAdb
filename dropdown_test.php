<?php
include "./templates/base.php";
?>


<body>
<?php
include "./templates/header.php";
?>


<div id="species-dropdown"></div>






<script>
    // 假设 filter_species 是一个字典的字符串表示形式
    var filter_species_str = '{Mouse: 109, Human/Mouse: 7, Human: 55}';

    // 去除花括号，并按逗号分割成数组
    var items = filter_species_str.substring(1, filter_species_str.length - 1).split(', ');

    // 初始化一个空数组来存储解析后的键值对
    var filter_species_array = [];

    // 遍历每个项并解析为键值对
    items.forEach(function(item) {
        var keyValue = item.split(': ');
        filter_species_array.push({ key: keyValue[0], value: parseInt(keyValue[1], 10) });
    });

    // 获取要插入下拉框的DOM元素
    var dropdownContainer = document.getElementById('species-dropdown');

    // 创建 <select> 元素
    var selectElement = document.createElement('select');
    selectElement.name = 'species_filter';

    // 遍历键值对数组并创建 <option> 元素
    filter_species_array.forEach(function(item) {
        var optionElement = document.createElement('option');
        optionElement.value = item.key;
        optionElement.textContent = item.key + ' (' + item.value + ')';
        selectElement.appendChild(optionElement);
    });

    // 将 <select> 元素添加到容器中
    dropdownContainer.appendChild(selectElement);
</script>


</body>
</html>
