<?php
    $query_user = "select * from users WHERE user_id = '" . $_SESSION["user_id"] . "'";
    $result_query_user = mysqli_query($linkli,$query_user) or die(mysqli_error());
    while ($user_info = mysqli_fetch_array($result_query_user)){
        $user_id = $user_info['user_id'];
        $user_user_name = $user_info['user_user_name'];
        $privacy_send_messages = $user_info['privacy_send_messages'];
        if ($privacy_send_messages == "Todos") {
            $privacy_send_messages_all = "selected ";
        } else {
            $privacy_send_messages_all = "";
        }
        if ($privacy_send_messages == "Mis amigos") {
            $privacy_send_messages_my_friends = "selected ";
        } else {
            $privacy_send_messages_my_friends = "";
        }
        $privacy_see_my_friends = $user_info['privacy_see_my_friends'];
        if ($privacy_see_my_friends == "Todos") {
            $privacy_see_my_friends_all = "selected ";
        } else {
            $privacy_see_my_friends_all = "";
        }
        if ($privacy_see_my_friends == "Mis amigos") {
            $privacy_see_my_friends_my_friends = "selected ";
        } else {
            $privacy_see_my_friends_my_friends = "";
        }
        if ($privacy_see_my_friends == "Nadie") {
            $privacy_see_my_friends_nobody = "selected ";
        } else {
            $privacy_see_my_friends_nobody = "";
        }
        $privacy_post_in_wall = $user_info['privacy_post_in_wall'];
        if ($privacy_post_in_wall == "Todos") {
            $privacy_post_in_wall_all = "selected ";
        } else {
            $privacy_post_in_wall_all = "";
        }
        if ($privacy_post_in_wall == "Mis amigos") {
            $privacy_post_in_wall_my_friends = "selected ";
        } else {
            $privacy_post_in_wall_my_friends = "";
        }
        if ($privacy_post_in_wall == "Nadie") {
            $privacy_post_in_wall_nobody = "selected ";
        } else {
            $privacy_post_in_wall_nobody = "";
        }
        $privacy_see_my_birthdate = $user_info['privacy_see_my_birthdate'];
        if ($privacy_see_my_birthdate == "Todos") {
            $privacy_see_my_birthdate_all = "selected ";
        } else {
            $privacy_see_my_birthdate_all = "";
        }
        if ($privacy_see_my_birthdate == "Mis amigos") {
            $privacy_see_my_birthdate_my_friends = "selected ";
        } else {
            $privacy_see_my_birthdate_my_friends = "";
        }
        if ($privacy_see_my_birthdate == "Nadie") {
            $privacy_see_my_birthdate_nobody = "selected ";
        } else {
            $privacy_see_my_birthdate_nobody = "";
        }
    }
?>
                <h3>Configuración de privacidad</h3>
                <form action="./config_profile.php" method="post">
                    <input  id="user_id" name="user_id" value="<?php echo $user_id;?>" style="display:none;">
                    <input  id="user_user_name" name="user_user_name" value="<?php echo $user_user_name;?>" style="display:none;">
                        <div class="form-group">
                            <label for="privacy_send_messages">¿Quién puede enviarme mensajes?</label>
                            <select class="form-control" id="privacy_send_messages" name="privacy_send_messages" >
                                <option <?php echo $privacy_send_messages_all; ?> value="Todos">Todos</option>
                                <option <?php echo $privacy_send_messages_my_friends; ?> value="Mis amigos">Mis amigos</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="privacy_see_my_friends">¿Quién puede ver a mis amigos?</label>
                            <select class="form-control" id="privacy_see_my_friends" name="privacy_see_my_friends" >
                                <option <?php echo $privacy_see_my_friends_all; ?> value="Todos">Todos</option>
                                <option <?php echo $privacy_see_my_friends_my_friends; ?> value="Mis amigos">Mis amigos</option>
                                <option <?php echo $privacy_see_my_friends_nobody; ?> value="Nadie">Nadie</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="privacy_post_in_wall">¿Quién puede publicar en mi perfil?</label>
                            <select class="form-control" id="privacy_post_in_wall" name="privacy_post_in_wall" >
                                <option <?php echo $privacy_post_in_wall_all; ?> value="Todos">Todos</option>
                                <option <?php echo $privacy_post_in_wall_my_friends; ?> value="Mis amigos">Mis amigos</option>
                                <option <?php echo $privacy_post_in_wall_nobody; ?> value="Nadie">Nadie</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="privacy_see_my_birthdate">¿Quién puede ver mi cumpleaños?</label>
                            <select class="form-control" id="privacy_see_my_birthdate" name="privacy_see_my_birthdate" >
                                <option <?php echo $privacy_see_my_birthdate_all; ?> value="Todos">Todos</option>
                                <option <?php echo $privacy_see_my_birthdate_my_friends; ?> value="Mis amigos">Mis amigos</option>
                                <option <?php echo $privacy_see_my_birthdate_nobody; ?> value="Nadie">Nadie</option>
                            </select>
                        </div>
                        <button type="submit" id="submit_3" name="submit_3" class="btn btn-primary">Guardar</button>
                        <br>

                        <hr>
                        <a href="./welcome.php?delete_user_id=<?php echo $_SESSION['user_id'];?>"> </a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modal_1">
                            Deseo borrar mi cuenta
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="Modal_1" tabindex="-1" role="dialog" aria-labelledby="ModalLabel_1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModalLabel_1">¡No te vayas!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Esta acción es irreversible.</strong></p>
                                <img src="./img/sad_puppy.png" alt="" width="100%">
                                <div class="alert alert-danger mt-3" role="alert">
                                <p>Al borrar su cuenta, todas sus imágenes publicaciones, mensajes, relaciones de amistad y datos serán eliminados definitivamente.</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger" onclick="delete_user_account('<?php echo $_SESSION['user_id'];?>')">Continuar</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </form>