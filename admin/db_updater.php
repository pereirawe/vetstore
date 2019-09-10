<?php
    include './functions.php';
    $version_id = 1;
    if(isset($_POST['submit'])){
        $query_update = " UPDATE admin SET user_rol_admin = '".$_POST['user_rol_admin']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET user_rol_manager = '".$_POST['user_rol_manager']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET url_facebook = '".$_POST['url_facebook']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET url_instagram = '".$_POST['url_instagram']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET url_google_plus = '".$_POST['url_google_plus']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET url_twitter = '".$_POST['url_twitter']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET url_youtube = '".$_POST['url_youtube']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET home_page_header_background = '".$_POST['home_page_header_background']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET home_page_left_content = '".$_POST['home_page_left_content']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        if (isset($_POST['form_check_user_name'])){
            $query_update = " UPDATE admin SET form_check_user_name = 'on' WHERE version_id = '" .$version_id. "'; ";
        } else{
            $query_update = " UPDATE admin SET form_check_user_name = '' WHERE version_id = '" .$version_id. "'; ";
        };
            $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        if (isset($_POST['form_check_phone'])){
            $query_update = " UPDATE admin SET form_check_phone = 'on' WHERE version_id = '" .$version_id. "'; ";
        } else{
            $query_update = " UPDATE admin SET form_check_phone = '' WHERE version_id = '" .$version_id. "'; ";
        };
            $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        if (isset($_POST['form_check_birthdate'])){
            $query_update = " UPDATE admin SET form_check_birthdate = 'on' WHERE version_id = '" .$version_id. "'; ";
        } else{
            $query_update = " UPDATE admin SET form_check_birthdate = '' WHERE version_id = '" .$version_id. "'; ";
        };
            $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        if (isset($_POST['form_check_opt_1'])){
            $query_update = " UPDATE admin SET form_check_opt_1 = 'on' WHERE version_id = '" .$version_id. "'; ";
        } else{
            $query_update = " UPDATE admin SET form_check_opt_1 = '' WHERE version_id = '" .$version_id. "'; ";
        };
            $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET form_opt_1_title = '".$_POST['form_opt_1_title']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        if (isset($_POST['form_check_opt_2'])){
            $query_update = " UPDATE admin SET form_check_opt_2 = 'on' WHERE version_id = '" .$version_id. "'; ";
        } else{
            $query_update = " UPDATE admin SET form_check_opt_2 = '' WHERE version_id = '" .$version_id. "'; ";
        };
            $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET form_opt_2_title = '".$_POST['form_opt_2_title']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        
        $query_update = " UPDATE admin SET cms_page_1_title = '".$_POST['cms_page_1_title']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET cms_page_1_content = '".$_POST['cms_page_1_content']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET cms_page_2_title = '".$_POST['cms_page_2_title']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET cms_page_2_content = '".$_POST['cms_page_2_content']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET cms_page_3_title = '".$_POST['cms_page_3_title']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET cms_page_3_content = '".$_POST['cms_page_3_content']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET cms_page_4_title = '".$_POST['cms_page_4_title']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET cms_page_4_content = '".$_POST['cms_page_4_content']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET cms_page_5_title = '".$_POST['cms_page_5_title']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET cms_page_5_content = '".$_POST['cms_page_5_content']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET cms_page_6_title = '".$_POST['cms_page_6_title']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET cms_page_6_content = '".$_POST['cms_page_6_content']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET cms_page_7_title = '".$_POST['cms_page_7_title']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET cms_page_7_content = '".$_POST['cms_page_7_content']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET cms_page_8_title = '".$_POST['cms_page_8_title']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET cms_page_8_content = '".$_POST['cms_page_8_content']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET cms_page_9_title = '".$_POST['cms_page_9_title']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET cms_page_9_content = '".$_POST['cms_page_9_content']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET cms_page_10_title = '".$_POST['cms_page_10_title']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
        $query_update = " UPDATE admin SET cms_page_10_content = '".$_POST['cms_page_10_content']."' WHERE version_id = '" .$version_id. "'; ";
        $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());

        //upload files
        /*
        $home_page_header_logo;
        $home_page_background;
        $page_header_logo;
        $page_background;
        */

        // LOGO DEL HOME
        $target_dir = "../uploads/";
        if(isset($_FILES["home_page_header_logo"]["name"]) && $_FILES["home_page_header_logo"]["size"] > 0){
            $target_file = $target_dir . basename($_FILES["home_page_header_logo"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["home_page_header_logo"]["tmp_name"]);
                if($check !== false) {
                    // echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            if ($_FILES["home_page_header_logo"]["size"] > 200000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow png file formats
            if($imageFileType != "png") {
                echo "Sorry, only PNG files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                $target_file = $target_dir . "home_page_header_logo_".time().".".$imageFileType;
                if (move_uploaded_file($_FILES["home_page_header_logo"]["tmp_name"], $target_file)) {
                    $home_page_header_logo_url = "https://vetstore.com.co/uploads/home_page_header_logo_".time().".".$imageFileType;
                    $query_update = " UPDATE admin SET home_page_header_logo = '".$home_page_header_logo_url."' WHERE version_id = '" .$version_id. "'; ";
                    $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        // FONDO DEL HOME
        if(isset($_FILES["home_page_background"]["name"]) && $_FILES["home_page_background"]["size"] > 0){
            $target_file = $target_dir . basename($_FILES["home_page_background"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["home_page_background"]["tmp_name"]);
                if($check !== false) {
                    // echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            if ($_FILES["home_page_background"]["size"] > 200000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if( $imageFileType != "jpeg" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $upload Ok is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                $target_file = $target_dir . "home_page_background_".time().".".$imageFileType;
                if (move_uploaded_file($_FILES["home_page_background"]["tmp_name"], $target_file)) {
                    $home_page_background_url = "https://vetstore.com.co/uploads/home_page_background_".time().".".$imageFileType;
                    $query_update = " UPDATE admin SET home_page_background = '".$home_page_background_url."' WHERE version_id = '" .$version_id. "'; ";
                    $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        if(isset($_FILES["page_header_logo"]["name"]) && $_FILES["page_header_logo"]["size"] > 0){
            $target_file = $target_dir . basename($_FILES["page_header_logo"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["page_header_logo"]["tmp_name"]);
                if($check !== false) {
                    // echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            if ($_FILES["page_header_logo"]["size"] > 200000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "png") {
                echo "Sorry, only PNG files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                $target_file = $target_dir . "page_header_logo_".time().".".$imageFileType;
                if (move_uploaded_file($_FILES["page_header_logo"]["tmp_name"], $target_file)) {
                    $page_header_logo_url = "https://vetstore.com.co/uploads/page_header_logo_".time().".".$imageFileType;
                    $query_update = " UPDATE admin SET page_header_logo = '".$page_header_logo_url."' WHERE version_id = '" .$version_id. "'; ";
                    $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        if(isset($_FILES["page_background"]["name"]) && $_FILES["page_background"]["size"] > 0){
            $target_file = $target_dir . basename($_FILES["page_background"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["page_background"]["tmp_name"]);
                if($check !== false) {
                    // echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            if ($_FILES["page_background"]["size"] > 200000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if( $imageFileType != "jpeg" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                $target_file = $target_dir . "page_background_".time().".".$imageFileType;
                if (move_uploaded_file($_FILES["page_background"]["tmp_name"], $target_file)) {
                    $page_background_url = "https://vetstore.com.co/uploads/page_background_".time().".".$imageFileType;
                    $query_update = " UPDATE admin SET page_background = '".$page_background_url."' WHERE version_id = '" .$version_id. "'; ";
                    $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        echo '<script>
                alert("Todo salio bien");
                window.location.href = "https://vetstore.com.co/admin/#'.time().'";
            </script>';
    };
    echo '<script>
                alert("Todo salió bien");
                window.location.href = "https://vetstore.com.co/admin/";
            </script>';
?>