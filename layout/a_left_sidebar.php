                    <div id="user_info">
                        <button class="btn" type="button" data-toggle="collapse" data-target="#user_info_collapse" aria-expanded="false" aria-controls="user_info_collapse" style="width: 100%; text-align: left;">
                            <span>
                                <i class="fas fa-user "></i> 
                                <span class="mo-hide">Mi perfil</span>
                                <i class="fas fa-ellipsis-v mo-hide" style="float: right;"></i>
                            </span>
                        </button>
                        <div class="collapse" id="user_info_collapse">
                            <div class="card card-body">
                                <a class="btn btn-secondary" href="https://vetstore.com.co/welcome.php?config=<?php echo $_SESSION['user_user_name']?>&section=1"> Configuración del Perfil</a>
                                <a class="btn btn-secondary" href="https://vetstore.com.co/welcome.php?photos=<?php echo $_SESSION['user_user_name']?>&section=1"> Mis Fotos</a>
                                <a class="btn btn-secondary" href="https://vetstore.com.co/welcome.php?config=<?php echo $_SESSION['user_user_name']?>&section=2"> Mascotas</a>
                                <a class="btn btn-secondary" href="https://vetstore.com.co/welcome.php?config=<?php echo $_SESSION['user_user_name']?>&section=3"> Privacidad</a>
                                <a class="btn btn-secondary" href="https://vetstore.com.co/welcome.php?config=<?php echo $_SESSION['user_user_name']?>&section=4"> Contraseña</a>
                                <a class="btn btn-secondary" href="https://vetstore.com.co/welcome.php?config=<?php echo $_SESSION['user_user_name']?>&section=5"> Enlaces Sociales</a>
                                <a class="btn btn-secondary" href="https://vetstore.com.co/welcome.php?config=<?php echo $_SESSION['user_user_name']?>&section=6"> Diseño y Avatar</a>
                            </div>
                        </div>
                        <!--<a class="btn btn-secondary" href="https://vetstore.com.co/welcome.php?config=<?php echo $_SESSION['user_user_name']?>&section=2">
                            <i class="fas fa-paw "></i>
                            <span class="mo-hide"> Mis mascotas</span>
                        </a>-->
                        <a class="btn btn-secondary" href="https://tienda.vetstore.com.co/">
                            <i class="fas fa-paw "></i>
                            <span class="mo-hide"> Tienda</span>
                        </a>
                        <?php
                            if (isset($_GET['perfil']) || isset($_GET['photos'])) {
                                if(isset($_GET['perfil'])){
                                    $photo_perfil = $_GET['perfil'];
                                } else if(isset($_GET['photos'])){
                                    $photo_perfil = $_GET['photos'];
                                }                    
                                $query_find_user = "SELECT * FROM users WHERE user_user_name = '". $photo_perfil."';";
                                $result_find_user = mysqli_query($linkli,$query_find_user) or die(mysqli_error());
                                while ($photo_user = mysqli_fetch_array($result_find_user)){
                                    $photo_user_id = $photo_user['user_id'];
                                    $photo_user_user_name = $photo_user['user_user_name'];
                                }
                                $photo_miniatures ="";
                                $query_find_photos = "SELECT * FROM posts WHERE user_id = '".$photo_user_id."' AND post_attachment != ''  ORDER BY post_date DESC LIMIT 9;";
                                $result_find_photos = mysqli_query($linkli,$query_find_photos) or die(mysqli_error());
                                while ($posted_photo = mysqli_fetch_array($result_find_photos)){
                                    $photo_post_id = $posted_photo['post_id'];
                                    $photo_post_attachment = $posted_photo['post_attachment'];
                                    $photo_miniatures .= '<a href="https://vetstore.com.co/welcome.php?perfil='. $photo_perfil.'#bp_'.$photo_post_id.'" >
                                        <div style="background: url('.$photo_post_attachment.'); width: 31%; padding-top: 31%; display: inline-block; background-size: cover; background-position: center center;" ></div>
                                        </a>';
                                }
                                if ($photo_miniatures != "") {
                                    echo "<hr>";
                                    echo '<a class="btn btn-secondary" href="./welcome.php?photos='.$photo_user_user_name.'" target=""><i class="fas fa-image"></i> Fotos</a><br>';
                                    echo $photo_miniatures;
                                }
                            }
                        ?>
                        <hr class="mo-hide">
                        <a href="https://tienda.vetstore.com.co/blog" target="blank" class="btn btn-secondary" type="" style="width: 100%; text-align: left;">
                            <span>
                                <i class="fas fa-rss"></i>
                                <span class="mo-hide"> Blog </span>
                            </span>
                        </a>
                        <hr class="mo-hide">
                        <span>
                            <i class="fas fa-question-circle" style="margin-left: 5%; text-align: left;"></i>
                            <span class="mo-hide"> Hills </span>
                        </span>
                        <a href="https://tienda.vetstore.com.co" target="blank" class="btn btn-secondary" type="" style="width: 100%; text-align: left;">
                            <img src="https://vetstore.com.co/ads/HillsDog.jpg" width="100%">
                        </a>
                        <!--<a class="mo-hide" href="https://tienda.vetstore.com.co/" target="blank" title="Tienda">
                            <img src="https://vetstore.com.co/img/vetstore-tienda.png" width="100%">
                        </a>-->
                        <hr class="mo-hide">
                        <a class="btn btn-secondary" href="./welcome.php?friends=<?php echo $_SESSION['user_user_name'];?>" title="Ver todos mis amigos">
                            <i class="fas fa-users"></i>
                            <span class="mo-hide"> Ver todos mis amigos</span>
                        </a>
                        <div class="list-group mo-hide">
                        <?php
                            $query_my_friends = "SELECT * FROM friends WHERE friends_answer_date != '' AND (users_id_a = '".$_SESSION['user_id']."' OR users_id_b = '".$_SESSION['user_id']."');" ;
                            $query_my_friends = "SELECT * FROM friends WHERE friends_answer_date != '' AND (users_id_a = '".$_SESSION['user_id']."' OR users_id_b = '".$_SESSION['user_id']."') AND users_id_a != 'u_5bb4fb25c5aeb' AND users_id_b != 'u_5bb4fb25c5aeb' ORDER BY RAND() LIMIT 3;";
                            //echo $query_my_friends;
                            $result_my_friends = mysqli_query($linkli,$query_my_friends) or die(mysqli_error());
                            while ($my_friends_info = mysqli_fetch_array($result_my_friends)){
                                $my_friends_relation_id = $my_friends_info['friends_relation_id'];
                                $my_friends_id_a = $my_friends_info['users_id_a'];
                                $my_friends_id_b = $my_friends_info['users_id_b'];
                                $friends_relation_id = $my_friends_info['friends_relation_id'];
                                if ($my_friends_id_a == $_SESSION['user_id']) {
                                    $my_friends_id = $my_friends_id_b;
                                } else {
                                    $my_friends_id = $my_friends_id_a;
                                }
                                $query_user = "select * from users WHERE user_id = '" . $my_friends_id . "' ORDER BY RAND()";
                                $result_query_user = mysqli_query($linkli,$query_user) or die(mysqli_error());
                                while ($user_not_me_info = mysqli_fetch_array($result_query_user)){
                                    $user_not_me_id = $user_not_me_info['user_id'];
                                    $user_not_me_user_name = $user_not_me_info['user_user_name'];
                                    $user_not_me_first_name = cortar_nombre($user_not_me_info['user_first_name'], 1);
                                    $user_not_me_last_name = cortar_nombre($user_not_me_info['user_last_name'], 1);
                                    $user_not_me_mail = $user_not_me_info['user_email'];
                                    $user_not_me_photo = $user_not_me_info['user_photo'];
                                    $delete_friend_vars = '"'.$friends_relation_id.'"';

                                        echo "<div id='sbf_". $friends_relation_id ."' class='' style='margin-bottom: 10px; background: #ffffff;'>
                                                <a href='./welcome.php?perfil=".$user_not_me_user_name."'>
                                                    <img src='".$user_not_me_photo."' height='50px'>
                                                    <span>".$user_not_me_first_name. " " .$user_not_me_last_name ."</span>
                                                </a>
                                                <a href='#' class='btn btn-light' type='' style='display: inline; float: right; padding: 15px 6px; color: #c82333;' title='Eliminar de mis amigos' onclick='delete_friend(".$delete_friend_vars.")'>
                                                    <span class='badge'><i class='fas fa-user-times'></i></span>
                                                </a> 
                                            </div>";
                                }
                            }
                        ?>
                        </div>
                        <hr class="mo-hide">
                    </div>