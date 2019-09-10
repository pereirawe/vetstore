<?php
    include './functions.php';
    
    $post_id = "post_". uniqid(24). time();
    $post_date = time();
    $query_insert =
        "INSERT INTO `posts` (
            `user_id`,
            `post_id`,
            `post_date`,
            `post_content`,
            `post_attachment`,
            `post_link`
        ) VALUES (
            '".$_SESSION['user_id']."',
            '".$post_id."',
            '".$post_date."',
            '".$_POST['new_post_content']."',
            '',
            ''
            )";
    ;
    mysqli_query($linkli,$query_insert) or die(mysqli_error());
    
    if (isset($_FILES['post_attachment']) && $_FILES['post_attachment']['name'] != "") {
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
                        $target_file = $target_dir .$post_id .".".$imageFileType;
                        if (move_uploaded_file($_FILES["post_attachment"]["tmp_name"], $target_file)) {
                            $post_attachment_url = "https://vetstore.com.co/uploads/post_images/" .$post_id .".".$imageFileType;
                            $query_update = " UPDATE posts SET post_attachment = '".$post_attachment_url."' where post_id = '".$post_id."' ; ";
                            mysqli_query($linkli,$query_update) or die(mysqli_error());
                            echo "<img src='".$post_attachment_url."' width='300px'>";
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                            }
                    }
                }                
            }
        
        //Al subir la imagen que realice redirección a la pagina inicial    
        echo '<script>
        window.location.href = "https://vetstore.com.co/welcome.php";
        </script>';
        
            /*Al subir la imagen que realice redirección a la pagina del usuario
    echo '<script>
        window.location.href = "https://vetstore.com.co/welcome.php?perfil='.$_SESSION["user_user_name"].'#bp_'.$post_id.'";
        </script>';*/
?>