<?php
    include ('../functions.php');
    if(isset($_GET['post_id'])){
        $post_id = $_GET['post_id'];
        $a=0;
        
        while ($a <= 3) {
            $query = "INSERT INTO likes (
                like_id,
                user_id,
                post_id,
                like_date,
                like_status
            ) VALUES (
                '".$post_id."_hulk_". rand(). "',
                'hulk',
                '".$post_id."',
                '". time() ."',
                'like');";
            
            echo $query . "<hr>";
            mysqli_query($linkli,$query) or die(mysqli_error());
            $a = $a +1;
        }

    }

    


?>
