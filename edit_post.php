<?php
    include './functions.php';
    if(isset($_POST['post_id'])){
        $post_id = $_POST['post_id'];
        $post_content = $_POST[$post_id];
        $query_update_post = "UPDATE posts SET post_content = '".$post_content."' WHERE post_id = '".$_POST['post_id']."';";
        // echo $query_update_post;
        mysqli_query($linkli,$query_update_post) or die(mysqli_error());

        if (isset($_FILES['post_attachment_edit']) && $_FILES['post_attachment_edit']['name'] != "") {
            $_FILES["post_attachment"] = $_FILES['post_attachment_edit'] ;
            $target_dir = "./uploads/post_images/";
                    if(isset($_FILES["post_attachment"]["name"]) && $_FILES["post_attachment"]["size"] > 0){
                        $target_file = $target_dir . basename($_FILES["post_attachment"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        // Check if image file is a actual image or fake image
                        if(isset($_POST["submit"])) {
                            $check = getimagesize($_FILES["post_attachment"]["tmp_name"]);
                            if($check !== false) {
                                 echo "File is an image - " . $check["mime"] . ".";
                                $uploadOk = 1;
                            } else {
                                echo "File is not an image.";
                                $uploadOk = 0;
                            }
                        }
                        if ($_FILES["post_attachment"]["size"] > 5000000) {
                            echo '<script>
                                alert("La imagen de "Fondo" es muy grande. Requiere una menos a 5MB");
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
                            $target_file = $target_dir .$post_id. "_". time() .".".$imageFileType;
                            if (move_uploaded_file($_FILES["post_attachment"]["tmp_name"], $target_file)) {
                                $post_attachment_url = "https://vetstore.com.co/uploads/post_images/" .$post_id. "_". time() .".".$imageFileType;
                                $query_update = " UPDATE posts SET post_attachment = '".$post_attachment_url."' where post_id = '".$post_id."' ; ";
                                // echo $query_update;
                                //echo "<img src='".$post_attachment_url. "#".time() ."' width='300px'>";
                                mysqli_query($linkli,$query_update) or die(mysqli_error());
                            } else {
                                echo "Sorry, there was an error uploading your file.";
                                }
                        }
                    }                
                }
        echo '<script>window.location.replace("./welcome.php?perfil='.$_SESSION['user_user_name'].'#bp_'.$post_id.'")</script>';
        // echo '<hr><a href="./welcome.php?perfil='.$_SESSION['user_user_name'].'#bp_'.$post_id.'"> Regresar </a>';
    }
?>