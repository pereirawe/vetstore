<?php
    include("../functions.php");

    
    if(isset($_POST['to'])){
        $from= $_POST['from'];
        $to = $_POST['to'];
        $q_friends = "SELECT * FROM users LIMIT ". $from.",".$to.";";
        //echo $q_friends ."<hr>";
        $s_friends = mysqli_query($linkli,$q_friends) or die(mysqli_error());
        $resultado = "";
        while ($friends_info = mysqli_fetch_array($s_friends)){
            $user_id = $friends_info['user_id'];
            $resultado .= $user_id . "<hr>";
        };
        echo $resultado;
    }
?>