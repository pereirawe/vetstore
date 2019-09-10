<?php include './functions.php';

    if(isset($_GET['friends_relation_id'])){
        $friends_relation_id = $_GET['friends_relation_id'];
        $query_remove = "DELETE FROM friends WHERE friends_relation_id = '".$friends_relation_id."';";
        mysqli_query($linkli,$query_remove) or die(mysqli_error());
        if (isset($_SESSION['user_id'])) {
            $log_query = $query_remove;
            log_create("remove_friend", $friends_relation_id, $_SESSION['user_id']);
        }
        // echo '<script>window.location.replace("./welcome.php")</script>';
    }
?>