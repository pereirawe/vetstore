    <?php
    include './functions.php';
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    secure_session();
    $header_action = '<div class="dropdown">
        <a href="../welcome.php?perfil='.$_SESSION['user_user_name'].'">
            <img src="'. $_SESSION["user_photo"] .'" height="36px" width="auto">
        </a>
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bars"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="../welcome.php?perfil='.$_SESSION['user_user_name'].'">Mi perfil</a>
            <a class="dropdown-item" href="../welcome.php?config='.$_SESSION['user_user_name'].'">Configuración</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../logout.php">Cerrar sesión</a>
        </div>
        </div>';
    el_header();
?>
    <script src="../include/wysihtml/dist/minified/wysihtml.min.js"></script>
    <script src="../include/wysihtml/dist/minified/wysihtml.all-commands.min.js"></script>
    <script src="../include/wysihtml/dist/minified/wysihtml.table_editing.min.js"></script>
    <script src="../include/wysihtml/dist/minified/wysihtml.toolbar.min.js"></script>
    <script src="../include/wysihtml/parser_rules/advanced_and_extended.js"></script>
    <style>
        form{
            background: rgba(224, 224, 224, .8);
            padding: 15px;
        }
        .form-group *{
            border-radius: 0px;
            border: none;
        }
    </style>
    <div id="app_screen" style="backgound: red;">
        <div class="container">
        <form method="post" action="./db_updater.php" enctype="multipart/form-data">
            <h3>Roles</h3>
            <div class="form-group">
                <label for="user_rol_admin">Correos de administradores</label>
                <textarea type="text" class="form-control" id="user_rol_admin" name="user_rol_admin" aria-describedby="emailHelp" placeholder="Escriba los correos separados por comas." required ><?php echo $user_rol_admin; ?></textarea>
            </div>
            <div class="form-group">
                <label for="user_rol_manager">Correos de gerentes</label>
                <textarea type="text" class="form-control" id="user_rol_manager" name="user_rol_manager" aria-describedby="emailHelp" placeholder="Escriba los correos separados por comas." ><?php echo $user_rol_manager; ?></textarea>
            </div>

            <hr>
            <h3>Redes sociales</h3>
            <div class="form-group">
                <label for="url_facebook">Enlace de Facebook</label>
                <input type="text" class="form-control" id="url_facebook" name="url_facebook" aria-describedby="emailHelp" placeholder="" value="<?php echo $url_facebook; ?>">
            </div>
            <div class="form-group">
                <label for="url_instagram">Enlace de Instagram</label>
                <input type="text" class="form-control" id="url_instagram" name="url_instagram" aria-describedby="emailHelp" placeholder="" value="<?php echo $url_instagram; ?>">
            </div>
            <div class="form-group">
                <label for="url_google_plus">Enlace de Google Plus</label>
                <input type="text" class="form-control" id="url_google_plus" name="url_google_plus" aria-describedby="emailHelp" placeholder="" value="<?php echo $url_google_plus; ?>">
            </div>
            <div class="form-group">
                <label for="url_twitter">Enlace de Twitter</label>
                <input type="text" class="form-control" id="url_twitter" name="url_twitter" aria-describedby="emailHelp" placeholder="" value="<?php echo $url_twitter; ?>">
            </div>
            <div class="form-group">
                <label for="url_youtube">Enlace de Youtube</label>
                <input type="text" class="form-control" id="url_youtube" name="url_youtube" aria-describedby="emailHelp" placeholder="" value="<?php echo $url_youtube; ?>">
            </div>

            <hr>
            <h3>Páginas de inicio</h3>
            <div class="form-group">
                <div class="image-upload">
                    <p>Logo del HEADER <small>.png*</small></p>
                    <label for="home_page_header_logo">
                        <i class="fas fa-edit"></i>
                        <img src="<?php echo $home_page_header_logo."#".time(); ?>" class="img-thumbnail" />
                    </label>
                    <input type="file" class="form-control" id="home_page_header_logo" name="home_page_header_logo" aria-describedby="emailHelp" placeholder="" />
                </div>
            </div>

            <div class="form-group">
                <label for="home_page_header_background">Color de fondo del HEADER</label>
                <input type="text" class="form-control" id="home_page_header_background" name="home_page_header_background" aria-describedby="emailHelp" placeholder="rgba(0,0,0,1)" value="<?php echo $home_page_header_background; ?>" required>
            </div>

            <div class="form-group">
                <div class="image-upload">
                    <p>Fondo del HEADER</p>
                    <label for="home_page_background">
                        <i class="fas fa-edit"></i>
                        <img src="<?php echo $home_page_background."#".time(); ?>" class="img-thumbnail" />
                    </label>
                    <input type="file" class="form-control" id="home_page_background" name="home_page_background" aria-describedby="emailHelp" placeholder="" />
                </div>
            </div>

            <div class="form-group">

                <label for="home_page_left_content">Contenido de panel izquierda</label>
                
                <nav id="wysihtml-toolbar_0" class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" data-wysihtml-command="bold">
                                    <i class="fas fa-bold"></i>
                                </a> 
                            </li>
                            <li class="nav-item">   
                                <a class="nav-link" data-wysihtml-command="italic">
                                    <i class="fas fa-italic"></i>
                                </a>   
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="underline">
                                    <i class="fas fa-underline"></i>
                                </a>    
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tamaño
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h1">
                                        <h1>Titulo 1</h1>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h2">
                                        <h2>Titulo 2</h2>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h3">
                                        <h3>Titulo 3</h3>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h4">
                                        <h4>Titulo 4</h4>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h5">
                                        <h5>Titulo 5</h5>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="p">
                                        <p>Texto normal</p>
                                    </a>
                                </div>
                            </li>
                            <!--
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyLeft">
                                <i class="fas fa-align-left"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyCenter">
                                <i class="fas fa-align-center"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyRight">
                                <i class="fas fa-align-right"></i>
                                </a>    
                            </li>-->
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertUnorderedList">
                                    <i class="fas fa-list-ul"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertOrderedList">
                                    <i class="fas fa-list-ol"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-action="change_view">
                                    <i class="fas fa-code"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </nav>
                <textarea type="text" class="form-control" id="wysihtml-textarea_1" name="home_page_left_content" aria-describedby="emailHelp" placeholder="<html></html>"><?php echo $home_page_left_content; ?></textarea>
                <script>
                    $(function() {
                        var editor = new wysihtml.Editor("wysihtml-textarea_1", { // id of textarea element
                            toolbar:      "wysihtml-toolbar_0", // id of toolbar element
                            parserRules:  wysihtmlParserRules // defined in parser rules set 
                            });
                    });
                </script>
            </div>


            <h3>Formulario de Registro</h3>
            <div class="form-group">
                <input type="checkbox" class="" id="form_check_user_name" name="form_check_user_name" aria-describedby="emailHelp" placeholder="" <?php if($form_check_user_name == "on"){ echo "checked";};?> > Nombre de usuario<br>
                <input type="checkbox" class="" id="form_check_phone" name="form_check_phone" aria-describedby="emailHelp" placeholder="" <?php if($form_check_phone == "on"){ echo "checked";};?>> Número de teléfono<br>
                <input type="checkbox" class="" id="form_check_birthdate" name="form_check_birthdate" aria-describedby="emailHelp" placeholder="" <?php if($form_check_birthdate == "on"){ echo "checked";};?>> Fecha de Nacimiento<br><br>
                
                <div style="display:none;">
                <input type="checkbox" class="" id="form_check_opt_1" name="form_check_opt_1" aria-describedby="emailHelp" placeholder="" <?php if($form_check_opt_1 == "on"){ echo "checked";};?>> Campo Opcional 1<br>
                <label for="form_opt_1_title"><h5>TÍtulo del campo Opcional 1</h5></label>
                <input type="text" class="form-control" id="form_opt_1_title" name="form_opt_1_title" aria-describedby="emailHelp" placeholder="" value="<?php echo $form_opt_1_title; ?>">
                <br>
                <input type="checkbox" class="" id="form_check_opt_2" name="form_check_opt_2" aria-describedby="emailHelp" placeholder="" <?php if($form_check_opt_2 == "on"){ echo "checked";};?>> Campo Opcional 2<br>
                <label for="form_opt_2_title"><h5>TÍtulo del campo Opcional 2</h5></label>
                <input type="text" class="form-control" id="form_opt_2_title" name="form_opt_2_title" aria-describedby="emailHelp" placeholder="" value="<?php echo $form_opt_2_title; ?>">
                </div>
            </div>
            <hr>
            <h3>Páginas internas</h3>
            <div class="form-group">
                <div class="image-upload">
                    <p>Logo del HEADER <small>.png*</small></p>
                    <label for="page_header_logo">
                        <i class="fas fa-edit"></i>
                        <img src="<?php echo $page_header_logo."#".time(); ?>" class="img-thumbnail" />
                    </label>
                    <input type="file" class="form-control" id="page_header_logo" name="page_header_logo" aria-describedby="emailHelp" placeholder="" />
                </div>
            </div>
            <div class="form-group">
                <label for="page_header_background">Color de fondo del HEADER</label>
                <input type="text" class="form-control" id="page_header_background" name="page_header_background" aria-describedby="emailHelp" placeholder="rgba(0,0,0,1)" value="<?php echo $page_header_background; ?>" required>
            </div>
            <div class="form-group">
                <div class="image-upload">
                    <p>Fondo del HEADER</p>
                    <label for="page_background">
                        <i class="fas fa-edit"></i>
                        <img src="<?php echo $page_background."#".time(); ?>" class="img-thumbnail" />
                    </label>
                    <input type="file" class="form-control" id="page_background" name="page_background" aria-describedby="emailHelp" placeholder="" />
                    
                </div>
            </div>
            <hr>
            <h3>Paginas Estáticas</h3>
            <h5>Página 1</h5>
            <div class="form-group">
                <label for="cms_page_1_title">TÍtulo</label>
                <input type="text" class="form-control" id="cms_page_1_title" name="cms_page_1_title" aria-describedby="emailHelp" placeholder="" value="<?php echo $cms_page_1_title; ?>">
            </div>
            <div class="form-group">
                <label for="cms_page_1_content">Contenido</label>
                <nav id="wysihtml-toolbar_2" class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" data-wysihtml-command="bold">
                                    <i class="fas fa-bold"></i>
                                </a> 
                            </li>
                            <li class="nav-item">   
                                <a class="nav-link" data-wysihtml-command="italic">
                                    <i class="fas fa-italic"></i>
                                </a>   
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="underline">
                                    <i class="fas fa-underline"></i>
                                </a>    
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tamaño
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h1">
                                        <h1>Titulo 1</h1>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h2">
                                        <h2>Titulo 2</h2>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h3">
                                        <h3>Titulo 3</h3>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h4">
                                        <h4>Titulo 4</h4>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h5">
                                        <h5>Titulo 5</h5>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="p">
                                        <p>Texto normal</p>
                                    </a>
                                </div>
                            </li>
                            <!--
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyLeft">
                                <i class="fas fa-align-left"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyCenter">
                                <i class="fas fa-align-center"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyRight">
                                <i class="fas fa-align-right"></i>
                                </a>    
                            </li>-->
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertUnorderedList">
                                    <i class="fas fa-list-ul"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertOrderedList">
                                    <i class="fas fa-list-ol"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-action="change_view">
                                    <i class="fas fa-code"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </nav>
                <textarea type="text" class="form-control" id="cms_page_1_content" name="cms_page_1_content" aria-describedby="emailHelp" placeholder="<html></html>"><?php echo $cms_page_1_content; ?></textarea>
                 <script>
                    $(function() {
                        var editor = new wysihtml.Editor("cms_page_1_content", { // id of textarea element
                            toolbar:      "wysihtml-toolbar_1", // id of toolbar element
                            parserRules:  wysihtmlParserRules // defined in parser rules set 
                            });
                    });
                </script>
            </div>
            <h5>Página 2</h5>
            <div class="form-group">
                <label for="cms_page_2_title">TÍtulo</label>
                <input type="text" class="form-control" id="cms_page_2_title" name="cms_page_2_title" aria-describedby="emailHelp" placeholder="" value="<?php echo $cms_page_2_title; ?>">
            </div>
            <div class="form-group">
                <label for="cms_page_2_content">Contenido</label>
                <nav id="wysihtml-toolbar_1" class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" data-wysihtml-command="bold">
                                    <i class="fas fa-bold"></i>
                                </a> 
                            </li>
                            <li class="nav-item">   
                                <a class="nav-link" data-wysihtml-command="italic">
                                    <i class="fas fa-italic"></i>
                                </a>   
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="underline">
                                    <i class="fas fa-underline"></i>
                                </a>    
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tamaño
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h1">
                                        <h1>Titulo 1</h1>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h2">
                                        <h2>Titulo 2</h2>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h3">
                                        <h3>Titulo 3</h3>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h4">
                                        <h4>Titulo 4</h4>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h5">
                                        <h5>Titulo 5</h5>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="p">
                                        <p>Texto normal</p>
                                    </a>
                                </div>
                            </li>
                            <!--
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyLeft">
                                <i class="fas fa-align-left"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyCenter">
                                <i class="fas fa-align-center"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyRight">
                                <i class="fas fa-align-right"></i>
                                </a>    
                            </li>-->
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertUnorderedList">
                                    <i class="fas fa-list-ul"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertOrderedList">
                                    <i class="fas fa-list-ol"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-action="change_view">
                                    <i class="fas fa-code"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </nav>
                <textarea type="text" class="form-control" id="cms_page_2_content" name="cms_page_2_content" aria-describedby="emailHelp" placeholder="<html></html>"><?php echo $cms_page_2_content; ?></textarea>
                 <script>
                    $(function() {
                        var editor = new wysihtml.Editor("cms_page_2_content", { // id of textarea element
                            toolbar:      "wysihtml-toolbar_2", // id of toolbar element
                            parserRules:  wysihtmlParserRules // defined in parser rules set 
                            });
                    });
                </script>
            </div>
            <h5>Página 3</h5>
            <div class="form-group">
                <label for="cms_page_3_title">TÍtulo</label>
                <input type="text" class="form-control" id="cms_page_3_title" name="cms_page_3_title" aria-describedby="emailHelp" placeholder="" value="<?php echo $cms_page_3_title; ?>">
            </div>
            <div class="form-group">
                <label for="cms_page_3_content">Contenido</label>
                <nav id="wysihtml-toolbar_3" class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" data-wysihtml-command="bold">
                                    <i class="fas fa-bold"></i>
                                </a> 
                            </li>
                            <li class="nav-item">   
                                <a class="nav-link" data-wysihtml-command="italic">
                                    <i class="fas fa-italic"></i>
                                </a>   
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="underline">
                                    <i class="fas fa-underline"></i>
                                </a>    
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tamaño
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h1">
                                        <h1>Titulo 1</h1>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h2">
                                        <h2>Titulo 2</h2>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h3">
                                        <h3>Titulo 3</h3>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h4">
                                        <h4>Titulo 4</h4>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h5">
                                        <h5>Titulo 5</h5>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="p">
                                        <p>Texto normal</p>
                                    </a>
                                </div>
                            </li>
                            <!--
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyLeft">
                                <i class="fas fa-align-left"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyCenter">
                                <i class="fas fa-align-center"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyRight">
                                <i class="fas fa-align-right"></i>
                                </a>    
                            </li>-->
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertUnorderedList">
                                    <i class="fas fa-list-ul"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertOrderedList">
                                    <i class="fas fa-list-ol"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-action="change_view">
                                    <i class="fas fa-code"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </nav>
                <textarea type="text" class="form-control" id="cms_page_3_content" name="cms_page_3_content" aria-describedby="emailHelp" placeholder="<html></html>"><?php echo $cms_page_3_content; ?></textarea>
                <script>
                    $(function() {
                        var editor = new wysihtml.Editor("cms_page_3_content", { // id of textarea element
                            toolbar:      "wysihtml-toolbar_3", // id of toolbar element
                            parserRules:  wysihtmlParserRules // defined in parser rules set 
                            });
                    });
                </script>
            </div>
            <h5>Página 4</h5>
            <div class="form-group">
                <label for="cms_page_4_title">TÍtulo</label>
                <input type="text" class="form-control" id="cms_page_4_title" name="cms_page_4_title" aria-describedby="emailHelp" placeholder="" value="<?php echo $cms_page_4_title; ?>">
            </div>
            <div class="form-group">
                <label for="cms_page_4_content">Contenido</label>
                <nav id="wysihtml-toolbar_4" class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" data-wysihtml-command="bold">
                                    <i class="fas fa-bold"></i>
                                </a> 
                            </li>
                            <li class="nav-item">   
                                <a class="nav-link" data-wysihtml-command="italic">
                                    <i class="fas fa-italic"></i>
                                </a>   
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="underline">
                                    <i class="fas fa-underline"></i>
                                </a>    
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tamaño
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h1">
                                        <h1>Titulo 1</h1>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h2">
                                        <h2>Titulo 2</h2>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h3">
                                        <h3>Titulo 3</h3>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h4">
                                        <h4>Titulo 4</h4>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h5">
                                        <h5>Titulo 5</h5>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="p">
                                        <p>Texto normal</p>
                                    </a>
                                </div>
                            </li>
                            <!--
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyLeft">
                                <i class="fas fa-align-left"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyCenter">
                                <i class="fas fa-align-center"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyRight">
                                <i class="fas fa-align-right"></i>
                                </a>    
                            </li>-->
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertUnorderedList">
                                    <i class="fas fa-list-ul"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertOrderedList">
                                    <i class="fas fa-list-ol"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-action="change_view">
                                    <i class="fas fa-code"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </nav>
                <textarea type="text" class="form-control" id="cms_page_4_content" name="cms_page_4_content" aria-describedby="emailHelp" placeholder="<html></html>"><?php echo $cms_page_4_content; ?></textarea>
                <script>
                    $(function() {
                        var editor = new wysihtml.Editor("cms_page_4_content", { // id of textarea element
                            toolbar:      "wysihtml-toolbar_4", // id of toolbar element
                            parserRules:  wysihtmlParserRules // defined in parser rules set 
                            });
                    });
                </script>
            </div>
            <h5>Página 5</h5>
            <div class="form-group">
                <label for="cms_page_5_title">TÍtulo</label>
                <input type="text" class="form-control" id="cms_page_5_title" name="cms_page_5_title" aria-describedby="emailHelp" placeholder="" value="<?php echo $cms_page_5_title; ?>">
            </div>
            <div class="form-group">
                <label for="cms_page_5_content">Contenido</label>
                <nav id="wysihtml-toolbar_5" class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" data-wysihtml-command="bold">
                                    <i class="fas fa-bold"></i>
                                </a> 
                            </li>
                            <li class="nav-item">   
                                <a class="nav-link" data-wysihtml-command="italic">
                                    <i class="fas fa-italic"></i>
                                </a>   
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="underline">
                                    <i class="fas fa-underline"></i>
                                </a>    
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tamaño
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h1">
                                        <h1>Titulo 1</h1>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h2">
                                        <h2>Titulo 2</h2>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h3">
                                        <h3>Titulo 3</h3>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h4">
                                        <h4>Titulo 4</h4>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h5">
                                        <h5>Titulo 5</h5>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="p">
                                        <p>Texto normal</p>
                                    </a>
                                </div>
                            </li>
                            <!--
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyLeft">
                                <i class="fas fa-align-left"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyCenter">
                                <i class="fas fa-align-center"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyRight">
                                <i class="fas fa-align-right"></i>
                                </a>    
                            </li>-->
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertUnorderedList">
                                    <i class="fas fa-list-ul"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertOrderedList">
                                    <i class="fas fa-list-ol"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-action="change_view">
                                    <i class="fas fa-code"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </nav>
                <textarea type="text" class="form-control" id="cms_page_5_content" name="cms_page_5_content" aria-describedby="emailHelp" placeholder="<html></html>"><?php echo $cms_page_5_content; ?></textarea>
                <script>
                    $(function() {
                        var editor = new wysihtml.Editor("cms_page_5_content", { // id of textarea element
                            toolbar:      "wysihtml-toolbar_5", // id of toolbar element
                            parserRules:  wysihtmlParserRules // defined in parser rules set 
                            });
                    });
                </script>
            </div>
            <h5>Página 6</h5>
            <div class="form-group">
                <label for="cms_page_6_title">TÍtulo</label>
                <input type="text" class="form-control" id="cms_page_6_title" name="cms_page_6_title" aria-describedby="emailHelp" placeholder="" value="<?php echo $cms_page_6_title; ?>">
            </div>
            <div class="form-group">
                <label for="cms_page_6_content">Contenido</label>
                <nav id="wysihtml-toolbar_6" class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" data-wysihtml-command="bold">
                                    <i class="fas fa-bold"></i>
                                </a> 
                            </li>
                            <li class="nav-item">   
                                <a class="nav-link" data-wysihtml-command="italic">
                                    <i class="fas fa-italic"></i>
                                </a>   
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="underline">
                                    <i class="fas fa-underline"></i>
                                </a>    
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tamaño
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h1">
                                        <h1>Titulo 1</h1>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h2">
                                        <h2>Titulo 2</h2>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h3">
                                        <h3>Titulo 3</h3>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h4">
                                        <h4>Titulo 4</h4>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h5">
                                        <h5>Titulo 5</h5>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="p">
                                        <p>Texto normal</p>
                                    </a>
                                </div>
                            </li>
                            <!--
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyLeft">
                                <i class="fas fa-align-left"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyCenter">
                                <i class="fas fa-align-center"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyRight">
                                <i class="fas fa-align-right"></i>
                                </a>    
                            </li>-->
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertUnorderedList">
                                    <i class="fas fa-list-ul"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertOrderedList">
                                    <i class="fas fa-list-ol"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-action="change_view">
                                    <i class="fas fa-code"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </nav>
                <textarea type="text" class="form-control" id="cms_page_6_content" name="cms_page_6_content" aria-describedby="emailHelp" placeholder="<html></html>"><?php echo $cms_page_6_content; ?></textarea>
                <script>
                    $(function() {
                        var editor = new wysihtml.Editor("cms_page_6_content", { // id of textarea element
                            toolbar:      "wysihtml-toolbar_6", // id of toolbar element
                            parserRules:  wysihtmlParserRules // defined in parser rules set 
                            });
                    });
                </script>
            </div>
            <h5>Página 7</h5>
            <div class="form-group">
                <label for="cms_page_7_title">TÍtulo</label>
                <input type="text" class="form-control" id="cms_page_7_title" name="cms_page_7_title" aria-describedby="emailHelp" placeholder="" value="<?php echo $cms_page_7_title; ?>">
            </div>
            <div class="form-group">
                <label for="cms_page_7_content">Contenido</label>
                <nav id="wysihtml-toolbar_7" class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" data-wysihtml-command="bold">
                                    <i class="fas fa-bold"></i>
                                </a> 
                            </li>
                            <li class="nav-item">   
                                <a class="nav-link" data-wysihtml-command="italic">
                                    <i class="fas fa-italic"></i>
                                </a>   
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="underline">
                                    <i class="fas fa-underline"></i>
                                </a>    
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tamaño
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h1">
                                        <h1>Titulo 1</h1>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h2">
                                        <h2>Titulo 2</h2>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h3">
                                        <h3>Titulo 3</h3>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h4">
                                        <h4>Titulo 4</h4>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h5">
                                        <h5>Titulo 5</h5>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="p">
                                        <p>Texto normal</p>
                                    </a>
                                </div>
                            </li>
                            <!--
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyLeft">
                                <i class="fas fa-align-left"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyCenter">
                                <i class="fas fa-align-center"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyRight">
                                <i class="fas fa-align-right"></i>
                                </a>    
                            </li>-->
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertUnorderedList">
                                    <i class="fas fa-list-ul"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertOrderedList">
                                    <i class="fas fa-list-ol"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-action="change_view">
                                    <i class="fas fa-code"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </nav>
                <textarea type="text" class="form-control" id="cms_page_7_content" name="cms_page_7_content" aria-describedby="emailHelp" placeholder="<html></html>"><?php echo $cms_page_7_content; ?></textarea>
                <script>
                    $(function() {
                        var editor = new wysihtml.Editor("cms_page_7_content", { // id of textarea element
                            toolbar:      "wysihtml-toolbar_7", // id of toolbar element
                            parserRules:  wysihtmlParserRules // defined in parser rules set 
                            });
                    });
                </script>
            </div>
            <h5>Página 8</h5>
            <div class="form-group">
                <label for="cms_page_8_title">TÍtulo</label>
                <input type="text" class="form-control" id="cms_page_8_title" name="cms_page_8_title" aria-describedby="emailHelp" placeholder="" value="<?php echo $cms_page_8_title; ?>">
            </div>
            <div class="form-group">
                <label for="cms_page_8_content">Contenido</label>
                <nav id="wysihtml-toolbar_8" class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" data-wysihtml-command="bold">
                                    <i class="fas fa-bold"></i>
                                </a> 
                            </li>
                            <li class="nav-item">   
                                <a class="nav-link" data-wysihtml-command="italic">
                                    <i class="fas fa-italic"></i>
                                </a>   
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="underline">
                                    <i class="fas fa-underline"></i>
                                </a>    
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tamaño
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h1">
                                        <h1>Titulo 1</h1>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h2">
                                        <h2>Titulo 2</h2>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h3">
                                        <h3>Titulo 3</h3>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h4">
                                        <h4>Titulo 4</h4>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h5">
                                        <h5>Titulo 5</h5>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="p">
                                        <p>Texto normal</p>
                                    </a>
                                </div>
                            </li>
                            <!--
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyLeft">
                                <i class="fas fa-align-left"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyCenter">
                                <i class="fas fa-align-center"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyRight">
                                <i class="fas fa-align-right"></i>
                                </a>    
                            </li>-->
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertUnorderedList">
                                    <i class="fas fa-list-ul"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertOrderedList">
                                    <i class="fas fa-list-ol"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-action="change_view">
                                    <i class="fas fa-code"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </nav>
                <textarea type="text" class="form-control" id="cms_page_8_content" name="cms_page_8_content" aria-describedby="emailHelp" placeholder="<html></html>"><?php echo $cms_page_8_content; ?></textarea>
                <script>
                    $(function() {
                        var editor = new wysihtml.Editor("cms_page_8_content", { // id of textarea element
                            toolbar:      "wysihtml-toolbar_8", // id of toolbar element
                            parserRules:  wysihtmlParserRules // defined in parser rules set 
                            });
                    });
                </script>
            </div>
            <h5>Página 9</h5>
            <div class="form-group">
                <label for="cms_page_9_title">TÍtulo</label>
                <input type="text" class="form-control" id="cms_page_9_title" name="cms_page_9_title" aria-describedby="emailHelp" placeholder="" value="<?php echo $cms_page_9_title; ?>">
            </div>
            <div class="form-group">
                <label for="cms_page_9_content">Contenido</label>
                <nav id="wysihtml-toolbar_9" class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" data-wysihtml-command="bold">
                                    <i class="fas fa-bold"></i>
                                </a> 
                            </li>
                            <li class="nav-item">   
                                <a class="nav-link" data-wysihtml-command="italic">
                                    <i class="fas fa-italic"></i>
                                </a>   
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="underline">
                                    <i class="fas fa-underline"></i>
                                </a>    
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tamaño
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h1">
                                        <h1>Titulo 1</h1>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h2">
                                        <h2>Titulo 2</h2>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h3">
                                        <h3>Titulo 3</h3>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h4">
                                        <h4>Titulo 4</h4>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h5">
                                        <h5>Titulo 5</h5>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="p">
                                        <p>Texto normal</p>
                                    </a>
                                </div>
                            </li>
                            <!--
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyLeft">
                                <i class="fas fa-align-left"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyCenter">
                                <i class="fas fa-align-center"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyRight">
                                <i class="fas fa-align-right"></i>
                                </a>    
                            </li>-->
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertUnorderedList">
                                    <i class="fas fa-list-ul"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertOrderedList">
                                    <i class="fas fa-list-ol"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-action="change_view">
                                    <i class="fas fa-code"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </nav>
                <textarea type="text" class="form-control" id="cms_page_9_content" name="cms_page_9_content" aria-describedby="emailHelp" placeholder="<html></html>"><?php echo $cms_page_9_content; ?></textarea>
                <script>
                    $(function() {
                        var editor = new wysihtml.Editor("cms_page_9_content", { // id of textarea element
                            toolbar:      "wysihtml-toolbar_9", // id of toolbar element
                            parserRules:  wysihtmlParserRules // defined in parser rules set 
                            });
                    });
                </script>
            </div>
            <h5>Página 10</h5>
            <div class="form-group">
                <label for="cms_page_10_title">TÍtulo</label>
                <input type="text" class="form-control" id="cms_page_10_title" name="cms_page_10_title" aria-describedby="emailHelp" placeholder="" value="<?php echo $cms_page_10_title; ?>">
            </div>
            <div class="form-group">
                <label for="cms_page_10_content">Contenido</label>
                <nav id="wysihtml-toolbar_10" class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" data-wysihtml-command="bold">
                                    <i class="fas fa-bold"></i>
                                </a> 
                            </li>
                            <li class="nav-item">   
                                <a class="nav-link" data-wysihtml-command="italic">
                                    <i class="fas fa-italic"></i>
                                </a>   
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="underline">
                                    <i class="fas fa-underline"></i>
                                </a>    
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tamaño
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h1">
                                        <h1>Titulo 1</h1>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h2">
                                        <h2>Titulo 2</h2>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h3">
                                        <h3>Titulo 3</h3>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h4">
                                        <h4>Titulo 4</h4>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="h5">
                                        <h5>Titulo 5</h5>
                                    </a>
                                    <a class="dropdown-item" data-wysihtml-command="formatBlock" data-wysihtml-command-value="p">
                                        <p>Texto normal</p>
                                    </a>
                                </div>
                            </li>
                            <!--
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyLeft">
                                <i class="fas fa-align-left"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyCenter">
                                <i class="fas fa-align-center"></i>
                                </a>    
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="justifyRight">
                                <i class="fas fa-align-right"></i>
                                </a>    
                            </li>-->
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertUnorderedList">
                                    <i class="fas fa-list-ul"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-command="insertOrderedList">
                                    <i class="fas fa-list-ol"></i>
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" data-wysihtml-action="change_view">
                                    <i class="fas fa-code"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </nav>
                <textarea type="text" class="form-control" id="cms_page_10_content" name="cms_page_10_content" aria-describedby="emailHelp" placeholder="<html></html>"><?php echo $cms_page_10_content; ?></textarea>
                <script>
                    $(function() {
                        var editor = new wysihtml.Editor("cms_page_10_content", { // id of textarea element
                            toolbar:      "wysihtml-toolbar_10", // id of toolbar element
                            parserRules:  wysihtmlParserRules // defined in parser rules set 
                            });
                    });
                </script>
            </div>
            <button type="submit" id="submit" name="submit" class="btn btn-primary">Guardar cambios</button>
        </form>

        </div>
    </div>

<?php el_footer(); ?>