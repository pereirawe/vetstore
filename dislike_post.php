<?php
    include ('./functions.php');
    $query_dislike = "DELETE FROM likes WHERE post_id = '" .$_GET['post_id']."' AND user_id = '" . $_GET['user_id'] . "' ; ";
    mysqli_query($linkli,$query_dislike);
    echo '<script>window.location.replace("'.$_GET['callback_url'].'#bp_'.$_GET['post_id'].'")</script>';
    die;
    echo $query_dislike;
    exit();
?>