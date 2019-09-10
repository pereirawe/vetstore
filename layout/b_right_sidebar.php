            <div id="right_bar">
                <div id="image_top">
                    <div id="image_banner" style="background: url('<?php echo $_SESSION["user_banner"]; ?>'); min-height: 115px; background-size: cover; background-position: center; text-align: center; padding: 5px;">
                        <a href="./welcome.php?perfil=<?php echo $_SESSION['user_user_name'];?>">
                            <img src="<?php echo $_SESSION["user_photo"]; ?>" width="75px" style="position: relative; bottom: -10px; border: 3px solid #ffffff; border-radius: 50%;">
                            <br><br><span><?php echo $_SESSION["user_first_name"]. " ". $_SESSION["user_last_name"]; ?></span>
                        </a>
                    </div>
                    
                </div>

                <ul class="list-group">
                    <li class="list-group-item"><a href="./welcome.php?config=<?php echo $_SESSION["user_user_name"]; ?>&section=1">Configuración del Perfil</a></li>
                    <li class="list-group-item"><a href="./welcome.php?config=<?php echo $_SESSION["user_user_name"]; ?>&section=2">Mascotas</a></li>
                    <li class="list-group-item"><a href="./welcome.php?config=<?php echo $_SESSION["user_user_name"]; ?>&section=3">Privacidad</a></li>
                    <li class="list-group-item"><a href="./welcome.php?config=<?php echo $_SESSION["user_user_name"]; ?>&section=4">Contraseña</a></li>
                    <li class="list-group-item"><a href="./welcome.php?config=<?php echo $_SESSION["user_user_name"]; ?>&section=5">Enlaces Sociales</a></li>
                    <li class="list-group-item"><a href="./welcome.php?config=<?php echo $_SESSION["user_user_name"]; ?>&section=6">Diseño y Avatar</a></li>
                </ul>
            </div>