<?php
    require_once './database.php';
    //var_dump($_POST);
    $comment_post_content = $_POST['comment'];
    $post_owner_user_user_name = $_POST['post_owner_user_user_name'];
    $post_id = $_POST['comment_post_id'];

    $insert_comment_query="INSERT INTO posts_comments (
        user_id,
        post_id,
        comment_id,
        comment_date,
        comment_content,
        comment_attachtment
    ) VALUES (
        '".$_POST['comment_user_id']."',
        '".$_POST['comment_post_id']."',
        'com_". time() ."_" .$_POST['comment_post_id'] ."',
        '". time() ."',
        '".$comment_post_content."',
        '');";
    // echo $insert_comment_query;
    
    function mysqli_result($res,$row=0,$col=0){ 
        $numrows = mysqli_num_rows($res); 
        if ($numrows && $row <= ($numrows-1) && $row >=0){
            mysqli_data_seek($res,$row);
            $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
            if (isset($resrow[$col])){
                return $resrow[$col];
            }
        }
        return false;
    }
    $queryUserPlain = "SELECT user_first_name, user_user_name, user_last_name, user_photo FROM users WHERE user_id = '$_POST[comment_user_id]'";

    $fininshQuery = mysqli_query($linkli,$insert_comment_query) or die(mysqli_error());
    $queryUser = mysqli_query($linkli,$queryUserPlain);
    $data = mysqli_fetch_array($queryUser, MYSQLI_NUM);
    echo json_encode($data);
    return false;