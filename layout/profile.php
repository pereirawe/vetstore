<?php
    if (!isset($_GET['perfil'])) {
        $query_user = "select * from users WHERE user_user_name = '" . $_SESSION["user_user_name"] . "'";    
    } else {
        $query_user = "select * from users WHERE user_user_name = '" . $_GET["perfil"] . "'";   
    }
    
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
?>
    <style>
        #profile_banner_label{
            background: url('<?php echo $user_banner; ?>');
            background-position: center;
            background-size: cover;
            padding-top: 60px;
            padding-bottom: 60px;
            margin-bottom: 15px;
            text-align: center;
            width: 100%;
            color: #ffffff;
            text-shadow: 0px 0px 15px #000000;
        }
        #app_screen{
            padding: 0px;
            margin-bottom: 10px;
        }
        #profile_banner_label .profile_banner_photo{
            background-size: cover !important;
            height: 180px;
            width: 180px;
            border: 3px solid #ffffff;
            border-radius: 100%;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px;
        }
        #profile_banner_label > img{
            border: 3px solid #ffffff;
            position: relative;
            top: 135px;
        }
        #profile_banner_label .profile_banner_pet{
            background-size: cover !important;
            background-position: center center !important;
            height: 90px;
            width: 90px;
            border: 3px solid #ffffff;
            border-radius: 100%;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: -63px;
            position: relative;
            top: -90px;
            left: 60px;
        }
        #profile_banner_label > h2{
            display: block;
            
        }
        #app_screen .col-md-8{
            padding: 0px;
        }
        #app_screen #new_post{
            background: rgba(224,224,224,.8);
            padding: 10px;
            border-radius: 7px;
        }
        #app_screen .col-md-4 > #user_info{
            background: rgba(255,255,255,.8);
            border: 1px solid rgba(224,224,224,.6);
            border-radius: 6px;
            padding: 15px;
        }
    </style>
    
    <div id="app_screen">
        <div id="profile_banner_label" class="col-md-12">
                    <?php
                        if (($_GET['perfil'] == $_SESSION['user_user_name']) ||  (!isset($_GET['perfil']))) {
                            echo'<form id="desing_avatar" action="./config_profile.php" method="post" enctype="multipart/form-data">
                                    <input id="user_id" name="user_id" value="'. $user_id.'" style="display:none;">
                                    <input id="user_user_name" name="user_user_name" value="'. $_SESSION['user_user_name'] .'" style="display:none;">
                                    <input id="submit_conf_6" name="submit_conf_6" value="return_to_profile" style="display:none;">

                                    <div class="image-upload">
                                        <label for="user_banner">
                                            <span id="user_banner_title">Cambiar Banner</span>
                                        </label>
                                        <input type="file" class="form-control" id="user_banner" name="user_banner" aria-describedby="user_banner" style="display: none;" />
                                    </div>

                                    <div class="image-upload">
                                        <label for="user_photo">
                                            <div class="profile_banner_photo" style="background: url('. $user_photo .');"></div>
                                        </label>
                                        <input type="file" class="form-control" id="user_photo" name="user_photo" aria-describedby="user_photo" style="display: none;" />
                                    </div>

                                    <div class="image-upload">
                                        <label for="pet_main_photo">
                                            <div class="profile_banner_pet" style="background: url('. $pet_main_photo .');"></div>
                                        </label>
                                        <input type="file" class="form-control" id="pet_main_photo" name="pet_main_photo" aria-describedby="pet_main_photo" style="display: none;" />
                                    </div>
                                </form>';

                            echo "<script>
                            $('.profile_banner_photo').css( 'cursor', 'pointer' );
                            $('#profile_banner_title').css( 'cursor', 'pointer' );
                            $('.profile_banner_pet').css( 'cursor', 'pointer' );
                        </script>";

                        } else {
                            echo'
                                    <div class="profile_banner_photo" style="background: url('. $user_photo .');"></div>
                                    <div class="profile_banner_pet" style="background: url('. $pet_main_photo .');"></div>';
                        }
                    ?>

                    <h2><?php echo $user_first_name. " ". $user_last_name; ?></h2>
                    <script>
                        $('#user_photo').change(function() {
                            $('#desing_avatar').submit();
                        });
                        $('#user_banner').change(function() {
                            $('#desing_avatar').submit();
                        });
                        $('#pet_main_photo').change(function() {
                            $('#desing_avatar').submit();
                        });
                    </script>
                    <?php
                        if (isset($_GET['perfil'])) {
                            if ($_GET['perfil'] != $_SESSION['user_user_name'] && $_GET['perfil'] != 'vetstore' ) {
                                $query_my_friends = "SELECT * FROM friends WHERE friends_answer_date != '' AND (users_id_a = '".$user_id."' OR users_id_b = '".$user_id."') LIMIT 4;";
                                $query_my_friends = "SELECT * FROM friends WHERE ((users_id_a = '".$user_id."' AND users_id_b = '".$_SESSION['user_id']."') OR (users_id_b = '".$user_id."' AND users_id_a = '".$_SESSION['user_id']."')) LIMIT 3;";
                                
                                //echo $query_my_friends;
                                $is_my_friend = 0;
                                $result_my_friends = mysqli_query($linkli,$query_my_friends) or die(mysqli_error());
                                while ($my_friends_info = mysqli_fetch_array($result_my_friends)){
                                    $is_my_friend = 1;
                                    $my_friends_relation_id = $my_friends_info['friends_relation_id'];
                                    $my_friends_answer_date = $my_friends_info['friends_answer_date'];
                                    $my_friends_id_a = $my_friends_info['users_id_a'];
                                    $my_friends_id_b = $my_friends_info['users_id_b'];
                                    if ($my_friends_id_a == $_SESSION['user_id']) {
                                        $my_friends_id = $my_friends_id_b;
                                    } else {
                                        $my_friends_id = $my_friends_id_a;
                                    }
                                }
                                if ($is_my_friend == 0) {
                                    $friend_add_to_vars= "'".$user_id."'";
                                    echo '<a id="friendship" href="" class="btn btn-primary" type="button" onclick="add_friend('.$friend_add_to_vars.')">
                                            <span class="badge"><i class="fas fa-user-plus"></i></span> Agregar a amigos
                                        </a>';
                                } elseif ($is_my_friend == 1 && $my_friends_answer_date == "" ) {
                                    $friend_remove_vars= "'".$my_friends_relation_id."'";
                                    echo '<a id="friendship" class="btn btn-danger" type="button" onclick="delete_friend('.$friend_remove_vars.')">
                                            <span class="badge"><i class="fas fa-user-times"></i></span> Cancelar solicitud de amistad
                                        </a>';
                                } elseif ($is_my_friend == 1 && $my_friends_answer_date != "" ) {
                                    $friend_remove_vars= "'".$my_friends_relation_id."'";
                                    echo '<a id="friendship" class="btn btn-danger" type="button" onclick="delete_friend('.$friend_remove_vars.')">
                                            <span class="badge"><i class="fas fa-user-times"></i></span> Dejar de ser amigos
                                        </a>';
                                };
                            };
                        };
                    ?>
                    </div>

        <div class="container">
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