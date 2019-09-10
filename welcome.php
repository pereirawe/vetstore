<?php
    include './functions.php';
    
    if(!isset ($_SESSION['user_id'])){
        echo '<script>window.location.replace("./register.php");</script>';
    } else{
        if (isset($_SESSION['call_back_url']) &&  $_SESSION['call_back_do'] == "true") {
            $_SESSION['call_back_do'] = "false";
            echo '<script>window.location.replace("'.$_SESSION['call_back_url'].'")</script>';
        }
    }

    if (isset($_GET['perfil'])) {
       $display_url = "./layout/profile.php";
    } elseif (isset($_GET['config'])) {
       $display_url = "./layout/config.php";
    } elseif (isset($_GET['photos'])) {
       $display_url = "./layout/photos.php";
    } elseif (isset($_GET['friends'])) {
        $display_url = "./layout/friends.php";
    } elseif (isset($_GET['search'])) {
        $display_url = "./layout/search.php";
    }else {
        $display_url = "./layout/wall.php";
    }
    $admin_url = "";
    if (isset($_SESSION['user_rol'])) {
        if ($_SESSION['user_rol'] == 1) {
            $admin_url = '<div class="dropdown-divider"></div><a class="dropdown-item" href="./admin/">Admin</a>';
        }
    }
    secure_session();
    $header_action = '<div class="dropdown">
        <a href="./welcome.php?perfil='.$_SESSION['user_user_name'].'" style="background: url('. $_SESSION["user_photo"] .'); background-size: cover; padding-right: 36px; padding-bottom: 13px; border-radius: 100%; margin-right: 5px;" >
        </a>
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="left: -80px;">
            <a class="dropdown-item" href="./welcome.php?perfil='.$_SESSION['user_user_name'].'">Mi perfil</a>
            <a class="dropdown-item" href="./welcome.php?config='.$_SESSION['user_user_name'].'">Configuración</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="./logout.php">Cerrar sesión</a>
            '.$admin_url.'
        </div>
        </div>';
    ela_header();
    include_once($display_url);

    if(isset($_GET['bp_post_id'])){
        $post_url = $actual_url . "#".$_GET['bp_post_id'];
        echo "<script>
            setTimeout(function(){
                $( document ).ready(function() {
                    window.location = '#". $_GET['bp_post_id']."';
                })
            }, 1000);
        </script>";
    }

    el_footer();
?>