<?php
    include("../functions.php");
    // FUNCION DE CREACION DE MINIATURA
    function make_thumb_re($src, $dest, $desired_width) {
        $source_image = imagecreatefromjpeg($src);
        // $source_image = imagecreatefrompng($src);
        $width = imagesx($source_image);
        $height = imagesy($source_image);
        $desired_height = floor($height * ($desired_width / $width));
        $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
        imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
        imagejpeg($virtual_image, $dest);
    }
    function cron_reimg($path, $max_size){
        $directorio = opendir($path);
        $limit = 0;
        while ($archivo = readdir($directorio))  {
            if (!is_dir($archivo)) {
                $actual_img_width = getimagesize($path . $archivo)[0] ; 
                $actual_img_height =  getimagesize($path . $archivo)[1];
                $imageFileType = strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
                if ($imageFileType == "jpg" || $imageFileType == "jpeg"){
                    if ( $actual_img_width > $max_size || $actual_img_height > $max_size ){
                        $old_size = getimagesize($path . $archivo);
                        // $path_reimg = str_replace("..", "https://vetstore.com.co" , $path );
                        $src= $path . $archivo;
                        $desired_width= $max_size;
                        echo "<h4>Imagen ".$archivo." </h4><hr>";
                        make_thumb_re($src, $src , $desired_width);
                        $new_size = getimagesize($path . $archivo);
                        $reduccion = ($new_size[0] / $old_size[0]) * 100;
                    };
                } else {
                    echo "<p>No es una imagen valida </p><hr> ";
                }
            };
        };
    };
    //cron_reimg("../uploads/post_images_test/", 1080 );
    cron_reimg("../uploads/user_photos/", 720 );
    cron_reimg("../uploads/post_images/", 720 );
    cron_reimg("../uploads/user_banners/", 720 );
    cron_reimg("../uploads/pet_main_photos/", 720 );
    cron_reimg("../uploads/pet_avatars/", 720 );

?>
