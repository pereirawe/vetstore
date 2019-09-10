<?php
    include ('./functions.php');
    $post_id = $_GET['post_id'];
    $user_id = $_GET['user_id'];
    $action = $_GET['action'];
    $is_like = 0;
    $query_if_like = "SELECT * FROM likes WHERE user_id = '".$user_id."' AND post_id = '".$post_id."' ";
    $result_query_if_like = mysqli_query($linkli,$query_if_like) or die(mysqli_error());
    while ($if_like = mysqli_fetch_array($result_query_if_like)){
        $is_like = $is_like +1 ;
        $like_id = $if_like['like_id'];
        $user_id = $if_like['user_id'];
        $post_id = $if_like['post_id'];
        $like_date = $if_like['like_date'];
        $like_status = $if_like['like_status'];
    }
    if($is_like > 0){
        $query_update_like = "UPDATE likes SET like_status = '".$action."' WHERE user_id = '".$user_id."' AND post_id = '".$post_id."' ;";
        $log_query = $query_update_like;
        mysqli_query($linkli,$query_update_like);
    } else {
        $query_like = "INSERT INTO likes (
            like_id,
            user_id,
            post_id,
            like_date,
            like_status
        ) VALUES (
            'like_".$post_id."_".time()."',
            '".$_GET['user_id']."',
            '". $post_id ."',
            '".time()."',
            '". $action ."'); ";
        $log_query = $query_like;
        mysqli_query($linkli,$query_like);
    }
    $log_query = str_replace("'", "\'" , $log_query );
    if (isset($_SESSION['user_id'])) {
        log_create("like", $log_query, $_SESSION['user_id'] );
        
	}


    // echo '<script>window.location.replace("'.$_GET['callback_url'].'#bp_'.$_GET['post_id'].'")</script>';
    /*
    https://www.w3schools.com/xml/ajax_examples.asp
    https://www.w3schools.com/xml/ajax_php.asp
    https://www.w3schools.com/xml/tryit.asp?filename=tryajax_xml2
    https://www.w3schools.com/xml/tryit.asp?filename=tryxml_display_table
    https://www.w3schools.com/xml/tryit.asp?filename=tryajax_suggest_php
    https://www.w3schools.com/xml/tryit.asp?filename=tryajax_database
    https://www.w3schools.com/xml/cd_catalog.xml
    https://www.w3schools.com/php/php_ajax_php.asp
    */
?>