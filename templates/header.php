



<!-- NAVBAR 导航栏  -->

<!--强制开启暗色主题，无法使用css设置背景色-->
<!--<nav class="navbar navbar-expand-md navbar-dark bg-dark" data-bs-theme="dark">-->
<nav class="navbar navbar-expand-md">

    <div class="container">
        <a class="navbar-brand d-flex justify-content-center col-lg-4" href="./index.php">eRNA scAtlas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse col-lg-8" id="navbarsExample04">
            <ul class="navbar-nav me-auto mb-2 mb-md-0 col-lg-8">

                <li class="nav-item" style="margin-right: 30px" >
                    <a class="nav-link" href="./index.php" aria-expanded="false">HOME</a>
                </li>

                <!-- navbar Browse 下拉单 -->
                <li class="nav-item dropdown" style="margin-right: 12px">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">BROWSE</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./browser_Experiments.php" id="label_download">Browse by Experiments</a></li>
                        <li><a class="dropdown-item" href="./browser_eRNA.php" id="label_download">Browse by eRNA</a></li>
                    </ul>
                </li>

                <!-- navbar Search -->
                <li class="nav-item" style="margin-right: 15px">
                    <a class="nav-link" href="./search_iframe.php" aria-expanded="false">SEARCH</a>
                </li>

                <!-- navbar Tools 下拉单 -->
                <li class="nav-item dropdown" style="margin-right: 12px">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">ANALYSIS</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Visualization</a></li>
                        <li><a class="dropdown-item" href="#">Analysis Tools</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>

                <!-- navbar Download -->
                <li class="nav-item" style="margin-right: 12px">
                    <a class="nav-link" href="./download.php" aria-expanded="false">DOWNLOAD</a>
                </li>

                <!-- navbar Contact -->
                <li class="nav-item" style="margin-right: 12px">
                    <a class="nav-link" href="./contact.php"  aria-expanded="false">CONTACT</a>
                </li>

                <!-- navbar Manual -->
                <li class="nav-item" style="margin-left: 0px">
                    <a class="nav-link" href="./manual.php"  aria-expanded="false">MANUAL</a>
                </li>


            </ul>
            <!--舍弃搜索框组件
            <form role="search">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            </form>
            -->
        </div>

    </div>
</nav>
