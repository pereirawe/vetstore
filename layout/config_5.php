<?php
    $query_user = "select * from users WHERE user_id = '" . $_SESSION["user_id"] . "'";
    $result_query_user = mysqli_query($linkli,$query_user) or die(mysqli_error());
    while ($user_info = mysqli_fetch_array($result_query_user)){
        $user_id = $user_info['user_id'];
        $user_user_name = $user_info['user_user_name'];
        $user_links_facebook = $user_info['user_links_facebook'];
        $user_links_twitter = $user_info['user_links_twitter'];
        $user_links_instagram = $user_info['user_links_instagram'];
        $user_links_google_plus = $user_info['user_links_google_plus'];
        $user_links_linkedin = $user_info['user_links_linkedin'];
        $user_links_youtube = $user_info['user_links_youtube'];
    }

?>
                    <h3>Enlaces Sociales</h3>
                    <form action="./config_profile.php" method="post">
                        <input  id="user_id" name="user_id" value="<?php echo $user_id;?>" style="display:none;">
                        <input  id="user_user_name" name="user_user_name" value="<?php echo $user_user_name;?>" style="display:none;">
                        <div class="form-group">
                            <label for="user_links_facebook">Facebook</label>
                            <input type="text" class="form-control" id="user_links_facebook" name="user_links_facebook" aria-describedby="" placeholder="https://www.facebook.com/usuario" value="<?php echo $user_links_facebook;?>">
                        </div>
                        <div class="form-group">
                            <label for="user_links_twitter">Twitter</label>
                            <input type="text" class="form-control" id="user_links_twitter" name="user_links_twitter" aria-describedby="" placeholder="https://twitter.com/usuario" value="<?php echo $user_links_twitter;?>">
                        </div>
                        <div class="form-group">
                            <label for="user_links_instagram">Instagram</label>
                            <input type="text" class="form-control" id="user_links_instagram" name="user_links_instagram" aria-describedby="" placeholder="https://instagram.com/usuario" value="<?php echo $user_links_instagram;?>">
                        </div>
                        <div class="form-group">
                            <label for="user_links_google_plus">Google+</label>
                            <input type="text" class="form-control" id="user_links_google_plus" name="user_links_google_plus" aria-describedby="" placeholder="https://plus.google.com/u/0/id_de_usuario" value="<?php echo $user_links_google_plus;?>">
                        </div>
                        <div class="form-group">
                            <label for="user_links_linkedin">LinkedIn</label>
                            <input type="text" class="form-control" id="user_links_linkedin" name="user_links_linkedin" aria-describedby="" placeholder="https://www.linkedin.com/in/usuario" value="<?php echo $user_links_linkedin;?>">
                        </div>
                        <div class="form-group">
                            <label for="user_links_youtube">Youtube</label>
                            <input type="text" class="form-control" id="user_links_youtube" name="user_links_youtube" aria-describedby="" placeholder="https://www.youtube.com/channel/id_de_canal" value="<?php echo $user_links_youtube;?>">
                        </div>
                        
                        <button type="submit" id="submit_5" name="submit_5" class="btn btn-primary">Guardar</button>
                        <br>
                    </form>
