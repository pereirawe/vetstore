<?php
    if (!isset($_GET['photos'])) {
        $query_user = "select * from users WHERE user_user_name = '" . $_SESSION["user_user_name"] . "'";    
    } else {
        $photo_perfil = $_GET['photos'];
        $query_user = "select * from users WHERE user_user_name = '" . $photo_perfil . "'";   
    }

    
    $result_query_user = mysqli_query($linkli,$query_user) or die(mysqli_error());
    while ($user_info = mysqli_fetch_array($result_query_user)){
        $user_id = $user_info['user_id'];
        $user_user_name = $user_info['user_user_name'];    
        $user_first_name = $user_info['user_first_name'];    
        $user_last_name = $user_info['user_last_name'];    
        $user_photo = $user_info['user_photo'];
        $user_banner = $user_info['user_banner'];
        $user_banner = $user_info['user_banner'];
        $pet_main_photo = $user_info['pet_main_photo'];    
    }
    $photo_display ="";
    $query_find_photos = "SELECT * FROM posts WHERE user_id = '".$user_id."' AND post_attachment != ''  ORDER BY post_date DESC LIMIT 9;";
    $result_find_photos = mysqli_query($linkli,$query_find_photos) or die(mysqli_error());
    while ($posted_photo = mysqli_fetch_array($result_find_photos)){
        $photo_post_id = $posted_photo['post_id'];
        $photo_post_attachment = $posted_photo['post_attachment'];
        $photo_post_date = $posted_photo['post_date'];
        $photo_display .= '<a href="https://vetstore.com.co/welcome.php?perfil='. $photo_perfil.'#bp_'.$photo_post_id.'" >
                <div style="background: url('.$photo_post_attachment.'), #ffffff; background-size: cover; background-position: center center; background-repeat: no-repeat; width: 31%; padding-top:31%; display:inline-block;"></div>
            </a>';
    }

?>
    <div id="app_screen">
        <div class="container">
            <br>
            <div class="row">
                <div id="left_sidebar" class="col-md-3">
                    <?php include "./layout/a_left_sidebar.php"; ?>
                </div>
                <div class="col-md-6">
                    <h2> Fotos de <?php echo cortar_nombre($user_first_name, 1) ." ". cortar_nombre($user_last_name, 1); ?></h2>
                    <?php
                        if(isset($photo_display) && $photo_display !=""){
                            echo $photo_display;
                        }
                    ?>
                </div>
                <div class="col-md-3">
                    <?php include "./layout/a_right_sidebar.php"; ?>
                </div>
            </div>
        </div>
    </div>