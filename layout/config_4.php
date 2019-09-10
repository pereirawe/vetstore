<?php
    $query_user = "select * from users WHERE user_id = '" . $_SESSION["user_id"] . "'";
    $result_query_user = mysqli_query($linkli,$query_user) or die(mysqli_error());
    while ($user_info = mysqli_fetch_array($result_query_user)){
        $user_id = $user_info['user_id'];
        $user_user_name = $user_info['user_user_name'];
        $user_password = $user_info['user_password'];
        $decryptedpassword = substr(base64_decode($user_info['user_password']), 0,-11);
        echo $decryptedpassword;

    }
?>
                    <h3>Cambiar contraseña</h3>
                    <form action="./config_profile.php" method="post">
                        <input  id="user_id" name="user_id" value="<?php echo $user_id;?>" style="display:none;">
                        <input  id="user_user_name" name="user_user_name" value="<?php echo $user_user_name;?>" style="display:none;">
                        <div class="form-group">
                            <label for="user_actual_password">Contraseña actual</label>
                            <input type="password" class="form-control" id="user_actual_password" name="user_actual_password" aria-describedby=""  required>
                        </div>
                        <div class="form-group">
                            <label for="user_new_password">Nueva Contraseña</label>
                            <input type="password" class="form-control" id="user_new_password" name="user_new_password" aria-describedby="" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="user_repeat_password">Repetir Contraseña</label>
                            <input type="password" class="form-control" id="user_repeat_password" name="user_repeat_password" aria-describedby="" placeholder="" required>
                        </div>                        
                        <button type="submit" id="submit_4" name="submit_4" class="btn btn-primary">Guardar</button>
                        <br>
                    </form>
