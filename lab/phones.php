<?php
    include("../functions.php");
    header('Content-Encoding: UTF-8');
    /*
    header('Content-type: text/csv; charset=UTF-8');
    $header = 'Content-Disposition: attachment; filename="Telefonos_'.date('d-m-Y').'.csv"';
    header($header);
    */

    $i = 0;
    $data[$i] =  array('Nombre', 'Apellido', 'Teléfono');
    $query_search_users = "SELECT * FROM users";
    $query_search_users = "SELECT * FROM users WHERE user_phone = '' ";
    $result_search_users = mysqli_query($linkli,$query_search_users) or die(mysqli_error());
    mysqli_query ($linkli,"SET NAMES 'utf8'") or die;
    while ($search_users = mysqli_fetch_array($result_search_users)){
        $i = $i + 1;
        $user_first_name = $search_users['user_first_name'];
        $user_last_name = $search_users['user_last_name'];
        $user_phone = $search_users['user_phone'];
        $user_email = $search_users['user_email'];
        //$data[$i] =  array( $user_first_name, $user_last_name , $user_phone, $user_email);
        //echo "('".$user_first_name . "', '". $user_last_name . "', '". $user_phone . "', '". $user_email . "'),<br>\n";
        //echo $user_phone . ",<br>\n";
    }
     // var_dump($data);
     /*
    $fp = fopen('php://output', 'wb');
    foreach ($data as $line) {
        fputcsv($fp, $line, ',');
    }
    fclose($fp);
    */
?>