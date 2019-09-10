<?php
    include '../functions.php';
    $init = isset($_GET['init']) ? (int) $_GET['init'] : 0;
    $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 0;
    if (!isset($_SESSION['user_id'])) return header("location: /");
    
    // Publicaciones de "Mi perfil"
    if (isset($_GET['perfil'])) {
        if ($_GET['perfil'] == $_SESSION['user_user_name']) {
            $user_id = $_SESSION['user_id']; 
            $query_posts = "SELECT * FROM posts WHERE user_id ='".$user_id."' ORDER BY post_date DESC LIMIT " . $init . "," . $limit;
            $result_query_post = mysqli_query($linkli,$query_posts) or die(mysqli_error());
            $post_exist = 0;
            while ($post = mysqli_fetch_array($result_query_post)){
                $post_user_id = $post['user_id'];
                $post_id = $post['post_id'];
                $post_content = $post['post_content'];
                $post_date = $post['post_date'];
                $post_attachment = $post['post_attachment'];
                if ($post_attachment != "") {
                    //$post_attachment = reimg($post_attachment, 520);
                    $post_attachment_display = "<img src='".$post_attachment."' width='100%'>";
                } else {
                    $post_attachment_display = "";
                }
                $post_link = $post['post_link'];
                $post_exist++;
                $like_onclick_vars = '"'.$post_id.'", "'.$_SESSION['user_id'].'"';
                $delete_onclick_vars = '"'.$post_id.'"';

                $share_url = "https://vetstore.com.co/welcome.php?perfil=". $_SESSION['user_user_name'] . "#bp_" .$post_id;
                $share_url= str_replace ( ':', '%3A', $share_url );
                $share_url= str_replace ( '/', '%2F', $share_url );                
                $share_url= str_replace ( '#', '%23', $share_url );                
                $share_url= str_replace ( '=', '%3D', $share_url );                
                $share_url= str_replace ( '?', '%3F', $share_url );                
                
                $share_post_content= str_replace ( ' ', '%20', $post_content );
                $wa_post_content= str_replace ( ':', '%3A', $share_post_content );
                $wa_post_content= str_replace ( '/', '%2F', $wa_post_content );                
                $wa_post_content= str_replace ( '#', '%23', $wa_post_content );                
                $wa_post_content= str_replace ( '=', '%3D', $wa_post_content );                
                $wa_post_content= str_replace ( '?', '%3F', $wa_post_content );     

                echo "<div id='bp_".$post_id."' class='wall_posts'>
                <a href='./welcome.php?perfil=".$_SESSION['user_user_name']."' ><h6><img src='".$_SESSION['user_photo']."' style='height: 18px; border-radius: 50px; margin-right: 7px; ' >". $_SESSION['user_first_name'] . " " . $_SESSION['user_last_name'] ."</h6></a>
                        <p>
                            ".$post_content."
                        </p>
                        ".$post_attachment_display."
                        <small>Publicado el ". date( "d-m-Y", $post_date ) ." a las ". date( "H:i:s", $post_date )."</small><br>
                        <div class='post_tools'>
                            <a class='btn btn-light' data-toggle='modal' data-target='#mod".$post_id."'><i class='fas fa-edit'></i></a>
                            <div class='btn btn-light'><i class='fas fa-trash' onclick='delete_post(".$delete_onclick_vars.")' ></i></div>
                            <a class='btn btn-light' style='float: right;' data-toggle='modal' data-target='#comment".$post_id."'><i class='fas fa-comments'></i></a>
                            <div id='no_like_".$post_id."' class='btn btn-light' style='float: right;' onclick='no_like(".$like_onclick_vars.")'>
                                <i class='fas fa-thumbs-down' ></i>
                                <span id='no_like_".$post_id."_account'></span>
                            </div>
                            <div id='like_".$post_id."' class='btn btn-light' style='float: right;' onclick='like(".$like_onclick_vars.")'>
                                <i class='fas fa-thumbs-up' ></i>
                                <span id='like_".$post_id."_account'></span>
                            </div>
                            <div id='share_".$post_id."' class='btn btn-light' style='float: right;' type='button' data-toggle='collapse' data-target='#share_btns_".$post_id."' aria-expanded='false' aria-controls='share_btns_".$post_id."'>
                                <i class='fas fa-share-alt'></i>
                            </div>
                            <div class='collapse' id='share_btns_".$post_id."'>
                                <div class='p-1 mt-1' style='text-align:right;'>
                                    <a href='https://www.facebook.com/sharer.php?u=". $share_url ."&t=". $share_post_content ."' target='new' class='' ><i class='fab fa-2x fa-facebook' style='color: #4267B2;'></i></a>
                                    <a href='https://twitter.com/intent/tweet?text=". $share_post_content ."&url=". $share_url ."' target='new' class='' ><i class='fab fa-2x fa-twitter-square' style='color: #1DA1F2;'></i></a>
                                    <a href='https://plus.google.com/share?url=". $share_url ."' target='new' class='' ><i class='fab fa-2x fa-google-plus-square' style='color: #DB4437;'></i></a>
                                    <a href='https://api.whatsapp.com/send?text=" . $wa_post_content . "%20" . $share_url ."' target='new' class='' ><i class='fab fa-2x fa-whatsapp-square' style='color: #1EBEA5;'></i></a>
                                </div>
                            </div>
                        </div>
                        <div id='all_commentaries_in_$post_id'></div>
                        ";                                    
                //FUNCIONES DE LIKE
                like_status_display($post_id, $actual_user_id);
                // COMENTARIOS PUBLICADOS
                $query_comment_search = "SELECT * FROM posts_comments WHERE post_id = '".$post_id."';";
                $result_comment_search = mysqli_query($linkli,$query_comment_search) or die(mysqli_error());
                $comment_exist = 0;
                $comments = "";
                while ($comment_show = mysqli_fetch_array($result_comment_search)){
                    $comment_exist = $comment_exist +1;
                    $com_user_id = $comment_show['user_id'];
                    $com_comment_id = $comment_show['comment_id'];
                    $com_comment_date = $comment_show['comment_date'];
                    $com_comment_content = $comment_show['comment_content'];
                    $query_comment_who = "SELECT * FROM users WHERE user_id = '".$com_user_id."'";
                    $query_comment_who_search = mysqli_query($linkli,$query_comment_who) or die(mysqli_error());
                    while ($query_comment_who_show = mysqli_fetch_array($query_comment_who_search)){
                        $who_user_id = $query_comment_who_show['user_id'];
                        $who_user_first_namme = $query_comment_who_show['user_first_name'];
                        $who_user_first_name = $query_comment_who_show['user_first_name'];
                        $who_user_last_name = $query_comment_who_show['user_last_name'];
                        $who_user_user_name = $query_comment_who_show['user_user_name'];
                        $who_user_photo = $query_comment_who_show['user_photo'];
                    }
                    $comments .= '<div class="alert alert-primary commentelement" data-idcomentary="'.$com_comment_id.'" role="alert">
                                    <a href="./welcome.php?perfil='.$who_user_user_name.'" >
                                        <h6><img src="'.$who_user_photo.'" style="height: 18px; border-radius: 50px; margin-right: 7px; " >'. $who_user_first_name . ' ' . $who_user_last_name .'</h6>
                                    </a>'
                                .$com_comment_content.'
                                </div>'; 
                            };
                        if ($comment_exist > 0 ) {
                            echo '<a class="" data-toggle="collapse" href="#collapse'.$com_comment_id.'" role="button" aria-expanded="false" aria-controls="collapse'.$com_comment_id.'">Ver <span id="amount_'.$com_comment_id.'">'.$comment_exist.'</span> comentarios</a>
                            <div class="collapse" id="collapse'.$com_comment_id.'">
                                '.$comments.'
                            </div>'; 
                        };
                    // FINAL DE CAJA DE PUBLICACION
                echo "</div>";
                // EDICION DE PUBLICACIONES
                echo '<div class="modal fade" id="mod'.$post_id.'" tabindex="-1" role="dialog" aria-labelledby="modLabel'.$post_id.'" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modLabel'.$post_id.'">Editar Publicación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="./edit_post.php" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input id="post_id" name="post_id" value="'.$post_id.'" style="display:none;">
                                            <textarea id="'.$post_id.'" name="'.$post_id.'" class="form-control" rows="4">'.$post_content.'</textarea>
                                            <div class="image-upload">
                                                <label for="post_attachment_edit">
                                                    <img src="'.$post_attachment.'" class="img-thumbnail" width="100%" />
                                                </label>
                                                <input type="file" class="form-control" id="post_attachment_edit" name="post_attachment_edit" aria-describedby="post_attachment_edit" style="display: auto;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button" name="submit_'. $post_id . '" id="submit_'. $post_id . '" class="btn btn-primary" onclick="this.form.submit()">Guardar cambios</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>';
                // CREAR COMENTARIOS
                echo '<div class="modal fade" id="comment'.$post_id.'" tabindex="-1" role="dialog" aria-labelledby="modLabel'.$post_id.'" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modLabel'.$post_id.'">Comentar Publicación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form name="sendcomment" data-idform="'.(isset($com_comment_id) ? $com_comment_id : '0').'" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input id="comment_post_id" name="comment_post_id" value="'.$post_id.'" style="display:none;">
                                            <input id="comment_user_id" name="comment_user_id" value="'.$_SESSION['user_id'].'" style="display:none;">
                                            <input id="post_owner_user_user_name" name="post_owner_user_user_name" value="'.$_SESSION['user_user_name'].'" style="display:none;">
                                            <input id="back_url" name="back_url" value="https://'. $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'] . '#bp_' .$post_id.'" style="display:none;" >
                                            <textarea id="comment_post_'.$post_id.'" name="comment_'.$post_id.'" class="form-control" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" name="comment_submit_'. $post_id . '" id="comment_submit_'. $post_id . '" class="btn btn-primary">Comentar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>';
                echo "<script>
                var youtu_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://youtu.be/');
                var youtube_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://www.youtube.com/watch?v=');
                var insta_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://www.instagram.com/p/');
                if (youtube_". $post_id ." >= 0) {
                    var youtube_". $post_id ."_length = $('#bp_". $post_id ." > p').html().length;
                    var youtube_". $post_id ."_code = $('#bp_". $post_id ." > p').html().substring(youtube_". $post_id ."_length - 11, youtube_". $post_id ."_length);
                    $('#bp_". $post_id ." > p').append('<br><iframe width=100% height=315 src=https://www.youtube.com/embed/' + youtube_". $post_id ."_code + ' frameborder=0 allow=autoplay; encrypted-media allowfullscreen></iframe>');
                } else if (youtu_". $post_id ." >= 0) {
                    var youtu_". $post_id ."_length = $('#bp_". $post_id ." > p').html().length;
                    var youtu_". $post_id ."_code = $('#bp_". $post_id ." > p').html().substring(youtu_". $post_id ."_length - 11, youtu_". $post_id ."_length);
                    $('#bp_". $post_id ." > p').append('<br><iframe width=100% height=315 src=https://www.youtube.com/embed/' + youtu_". $post_id ."_code + ' frameborder=0 allow=autoplay; encrypted-media allowfullscreen></iframe>');
                } else {
                    read_more('bp_". $post_id ."');
                }
            </script>";
            };
            
        //--- PUBLICACIONES EN PERFILES DE TERCEROS
        } else {
            $user_user_name = $_GET['perfil'];
            $query_user = "SELECT * FROM users WHERE user_user_name = '".$user_user_name."';" ;
            $result_query_user = mysqli_query($linkli,$query_user) or die(mysqli_error());
            while ($user_show = mysqli_fetch_array($result_query_user)){
                $post_user_id = $user_show['user_id'];
                $post_user_user_name = $user_show['user_user_name'];
                $post_user_first_name = $user_show['user_first_name'];
                $post_user_last_name = $user_show['user_last_name'];
                $post_user_photo = $user_show['user_photo'];
            }
            $query_posts = "SELECT * FROM posts WHERE user_id ='".$post_user_id."' ORDER BY post_date DESC LIMIT 10;";
            $query_posts = "SELECT * FROM posts WHERE user_id ='".$post_user_id."' ORDER BY post_date DESC;";
            $result_query_post = mysqli_query($linkli,$query_posts) or die(mysqli_error());
            $post_exist = 0;
            while ($post = mysqli_fetch_array($result_query_post)){
                $post_user_id = $post['user_id'];
                $post_id = $post['post_id'];
                $post_content = $post['post_content'];
                $post_date = $post['post_date'];
                $post_attachment = $post['post_attachment'];
                if ($post_attachment != "") {
                    $post_attachment_display = "<img src='".$post_attachment."' width='100%'>";
                } else {
                    $post_attachment_display = "";
                }
                $post_link = $post['post_link'];
                $post_exist++;
                $like_onclick_vars = '"'.$post_id.'", "'.$_SESSION['user_id'].'"';
                
                $share_url = "https://vetstore.com.co/welcome.php?perfil=". $post_user_user_name . "#bp_" .$post_id;
                $share_url= str_replace ( ':', '%3A', $share_url );
                $share_url= str_replace ( '/', '%2F', $share_url );                
                $share_url= str_replace ( '#', '%23', $share_url );                
                $share_url= str_replace ( '=', '%3D', $share_url );                
                $share_url= str_replace ( '?', '%3F', $share_url );                
                
                $share_post_content= str_replace ( ' ', '%20', $post_content );
                $wa_post_content= str_replace ( ':', '%3A', $share_post_content );
                $wa_post_content= str_replace ( '/', '%2F', $wa_post_content );                
                $wa_post_content= str_replace ( '#', '%23', $wa_post_content );                
                $wa_post_content= str_replace ( '=', '%3D', $wa_post_content );                
                $wa_post_content= str_replace ( '?', '%3F', $wa_post_content ); 

                echo "<div id='bp_".$post_id."' class='wall_posts' >
                        <a href='./welcome.php?perfil=".$post_user_user_name."' >
                            <h6>
                                <img src='".$post_user_photo ."' style='height: 18px; border-radius: 50px; margin-right: 7px;' >
                                ". $post_user_first_name . " " . $post_user_last_name ."
                            </h6>
                        </a>
                        <p>
                            ".$post_content."
                        </p>
                        ".$post_attachment_display."
                        <small>Publicado el ". date( "d-m-Y", $post_date ) ." a las ". date( "H:i:s", $post_date )."</small>
                        <div class='post_tools'>
                            <a class='btn btn-light' style='float: right;' data-toggle='modal' data-target='#comment".$post_id."'>
                                <i class='fas fa-comments'></i>
                            </a>
                            <div id='no_like_".$post_id."' class='btn btn-light' style='float: right;' onclick='no_like(".$like_onclick_vars.")'>
                                <i class='fas fa-thumbs-down' ></i>
                                <span id='no_like_".$post_id."_account'></span>
                            </div>
                            <div id='like_".$post_id."' class='btn btn-light' style='float: right;' onclick='like(".$like_onclick_vars.")'>
                                <i class='fas fa-thumbs-up' ></i>
                                <span id='like_".$post_id."_account'></span>
                            </div>
                            <div id='share_".$post_id."' class='btn btn-light' style='float: right;' type='button' data-toggle='collapse' data-target='#share_btns_".$post_id."' aria-expanded='false' aria-controls='share_btns_".$post_id."'>
                                <i class='fas fa-share-alt'></i>
                            </div>
                            <div class='collapse' id='share_btns_".$post_id."'>
                                <div class='p-1 mt-1' style='text-align:right;'>
                                    <a href='https://www.facebook.com/sharer.php?u=". $share_url ."&t=". $share_post_content ."' target='new' class='' ><i class='fab fa-2x fa-facebook' style='color: #4267B2;'></i></a>
                                    <a href='https://twitter.com/intent/tweet?text=". $share_post_content ."&url=". $share_url ."' target='new' class='' ><i class='fab fa-2x fa-twitter-square' style='color: #1DA1F2;'></i></a>
                                    <a href='https://plus.google.com/share?url=". $share_url ."' target='new' class='' ><i class='fab fa-2x fa-google-plus-square' style='color: #DB4437;'></i></a>
                                    <a href='https://api.whatsapp.com/send?text=" . $wa_post_content . "%20" . $share_url ."' target='new' class='' ><i class='fab fa-2x fa-whatsapp-square' style='color: #1EBEA5;'></i></a>
                                </div>
                            </div>
                    </div>";
                // FUNCIONES DE LIKE
                like_status_display($post_id, $actual_user_id);
                // COMENTARIOS PUBLICADOS
                $query_comment_search = "SELECT * FROM posts_comments WHERE post_id = '".$post_id."';";
                $result_comment_search = mysqli_query($linkli,$query_comment_search) or die(mysqli_error());
                $comment_exist = 0;
                $comments = "";
                while ($comment_show = mysqli_fetch_array($result_comment_search)){
                    $comment_exist = $comment_exist +1;
                    $com_user_id = $comment_show['user_id'];
                    $com_comment_id = $comment_show['comment_id'];
                    $com_comment_date = $comment_show['comment_date'];
                    $com_comment_content = $comment_show['comment_content'];
                    $query_comment_who = "SELECT * FROM users WHERE user_id = '".$com_user_id."'";
                    $query_comment_who_search = mysqli_query($linkli,$query_comment_who) or die(mysqli_error());
                    while ($query_comment_who_show = mysqli_fetch_array($query_comment_who_search)){
                        $who_user_id = $query_comment_who_show['user_id'];
                        $who_user_first_namme = $query_comment_who_show['user_first_name'];
                        $who_user_first_name = $query_comment_who_show['user_first_name'];
                        $who_user_last_name = $query_comment_who_show['user_last_name'];
                        $who_user_user_name = $query_comment_who_show['user_user_name'];
                        $who_user_photo = $query_comment_who_show['user_photo'];
                    }
                    $comments .= '<div class="alert alert-primary commentelement" data-idcomentary="'.$com_comment_id.'" role="alert">
                            <a href="./welcome.php?perfil='.$who_user_user_name.'" >
                                <h6><img src="'.$who_user_photo.'" style="height: 18px; border-radius: 50px; margin-right: 7px; " >'. $who_user_first_name . ' ' . $who_user_last_name .'</h6>
                            </a>'
                        .$com_comment_content.'
                        </div>'; 
                };
                if ($comment_exist > 0 ) {
                    echo '<a class="" data-toggle="collapse" href="#collapse'.$com_comment_id.'" role="button" aria-expanded="false" aria-controls="collapse'.$com_comment_id.'">Ver <span id="amount_'.$com_comment_id.'">'.$comment_exist.'</span> comentarios</a>
                    <div class="collapse" id="collapse'.$com_comment_id.'">
                        '.$comments.'
                    </div>'; 
                };
                // FINAL DE CAJA DE PUBLICACION
                echo "</div>";
                // CREAR COMENTARIOS
                echo '<div class="modal fade" id="comment'.$post_id.'" tabindex="-1" role="dialog" aria-labelledby="modLabel'.$post_id.'" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modLabel'.$post_id.'">Comentar Publicación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form name="sendcomment" data-idform="'.$com_comment_id.'" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input id="comment_post_id" name="comment_post_id" value="'.$post_id.'" style="display:none;">
                                            <input id="comment_user_id" name="comment_user_id" value="'.$_SESSION['user_id'].'" style="display:none;">
                                            <input id="post_owner_user_user_name" name="post_owner_user_user_name" value="'.$post_user_user_name.'" style="display:none;">
                                            <input id="back_url" name="back_url" value="https://'. $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'] . '#bp_' .$post_id.'" style="display:none;" >
                                            <textarea id="comment_post_'.$post_id.'" name="comment_'.$post_id.'" class="form-control" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" name="comment_submit_'. $post_id . '" id="comment_submit_'. $post_id . '" class="btn btn-primary" data-id="comentar_publicacion">Comentar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>';
                //embeds externos solo youtube
                echo "<script>
                var youtu_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://youtu.be/');
                var youtube_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://www.youtube.com/watch?v=');
                var insta_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://www.instagram.com/p/');
                if (youtube_". $post_id ." >= 0) {
                    var youtube_". $post_id ."_length = $('#bp_". $post_id ." > p').html().length;
                    var youtube_". $post_id ."_code = $('#bp_". $post_id ." > p').html().substring(youtube_". $post_id ."_length - 11, youtube_". $post_id ."_length);
                    $('#bp_". $post_id ." > p').append('<br><iframe width=100% height=315 src=https://www.youtube.com/embed/' + youtube_". $post_id ."_code + ' frameborder=0 allow=autoplay; encrypted-media allowfullscreen></iframe>');
                } else if (youtu_". $post_id ." >= 0) {
                    var youtu_". $post_id ."_length = $('#bp_". $post_id ." > p').html().length;
                    var youtu_". $post_id ."_code = $('#bp_". $post_id ." > p').html().substring(youtu_". $post_id ."_length - 11, youtu_". $post_id ."_length);
                    $('#bp_". $post_id ." > p').append('<br><iframe width=100% height=315 src=https://www.youtube.com/embed/' + youtu_". $post_id ."_code + ' frameborder=0 allow=autoplay; encrypted-media allowfullscreen></iframe>');
                } else {
                    read_more('bp_". $post_id ."');
                }
            </script>";
            };
        };
    };

    // PUBLICACIONES EN MURO GENERAL
    if (!isset($_GET['perfil'])) { 
        $query_posts = "SELECT * FROM posts ORDER BY post_date DESC LIMIT "  . $init . "," . $limit;
        //$query_posts = "SELECT * FROM posts ORDER BY post_date DESC;";
        $result_query_post = mysqli_query($linkli,$query_posts) or die(mysqli_error());
        $post_exist = 0;
        $number = 0;
        while ($post = mysqli_fetch_array($result_query_post)){
            $post_user_id = $post['user_id'];
            $post_id = $post['post_id'];
            $post_content = $post['post_content'];
            $post_date = $post['post_date'];
            $post_attachment = $post['post_attachment'];
            if ($post_attachment != "") {
                //$post_attachment = reimg($post_attachment, 520);
                $post_attachment_display = "<img src='".$post_attachment."' width='100%'>";
            } else {
                $post_attachment_display = "";
            }
            $post_link = $post['post_link'];
            $post_exist++;
            $like_onclick_vars = '"'.$post_id.'", "'.$_SESSION['user_id'].'"';
            $delete_onclick_vars = '"'.$post_id.'"';
            $number = $number +1;
                
            
            if ($post_user_id == $_SESSION['user_id']) {
                $share_url = "https://vetstore.com.co/welcome.php?perfil=". $_SESSION['user_user_name'] . "#bp_" .$post_id;
                $share_url= str_replace ( ':', '%3A', $share_url );
                $share_url= str_replace ( '/', '%2F', $share_url );                
                $share_url= str_replace ( '#', '%23', $share_url );                
                $share_url= str_replace ( '=', '%3D', $share_url );                
                $share_url= str_replace ( '?', '%3F', $share_url );                
                
                $share_post_content= str_replace ( ' ', '%20', $post_content );
                $wa_post_content= str_replace ( ':', '%3A', $share_post_content );
                $wa_post_content= str_replace ( '/', '%2F', $wa_post_content );                
                $wa_post_content= str_replace ( '#', '%23', $wa_post_content );                
                $wa_post_content= str_replace ( '=', '%3D', $wa_post_content );                
                $wa_post_content= str_replace ( '?', '%3F', $wa_post_content ); 
                echo "<div id='bp_".$post_id."' class='wall_posts'>
                    <a href='./welcome.php?perfil=".$_SESSION['user_user_name']."' >
                        <h6><img src='".$_SESSION['user_photo']."' style='height: 18px; border-radius: 50px; margin-right: 7px; ' >". $_SESSION['user_first_name'] . " " . $_SESSION['user_last_name'] ."</h6>
                    </a>

                        <p>
                            ".$post_content."
                        </p>
                        ".$post_attachment_display."
                        <small>Publicado el ". date( "d-m-Y", $post_date ) ." a las ". date( "H:i:s", $post_date )."</small><br>
                        <div class='post_tools'>
                            <a href='./edit_post.php?post_id=".$post_id."' class='btn btn-light' data-toggle='modal' data-target='#mod".$post_id."'><i class='fas fa-edit'></i></a>
                            <div class='btn btn-light'>
                                <i class='fas fa-trash' onclick='delete_post(".$delete_onclick_vars.")' >
                                </i>
                            </div>
                            <a class='btn btn-light' style='float: right;' data-toggle='modal' data-target='#comment".$post_id."'><i class='fas fa-comments'></i></a>
                            <div id='no_like_".$post_id."' class='btn btn-light' style='float: right;' onclick='no_like(".$like_onclick_vars.")'>
                                <i class='fas fa-thumbs-down' ></i>
                                <span id='no_like_".$post_id."_account'></span>
                            </div>
                            <div id='like_".$post_id."' class='btn btn-light' style='float: right;' onclick='like(".$like_onclick_vars.")'>
                                <i class='fas fa-thumbs-up' ></i>
                                <span id='like_".$post_id."_account'></span>
                            </div>
                            <div id='share_".$post_id."' class='btn btn-light' style='float: right;' type='button' data-toggle='collapse' data-target='#share_btns_".$post_id."' aria-expanded='false' aria-controls='share_btns_".$post_id."'>
                                <i class='fas fa-share-alt'></i>
                            </div>
                            <div class='collapse' id='share_btns_".$post_id."'>
                                <div class='p-1 mt-1' style='text-align:right;'>
                                    <a href='https://www.facebook.com/sharer.php?u=". $share_url ."&t=". $share_post_content ."' target='new' class='' ><i class='fab fa-2x fa-facebook' style='color: #4267B2;'></i></a>
                                    <a href='https://twitter.com/intent/tweet?text=". $share_post_content ."&url=". $share_url ."' target='new' class='' ><i class='fab fa-2x fa-twitter-square' style='color: #1DA1F2;'></i></a>
                                    <a href='https://plus.google.com/share?url=". $share_url ."' target='new' class='' ><i class='fab fa-2x fa-google-plus-square' style='color: #DB4437;'></i></a>
                                    <a href='https://api.whatsapp.com/send?text=" . $wa_post_content . "%20" . $share_url ."' target='new' class='' ><i class='fab fa-2x fa-whatsapp-square' style='color: #1EBEA5;'></i></a>
                                </div>
                            </div>
                </div>";
                
                        //FUNCIONES DE LIKE
                like_status_display($post_id, $actual_user_id);
                    
                // COMENTARIOS PUBLICADOS
                $query_comment_search = "SELECT * FROM posts_comments WHERE post_id = '".$post_id."';";
                $result_comment_search = mysqli_query($linkli,$query_comment_search) or die(mysqli_error());
                $comment_exist = 0;
                $comments = "";
                while ($comment_show = mysqli_fetch_array($result_comment_search)){
                    $comment_exist = $comment_exist +1;
                    $com_user_id = $comment_show['user_id'];
                    $com_comment_id = $comment_show['comment_id'];
                    $com_comment_date = $comment_show['comment_date'];
                    $com_comment_content = $comment_show['comment_content'];
                    $query_comment_who = "SELECT * FROM users WHERE user_id = '".$com_user_id."'";
                    $query_comment_who_search = mysqli_query($linkli,$query_comment_who) or die(mysqli_error());
                    while ($query_comment_who_show = mysqli_fetch_array($query_comment_who_search)){
                        $who_user_id = $query_comment_who_show['user_id'];
                        $who_user_first_namme = $query_comment_who_show['user_first_name'];
                        $who_user_first_name = $query_comment_who_show['user_first_name'];
                        $who_user_last_name = $query_comment_who_show['user_last_name'];
                        $who_user_user_name = $query_comment_who_show['user_user_name'];
                        $who_user_photo = $query_comment_who_show['user_photo'];

                    }
                    $comments .= '<div class="alert alert-primary commentelement" role="alert" data-idcomentary="'.$com_comment_id.'">
                            <a href="./welcome.php?perfil='.$who_user_user_name.'" >
                                <h6><img src="'.$who_user_photo.'" style="height: 18px; border-radius: 50px; margin-right: 7px; " >'. $who_user_first_name . ' ' . $who_user_last_name .'</h6>
                            </a>'
                        .$com_comment_content.'
                        </div>'; 
                }
                if ($comment_exist > 0 ) {
                    echo '<a class="" data-toggle="collapse" href="#collapse'.$com_comment_id.'" role="button" aria-expanded="false" aria-controls="collapse'.$com_comment_id.'">Ver <span id="amount_'.$com_comment_id.'">'.$comment_exist.'</span> comentarios</a>
                    <div class="collapse" id="collapse'.$com_comment_id.'">
                        '.$comments.'
                    </div>'; 
                }
                // FINAL DE CAJA DE PUBLICACION
                echo "</div>";

                echo '<div class="modal fade" id="mod'.$post_id.'" tabindex="-1" role="dialog" aria-labelledby="modLabel'.$post_id.'" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modLabel'.$post_id.'">Editar Publicación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="./edit_post.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <input id="post_id" name="post_id" value="'.$post_id.'" style="display:none;">
                                <textarea id="'.$post_id.'" name="'.$post_id.'" class="form-control" rows="8">'.$post_content.'</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" name="submit_'. $post_id . '" id="submit_'. $post_id . '" class="btn btn-primary" onclick="this.form.submit()">Guardar cambios</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>';
                // CREAR COMENTARIOS
                echo '<div class="modal fade" id="comment'.$post_id.'" tabindex="-1" role="dialog" aria-labelledby="modLabel'.$post_id.'" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modLabel'.$post_id.'">Comentar Publicación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form name="sendcomment" data-idform="'.(isset($com_comment_id) ? $com_comment_id : '0').'" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <input id="comment_post_id" name="comment_post_id" value="'.$post_id.'" style="display:none;">
                                <input id="comment_user_id" name="comment_user_id" value="'.$_SESSION['user_id'].'" style="display:none;">
                                <input id="post_owner_user_user_name" name="post_owner_user_user_name" value="'.$_SESSION['user_user_name'].'" style="display:none;">
                                <input id="back_url" name="back_url" value="https://'. $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'] . '#bp_' .$post_id.'" style="display:none;" >
                                <textarea id="comment_post_'.$post_id.'" name="comment_'.$post_id.'" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" name="comment_submit_'. $post_id . '" id="comment_submit_'. $post_id . '" class="btn btn-primary">Comentar</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>';
            echo "<script>
            var youtu_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://youtu.be/');
            var youtube_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://www.youtube.com/watch?v=');
            var insta_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://www.instagram.com/p/');
            if (youtube_". $post_id ." >= 0) {
                var youtube_". $post_id ."_length = $('#bp_". $post_id ." > p').html().length;
                var youtube_". $post_id ."_code = $('#bp_". $post_id ." > p').html().substring(youtube_". $post_id ."_length - 11, youtube_". $post_id ."_length);
                $('#bp_". $post_id ." > p').append('<br><iframe width=100% height=315 src=https://www.youtube.com/embed/' + youtube_". $post_id ."_code + ' frameborder=0 allow=autoplay; encrypted-media allowfullscreen></iframe>');
            } else if (youtu_". $post_id ." >= 0) {
                var youtu_". $post_id ."_length = $('#bp_". $post_id ." > p').html().length;
                var youtu_". $post_id ."_code = $('#bp_". $post_id ." > p').html().substring(youtu_". $post_id ."_length - 11, youtu_". $post_id ."_length);
                $('#bp_". $post_id ." > p').append('<br><iframe width=100% height=315 src=https://www.youtube.com/embed/' + youtu_". $post_id ."_code + ' frameborder=0 allow=autoplay; encrypted-media allowfullscreen></iframe>');
            } else {
                read_more('bp_". $post_id ."');
            }
        </script>";
            }
            $is_friend = 0;
            $query_friend_post = "SELECT * FROM friends WHERE friends_answer_date != '' AND ((users_id_a = '".$post_user_id."' AND users_id_b = '". $_SESSION["user_id"] ."') OR (users_id_a = '".$_SESSION["user_id"]."' AND users_id_b = '". $post_user_id ."')) ;";
            //echo $query_friend_post;
            $result_friend_post = mysqli_query($linkli,$query_friend_post) or die(mysqli_error());
            while ($post_show = mysqli_fetch_array($result_friend_post)){
                $is_friend = 1;
                $query_user = "SELECT * FROM users WHERE user_id = '".$post_user_id."';" ;
                $result_query_user = mysqli_query($linkli,$query_user) or die(mysqli_error());
                while ($user_show = mysqli_fetch_array($result_query_user)){
                    $post_user_user_name = $user_show['user_user_name'];
                    $post_user_first_name = $user_show['user_first_name'];
                    $post_user_last_name = $user_show['user_last_name'];
                    $post_user_photo = $user_show['user_photo'];
                    $post_user_last_name = $user_show['user_last_name'];
                    $share_url = "https://vetstore.com.co/welcome.php?perfil=". $post_user_user_name . "#bp_" .$post_id;
                    $share_url= str_replace ( ':', '%3A', $share_url );
                    $share_url= str_replace ( '/', '%2F', $share_url );                
                    $share_url= str_replace ( '#', '%23', $share_url );                
                    $share_url= str_replace ( '=', '%3D', $share_url );                
                    $share_url= str_replace ( '?', '%3F', $share_url );                
                    
                    $share_post_content= str_replace ( ' ', '%20', $post_content );
                    $wa_post_content= str_replace ( ':', '%3A', $share_post_content );
                    $wa_post_content= str_replace ( '/', '%2F', $wa_post_content );                
                    $wa_post_content= str_replace ( '#', '%23', $wa_post_content );                
                    $wa_post_content= str_replace ( '=', '%3D', $wa_post_content );                
                    $wa_post_content= str_replace ( '?', '%3F', $wa_post_content ); 
                    echo "<div id='bp_".$post_id."' class='wall_posts'>
                        <a href='./welcome.php?perfil=".$post_user_user_name."' >
                            <h6><img src='".$post_user_photo ."' style='    height: 18px; border-radius: 50px; margin-right: 7px; ' >". $post_user_first_name . " " . $post_user_last_name ."</h6>
                        </a>
                        <p>
                            ".$post_content."

                        </p>
                        ".$post_attachment_display."
                        <small>Publicado el ". date( "d-m-Y", $post_date ) ." a las ". date( "H:i:s", $post_date )."</small>
                        <div class='post_tools'>
                        <a class='btn btn-light' style='float: right;' data-toggle='modal' data-target='#comment".$post_id."'><i class='fas fa-comments'></i></a>
                        <div id='no_like_".$post_id."' class='btn btn-light' style='float: right;' onclick='no_like(".$like_onclick_vars.")'>
                                <i class='fas fa-thumbs-down' ></i>
                                <span id='no_like_".$post_id."_account'></span>
                            </div>
                            <div id='like_".$post_id."' class='btn btn-light' style='float: right;' onclick='like(".$like_onclick_vars.")'>
                                <i class='fas fa-thumbs-up' ></i>
                                <span id='like_".$post_id."_account'></span>
                            </div>
                            <div id='share_".$post_id."' class='btn btn-light' style='float: right;' type='button' data-toggle='collapse' data-target='#share_btns_".$post_id."' aria-expanded='false' aria-controls='share_btns_".$post_id."'>
                                <i class='fas fa-share-alt'></i>
                            </div>
                            <div class='collapse' id='share_btns_".$post_id."'>
                                <div class='p-1 mt-1' style='text-align:right;'>
                                    <a href='https://www.facebook.com/sharer.php?u=". $share_url ."&t=". $share_post_content ."' target='new' class='' ><i class='fab fa-2x fa-facebook' style='color: #4267B2;'></i></a>
                                    <a href='https://twitter.com/intent/tweet?text=". $share_post_content ."&url=". $share_url ."' target='new' class='' ><i class='fab fa-2x fa-twitter-square' style='color: #1DA1F2;'></i></a>
                                    <a href='https://plus.google.com/share?url=". $share_url ."' target='new' class='' ><i class='fab fa-2x fa-google-plus-square' style='color: #DB4437;'></i></a>
                                    <a href='https://api.whatsapp.com/send?text=" . $wa_post_content . "%20" . $share_url ."' target='new' class='' ><i class='fab fa-2x fa-whatsapp-square' style='color: #1EBEA5;'></i></a>
                                </div>
                            </div>
                        </div>";
                //FUNCIONES DE LIKE
                like_status_display($post_id, $actual_user_id);
                // COMENTARIOS PUBLICADOS
                $query_comment_search = "SELECT * FROM posts_comments WHERE post_id = '".$post_id."';";
                $result_comment_search = mysqli_query($linkli,$query_comment_search) or die(mysqli_error());
                $comment_exist = 0;
                $comments = "";
                while ($comment_show = mysqli_fetch_array($result_comment_search)){
                    $comment_exist = $comment_exist +1;
                    $com_user_id = $comment_show['user_id'];
                    $com_comment_id = $comment_show['comment_id'];
                    $com_comment_date = $comment_show['comment_date'];
                    $com_comment_content = $comment_show['comment_content'];
                    $query_comment_who = "SELECT * FROM users WHERE user_id = '".$com_user_id."'";
                    $query_comment_who_search = mysqli_query($linkli,$query_comment_who) or die(mysqli_error());
                    while ($query_comment_who_show = mysqli_fetch_array($query_comment_who_search)){
                        $who_user_id = $query_comment_who_show['user_id'];
                        $who_user_first_namme = $query_comment_who_show['user_first_name'];
                        $who_user_first_name = $query_comment_who_show['user_first_name'];
                        $who_user_last_name = $query_comment_who_show['user_last_name'];
                        $who_user_user_name = $query_comment_who_show['user_user_name'];
                        $who_user_photo = $query_comment_who_show['user_photo'];
                    }
                    $comments .= '<div class="alert alert-primary commentelement" role="alert" data-idcomentary="'.$com_comment_id.'">
                            <a href="./welcome.php?perfil='.$who_user_user_name.'" >
                                <h6><img src="'.$who_user_photo.'" style="height: 18px; border-radius: 50px; margin-right: 7px; " >'. $who_user_first_name . ' ' . $who_user_last_name .'</h6>
                            </a>'
                        .$com_comment_content.'
                        </div>'; 
                }
                if ($comment_exist > 0 ) {
                    echo '<a class="" data-toggle="collapse" href="#collapse'.$com_comment_id.'" role="button" aria-expanded="false" aria-controls="collapse'.$com_comment_id.'">Ver <span id="amount_'.$com_comment_id.'">'.$comment_exist.'</span> comentarios</a>
                    <div class="collapse" id="collapse'.$com_comment_id.'">
                        '.$comments.'
                    </div>'; 
                }
                // FINAL DE CAJA DE PUBLICACION
                echo "</div>";
                // CREAR COMENTARIOS
                echo '<div class="modal fade" id="comment'.$post_id.'" tabindex="-1" role="dialog" aria-labelledby="modLabel'.$post_id.'" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modLabel'.$post_id.'">Comentar Publicación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form name="sendcomment" data-idform="'.(isset($com_comment_id) ? $com_comment_id : '0').'" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <input id="comment_post_id" name="comment_post_id" value="'.$post_id.'" style="display:none;">
                                <input id="comment_user_id" name="comment_user_id" value="'.$_SESSION['user_id'].'" style="display:none;">
                                <input id="post_owner_user_user_name" name="post_owner_user_user_name" value="'.$post_user_user_name.'" style="display:none;">
                                <input id="back_url" name="back_url" value="https://'. $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'] . '#bp_' .$post_id.'" style="display:none;" >
                                <textarea id="comment_post_'.$post_id.'" name="comment_'.$post_id.'" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" name="comment_submit_'. $post_id . '" id="comment_submit_'. $post_id . '" class="btn btn-primary">Comentar</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>';
            echo "<script>
            var youtu_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://youtu.be/');
            var youtube_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://www.youtube.com/watch?v=');
            var insta_". $post_id ." = $('#bp_". $post_id ." > p').html().indexOf('https://www.instagram.com/p/');
            if (youtube_". $post_id ." >= 0) {
                var youtube_". $post_id ."_length = $('#bp_". $post_id ." > p').html().length;
                var youtube_". $post_id ."_code = $('#bp_". $post_id ." > p').html().substring(youtube_". $post_id ."_length - 11, youtube_". $post_id ."_length);
                $('#bp_". $post_id ." > p').append('<br><iframe width=100% height=315 src=https://www.youtube.com/embed/' + youtube_". $post_id ."_code + ' frameborder=0 allow=autoplay; encrypted-media allowfullscreen></iframe>');
            } else if (youtu_". $post_id ." >= 0) {
                var youtu_". $post_id ."_length = $('#bp_". $post_id ." > p').html().length;
                var youtu_". $post_id ."_code = $('#bp_". $post_id ." > p').html().substring(youtu_". $post_id ."_length - 11, youtu_". $post_id ."_length);
                $('#bp_". $post_id ." > p').append('<br><iframe width=100% height=315 src=https://www.youtube.com/embed/' + youtu_". $post_id ."_code + ' frameborder=0 allow=autoplay; encrypted-media allowfullscreen></iframe>');
            } else {
                read_more('bp_". $post_id ."');
            }
        </script>";
                };
            };
        };
    };
    if ($post_exist == 0) {
        echo "<div class='wall_posts'>
        <center><h4 style='padding: 100px 0px;'>". $user_first_name . " ". $user_last_name . " no ha publicado nada aún</h4></center>
        </div>";
    }
    
?>
