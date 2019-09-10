<?php
    include './functions.php';
    $header_action = '<a class="btn btn-secondary" href="./register.php">Registro</a>'; 
    if (isset($_POST['submit'])) {
        $user_user_name = $_POST['user_user_name'];
        $user_password = $_POST['user_password'];
        $query_user = "select * from users WHERE user_user_name = '" .$user_user_name. "'";        
        $result_email = mysqli_query($linkli,$query_user) or die(mysqli_error());
        $registered_user=0;
        while ($users_session = mysqli_fetch_array($result_email)){
        $_SESSION['user_id'] = $users_session['user_id'];
        $_SESSION['user_user_name'] = $users_session['user_user_name'];
            $_SESSION['user_first_name'] = $users_session['user_first_name'];
            $_SESSION['user_last_name'] = $users_session['user_last_name'];
            $_SESSION['user_photo'] = $users_session['user_photo'];
            $_SESSION['user_banner'] = $users_session['user_banner'];
			$_SESSION['user_email'] = $users_session['user_email'];
            $_SESSION['user_password'] = $users_session['user_password'];
            $_SESSION['date'] = date("Y-m-d h:i:sa");
            $_SESSION['token_status'] = $users_session['user_verified_token'];
			$_SESSION['user_email'] = $users_session['user_email'];
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $_SESSION['ip'] = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $_SESSION['ip'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
            }
            $_SESSION['user_rol'] = $users_session['user_rol'];
            $decryptedpassword = substr(base64_decode($_SESSION['user_password']), 0,-11);
            $registered_user =  $registered_user + 1;
            if (isset($_SESSION['user_id'])) {
                log_create("login", "From site", $_SESSION['user_id']);
            }
            if ($_SESSION['token_status'] != "true") {
				echo '<h1>¡El correo no esta activo aún! </h1><br>
				<p>Recibirá una notificación en su correo con un enlace para activar su cuenta.</p>';
				$registered_user = 0;
            }
        }
        if ($registered_user > 0) {
			if ($_POST['user_password'] == $decryptedpassword) {
                /*
                if (!isset($_SESSION['user_name'])) {
					$_SESSION['user_name'] = $user_name;
					$_SESSION['user_email'] = $user_email;
                }
                */
            
			echo '<script>
					window.location.replace("./welcome.php");
				</script>';
			} else{
                echo "<script type='text/javascript'>alert('Clave Incorrecta');</script>";
				echo '<script>
					// window.location.replace("./login.php");
				</script>';
			}
			/*echo '<script>
					setTimeout(function() {window.location.replace("./")}, 15000);
				</script>';*/
		} else {
            echo "<script type='text/javascript'>alert('¡No estás registrado aún!');</script>";
			echo '<script>
                    //setTimeout(function() {window.location.replace("./register.php")}, 15000);
                    window.location.replace("./register.php");
				</script>';
		}
    }
    el_header();
?>
    <div id="main_app_screen">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                </div>
                <div id="home_form" class="col-md-6">
                    <h3>Inicio de sesión</h3>
                    <form id="form_" method="post" action="">
                        <div class="form-group">
                            <label for="user_user_name">Nombre de usuario</label>
                            <input type="text" class="form-control" id="user_user_name" name="user_user_name" aria-describedby="" placeholder="Tu nombre de usuario" required="required">
                        </div>
                        <div class="form-group">
                            <label for="user_password">Contraseña</label>
                            <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Contraseña" required>
                        </div>
                        <p><small class="form-text text-muted"><a href="https://vetstore.com.co/password_recover.php">Olvidé mi contraseña</a></small></p>
                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Entrar</button>
                        <p id="loadingtext" style="text-align:center; display:none;" >Un momento ...</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        
        const form_ = document.getElementById('form_');
        form_.addEventListener('submit', e => {
            
            $("#submit").hide();
            $("#loadingtext").show();
        })
    </script>    
<?php el_footer(); ?>