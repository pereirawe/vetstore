<?php
    include '../functions.php';
    $query_all_users = "SELECT * FROM users WHERE user_id != 'u_5c5e5308b04ef';"; 
    $result_all_users = mysqli_query($linkli,$query_all_users) or die(mysqli_error());
    while ($user_info = mysqli_fetch_array($result_all_users)){
        $user_id = $user_info['user_id'];
        $is_friend = 0;
        $query_if_friends = "SELECT * FROM friends WHERE ((users_id_a = 'u_5c5e5308b04ef' AND users_id_b = '".$user_id."') or (users_id_b = 'u_5c5e5308b04ef' AND users_id_a = '".$user_id."') ) ;";
        $result_if_friends = mysqli_query($linkli,$query_if_friends) or die(mysqli_error());
        while ($friendship = mysqli_fetch_array($result_if_friends)){
            $is_friend = 1;
            $friends_request_date = $friendship['friends_request_date'];
            $friends_answer_date = $friendship['friends_answer_date'];
            $friends_relation_id = $friendship['friends_relation_id'];
            if ($friends_request_date != "") {
                echo "Are friends";
                if ($friends_answer_date == ""){
                    echo " but not acepted.";
                    $query_accept_friend = "UPDATE friends SET friends_answer_date = '".time()."' WHERE friends_relation_id = '".$friends_relation_id."';"; 
                    mysqli_query($linkli,$query_accept_friend) or die(mysqli_error());
                }
                echo "<hr>";
            }
        }
        if ($is_friend == 0){
            echo "Aren't friends"."<hr>";
            $user_id_a = "u_5c5e5308b04ef";
            $friends_relation_id = "fr_" . uniqid();
            $friends_request_date = time();
            $user_id_b = $user_id;
            $add_friend_query = "INSERT INTO friends (
                friends_relation_id,
                users_id_a,
                users_id_b,
                friends_request_date,
                friends_answer_date
            ) VALUES (
                '".$friends_relation_id."',
                '".$user_id_a."',
                '".$user_id_b."',
                '".$friends_request_date."',
                '".$friends_request_date."'
            );";
            $result_query_user_friend = mysqli_query($linkli,$add_friend_query) or die(mysqli_error());
        }
    }
?>