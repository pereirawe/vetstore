<?php
    include './functions.php';
    if(isset($_GET['post_id'])){
        $query_delete_post = "DELETE FROM posts WHERE post_id = '".$_GET['post_id']."';";
        mysqli_query($linkli,$query_delete_post) or die(mysqli_error());
        delete_unused_post_file();
        // echo "<script type='text/javascript'>alert('Publicación eliminada!');</script>";
        // echo '<script>window.location.replace("./welcome.php?perfil='.$_SESSION['user_user_name'].'")</script>';
    }

?>