    <div id="app_screen">
    <?php // var_dump($_SESSION); ?>
            <!--<div class="row">
                <div id="profile_banner" class="col-md-12">
                    <div id="profile_banner_photo" style="background: url('<?php echo $_SESSION["user_photo"]; ?>');"></div>
                    <h2><?php echo $_SESSION["user_first_name"]. " ". $_SESSION["user_last_name"]; ?></h2>
                    <button class="btn btn-primary" type="button">
                        <span class="badge"><i class="fas fa-paw"></i></span> Manechi 
                    </button>
                </div>
            </div>-->
        <div class="container">
            <br>
            <div class="row">
                <div id="left_sidebar" class="col-md-3">
                    <?php include "./layout/a_left_sidebar.php"; ?>
                </div>
                <div class="col-md-6">
                    <?php include "./layout/wall_posts.php"; ?>
                </div>
                <div class="col-md-3">
                    <?php include "./layout/a_right_sidebar.php"; ?>
                </div>
            </div>
        </div>
    </div>