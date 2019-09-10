<?php
    ini_set("session.gc_maxlifetime", 18000)
    ini_set("session.cookie_lifetime", 18000);
    if(!isset($_SESSION)) {
    session_start();
    }
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado

    setlocale(LC_ALL,"es_CO");
    setlocale(LC_MONETARY, 'es_CO');
    function el_header() {
        global  $header_action;
        include 'layout/header.php';
    }
    function el_footer(){
        include 'layout/footer.php';
    }
    function ga_ui(){
        echo 'google_analytics_ui';
    };

    function nocache(){
        $actual_url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        $nocache_stamp = dechex(time());
        $nocache_actual_url = $actual_url."?&nocache=".$nocache_stamp;
        if (!isset($_GET['nocache'])) {
            header("Location:" . $nocache_actual_url);
        } 

        /*
        if ($_GET['nocache'] != $nocache_stamp ) {
            // str_replace("%body%", "black", "<body text='%body%'>");
            strpos();
            $pos = strpos($actual_url, "?&nocache=");
            echo $pos ."</br>";
            echo $nocache_actual_url;
            header("Location:" . $nocache_actual_url);
            
        }
        
        if ( substr_count($nocache_actual_url,"nocache") >= 2) {
            echo substr_count($nocache_actual_url,"nocache");
            echo "revisar url";
        }
        */
    }
    //nocache();

    if (isset($_GET['app'])) {
        $app = $_GET['app'];
        $app_screen = "./app/" . $app. ".php";
    } else {
        $app_screen = "./app/home.php";
    }

    $db_name= "lifescompany_maindb";
    $db_user= "lifescompany_mainuser";
    $db_pass= "=cQDY9f+E!zP";
    $linkli = mysqli_connect("lifes.com.co", $db_user, $db_pass, $db_name) or die(mysqli_error());
    mysqli_query ($linkli,"SET NAMES 'utf8'") or die;

    function secure_session(){
        if (!isset($_SESSION['user_user_name'])) {
            unset($_SESSION);
            session_destroy();
            echo '<script>window.location.replace("../");</script>';
        }
    }

    // ADMIN Query
    $version_id = 1;
    $query_version = " SELECT * FROM `admin` WHERE `version_id` = '" .$version_id. "'";        
    $result_version = mysqli_query($linkli,$query_version) or die(mysqli_error());
    while ($version = mysqli_fetch_array($result_version)){
        $user_rol_admin = $version['user_rol_admin'];
        $user_rol_manager = $version['user_rol_manager'];
        $url_facebook = $version['url_facebook'];
        $url_instagram = $version['url_instagram'];
        $url_google_plus= $version['url_google_plus'];
        $url_twitter = $version['url_twitter'];
        $url_youtube = $version['url_youtube'];
        $home_page_header_logo = $version['home_page_header_logo'];
        $home_page_header_background = $version['home_page_header_background'];
        $home_page_background = $version['home_page_background'];
        $home_page_left_content = $version['home_page_left_content'];
        $form_check_user_name = $version['form_check_user_name'];
        $form_check_phone = $version['form_check_phone'];
        $form_check_birthdate = $version['form_check_birthdate'];
        $form_check_opt_1 = $version['form_check_opt_1'];
        $form_opt_1_title = $version['form_opt_1_title'];
        $form_check_opt_2 = $version['form_check_opt_2'];
        $form_opt_2_title = $version['form_opt_2_title'];
        $page_header_logo = $version['page_header_logo'];
        $page_header_background = $version['page_header_background'];
        $page_background = $version['page_background'];
        $cms_page_1_title = $version['cms_page_1_title'];
        $cms_page_1_content = $version['cms_page_1_content'];
        $cms_page_2_title = $version['cms_page_2_title'];
        $cms_page_2_content = $version['cms_page_2_content'];
        $cms_page_3_title = $version['cms_page_3_title'];
        $cms_page_3_content = $version['cms_page_3_content'];
        $cms_page_4_title = $version['cms_page_4_title'];
        $cms_page_4_content = $version['cms_page_4_content'];
        $cms_page_5_title = $version['cms_page_5_title'];
        $cms_page_5_content = $version['cms_page_5_content'];
        $cms_page_6_title = $version['cms_page_6_title'];
        $cms_page_6_content = $version['cms_page_6_content'];
        $cms_page_7_title = $version['cms_page_7_title'];
        $cms_page_7_content = $version['cms_page_7_content'];
        $cms_page_8_title = $version['cms_page_8_title'];
        $cms_page_8_content = $version['cms_page_8_content'];
        $cms_page_9_title = $version['cms_page_9_title'];
        $cms_page_9_content = $version['cms_page_9_content'];
        $cms_page_10_title = $version['cms_page_10_title'];
        $cms_page_10_content = $version['cms_page_10_content'];
    };
?>