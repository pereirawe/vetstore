<?php
    include './functions.php';
    include './config.php';



    $redirectURL = "https://".$_SERVER['SERVER_NAME']."/fb_login.php";
    $permissions = ['email'];
    $fb_loginURL = $helper ->getLoginURL($redirectURL, $permissions);

    $g_loginURL = $gClient->createAuthUrl();
    
    $header_action = '
        <form class="form-inline mobile-hide" method="post" action="./login.php">
            <div class="form-group">
                <input type="text" class="form-control" id="user_user_name" name="user_user_name" aria-describedby="" placeholder="Tu nombre de usuario" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control passwords" id="user_password" name="user_password" placeholder="Contraseña" required>
            </div>
            <button type="submit" id="submit" name="submit" class="btn btn-secondary">Entrar</button>
        </form>
        <a class="btn btn-secondary mobile-show" href="./login.php">Entrar</a>';
    el_header();
    ?>


    <div id="main_app_screen">
        <div class="container">
            <div class="row row-eq-height">
                <div id="home_pets" class="col-md-3 d-flex align-items-center">
                    <?php //echo $home_page_left_content; ?>
                </div>
                <div id="home_form" class="col-md-6">
                    <div style="text-align:center;"><?php echo $home_page_left_content; ?></div>
                    <div id="external_register">
                        <input type="button" onclick="window.location = '<?php echo $fb_loginURL ?>';" value="Iniciar con Facebook" class="btn btn-primary" style="text-align:center; margin: 10px 0px;">
                        <!--<input type="button" onclick="window.location = '<?php echo $g_loginURL ?>';" value="Iniciar con Google" class="btn btn-danger">-->
                    </div>
                    
                    <h3>Regístro de usuarios</h3>
                    <form method="post" action="./register_new_user.php">
                    <?php 
                        if ($form_check_user_name == "on") {
                            echo '<div class="form-group">
                                <label for="reg_user_user_name">Nombre de usuario</label>
                                <input type="text" class="form-control" id="reg_user_user_name" name="reg_user_user_name" aria-describedby="emailHelp" placeholder="Tu nombre de usuario" required>
                            </div>';
                        };
                    ?>
                        <script>
                            $('#reg_user_user_name').on('change paste keyup', function() {
                                if ($('#reg_user_user_name').val().indexOf(' ') >= 0){
                                    $('#reg_user_user_name').val($('#reg_user_user_name').val().replace( " ", "")); 
                                }
                                if ($('#reg_user_user_name').val().indexOf('@') >= 0){
                                    $('#reg_user_user_name').val($('#reg_user_user_name').val().replace( "@", "")); 
                                }
                                if ($('#reg_user_user_name').val().indexOf(',') >= 0){
                                    $('#reg_user_user_name').val($('#reg_user_user_name').val().replace( ",", "")); 
                                }
                                $('#reg_user_user_name').val($('#reg_user_user_name').val().toLowerCase());
                                
                            });
                        </script>
                        <div class="form-group">
                            <label for="user_first_name">Nombres</label>
                            <input type="text" class="form-control" id="user_first_name" name="user_first_name" aria-describedby="emailHelp" placeholder="Tus nombres" required="required">
                        </div>
                        <div class="form-group">
                            <label for="user_last_name">Apellidos</label>
                            <input type="text" class="form-control" id="user_last_name" name="user_last_name" aria-describedby="emailHelp" placeholder="Tus apellidos" required="required">
                        </div>
                        <div class="form-group">
                            <label for="user_email">Email</label>
                            <input type="email" class="form-control" id="user_email" name="user_email" aria-describedby="emailHelp" placeholder="Escribe tu email" required="required">
                        </div>
                    <?php
                        if ($form_check_phone == "on") {
                            echo '<div class="form-group">
                                <label for="user_phone">Teléfono</label>
                                <input type="tel" class="form-control" id="user_phone" name="user_phone" aria-describedby="emailHelp" placeholder="Número de móvil" required="required" maxlength="10" pattern="[0-9]{10}">
                            </div>';
                        };
                    ?>
                        
                        <label for="user_password">Contraseña</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control passwords" id="user_password_1" name="user_password" placeholder="Contraseña" pattern=".{4,}" aria-label="Recipient's username" aria-describedby="user_password-addon">
                            <div class="input-group-append">
                                <span class="input-group-text" id="user_password-addon" onmousedown="showPassword()" onmouseup="hidePassword()" ontouchstart="showPassword()" ontouchend="hidePassword()"><i class="fas fa-eye"></i></span>
                            </div>
                        </div>
                        <script>
                            function showPassword(){
                                document.getElementById('user_password_1').type = 'text';
                            }
                            function hidePassword(){
                                document.getElementById('user_password_1').type = 'password';
                            }
                        </script>

                    <?php
                        if ($form_check_phone == "on") {
                            echo '<div class="form-group">
                                <label for="user_birthdate">Fecha de nacimiento</label>
                                <input type="date" class="form-control" id="user_birthdate" name="user_birthdate" placeholder="Contraseña" max="'.date('Y-m-d', strtotime('-18 year')).'" required>
                            </div>';
                        };
                        
                    ?>
                        <p><small class="form-text text-muted">Al crear su cuenta, ustéd está de acuerdo con nuestros <a href="https://vetstore.com.co/terminos_y_condiciones.php" target="_blank">Términos y Condiciones.</a></small></p>
                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Registrarme</button>
                    </form>
                </div>
                <div id="home_pets" class="col-md-3 d-flex align-items-center">
                    <?php //echo $home_page_left_content; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("user_birthdate").value = "<?php echo date('Y-m-d', strtotime('-18 year'));?>";
    </script>

    <?php
    if (isset($_GET['msg_facebook_error'])){
        echo '<script>
				alert("Esta cuenta de Facebook no está relacionada con ningun correo electrónico o tiene error. Por favor registrese desde nuesto formulario.");
				</script>';
    }
    ?>

<?php el_footer(); ?>