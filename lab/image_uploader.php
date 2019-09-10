<?php
    /*
    https://www.formget.com/ajax-image-upload-php/
    http://coderzone.org/library/Resize-and-convert-an-image-to-a-PNG-using-GD_1062.htm
    http://theonlytutorials.com/convert-image-to-jpg-png-gif-in-php/
    */
    $table = $_POST['form_table'];
    $database = $_POST['form_database'];
    $user_id = "user_id_123456"; //CHANGE -> $user_id = $_SESSION['user_id'];
    $_FILES[$table];
    $file = $_FILES[$table];
    $target_dir = "./uploads/"; //CHANGE ->  $target_dir = "./uploads/". $table ."/";
    function image_uploader($target_dir, $file, $database, $table, $user_id){
        if(isset($file["name"]) && $file["size"] > 0){
            $target_file = $target_dir . basename($file["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if(isset($_POST["submit"])) {
                $check = getimagesize($file["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            if ($file["size"] > 5000000) {
                $uploadOk = 0;
            }
            if( $imageFileType != "jpeg" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
                $uploadOk = 0;
            }
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            $target_file = $target_dir . $table . "_" .$user_id."_".$time_stamp.".".$imageFileType;
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                $file_url = "https://vetstore.com.co/uploads/".$table."s/".$table."_" .$user_id."_".$time_stamp.".".$imageFileType; // to update de database
                $query_update = "UPDATE users SET ".$table." = '".$file_url."' WHERE user_id = '".$user_id."' ; ";
                // CHANGE -> $result_version = mysqli_query($linkli,$query_update) or die(mysqli_error());
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    image_uploader($target_dir, $file, $database, $table, $user_id);
?>