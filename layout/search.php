<?php

?>
    <div id="app_screen">
        <div class="container">
            <br>
            <div class="row">
                <div id="left_sidebar" class="col-md-3">
                    <?php include "./layout/a_left_sidebar.php"; ?>
                </div>
                <div class="col-md-6">
                    <h2> Resultados de busqueda para <?php echo $_GET['search']?></h2>
                    <?php
                        search($search);
                    ?>
                </div>
                <div class="col-md-3">
                    <?php include "./layout/a_right_sidebar.php"; ?>
                </div>
            </div>
        </div>
    </div>