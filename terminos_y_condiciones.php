<?php
    include './functions.php';
    include './config.php';
    el_header();
?>
    <div id="app_screen">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        <?php echo $cms_page_1_title; ?>
                    </h1>
                    <?php echo $cms_page_1_content; ?>
                </div>
            </div>
        </div>
    </div>
<?php el_footer(); ?>