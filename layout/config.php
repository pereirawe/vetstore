    <div id="app_screen">
    <?php  $_SESSION; ?>
        <div class="container">
            <br>
            <div class="row">
                <div id="left_sidebar" class="col-md-3">
                    <?php include "./layout/a_left_sidebar.php"; ?>
                </div>
                <div class="col-md-6">
                <?php
                    if (!isset($_GET['section']) || $_GET['section'] >=7 ) {
                        include "./layout/config_1.php";
                    } elseif ($_GET['section'] >= 1 && $_GET['section'] <= 6 )  {
                        include "./layout/config_".$_GET['section'].".php";
                    }
                ?>
                </div>
                <div class="col-md-3">
                    <?php include "./layout/b_right_sidebar.php"; ?>
                </div>
            </div>
        </div>
    </div>