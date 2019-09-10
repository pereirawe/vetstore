<?php
    
    if ((!isset($_GET['perfil'])) || ($_GET['perfil'] == $_SESSION['user_user_name'])) {
        $user_id = $_SESSION['user_id']; 
        $user_first_name = $_SESSION['user_first_name'];  
        $user_last_name = $_SESSION['user_last_name'];
        $user_user_name = $_SESSION['user_user_name'];
        $user_photo = $_SESSION['user_photo'];
        echo '<form id="new_post" method="post" action="./create_new_posts.php" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <a href="./welcome.php?perfil='. $user_user_name .'">
                            <img src="'. $user_photo.'" width="36px">
                        </a>
                    </span>
                </div>
                <textarea class="form-control" placeholder="¿Qué estás pensando? #cachorros #gatos #shop" name="new_post_content" id="new_post_content"></textarea>
            </div>
            <div style="text-align: right;">
            <div class="image-upload" style="display: inline;">
                <label class="btn btn-primary" for="post_attachment" style="padding: 10px; margin-top: 8px;">
                    <i class="fas fa-image"></i>
                </label>
                <input type="file" class="form-control" id="post_attachment" name="post_attachment" aria-describedby="post_attachment" style="display:unset; " multiple accept="image/*" />
                
                
                <img id="output"/>
                <script>
                var loadFile = function(event) {
                    var output = document.getElementById("output");
                    output.src = URL.createObjectURL(event.target.files[0]);
                };
                </script>
            </div>
                <button class="btn btn-light" type="submit" id="publish_new_post" name="publish_new_post">
                    Publica
                </button>
            </div>
        </form>';
    }

?>
<!--capture="camera"-->

<style>
    
    #showmore {
       margin: 5px;
       padding: 2px;
       border:3px solid gray; 
    }
    #showmore:hover {
        background-color: gray;
        color: white;
    }
    
</style>

<div data-id="<?= isset($_GET['perfil']) ? $_GET['perfil'] : '' ?>" id="main_container">
  <div id="publications">
    <p id="loadingpubs">Cargando publicaciones ...</p>
  </div>
  <div id="hidemore" style="text-align: center; display:unset">
      Cargando más publicaciones ...
  </div>
  <div style="cursor:pointer; text-align: center;" id="showmore">
      Ver más publicaciones!!
  </div>
</div>