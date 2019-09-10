<?php
    if (!isset($_GET['friends']) or $_GET['friends'] == "") {
        $user_id = $_SESSION['user_id'];
        $user_user_name = $_SESSION['user_user_name'];
        $user_first_name = $_SESSION['user_first_name'];
        $user_last_name = $_SESSION['user_last_name'];
    } else{
        $friends_display = "";
        $query_user = "SELECT * FROM users WHERE user_user_name = '". $_GET['friends'] ."';";
        $result_query_user = mysqli_query($linkli,$query_user) or die(mysqli_error());
        while ($user_info = mysqli_fetch_array($result_query_user)){
            $user_id = $user_info['user_id'];
            $user_user_name = $user_info['user_user_name'];    
            $user_first_name = $user_info['user_first_name'];    
            $user_last_name = $user_info['user_last_name'];    
            $user_photo = $user_info['user_photo'];
            $user_banner = $user_info['user_banner'];
            $pet_main_photo = $user_info['pet_main_photo'];    
        }     
        $query_friends = "SELECT * FROM friends WHERE (( users_id_a = '".$user_id."') OR ( users_id_b = '".$user_id."' )) AND users_id_a != 'u_5c5e5308b04ef' AND users_id_b != 'u_5c5e5308b04ef'  AND friends_answer_date != '';";
        // echo $query_friends;
        $result_query_friends = mysqli_query($linkli,$query_friends) or die(mysqli_error());
        $friends_account = 0;
        while ($friendship_info = mysqli_fetch_array($result_query_friends)){
            $friends_account = $friends_account +1 ;
            $users_id_a = $friendship_info['users_id_a'];
            $users_id_b = $friendship_info['users_id_b'];
            $friends_relation_id = $friendship_info['friends_relation_id'];
            if( $users_id_a == $user_id){
                $friend_user_id = $users_id_b;
            } else {
                $friend_user_id = $users_id_a;
            }
            $query_friend_user = "SELECT * FROM users WHERE user_id = '". $friend_user_id ."';";
            $result_query_friend_user = mysqli_query($linkli,$query_friend_user) or die(mysqli_error());
            while ($friend_user_info = mysqli_fetch_array($result_query_friend_user)){
                $friend_user_id = $friend_user_info['user_id'];
                $friend_user_user_name = $friend_user_info['user_user_name'];
                $friend_user_first_name = $friend_user_info['user_first_name'];
                $friend_user_last_name = $friend_user_info['user_last_name'];
                $friend_user_photo = $friend_user_info['user_photo'];
                $delete_friend_vars = '"'.$friends_relation_id.'"';
                $friends_display .= "<div id='bf_".$friends_relation_id ."'>
                        <div class='friends_user_photo' style='background: url(".$friend_user_photo.");'></div>
                        <a href='./welcome.php?perfil=".$friend_user_user_name."'>".$friend_user_first_name." ".$friend_user_last_name." </a>
                        <a href='#' class='btn btn-light' type='' style='display: inline; float: right; padding: 15px 6px; color: #c82333;' title='Eliminar de mis amigos'  onclick='delete_friend(".$delete_friend_vars.")'>
                            <span class='badge'><i class='fas fa-user-times'></i></span>
                        </a>
                        <hr>
                    </div>
                    ";
            }
        }
        $friends_display = "Tiene <span id='friends_account'>". $friends_account . "</span> amigos. <hr>" . $friends_display ;
    }
?>
    <style>
        .friends_user_photo{
            height: 120px;
            width: 120px;                        
            background-size: cover !important;
            display: inline-block;
        }
    </style>
    <div id="app_screen">
        <div class="container">
            <br>
            <div class="row">
                <div id="left_sidebar" class="col-md-3">
                    <?php include "./layout/a_left_sidebar.php"; ?>
                </div>
                <div class="col-md-6">
                    <h2> Amigos de <?php echo cortar_nombre($user_first_name, 1) ." ". cortar_nombre($user_last_name, 1); ?></h2>
                    <?php
                        if(isset($friends_display) && $friends_display !=""){
                            echo $friends_display;
                        }
                    ?>
                </div>
                <div class="col-md-3">
                    <?php include "./layout/a_right_sidebar.php"; ?>
                </div>
            </div>
        </div>
    </div>