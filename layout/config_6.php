<?php
    $query_user = "select * from users WHERE user_id = '" . $_SESSION["user_id"] . "'";
    $result_query_user = mysqli_query($linkli,$query_user) or die(mysqli_error());
    while ($user_info = mysqli_fetch_array($result_query_user)){
        $user_id = $user_info['user_id'];
        $user_user_name = $user_info['user_user_name'];    
        $user_banner = $user_info['user_banner'];    
        $pet_main_photo = $user_info['pet_main_photo'];    
    }
?>
                    <h3>Diseño y Avatar</h3>
                    <form id="desing_avatar" action="./config_profile.php" method="post" enctype="multipart/form-data">
                        <input id="user_id" name="user_id" value="<?php echo $user_id;?>" style="display:none;">
                        <input id="user_user_name" name="user_user_name" value="<?php echo $user_user_name;?>" style="display:none;">
                        <input id="submit_conf_6" name="submit_conf_6" value="<?php echo $user_id;?>" style="display:none;">
                        <div class="image-upload">
                            <p>Foto de perfil</small></p>
                            <label for="user_photo">
                                <i class="fas fa-edit"></i>
                                <img src="<?php echo $_SESSION['user_photo'] ."#".time(); ?>" class="img-thumbnail" />
                            </label>
                            <input type="file" class="form-control" id="user_photo" name="user_photo" aria-describedby="user_photo" style="display: none;" />
                        </div>
                        <hr>
                        <div class="image-upload">
                            <p>Fondo</small></p>
                            <label for="user_banner">
                                <i class="fas fa-edit"></i>
                                <img src="<?php echo $user_banner ."#".time(); ?>" class="img-thumbnail" />
                            </label>
                            <input type="file" class="form-control" id="user_banner" name="user_banner" aria-describedby="user_banner" style="display: none;" />
                        </div>
                        <hr>
                        <div class="image-upload">
                            <p>Foto de mascota en portada</small></p>
                            <label for="pet_main_photo">
                                <i class="fas fa-edit"></i>
                                <img src="<?php echo $pet_main_photo ."#".time(); ?>" class="img-thumbnail" />
                            </label>
                            <input type="file" class="form-control" id="pet_main_photo" name="pet_main_photo" aria-describedby="pet_main_photo" style="display: none;" onchange="this.form.submit()">
                        </div>
                        <button type="submit" id="submit_6" name="submit_6" class="btn btn-primary">Guardar</button>
                        <br>
                    </form>
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
