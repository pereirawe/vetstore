<?php
    session_start();
    include './functions.php';
    // Configuración del Perfil

    if (isset($_SESSION['user_id'])) {
        $log_query = implode(',' , $_POST);
        log_create("update_profile_data", $log_query, $_SESSION['user_id']);
    }

    if (isset($_POST['submit_1'])) {
        $query_update = " UPDATE users SET user_user_name = '".$_POST["user_user_name"]."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE users SET user_email = '".$_POST["user_email"]."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE users SET user_first_name = '".$_POST["user_first_name"]."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE users SET user_last_name = '".$_POST["user_last_name"]."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE users SET user_about_me = '".$_POST["user_about_me"]."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE users SET user_birthdate = '".$_POST["user_birthdate"]."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE users SET user_gender = '".$_POST["user_gender"]."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE users SET user_address = '".$_POST["user_address"]."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE users SET user_phone = '".$_POST["user_phone"]."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE users SET user_website = '".$_POST["user_website"]."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE users SET user_work_place = '".$_POST["user_work_place"]."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE users SET user_relationship = '".$_POST["user_relationship"]."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update) or die(mysqli_error());
        echo '<script>
                alert("Todo salió bien");
                window.location.href = "https://vetstore.com.co/welcome.php?config='.$_POST["user_user_name"].'&section=1";
            </script>';
    }

    // Mascotas
    if (isset($_POST['submit_2'])) {
        $user_id = $_POST["user_id"];
        $pet_id = "p_". uniqid();
        $query_insert = "INSERT INTO `pets` (
            `user_id`,
            `pet_id`,
            `pet_name`,
            `pet_avatar`,
            `pet_type`,
            `pet_race`,
            `pet_breed`,
            `pet_gender`,
            `pet_hobbies`,
            `pet_country`,
            `pet_birthdate`,
            `pet_about`,
            `pet_medical_prescription`,
            `pet_vacines`,
            `pet_foods`
        ) VALUES (
            '".$user_id."',
            '$pet_id',
            '".$_POST["pet_name"]."',
            '',
            '".$_POST["pet_type"]."',
            '".$_POST["pet_race"]."', '', '".$_POST["pet_gender"]."', '', '".$_POST["pet_country"]."',
            '".$_POST["pet_birthdate"]."',
            '".$_POST["pet_about"]."',
            '".$_POST["pet_medical_prescription"]."',
            '',
            ''
        )";
        mysqli_query($linkli,$query_insert) or die(mysqli_error());
        // AVATAR DE MASCOTAS
        $target_dir = "./uploads/pet_avatars/";
        if(isset($_FILES["pet_avatar"]["name"]) && $_FILES["pet_avatar"]["size"] > 0){
            $target_file = $target_dir . basename($_FILES["pet_avatar"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["pet_avatar"]["tmp_name"]);
                if($check !== false) {
                    // echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            if ($_FILES["pet_avatar"]["size"] > 5000000) {
                echo '<script>
                    alert("La imagen de "Foto de la Mascota" es muy grande. Requiere una menos a 2MB");
                    window.location.href = "https://vetstore.com.co/welcome.php?config='.$_POST["user_user_name"].'&section=6";
                </script>';
                $uploadOk = 0;
            }
            // Allow png file formats
            if( $imageFileType != "jpeg" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
                echo "Sorry, only PNG files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                $target_file = $target_dir . "pet_avatar_" .$user_id."_".$time_stamp.".".$imageFileType;
                if (move_uploaded_file($_FILES["pet_avatar"]["tmp_name"], $target_file)) {
                    $pet_avatar_url = "https://vetstore.com.co/uploads/pet_avatars/pet_avatar_" .$user_id."_".$time_stamp.".".$imageFileType;
                    $query_update = " UPDATE pets SET pet_avatar = '".$pet_avatar_url."' where pet_id = '".$pet_id."' ; ";
                    $_SESSION['pet_avatar'] = $pet_avatar_url;
                    $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } 
        echo '<script>
        alert("Todo salió bien");
        window.location.href = "https://vetstore.com.co/welcome.php?config='.$_POST["user_user_name"].'&section=2";
        </script>';
    }

    // Privacidad
    if (isset($_POST['submit_3'])) {
        $query_update_1 = " UPDATE users SET privacy_send_messages = '".$_POST["privacy_send_messages"]."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update_1) or die(mysqli_error());
        $query_update_2 = " UPDATE users SET privacy_see_my_friends = '".$_POST["privacy_see_my_friends"]."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update_2) or die(mysqli_error());
        $query_update_3 = " UPDATE users SET privacy_post_in_wall = '".$_POST["privacy_post_in_wall"]."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update_3) or die(mysqli_error());
        $query_update_4 = " UPDATE users SET privacy_see_my_birthdate = '".$_POST["privacy_see_my_birthdate"]."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update_4) or die(mysqli_error());
        /*echo '<script>
                alert("Todo salió bien");
                window.location.href = "https://vetstore.com.co/welcome.php?config='.$_POST["user_user_name"].'&section=3";
            </script>';*/
    }
    // Contraseña
    if (isset($_POST['submit_4'])) {
        $query_user = "select * from users WHERE user_id = '" . $_SESSION["user_id"] . "'";
        $result_query_user = mysqli_query($linkli,$query_user) or die(mysqli_error());
        while ($user_info = mysqli_fetch_array($result_query_user)){
            $user_id = $user_info['user_id'];
            $user_user_name = $user_info['user_user_name'];
            $user_password = $user_info['user_password'];
            $user_security_token = $user_info['user_security_token'];
            $decryptedpassword = substr(base64_decode($user_info['user_password']), 0,-11);
            $actual_encryptedpassword = base64_encode($_POST['user_actual_password']. $user_security_token);
            $new_encryptedpassword = base64_encode($_POST['user_new_password']. $user_security_token);
        }
        if ( $_SESSION['user_password'] == $actual_encryptedpassword ){
            $query_update = " UPDATE users SET user_password = '". $new_encryptedpassword ."' WHERE user_id = '".$_POST["user_id"]."'; ";
            mysqli_query($linkli,$query_update) or die(mysqli_error());
            $_SESSION['user_password'] = $new_encryptedpassword;
            echo '<script>
                alert("Las se actualizó con exito");
                window.location.href = "https://vetstore.com.co/welcome.php?config='.$_POST["user_user_name"].'&section=4";
            </script>';
        } else {
            echo '<script>
                alert("Su contraseña no coincide");
                window.location.href = "https://vetstore.com.co/welcome.php?config='.$_POST["user_user_name"].'&section=4";
            </script>';
        }
    }
    // Enlaces s
    if (isset($_POST['submit_5'])) {
        $query_update_1 = " UPDATE users SET user_links_facebook = '". $_POST["user_links_facebook"] ."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update_1) or die(mysqli_error());
        $query_update_2 = " UPDATE users SET user_links_twitter = '". $_POST["user_links_twitter"] ."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update_2) or die(mysqli_error());
        $query_update_3 = " UPDATE users SET user_links_instagram = '". $_POST["user_links_instagram"] ."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update_3) or die(mysqli_error());
        $query_update_4 = " UPDATE users SET user_links_google_plus = '". $_POST["user_links_google_plus"] ."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update_4) or die(mysqli_error());
        $query_update_5 = " UPDATE users SET user_links_linkedin = '". $_POST["user_links_linkedin"] ."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update_5) or die(mysqli_error());
        $query_update_6 = " UPDATE users SET user_links_youtube = '". $_POST["user_links_youtube"] ."' WHERE user_id = '".$_POST["user_id"]."'; ";
        mysqli_query($linkli,$query_update_6) or die(mysqli_error());
        echo '<script>
                alert("Todo salió bien");
                window.location.href = "https://vetstore.com.co/welcome.php?config='.$_POST["user_user_name"].'&section=5";
            </script>';
    }

    // Diseño y Avatares
    if (isset($_POST['submit_6']) || isset($_POST['submit_conf_6'])) {
        $user_id = $_POST['user_id'];
        // var_dump($_POST);
        // var_dump($_FILES);
        // FOTO DE PERFIL
        $target_dir = "./uploads/user_photos/";
        if(isset($_FILES["user_photo"]["name"]) && $_FILES["user_photo"]["size"] > 0){
            $target_file = $target_dir . basename($_FILES["user_photo"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["user_photo"]["tmp_name"]);
                if($check !== false) {
                    // echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            if ($_FILES["user_photo"]["size"] > 5000000) {
                echo '<script>
                    alert("La imagen de "Foto de Perfil" es muy grande. Requiere una menos a 2MB");
                    window.location.href = "https://vetstore.com.co/welcome.php?config='.$_POST["user_user_name"].'&section=6";
                </script>';
                $uploadOk = 0;
            }
            // Allow png file formats
            if( $imageFileType != "jpeg" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
                echo "Sorry, only PNG files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                $target_file = $target_dir . "user_photo_" .$user_id."_".$time_stamp.".".$imageFileType;
                if (move_uploaded_file($_FILES["user_photo"]["tmp_name"], $target_file)) {
                    $user_photo_url = "https://vetstore.com.co/uploads/user_photos/user_photo_" .$user_id."_".$time_stamp.".".$imageFileType;
                    $query_update = " UPDATE users SET user_photo = '".$user_photo_url."' where user_id = '".$user_id."' ; ";
                    $_SESSION['user_photo'] = $user_photo_url;
                    // echo $query_update; 
                    $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        // FONDO DE PERFIL
        $target_dir = "./uploads/user_banners/";
        
        if(isset($_FILES["user_banner"]["name"]) && $_FILES["user_banner"]["size"] > 0){
            $target_file = $target_dir . basename($_FILES["user_banner"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["user_banner"]["tmp_name"]);
                if($check !== false) {
                    // echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                    echo "File is an image.";
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            if ($_FILES["user_banner"]["size"] > 5000000) {
                echo '<script>
                    alert("La imagen de "Fondo" es muy grande. Requiere una menos a 2MB");
                    window.location.href = "https://vetstore.com.co/welcome.php?config='.$_POST["user_user_name"].'&section=6";
                </script>';
                $uploadOk = 0;
            }
            // Allow png file formats
            if( $imageFileType != "jpeg" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
                echo "Sorry, only PNG files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                $target_file = $target_dir . "user_banner_" .$user_id."_".$time_stamp.".".$imageFileType;
                if (move_uploaded_file($_FILES["user_banner"]["tmp_name"], $target_file)) {
                    $user_banner_url = "https://vetstore.com.co/uploads/user_banners/user_banner_" .$user_id."_".$time_stamp.".".$imageFileType;
                    $query_update = " UPDATE users SET user_banner = '".$user_banner_url."' where user_id = '".$user_id."' ; ";
                    $_SESSION['user_banner'] = $user_banner_url;
                    // echo $query_update; 
                    $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        // FOTO DE MASCOTA
        $target_dir = "./uploads/pet_main_photos/";
        if(isset($_FILES["pet_main_photo"]["name"]) && $_FILES["pet_main_photo"]["size"] > 0){
            $target_file = $target_dir . basename($_FILES["pet_main_photo"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["pet_main_photo"]["tmp_name"]);
                if($check !== false) {
                    // echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            if ($_FILES["pet_main_photo"]["size"] > 5000000) {
                echo '<script>
                    alert("La imagen de "Foto de Mascota" es muy grande. Requiere una menos a 2MB");
                    window.location.href = "https://vetstore.com.co/welcome.php?config='.$_POST["user_user_name"].'&section=6";
                </script>';
                $uploadOk = 0;
            }
            // Allow png file formats
            if( $imageFileType != "jpeg" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
                echo "Sorry, only PNG files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                $target_file = $target_dir . "pet_main_photo_" .$user_id."_".$time_stamp.".".$imageFileType;
                if (move_uploaded_file($_FILES["pet_main_photo"]["tmp_name"], $target_file)) {
                    $pet_main_photo_url = "https://vetstore.com.co/uploads/pet_main_photos/pet_main_photo_" .$user_id."_".$time_stamp.".".$imageFileType;
                    $query_update = " UPDATE users SET pet_main_photo = '".$pet_main_photo_url."' where user_id = '".$user_id."' ; ";
                    $_SESSION['pet_main_photo'] = $pet_main_photo_url;
                    $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        if ($_POST['submit_conf_6'] == "return_to_profile") {
            echo '<script>
                    alert("Todo salió bien");
                    window.location.href = "https://vetstore.com.co/welcome.php?perfil='.$_POST["user_user_name"].'";
                </script>';
        } else {
            echo '<script>
                    alert("Todo salió bien");
                    window.location.href = "https://vetstore.com.co/welcome.php?config='.$_POST["user_user_name"].'&section=6";
                </script>';
        }
    }
?>