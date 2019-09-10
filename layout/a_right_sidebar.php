                    <div id="right_bar">
                        
                        <label for="basic-url">Invita a tus amigos</label>
                        <form action="./invite.php" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">
                                    <i class="fas fa-user-plus"></i>
                                </span>
                            </div>
                                <input type="text" class="form-control" id="invite_friend_contact" name="invite_friend_contact" title="Escriba un número telefónico o una dirección de correo electrónico" aria-describedby="basic-addon_invite" placeholder="Correo o Whatsapp" required>
                                <input type="text" id="invite_friend_back_url" name="invite_friend_back_url" value="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" style="display:none;">
                                
                            </div>
                            <div style="text-align: right;">
                                <button type="submit" id="invite_friend_submit" name="invite_friend_submit" class="btn btn-dark">Invitar</button>
                            </div>
                                <script>
                                    function invite_type(){
                                        if( $.isNumeric( $('#invite_friend_contact').val() ) == false ){
                                            $('#invite_friend_contact').attr('maxlength','62');
                                            if( $('#invite_friend_contact').val().indexOf('@') > -1 ) {
                                                $('#invite_friend_contact').attr('type','email');
                                                $('#invite_friend_contact').removeAttr( "pattern" );
                                            }
                                        } else{
                                            $('#invite_friend_contact').attr('type','text');
                                            $('#invite_friend_contact').attr('maxlength', '10');
                                            $('#invite_friend_contact').attr('pattern', '[0-9]{10}');
                                            $('#invite_friend_submit').attr('title', 'Su navegador debe permitir ventanas emergentes para abrir aplicación de Whatsapp');
                                            $('#invite_friend_submit').attr('data-toggle', 'tooltip');
                                            $('#invite_friend_submit').attr('data-placement', 'bottom');
                                        }
                                    }
                                    invite_type();
                                    $('#invite_friend_contact').on('change paste keyup', function() {
                                        invite_type();
                                    });
                                    $('#reg_user_user_name').on('change paste keyup', function() {
                                        $('#reg_user_user_name').val().indexOf(' ')
                                    });
                                </script>
                        </form>
                        <hr>
                        <?php
        $friends_ask_account = 0;
        $friend_asking_accept = "";
        $friend_asked_query = "SELECT * FROM `friends` WHERE `users_id_b` = '".$_SESSION['user_id']."' AND friends_answer_date = '' ";
        $friend_asked_result = mysqli_query($linkli,$friend_asked_query) or die(mysqli_error());
        while ($friend_asked_info = mysqli_fetch_array($friend_asked_result)){
            $friends_relation_id = $friend_asked_info['friends_relation_id'];
            $users_id_a = $friend_asked_info['users_id_a'];
            $users_id_b = $friend_asked_info['users_id_b'];
            $friends_request_date = $friend_asked_info['friends_request_date'];
            $friends_answer_date = $friend_asked_info['friends_answer_date'];
            $friends_ask_account = $friends_ask_account +1;

            $friend_asking_query = "SELECT * FROM users WHERE user_id = '" . $users_id_a = $friend_asked_info['users_id_a']."';";
            $friend_asking_result = mysqli_query($linkli,$friend_asking_query) or die(mysqli_error());
            while ($friend_asking_info = mysqli_fetch_array($friend_asking_result)){
                $fai_user_id = $friend_asking_info['user_id'];
                $fai_user_user_name = $friend_asking_info['user_user_name'];
                $fai_user_first_name = $friend_asking_info['user_first_name'];
                $fai_user_last_name = $friend_asking_info['user_last_name'];
                $fai_user_photo = $friend_asking_info['user_photo'];
                $friend_asking_accept_vars = '"'.$friends_relation_id.'", "'.$fai_user_id.'", "'.$_SESSION['user_id'].'"';
                $friend_asking_accept .= "<div id='addbf_". $friends_relation_id ."' class='' style='margin-bottom: 10px; background: #ffffff;'>
                                            <a href='./welcome.php?perfil=".$fai_user_user_name."'>
                                            <img src='".$fai_user_photo."' height='50px'>
                                            <span>".$fai_user_first_name. " " .$fai_user_last_name ."</span>
                                            </a>
                                                <span  class='btn btn-primary' type='' style='display: block;' onclick='accept_friend(".$friend_asking_accept_vars.")'>
                                                    <span class='badge'><i class='fas fa-user-plus'></i></span>
                                                    Aceptar
                                                </span>
                                        </div>";
            }
        }
        if ($friends_ask_account == 0) {
            echo "<h6 id='friends_ask_account'>No tienes solicitudes de amistad pendientes</h6>";
        } else {
            echo "<h6 id='friends_ask_account' >Tienes <span id='friends_ask_account_num'>".$friends_ask_account."</span> solicitud de amistad recibidas</h6>";
            echo '<div class="list-group">';
            echo $friend_asking_accept;
            echo '</div>';
        }
    ?>
                        <hr>
                        <h6>
                            <a class="btn btn-secondary" title="Ver todos mis amigos" data-toggle="modal" data-target="#suggest_friends_Modal" style="color: #333333; background-color: rgba(0, 0, 0, 0); border-color: rgba(0, 0, 0, 0); width: 100%; text-align: left;">
                                <i class="fas fa-users"></i>
                                Ver sugerencias de amistad
                            </a>
                        </h6>
                        <div class="modal fade" id="suggest_friends_Modal" tabindex="-1" role="dialog" aria-labelledby="suggest_friends_ModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="suggest_friends_ModalLabel">Personas que quizás conoces</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <?php
                            $query_user = "select * from users WHERE user_id != '" . $_SESSION["user_id"] . "' AND user_verified_token = 'true' ORDER BY RAND()";
                            $result_query_user = mysqli_query($linkli,$query_user) or die(mysqli_error());
                            $display_suggest_friends = 0;
                        
                            while (($user_not_me_info = mysqli_fetch_array($result_query_user)) && ($display_suggest_friends <= 49 )){
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
                                    $display_suggest_friends = $display_suggest_friends +1;
                                    $friend_add_accept_vars = '"'.$user_not_me_id.'"';
                                    echo "<div id='suggests_".$user_not_me_id."' class='' style='margin-bottom: 10px; background: #ffffff;'>
                                            <img src='".$user_not_me_photo."' height='50px'>
                                            <span>". cortar_nombre($user_not_me_first_name, 1). " " . cortar_nombre($user_not_me_last_name,1) ."</span>
                                            <div id='invite_".$user_not_me_id."' class='btn btn-light' type='' style='display: inline; float: right; padding: 15px 6px;' title='Agregar de mis amigos'  onclick='add_friend(".$friend_add_accept_vars.")' >
                                                <span class='badge'><i class='fas fa-user-plus' style='color: #0069d9;'></i></span>
                                            </div>
                                        </div>";
                                }
                            }
                        ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        

                        <div id="friends_suggestions" class="list-group">
                        <?php
                            $query_user = "select * from users WHERE user_id != '" . $_SESSION["user_id"] . "' AND user_verified_token = 'true' ORDER BY RAND()";
                            $result_query_user = mysqli_query($linkli,$query_user) or die(mysqli_error());
                            $display_suggest_friends = 0;
                        
                            while (($user_not_me_info = mysqli_fetch_array($result_query_user)) && ($display_suggest_friends <= 2 )){
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
                                    $display_suggest_friends = $display_suggest_friends +1;
                                    $friend_add_accept_vars = '"'.$user_not_me_id.'"';
                                    echo "<div id='suggests_".$user_not_me_id."' class='' style='margin-bottom: 10px; background: #ffffff;'>
                                            <img src='".$user_not_me_photo."' height='50px'>
                                            <span>". cortar_nombre($user_not_me_first_name, 1). " " . cortar_nombre($user_not_me_last_name,1) ."</span>
                                            <div id='invite_".$user_not_me_id."' class='btn btn-light' type='' style='display: inline; float: right; padding: 15px 6px;' title='Agregar de mis amigos'  onclick='add_friend(".$friend_add_accept_vars.")' >
                                                <span class='badge'><i class='fas fa-user-plus' style='color: #0069d9;'></i></span>
                                            </div>
                                        </div>";
                                }
                            }
                        ?>
                        </div>
                        <!--
                        <hr>
                        <a href="https://vetstore.com.co/actividades_terminos_y_condiciones.php" target="blank">
                            <img src="https://vetstore.com.co/ads/Premio_Feb_2019.jpg" width="100%"> 
                        </a>
                        
                        
                        <hr>
                        <h5>Productos</h5>
                        <a href="https://tienda.vetstore.com.co/tus-ofertas.html" target="blank">
                            <img src="https://tienda.vetstore.com.co/media/catalog/product/p/r/promo_chunky_vitalpet_pq.jpg" width="100%">
                        </a>
                        
                        <hr>
                        <a class="btn btn-secondary" href="https://tienda.vetstore.com.co/tu-pareja-y-adopcion.html" target="blank">
                            <i class="fas fa-paw "></i>
                            <span class="mo-hide"> Tú pareja y Adopción</span>
                        </a>
                        
                        <hr>
                        <h5>Hocicudos</h5>
                        <a href="https://www.youtube.com/watch?v=DvUKxY9KOXA&t=3s" target="blank">
                            <img src="https://vetstore.com.co/ads/Anuncio.jpg" width="100%">
                        </a>
                        
                        <hr>
                        <h5>Gana Cama</h5>
                        <a href="https://vetstore.com.co/terminos_y_condiciones.php" target="blank">
                            <img src="https://vetstore.com.co/ads/Regalos_Camas_red.jpg" width="100%">
                        </a>
                        <hr>
                        <!--
                        <h5>Gana Ancheta</h5>
                        <a href="https://vetstore.com.co/terminos_y_condiciones.php" target="blank">
                            <img src="https://vetstore.com.co/ads/Ancheta_Dic_11.jpg" width="100%">
                        </a>
                        -->
                        
                        <hr>
                        
                        <div class="btn btn-secondary btn-light btn-block">
                            <button style="width: 100%">
                                <a href="https://tienda.vetstore.com.co/tu-pareja-y-adopcion.html" target="blank">
                                    <i class="fa fa-user-plus"></i>
                                    <span class="mo-hide"> Tú pareja y Adopción </span>
                                </a>
                            </button>
                            <hr>
                            <button style="width: 100%">
                                <a href="https://tienda.vetstore.com.co/pet-friendly.html" target="blank">
                                    <i class="fas fa-paw"></i>
                                    <span class="mo-hide"> Pet Friendly </span>
                                </a>
                            </button>
                            <hr>
                            <button style="width: 100%">
                                <a href="https://tienda.vetstore.com.co/noticias.html" target="blank">
                                    <i class="fa fa-plus-circle"></i>
                                    <span class="mo-hide"> Noticias </span>
                                </a>
                            </button>
                            <hr>
                            <button style="width: 100%">
                                <a href="https://tienda.vetstore.com.co/especialistas.html" target="blank">
                                    <i class="fa fa-user-md"></i>
                                    <span class="mo-hide"> Especialistas </span>
                                </a>
                            </button>
                        </div>
                        <hr>
                    </div>