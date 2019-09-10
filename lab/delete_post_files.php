<?php
    include("../functions.php");

    function delete_unused_post_file(){
        global $linkli;
        $path = "../uploads/post_images/";
        $directorio = opendir($path);
        while ($archivo = readdir($directorio))  {
            if (!is_dir($archivo)) {
                $post_id = substr($archivo, 0 , 30);
                $query_post = "SELECT * FROM posts WHERE post_id ='".$post_id."'; ";
                $result_post = mysqli_query($linkli,$query_post) or die(mysqli_error());
                while ($post_info = mysqli_fetch_array($result_post)){
                    $post_date = $post_info['post_date'];
                    echo $post_date ."<br>";
                }
                if (!isset($post_date)){
                    if (!unlink( $path . $archivo )){
                        echo "<h2>No se pudo borrar el archivo: ".$path . $archivo . "</h2>"."<hr>";
                    }else{
                        echo "<h2>Archivo: ".$path . $archivo ." borrado</h2>"."<hr>";
                    }
                }
            }
        }
    }
    delete_unused_post_file();
?>