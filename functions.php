<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" > </script>
<?php
    session_start();
    ini_set("session.gc_maxlifetime", 315360000);
    ini_set("session.cookie_lifetime", 315360000);
    session_set_cookie_params(315360000);
    ini_set('display_errors', '1');
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");
    setlocale(LC_ALL,"es_CO");
    setlocale(LC_MONETARY, 'es_CO');
    // echo ini_get('upload_max_filesize');
    // echo ini_get('post_max_size');
    //echo ini_get('disable_functions');
    $time_stamp = time();
    $actual_url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] ;
    //echo $actual_url;

    if(!isset($_SESSION['user_id'])){
        if (!isset($_SESSION['call_back_url'])) {
            if($actual_url != "https://vetstore.com.co/register.php" &&
                substr($actual_url, 0, 36) != "https://vetstore.com.co/fb_login.php" &&
                $actual_url != "https://vetstore.com.co/login.php" &&
                $actual_url != "https://vetstore.com.co/" &&
                $actual_url != "https://vetstore.com.co/password_recover.php" &&
                $actual_url != "https://vetstore.com.co/logout.php" ){
                    $_SESSION['call_back_url'] = $actual_url;
                    $_SESSION['call_back_do'] = "true";
                    // echo $actual_url; die;

            }
        }
    }
    
    if(isset($_SESSION['call_back_url'])){
        // echo $_SESSION['call_back_url'] . " - ". $_SESSION['call_back_do'];
    }

    function el_header() {
        global  $header_action;
        global  $url_facebook;
        global  $url_instagram;
        global  $url_google_plus;
        global  $url_twitter;
        global  $url_youtube;
        global  $home_page_header_logo;
        global  $home_page_header_background;
        global  $home_page_background;
        include 'layout/header.php';
    }
    function ela_header() {
        global  $header_action;
        global  $url_facebook;
        global  $url_instagram;
        global  $url_google_plus;
        global  $url_twitter;
        global  $url_youtube;
        global  $home_page_header_logo;
        global  $home_page_header_background;
        global  $home_page_background;
        global  $page_header_logo;
        global  $page_background;
        include 'layout/a_header.php';
    }
    function el_footer(){
        include 'layout/footer.php';
    }
    function ga_ui(){
        echo 'google_analytics_ui';
    };
    // nocache();


    if (isset($_GET['app'])) {
        $app = $_GET['app'];
        $app_screen = "./app/" . $app. ".php";
    } else {
        $app_screen = "./app/home.php";
    }

    // BASE DE DATOS
    require_once("database.php");
    mysqli_query ($linkli,"SET NAMES 'utf8'") or die;

    // SEGURIDAD DE SESION
    function secure_session(){
        if (!isset($_SESSION)) {
            // unset($_SESSION);
            // session_destroy();
            echo '<script>window.location.replace("./");</script>';
        }
    }

    // GENERADOR DE CONTRASEÑAS
    function generarContrasena($longitud) {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz.-_';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
        return $key;
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
        $url_google_plus = $version['url_google_plus'];
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

    // CORTAR NOMBRES
    function cortar_nombre($texto, $largor = 3, $puntos = "...") { 
        $palabras = explode(' ', $texto);
        if (count($palabras) > $largor) { 
            // return implode(' ', array_slice($palabras, 0, $largor)) . $puntos; 
            return implode(' ', array_slice($palabras, 0, $largor)); 
        } else {
                return $texto; 
        } 
    }

    // REDIMENSIONAR IMAGENES
    function reimg($img_file, $size){
        if ( getimagesize($img_file)[0] >= getimagesize($img_file)[1]) {
            $img_file_limit = getimagesize($img_file)[0];
        } else {
            $img_file_limit = getimagesize($img_file)[1];
        }
        if( $img_file_limit > $size ){
            return "https://vetstore.com.co/lab/reimg.php?img_file=". $img_file ."&size=". $size;
        } else {
            return $img_file;
        };
    };

    // MOTOR DE BUSQUEDA
    $search_display = "";
    if (isset($_GET['search'])) {
        $search = $_GET['search'];

        // BUSQUEDA DE USUARIOS
        function search($search){

            if (isset($_SESSION['user_id'])) {
                log_create("search", $search, $_SESSION['user_id']);
            }
            
            $search_multi = explode(" ", $search);
            $query_search_multi ="";
            // var_dump($search_multi);

            $qsm = 0;
            foreach ($search_multi as &$valor) {
                if ($qsm != 0){
                    $query_search_multi .= " OR ";
                }
                $query_search_multi .= "(user_user_name LIKE  '%$valor%')
                    OR (user_first_name LIKE '%$valor%')
                    OR (user_last_name LIKE  '%$valor%')
                    OR (user_email LIKE  '%$valor%')
                    OR (user_about_me LIKE  '%$valor%')
                    OR (user_work_place LIKE  '%$valor%')";
                    $qsm = $qsm + 1;
            }
            
            global $search;
            global $linkli;
            $query_search_users = "SELECT DISTINCT * FROM users WHERE
                user_verified_token = 'true' AND ($query_search_multi)
                ORDER BY user_id DESC;";
        

            $search_users_display = "";
            $search_users_account = 0;
            $result_search_users = mysqli_query($linkli,$query_search_users) or die(mysqli_error());
            while ($search_users = mysqli_fetch_array($result_search_users)){
                $search_users_account = $search_users_account + 1;
                $user_id = $search_users['user_id'];
                $user_user_name = $search_users['user_user_name'];
                $user_first_name = $search_users['user_first_name'];
                $user_last_name = $search_users['user_last_name'];
                $user_photo = $search_users['user_photo'];
                $user_email = $search_users['user_email'];
                    
                $search_users_display .= '<li class="list-group-item">
                        <a href="https://vetstore.com.co/welcome.php?perfil='.$user_user_name.'" target="_new">
                            <img src="'.$user_photo.'" width="36px">
                            '. $user_first_name. ' ' . $user_last_name . '
                            </a>
                    </li>';
            }
            if ($search_users_account > 0 ){
                $search_users_display = '<div class="alert alert-dark" role="alert">'.$search_users_account.' usuarios encontrados</div>
                    <ul class="list-group">
                    '. $search_users_display. '
                    </ul>
                ';
            } else{
                $search_users_display =  '<p>No se encontraron usuario que coincidan</p>';
            };
            // BUSQUEDA DE PUBLICACIONES
            if ($search != "") {
                $query_search_posts = "SELECT DISTINCT * FROM posts WHERE
                        (post_content LIKE  '%$search%')
                    ORDER BY post_date DESC;";
                // echo $query_search_posts;
                $search_posts_display = "";
                $search_posts_account = 0;
                $result_search_posts = mysqli_query($linkli,$query_search_posts) or die(mysqli_error());
                while ($search_posts = mysqli_fetch_array($result_search_posts)){
                    $search_posts_account = $search_posts_account + 1;
                    $user_id = $search_posts['user_id'];
                    $post_id = $search_posts['post_id'];
                    $post_content = $search_posts['post_content'];
                    $post_attachment = $search_posts['post_attachment'];
                    $search_posts_display .= '<li class="list-group-item">
                        <a href="https://vetstore.com.co/welcome.php#bp_'.$post_id.'" target="_new">'.$post_content.'</a>
                        </li>';
        
                }
                if ($search_posts_account > 0 ){
                    $search_posts_display = '<hr><div class="alert alert-dark" role="alert">Publicaciones</div>
                        <ul class="list-group">
                            '. $search_posts_display.'
                        </ul>
                    ';
                } else{
                    $search_posts_display =  '<hr><p>No se encontraron publicaciones que coincidan</p>';
                };
    
            } else{
                $search_posts_display = "";
            }
            $search_display = $search_users_display . $search_posts_display;
            echo $search_display;
        }
    }

    // HERRAMIENTAS DE PUBLICACIONES - PIE DE POST

    // FUNCION DE LIKE
    if(isset($_SESSION['user_id'])){
        $actual_user_id =  $_SESSION['user_id'];
    }
    function like_status_display($post_id, $actual_user_id ){
        global $linkli;
        //FUNCIONES DE LIKE
        $is_like = 0;
        $is_no_like = 0;
        $query_is_like = "SELECT * FROM likes WHERE post_id= '".$post_id."'; ";
        $result_is_like = mysqli_query($linkli,$query_is_like) or die(mysqli_error());
        while ($show_is_like = mysqli_fetch_array($result_is_like)){
            $who_like_it = $show_is_like['user_id'];
            $like_status = $show_is_like['like_status'];
            if($like_status == "like"){
                $is_like = $is_like +1 ;
                if ($who_like_it == $actual_user_id){
                    echo '<script> $("#like_'.$post_id.'").css("color", "#0069d9"); </script>';
                };
            } else if($like_status == "no_like"){
                $is_no_like = $is_no_like +1 ;
                if ($who_like_it == $actual_user_id){
                        echo '<script> $("#no_like_'.$post_id.'").css("color", "rgb(200, 35, 51)"); </script>';
                };
            }
        };
        echo '<script> $("#like_'.$post_id.'_account").html("'.$is_like.'"); </script>';
        echo '<script> $("#no_like_'.$post_id.'_account").html("'.$is_no_like.'"); </script>';
    }

    // BORRADOR DE ARCHIVOS
    if (isset($_GET["delete"])) {
        if (!unlink($_GET["delete"])){
            echo "No se pudo borrar el archivo: ".$_GET["delete"];
        }else{
            echo "Archivo: ".$_GET["delete"] ." borrado";

        };
    }

    // BORRAR ARCHIVOS QUE NO ESTAN RELACIONADAS A NINGUN POST
    function delete_unused_post_file(){
        global $linkli;
        $path = "./uploads/post_images/";
        // echo "<h1>".$path."</h1>";
        $directorio = opendir($path);
        $activador = 0;
        while ($archivo = readdir($directorio))  {
            if (!is_dir($archivo)) {
                $post_id = substr($archivo, 0 , 30);
                $query_post = "SELECT * FROM posts WHERE post_id ='".$post_id."'; ";
                $result_post = mysqli_query($linkli,$query_post) or die(mysqli_error());
                while ($post_info = mysqli_fetch_array($result_post)){
                    $post_date = $post_info['post_date'];
                    $activador = 1;
                }
                // echo $activador;
                if ($activador == 0){
                    if (!unlink( $path . $archivo )){
                        $a = 1;
                        //echo "<h2>No se pudo borrar el archivo: ".$path . $archivo . "</h2>"."<hr>";
                    }else{
                        $a = 1;
                        // echo "<h2>Archivo: ".$path . $archivo ." borrado</h2>"."<hr>";
                    }
                } 
                $activador = 0;
            }
        }
    }
    // BORRAR POST EN BLANCO
    
    if(isset($_GET['clean_posts'])){
        function clean_posts(){
            global $linkli;
            $query_clean_posts = "SELECT * FROM posts WHERE post_content = '' AND post_attachment = '' ;";
            mysqli_query($linkli,$query_clean_posts) or die(mysqli_error());
        }
        clean_posts();
        echo "<script> alert('Se han eliminado todas las publicaciones en blanco');</script>";
    }
    

    

    // HACER FUNCION DE BORRAR IMAGENES DE PERFIL INUTILES
    function delete_account($user_id){
        global $linkli;
        $query = "DELETE FROM users WHERE user_id = '".$user_id."';";
        mysqli_query($linkli,$query);
        $query = "DELETE FROM friends WHERE (users_id_a = '".$user_id."' OR users_id_b = '".$user_id."');";
        mysqli_query($linkli,$query);
        $query = "DELETE FROM posts WHERE user_id = '".$user_id."';";
        mysqli_query($linkli,$query);
        $query = "DELETE FROM likes WHERE user_id = '".$user_id."';";
        mysqli_query($linkli,$query);
        $query = "DELETE * FROM messages WHERE sender_users_id = '".$user_id."';";
        mysqli_query($linkli,$query);
        $query = "DELETE * FROM messages WHERE reciever_user_id = '".$user_id."';";
        mysqli_query($linkli,$query);
        delete_unused_post_file();
        //delete_unused_profile_photo();
    }
    if(isset($_GET['delete_user_id'])){
        if($_GET['delete_user_id'] == $_SESSION['user_id']){
            delete_account($_GET['delete_user_id']);
        } else{
            echo "No esta autorizado para realizar esta accion";
        }
    }

    function log_create( $log_activity , $log_query , $user_id){
        global $linkli;
        $log_id = "l_" . uniqid();
        $log_date = time() ;
        $log_ip = '' . " ip";
        if(isset($_SERVER['HTTP_CLIENT_IP'])){
            $log_ip = $_SERVER['HTTP_CLIENT_IP'];
        } else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $log_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else if(isset($_SERVER['HTTP_X_FORWARDED'])){
            $log_ip = $_SERVER['HTTP_X_FORWARDED'];
        } else if(isset($_SERVER['HTTP_FORWARDED_FOR'])){
            $log_ip = $_SERVER['HTTP_FORWARDED_FOR'];
        } else if(isset($_SERVER['HTTP_FORWARDED'])){
            $log_ip = $_SERVER['HTTP_FORWARDED'];
        } else if(isset($_SERVER['REMOTE_ADDR'])){
            $log_ip = $_SERVER['REMOTE_ADDR'];
        } else{
            $log_ip = 'UNKNOWN';
        }

        // $log_activity = "";
        // $log_query = "";
        // echo $log_ip;
        $log_insert = "INSERT INTO logs (
                log_id,
                log_date,
                user_id,
                log_ip,
                log_activity,
                log_query
            ) VALUE(
                '".$log_id."',
                '".$log_date."',
                '".$user_id."',
                '".$log_ip."',
                '".$log_activity."',
                '".$log_query."'
            );";
        // echo $log_insert;
        mysqli_query ($linkli, $log_insert) or die(mysqli_error());;
    };

    // REEMPLAZAR SOLICITUDES DE AMISTAD
    if(isset($_POST['replace_suggestion'])){
        $query_user = "select * from users WHERE user_id != '" . $_SESSION["user_id"] . "'  AND user_verified_token = 'true' ORDER BY RAND() LIMIT 10";
        $result_query_user = mysqli_query($linkli,$query_user) or die(mysqli_error());
        while ($user_not_me_info = mysqli_fetch_array($result_query_user)){
            $is_a_friend = 0;
            $user_not_me_id = $user_not_me_info['user_id'];
            $user_not_me_user_name = $user_not_me_info['user_user_name'];
            $user_not_me_first_name = $user_not_me_info['user_first_name'];
            $user_not_me_last_name = $user_not_me_info['user_last_name'];
            $user_not_me_mail = $user_not_me_info['user_email'];
            $user_not_me_photo = $user_not_me_info['user_photo'];
            $query_my_friends = "SELECT * FROM friends WHERE ((users_id_a = '".$user_not_me_id."' AND users_id_b = '". $_SESSION["user_id"] ."') OR (users_id_a = '".$_SESSION["user_id"]."' AND users_id_b = '". $user_not_me_id ."')) ;";
            $result_my_friends = mysqli_query($linkli,$query_my_friends) or die(mysqli_error());
            while ($my_friends_info = mysqli_fetch_array($result_my_friends)){
                $is_a_friend = 1;
                $my_friends_id_a = $my_friends_info['users_id_a'];
                $my_friends_id_b = $my_friends_info['users_id_b'];
                if ($my_friends_id_a == $_SESSION['user_id']) {
                    $my_friends_id = $my_friends_id_b;
                } else {
                    $my_friends_id = $my_friends_id_a;
                }
            }
            if ($is_a_friend == 0){
                $friend_add_accept_vars = '"'.$user_not_me_id.'"';
                $resultado = "<div id='suggests_".$user_not_me_id."' class='' style='margin-bottom: 10px; background: #ffffff;'>
                        <img src='".$user_not_me_photo."' height='50px'>
                        <span>". cortar_nombre($user_not_me_first_name, 1). " " . cortar_nombre($user_not_me_last_name,1) ."</span>
                        <div id='invite_".$user_not_me_id."' class='btn btn-light' type='' style='display: inline; float: right; padding: 15px 6px;' title='Agregar de mis amigos'  onclick='add_friend(".$friend_add_accept_vars.")' >
                            <span class='badge'><i class='fas fa-user-plus' style='color: #0069d9;'></i></span>
                        </div>
                    </div>";
            }
        }
        echo $resultado;
    }
    // VER MAS PUBLICACIONES
    if (isset($_GET['post_create']) && isset($_GET['post_create_from']) && isset($_GET['post_create_to'])) {
        if (isset($_GET['perfil'])) {
            $r_post_create = "";
            if ($_GET['perfil'] == $_SESSION['user_user_name']) {
                $user_id= $_SESSION['user_id'];
                $query_posts = "SELECT * FROM posts WHERE user_id ='".$user_id."' ORDER BY post_date DESC;";
                $query_posts = "SELECT * FROM posts WHERE user_id ='".$user_id."' ORDER BY post_date DESC LIMIT ".$_GET['post_create_from'].", ".$_GET['post_create_to']." ;";
                $result_query_post = mysqli_query($linkli,$query_posts) or die(mysqli_error());
                $post_exist = 0;
                while ($post = mysqli_fetch_array($result_query_post)){
                    $post_user_id = $post['user_id'];
                    $post_id = $post['post_id'];
                    $post_content = $post['post_content'];
                    $post_date = $post['post_date'];
                    $post_attachment = $post['post_attachment'];
                    if ($post_attachment != "") {
                        //$post_attachment = reimg($post_attachment, 520);
                        $post_attachment_display = "<img src='".$post_attachment."' width='100%'>";
                    } else {
                        $post_attachment_display = "";
                    }
                    $post_link = $post['post_link'];
                    $post_exist++;
                    $like_onclick_vars = '"'.$post_id.'", "'.$_SESSION['user_id'].'"';
                    $delete_onclick_vars = '"'.$post_id.'"';
                    $r_post_create .= "<div id='bp_".$post_id."' class='wall_posts'>
                    <a href='./welcome.php?perfil=".$_SESSION['user_user_name']."' ><h6><img src='".$_SESSION['user_photo']."' style='height: 18px; border-radius: 50px; margin-right: 7px; ' >". $_SESSION['user_first_name'] . " " . $_SESSION['user_last_name'] ."</h6></a>
                        <p>
                            ".$post_content."
                        </p>
                            ".$post_attachment_display."
                            <small>Publicado el ". date( "d-m-Y", $post_date ) ." a las ". date( "H:i:s", $post_date )."</small><br>
                            <div class='post_tools'>
                                <a class='btn btn-light' data-toggle='modal' data-target='#mod".$post_id."'><i class='fas fa-edit'></i></a>
                                <div class='btn btn-light'><i class='fas fa-trash' onclick='delete_post(".$delete_onclick_vars.")' ></i></div>
                                <a class='btn btn-light' style='float: right;' data-toggle='modal' data-target='#comment".$post_id."'><i class='fas fa-comments'></i></a>
                                <div id='no_like_".$post_id."' class='btn btn-light' style='float: right;' onclick='no_like(".$like_onclick_vars.")'>
                                    <i class='fas fa-thumbs-down' ></i>
                                    <span id='no_like_".$post_id."_account'></span>
                                </div>
                                <div id='like_".$post_id."' class='btn btn-light' style='float: right;' onclick='like(".$like_onclick_vars.")'>
                                    <i class='fas fa-thumbs-up' ></i>
                                    <span id='like_".$post_id."_account'></span>
                                </div>
                            </div>";
                    
                    //FUNCIONES DE LIKE
                    like_status_display($post_id, $actual_user_id);
                    
                    // COMENTARIOS PUBLICADOS
                    $query_comment_search = "SELECT * FROM posts_comments WHERE post_id = '".$post_id."';";
                    $result_comment_search = mysqli_query($linkli,$query_comment_search) or die(mysqli_error());
                    $comment_exist = 0;
                    $comments = "";
                    while ($comment_show = mysqli_fetch_array($result_comment_search)){
                        $comment_exist = $comment_exist +1;
                        $com_user_id = $comment_show['user_id'];
                        $com_comment_id = $comment_show['comment_id'];
                        $com_comment_date = $comment_show['comment_date'];
                        $com_comment_content = $comment_show['comment_content'];
                        $query_comment_who = "SELECT * FROM users WHERE user_id = '".$com_user_id."'";
                        $query_comment_who_search = mysqli_query($linkli,$query_comment_who) or die(mysqli_error());
                        while ($query_comment_who_show = mysqli_fetch_array($query_comment_who_search)){
                            $who_user_id = $query_comment_who_show['user_id'];
                            $who_user_first_namme = $query_comment_who_show['user_first_name'];
                            $who_user_first_name = $query_comment_who_show['user_first_name'];
                            $who_user_last_name = $query_comment_who_show['user_last_name'];
                            $who_user_user_name = $query_comment_who_show['user_user_name'];
                            $who_user_photo = $query_comment_who_show['user_photo'];
    
                        }
    
                        $comments .= '<div class="alert alert-primary" role="alert">
                                <a href="./welcome.php?perfil='.$who_user_user_name.'" >
                                    <h6><img src="'.$who_user_photo.'" style="height: 18px; border-radius: 50px; margin-right: 7px; " >'. $who_user_first_name . ' ' . $who_user_last_name .'</h6>
                                </a>'
                            .$com_comment_content.'
                            </div>'; 
                    }
    
                    if ($comment_exist > 0 ) {
                        $r_post_create .= '<a class="" data-toggle="collapse" href="#collapse'.$com_comment_id.'" role="button" aria-expanded="false" aria-controls="collapse'.$com_comment_id.'">Ver '.$comment_exist.' comentarios</a>
                        <div class="collapse" id="collapse'.$com_comment_id.'">
                            '.$comments.'
                        </div>'; 
                    }
    
    
            
                    // FINAL DE CAJA DE PUBLICACION
                    $r_post_create .= "</div>";
                        
                    
                    // EDICION DE PUBLICACIONES
                    $r_post_create .= '<div class="modal fade" id="mod'.$post_id.'" tabindex="-1" role="dialog" aria-labelledby="modLabel'.$post_id.'" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modLabel'.$post_id.'">Editar Publicación</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="./edit_post.php" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input id="post_id" name="post_id" value="'.$post_id.'" style="display:none;">
                                    <textarea id="'.$post_id.'" name="'.$post_id.'" class="form-control" rows="4">'.$post_content.'</textarea>
                                    <div class="image-upload">
                                        <label for="post_attachment_edit">
                                            <img src="'.$post_attachment.'" class="img-thumbnail" width="100%" />
                                        </label>
                                        <input type="file" class="form-control" id="post_attachment_edit" name="post_attachment_edit" aria-describedby="post_attachment_edit" style="display: auto;">
                                    </div>
    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" name="submit_'. $post_id . '" id="submit_'. $post_id . '" class="btn btn-primary" onclick="this.form.submit()">Guardar cambios</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>';
                  // CREAR COMENTARIOS
                  $r_post_create .= '<div class="modal fade" id="comment'.$post_id.'" tabindex="-1" role="dialog" aria-labelledby="modLabel'.$post_id.'" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modLabel'.$post_id.'">Comentar Publicación</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="./comment_post.php" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input id="comment_post_id" name="comment_post_id" value="'.$post_id.'" style="display:none;">
                                    <input id="comment_user_id" name="comment_user_id" value="'.$_SESSION['user_id'].'" style="display:none;">
                                    <input id="post_owner_user_user_name" name="post_owner_user_user_name" value="'.$_SESSION['user_user_name'].'" style="display:none;">
                                    <input id="back_url" name="back_url" value="https://'. $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'] . '#bp_' .$post_id.'" style="display:none;" >
                                    <textarea id="comment_post_'.$post_id.'" name="comment_'.$post_id.'" class="form-control" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" name="comment_submit_'. $post_id . '" id="comment_submit_'. $post_id . '" class="btn btn-primary" onclick="this.form.submit()">Comentar</button>
                            </div>
                        </form> 
                      </div>
                    </div>
                  </div>';
    
                  $r_post_create .= "<script>
                  var youtu_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://youtu.be/');
                  var youtube_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://www.youtube.com/watch?v=');
                  var insta_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://www.instagram.com/p/');
    
                  if (youtube_". $post_id ." >= 0) {
                      var youtube_". $post_id ."_length = $('#bp_". $post_id ." > p').html().length;
                      var youtube_". $post_id ."_code = $('#bp_". $post_id ." > p').html().substring(youtube_". $post_id ."_length - 11, youtube_". $post_id ."_length);
                      $('#bp_". $post_id ." > p').append('<br><iframe width=100% height=315 src=https://www.youtube.com/embed/' + youtube_". $post_id ."_code + ' frameborder=0 allow=autoplay; encrypted-media allowfullscreen></iframe>');
                  }
                  if (youtu_". $post_id ." >= 0) {
                      var youtu_". $post_id ."_length = $('#bp_". $post_id ." > p').html().length;
                      var youtu_". $post_id ."_code = $('#bp_". $post_id ." > p').html().substring(youtu_". $post_id ."_length - 11, youtu_". $post_id ."_length);
                      $('#bp_". $post_id ." > p').append('<br><iframe width=100% height=315 src=https://www.youtube.com/embed/' + youtu_". $post_id ."_code + ' frameborder=0 allow=autoplay; encrypted-media allowfullscreen></iframe>');
                  }
              </script>";
                }
            } else {
                $user_user_name = $_GET['perfil'];
                $query_user = "SELECT * FROM users WHERE user_user_name = '".$user_user_name."';" ;
                $result_query_user = mysqli_query($linkli,$query_user) or die(mysqli_error());
                while ($user_show = mysqli_fetch_array($result_query_user)){
                    $post_user_id = $user_show['user_id'];
                    $post_user_user_name = $user_show['user_user_name'];
                    $post_user_first_name = $user_show['user_first_name'];
                    $post_user_last_name = $user_show['user_last_name'];
                    $post_user_photo = $user_show['user_photo'];
                }
                
                $query_posts = "SELECT * FROM posts WHERE user_id ='".$post_user_id."' ORDER BY post_date DESC LIMIT 10;";
                $query_posts = "SELECT * FROM posts WHERE user_id ='".$post_user_id."' ORDER BY post_date DESC LIMIT ".$_GET['post_create_from'].", ".$_GET['post_create_to']." ;";
                $result_query_post = mysqli_query($linkli,$query_posts) or die(mysqli_error());
                $post_exist = 0;
                while ($post = mysqli_fetch_array($result_query_post)){
                    $post_user_id = $post['user_id'];
                    $post_id = $post['post_id'];
                    $post_content = $post['post_content'];
                    $post_date = $post['post_date'];
                    $post_attachment = $post['post_attachment'];
                    if ($post_attachment != "") {
                        //$post_attachment = reimg($post_attachment, 520);
                        $post_attachment_display = "<img src='".$post_attachment."' width='100%'>";
                    } else {
                        $post_attachment_display = "";
                    }
                    $post_link = $post['post_link'];
                    $post_exist++;
                    $like_onclick_vars = '"'.$post_id.'", "'.$_SESSION['user_id'].'"';
                    $r_post_create .= "<div id='bp_".$post_id."' class='wall_posts' >
                        <a href='./welcome.php?perfil=".$post_user_user_name."' >
                            <h6><img src='".$post_user_photo ."' style='height: 18px; border-radius: 50px; margin-right: 7px;' >". $post_user_first_name . " " . $post_user_last_name ."</h6>
                        </a>
                        <p>
                            ".$post_content."
                        </p>
                            ".$post_attachment_display."
                            <small>Publicado el ". date( "d-m-Y", $post_date ) ." a las ". date( "H:i:s", $post_date )."</small>
                            <div class='post_tools'>
                            <a class='btn btn-light' style='float: right;' data-toggle='modal' data-target='#comment".$post_id."'><i class='fas fa-comments'></i></a>
                            <div id='no_like_".$post_id."' class='btn btn-light' style='float: right;' onclick='no_like(".$like_onclick_vars.")'>
                                    <i class='fas fa-thumbs-down' ></i>
                                    <span id='no_like_".$post_id."_account'></span>
                                </div>
                                <div id='like_".$post_id."' class='btn btn-light' style='float: right;' onclick='like(".$like_onclick_vars.")'>
                                    <i class='fas fa-thumbs-up' ></i>
                                    <span id='like_".$post_id."_account'></span>
                                </div>
                            </div>";
                    // FUNCIONES DE LIKE
                    like_status_display($post_id, $actual_user_id);
    
                    // COMENTARIOS PUBLICADOS
                    $query_comment_search = "SELECT * FROM posts_comments WHERE post_id = '".$post_id."';";
                    $result_comment_search = mysqli_query($linkli,$query_comment_search) or die(mysqli_error());
                    $comment_exist = 0;
                    $comments = "";
                    while ($comment_show = mysqli_fetch_array($result_comment_search)){
                        $comment_exist = $comment_exist +1;
                        $com_user_id = $comment_show['user_id'];
                        $com_comment_id = $comment_show['comment_id'];
                        $com_comment_date = $comment_show['comment_date'];
                        $com_comment_content = $comment_show['comment_content'];
                        $query_comment_who = "SELECT * FROM users WHERE user_id = '".$com_user_id."'";
                        $query_comment_who_search = mysqli_query($linkli,$query_comment_who) or die(mysqli_error());
                        while ($query_comment_who_show = mysqli_fetch_array($query_comment_who_search)){
                            $who_user_id = $query_comment_who_show['user_id'];
                            $who_user_first_namme = $query_comment_who_show['user_first_name'];
                            $who_user_first_name = $query_comment_who_show['user_first_name'];
                            $who_user_last_name = $query_comment_who_show['user_last_name'];
                            $who_user_user_name = $query_comment_who_show['user_user_name'];
                            $who_user_photo = $query_comment_who_show['user_photo'];
    
                        }
                        $comments .= '<div class="alert alert-primary" role="alert">
                                <a href="./welcome.php?perfil='.$who_user_user_name.'" >
                                    <h6><img src="'.$who_user_photo.'" style="height: 18px; border-radius: 50px; margin-right: 7px; " >'. $who_user_first_name . ' ' . $who_user_last_name .'</h6>
                                </a>'
                            .$com_comment_content.'
                            </div>'; 
                    }
    
                    if ($comment_exist > 0 ) {
                        $r_post_create .= '<a class="" data-toggle="collapse" href="#collapse'.$com_comment_id.'" role="button" aria-expanded="false" aria-controls="collapse'.$com_comment_id.'">Ver '.$comment_exist.' comentarios</a>
                        <div class="collapse" id="collapse'.$com_comment_id.'">
                            '.$comments.'
                        </div>'; 
                    }
            
                    // FINAL DE CAJA DE PUBLICACION
                    $r_post_create .= "</div>";
    
                    // CREAR COMENTARIOS
                  $r_post_create .= '<div class="modal fade" id="comment'.$post_id.'" tabindex="-1" role="dialog" aria-labelledby="modLabel'.$post_id.'" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modLabel'.$post_id.'">Comentar Publicación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="./comment_post.php" method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                              <div class="form-group">
                                  <input id="comment_post_id" name="comment_post_id" value="'.$post_id.'" style="display:none;">
                                  <input id="comment_user_id" name="comment_user_id" value="'.$_SESSION['user_id'].'" style="display:none;">
                                  <input id="post_owner_user_user_name" name="post_owner_user_user_name" value="'.$post_user_user_name.'" style="display:none;">
                                  <input id="back_url" name="back_url" value="https://'. $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'] . '#bp_' .$post_id.'" style="display:none;" >
                                  <textarea id="comment_post_'.$post_id.'" name="comment_'.$post_id.'" class="form-control" rows="2"></textarea>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              <button type="button" name="comment_submit_'. $post_id . '" id="comment_submit_'. $post_id . '" class="btn btn-primary" onclick="this.form.submit()">Comentar</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>';
                //embeds externos solo youtube
    
                    $r_post_create .= "<script>
                        var youtu_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://youtu.be/');
                        var youtube_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://www.youtube.com/watch?v=');
                        // var insta_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://www.instagram.com/p/');
                        
                        if (youtube_". $post_id ." >= 0) {
                            var youtube_". $post_id ."_length = $('#bp_". $post_id ." > p').html().length;
                            var youtube_". $post_id ."_code = $('#bp_". $post_id ." > p').html().substring(youtube_". $post_id ."_length - 11, youtube_". $post_id ."_length);
                            $('#bp_". $post_id ." > p').append('<br><iframe width=100% height=315 src=https://www.youtube.com/embed/' + youtube_". $post_id ."_code + ' frameborder=0 allow=autoplay; encrypted-media allowfullscreen></iframe>');
                        }
                        if (youtu_". $post_id ." >= 0) {
                            var youtu_". $post_id ."_length = $('#bp_". $post_id ." > p').html().length;
                            var youtu_". $post_id ."_code = $('#bp_". $post_id ." > p').html().substring(youtu_". $post_id ."_length - 11, youtu_". $post_id ."_length);
                            $('#bp_". $post_id ." > p').append('<br><iframe width=100% height=315 src=https://www.youtube.com/embed/' + youtu_". $post_id ."_code + ' frameborder=0 allow=autoplay; encrypted-media allowfullscreen></iframe>');
                        }
                        /*
                    </script>";
                }
            }
        }
        if (!isset($_GET['perfil'])) {
            $query_posts = "SELECT * FROM posts ORDER BY post_date DESC LIMIT 5;";
            $query_posts = "SELECT * FROM posts ORDER BY post_date DESC LIMIT ".$_GET['post_create_from'].", ".$_GET['post_create_to']." ;";
            $result_query_post = mysqli_query($linkli,$query_posts) or die(mysqli_error());
            $post_exist = 0;
            $number = 0;
            $r_post_create = "";
            while ($post = mysqli_fetch_array($result_query_post)){
                $post_user_id = $post['user_id'];
                $post_id = $post['post_id'];
                $post_content = $post['post_content'];
                $post_date = $post['post_date'];
                $post_attachment = $post['post_attachment'];
                if ($post_attachment != "") {
                    //$post_attachment = reimg($post_attachment, 520);
                    $post_attachment_display = "<img src='".$post_attachment."' width='100%'>";
                } else {
                    $post_attachment_display = "";
                }
                $post_link = $post['post_link'];
                $post_exist++;
                $like_onclick_vars = '"'.$post_id.'", "'.$_SESSION['user_id'].'"';
                $delete_onclick_vars = '"'.$post_id.'"';
                $number = $number +1;
                if ($post_user_id == $_SESSION['user_id']) {
                    $r_post_create .= "<div id='bp_".$post_id."' class='wall_posts'>
                    <a href='./welcome.php?perfil=".$_SESSION['user_user_name']."' >
                        <h6><img src='".$_SESSION['user_photo']."' style='height: 18px; border-radius: 50px; margin-right: 7px; ' >". $_SESSION['user_first_name'] . " " . $_SESSION['user_last_name'] ."</h6>
                    </a>
                        <p>
                            ".$post_content."
                        </p>
                            ".$post_attachment_display."
                            <small>Publicado el ". date( "d-m-Y", $post_date ) ." a las ". date( "H:i:s", $post_date )."</small><br>
                            <div class='post_tools'>
                                <a href='./edit_post.php?post_id=".$post_id."' class='btn btn-light' data-toggle='modal' data-target='#mod".$post_id."'><i class='fas fa-edit'></i></a>
                                <div class='btn btn-light'><i class='fas fa-trash' onclick='delete_post(".$delete_onclick_vars.")' ></i></div>
                                <a class='btn btn-light' style='float: right;' data-toggle='modal' data-target='#comment".$post_id."'><i class='fas fa-comments'></i></a>
                                <div id='no_like_".$post_id."' class='btn btn-light' style='float: right;' onclick='no_like(".$like_onclick_vars.")'>
                                    <i class='fas fa-thumbs-down' ></i>
                                    <span id='no_like_".$post_id."_account'></span>
                                </div>
                                <div id='like_".$post_id."' class='btn btn-light' style='float: right;' onclick='like(".$like_onclick_vars.")'>
                                    <i class='fas fa-thumbs-up' ></i>
                                    <span id='like_".$post_id."_account'></span>
                                </div>
                            </div>";
                    
                            //FUNCIONES DE LIKE
                    like_status_display($post_id, $actual_user_id);
                    // COMENTARIOS PUBLICADOS
                    $query_comment_search = "SELECT * FROM posts_comments WHERE post_id = '".$post_id."';";
                    $result_comment_search = mysqli_query($linkli,$query_comment_search) or die(mysqli_error());
                    $comment_exist = 0;
                    $comments = "";
                    while ($comment_show = mysqli_fetch_array($result_comment_search)){
                        $comment_exist = $comment_exist +1;
                        $com_user_id = $comment_show['user_id'];
                        $com_comment_id = $comment_show['comment_id'];
                        $com_comment_date = $comment_show['comment_date'];
                        $com_comment_content = $comment_show['comment_content'];
                        $query_comment_who = "SELECT * FROM users WHERE user_id = '".$com_user_id."'";
                        $query_comment_who_search = mysqli_query($linkli,$query_comment_who) or die(mysqli_error());
                        while ($query_comment_who_show = mysqli_fetch_array($query_comment_who_search)){
                            $who_user_id = $query_comment_who_show['user_id'];
                            $who_user_first_namme = $query_comment_who_show['user_first_name'];
                            $who_user_first_name = $query_comment_who_show['user_first_name'];
                            $who_user_last_name = $query_comment_who_show['user_last_name'];
                            $who_user_user_name = $query_comment_who_show['user_user_name'];
                            $who_user_photo = $query_comment_who_show['user_photo'];
    
                        }
                        $comments .= '<div class="alert alert-primary" role="alert">
                                <a href="./welcome.php?perfil='.$who_user_user_name.'" >
                                    <h6><img src="'.$who_user_photo.'" style="height: 18px; border-radius: 50px; margin-right: 7px; " >'. $who_user_first_name . ' ' . $who_user_last_name .'</h6>
                                </a>'
                            .$com_comment_content.'
                            </div>'; 
                    }
                    if ($comment_exist > 0 ) {
                        $r_post_create .= '<a class="" data-toggle="collapse" href="#collapse'.$com_comment_id.'" role="button" aria-expanded="false" aria-controls="collapse'.$com_comment_id.'">Ver '.$comment_exist.' comentarios</a>
                        <div class="collapse" id="collapse'.$com_comment_id.'">
                            '.$comments.'
                        </div>'; 
                    }
                    // FINAL DE CAJA DE PUBLICACION
                    $r_post_create .= "</div>";
                    $r_post_create .= '<div class="modal fade" id="mod'.$post_id.'" tabindex="-1" role="dialog" aria-labelledby="modLabel'.$post_id.'" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modLabel'.$post_id.'">Editar Publicación</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="./edit_post.php" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input id="post_id" name="post_id" value="'.$post_id.'" style="display:none;">
                                    <textarea id="'.$post_id.'" name="'.$post_id.'" class="form-control" rows="8">'.$post_content.'</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" name="submit_'. $post_id . '" id="submit_'. $post_id . '" class="btn btn-primary" onclick="this.form.submit()">Guardar cambios</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>';
                  // CREAR COMENTARIOS
                  $r_post_create .= '<div class="modal fade" id="comment'.$post_id.'" tabindex="-1" role="dialog" aria-labelledby="modLabel'.$post_id.'" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modLabel'.$post_id.'">Comentar Publicación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="./comment_post.php" method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                              <div class="form-group">
                                  <input id="comment_post_id" name="comment_post_id" value="'.$post_id.'" style="display:none;">
                                  <input id="comment_user_id" name="comment_user_id" value="'.$_SESSION['user_id'].'" style="display:none;">
                                  <input id="post_owner_user_user_name" name="post_owner_user_user_name" value="'.$_SESSION['user_user_name'].'" style="display:none;">
                                  <input id="back_url" name="back_url" value="https://'. $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'] . '#bp_' .$post_id.'" style="display:none;" >
                                  <textarea id="comment_post_'.$post_id.'" name="comment_'.$post_id.'" class="form-control" rows="2"></textarea>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              <button type="button" name="comment_submit_'. $post_id . '" id="comment_submit_'. $post_id . '" class="btn btn-primary" onclick="this.form.submit()">Comentar</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>';
                  $r_post_create .= "<script>
                  var youtu_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://youtu.be/');
                  var youtube_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://www.youtube.com/watch?v=');
                  if (youtube_". $post_id ." >= 0) {
                      var youtube_". $post_id ."_length = $('#bp_". $post_id ." > p').html().length;
                      var youtube_". $post_id ."_code = $('#bp_". $post_id ." > p').html().substring(youtube_". $post_id ."_length - 11, youtube_". $post_id ."_length);
                      $('#bp_". $post_id ." > p').append('<br><iframe width=100% height=315 src=https://www.youtube.com/embed/' + youtube_". $post_id ."_code + ' frameborder=0 allow=autoplay; encrypted-media allowfullscreen></iframe>');
                  }
                  if (youtu_". $post_id ." >= 0) {
                      var youtu_". $post_id ."_length = $('#bp_". $post_id ." > p').html().length;
                      var youtu_". $post_id ."_code = $('#bp_". $post_id ." > p').html().substring(youtu_". $post_id ."_length - 11, youtu_". $post_id ."_length);
                      $('#bp_". $post_id ." > p').append('<br><iframe width=100% height=315 src=https://www.youtube.com/embed/' + youtu_". $post_id ."_code + ' frameborder=0 allow=autoplay; encrypted-media allowfullscreen></iframe>');
                  }
              </script>";
                }
                $is_friend = 0;
                $query_friend_post = "SELECT * FROM friends WHERE friends_answer_date != '' AND ((users_id_a = '".$post_user_id."' AND users_id_b = '". $_SESSION["user_id"] ."') OR (users_id_a = '".$_SESSION["user_id"]."' AND users_id_b = '". $post_user_id ."')) ;";
                //$resultado .= $query_friend_post;
                $result_friend_post = mysqli_query($linkli,$query_friend_post) or die(mysqli_error());
                while ($post_show = mysqli_fetch_array($result_friend_post)){
                    $is_friend = 1;
                    $query_user = "SELECT * FROM users WHERE user_id = '".$post_user_id."';" ;
                    $result_query_user = mysqli_query($linkli,$query_user) or die(mysqli_error());
                    while ($user_show = mysqli_fetch_array($result_query_user)){
                        $post_user_user_name = $user_show['user_user_name'];
                        $post_user_first_name = $user_show['user_first_name'];
                        $post_user_last_name = $user_show['user_last_name'];
                        $post_user_photo = $user_show['user_photo'];
                        $post_user_last_name = $user_show['user_last_name'];
                        $r_post_create .= "<div id='bp_".$post_id."' class='wall_posts'>
                            <a href='./welcome.php?perfil=".$post_user_user_name."' >
                                <h6><img src='".$post_user_photo ."' style='    height: 18px; border-radius: 50px; margin-right: 7px; ' >". $post_user_first_name . " " . $post_user_last_name ."</h6>
                            </a>
                        <p>
                            ".$post_content."
                        </p>
                            ".$post_attachment_display."
                            <small>Publicado el ". date( "d-m-Y", $post_date ) ." a las ". date( "H:i:s", $post_date )."</small>
                            <div class='post_tools'>
                            <a class='btn btn-light' style='float: right;' data-toggle='modal' data-target='#comment".$post_id."'><i class='fas fa-comments'></i></a>
                            <div id='no_like_".$post_id."' class='btn btn-light' style='float: right;' onclick='no_like(".$like_onclick_vars.")'>
                                    <i class='fas fa-thumbs-down' ></i>
                                    <span id='no_like_".$post_id."_account'></span>
                                </div>
                                <div id='like_".$post_id."' class='btn btn-light' style='float: right;' onclick='like(".$like_onclick_vars.")'>
                                    <i class='fas fa-thumbs-up' ></i>
                                    <span id='like_".$post_id."_account'></span>
                                </div>
                            </div>";
                    //FUNCIONES DE LIKE
                    like_status_display($post_id, $actual_user_id);
                    // COMENTARIOS PUBLICADOS
                    $query_comment_search = "SELECT * FROM posts_comments WHERE post_id = '".$post_id."';";
                    $result_comment_search = mysqli_query($linkli,$query_comment_search) or die(mysqli_error());
                    $comment_exist = 0;
                    $comments = "";
                    while ($comment_show = mysqli_fetch_array($result_comment_search)){
                        $comment_exist = $comment_exist +1;
                        $com_user_id = $comment_show['user_id'];
                        $com_comment_id = $comment_show['comment_id'];
                        $com_comment_date = $comment_show['comment_date'];
                        $com_comment_content = $comment_show['comment_content'];
                        $query_comment_who = "SELECT * FROM users WHERE user_id = '".$com_user_id."'";
                        $query_comment_who_search = mysqli_query($linkli,$query_comment_who) or die(mysqli_error());
                        while ($query_comment_who_show = mysqli_fetch_array($query_comment_who_search)){
                            $who_user_id = $query_comment_who_show['user_id'];
                            $who_user_first_namme = $query_comment_who_show['user_first_name'];
                            $who_user_first_name = $query_comment_who_show['user_first_name'];
                            $who_user_last_name = $query_comment_who_show['user_last_name'];
                            $who_user_user_name = $query_comment_who_show['user_user_name'];
                            $who_user_photo = $query_comment_who_show['user_photo'];
                        }
                        $comments .= '<div class="alert alert-primary" role="alert">
                                <a href="./welcome.php?perfil='.$who_user_user_name.'" >
                                    <h6><img src="'.$who_user_photo.'" style="height: 18px; border-radius: 50px; margin-right: 7px; " >'. $who_user_first_name . ' ' . $who_user_last_name .'</h6>
                                </a>'
                            .$com_comment_content.'
                            </div>'; 
                    }
                    if ($comment_exist > 0 ) {
                        $r_post_create .= '<a class="" data-toggle="collapse" href="#collapse'.$com_comment_id.'" role="button" aria-expanded="false" aria-controls="collapse'.$com_comment_id.'">Ver '.$comment_exist.' comentarios</a>
                        <div class="collapse" id="collapse'.$com_comment_id.'">
                            '.$comments.'
                        </div>'; 
                    }
                    // FINAL DE CAJA DE PUBLICACION
                    $r_post_create .= "</div>";
                    // CREAR COMENTARIOS
                  $r_post_create .= '<div class="modal fade" id="comment'.$post_id.'" tabindex="-1" role="dialog" aria-labelledby="modLabel'.$post_id.'" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modLabel'.$post_id.'">Comentar Publicación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="./comment_post.php" method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                              <div class="form-group">
                                  <input id="comment_post_id" name="comment_post_id" value="'.$post_id.'" style="display:none;">
                                  <input id="comment_user_id" name="comment_user_id" value="'.$_SESSION['user_id'].'" style="display:none;">
                                  <input id="post_owner_user_user_name" name="post_owner_user_user_name" value="'.$post_user_user_name.'" style="display:none;">
                                  <input id="back_url" name="back_url" value="https://'. $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'] . '#bp_' .$post_id.'" style="display:none;" >
                                  <textarea id="comment_post_'.$post_id.'" name="comment_'.$post_id.'" class="form-control" rows="2"></textarea>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              <button type="button" name="comment_submit_'. $post_id . '" id="comment_submit_'. $post_id . '" class="btn btn-primary" onclick="this.form.submit()">Comentar</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>';
                        $r_post_create .= "<script>
                            var youtu_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://youtu.be/');
                            var youtube_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://www.youtube.com/watch?v=');
                            if (youtube_". $post_id ." >= 0) {
                                var youtube_". $post_id ."_length = $('#bp_". $post_id ." > p').html().length;
                                var youtube_". $post_id ."_code = $('#bp_". $post_id ." > p').html().substring(youtube_". $post_id ."_length - 11, youtube_". $post_id ."_length);
                                $('#bp_". $post_id ." > p').append('<br><iframe width=100% height=315 src=https://www.youtube.com/embed/' + youtube_". $post_id ."_code + ' frameborder=0 allow=autoplay; encrypted-media allowfullscreen></iframe>');
                            }
                            if (youtu_". $post_id ." >= 0) {
                                var youtu_". $post_id ."_length = $('#bp_". $post_id ." > p').html().length;
                                var youtu_". $post_id ."_code = $('#bp_". $post_id ." > p').html().substring(youtu_". $post_id ."_length - 11, youtu_". $post_id ."_length);
                                $('#bp_". $post_id ." > p').append('<br><iframe width=100% height=315 src=https://www.youtube.com/embed/' + youtu_". $post_id ."_code + ' frameborder=0 allow=autoplay; encrypted-media allowfullscreen></iframe>');
                            }
                        </script>";
                    }
                };
            }
        }
        if (isset($_GET['post_create'])) {
            echo $r_post_create;
            echo '<button onclick="see_more_post();">Ver más...</button>';
        }
    }
?>