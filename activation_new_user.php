<?php
    include './functions.php';
    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
        $user_security_token = $_GET['user_security_token'];
        $user_activation_query = "UPDATE `users` SET `user_verified_token` = 'true'
                WHERE `users`.`user_id` = '".$user_id."'
                AND user_security_token = '".$user_security_token."';";
        mysqli_query ($linkli, $user_activation_query) or die;
        echo "<script type='text/javascript'>alert('La activación se realizó con exito!');</script>";
        echo '<script>window.location.replace("./login.php")</script>';
    } else {
        echo "Error en el enlace de activación";
    }
?>