<?php
    include("../functions.php");
    
    //if(isset($_GET['to']) && !empty($_GET['user_id'])){
        $q_friends = "SELECT * FROM users LIMIT 0,5;";
        $s_friends = mysqli_query($linkli,$q_friends) or die(mysqli_error());
        $nb = "";
        while ($friends_info = mysqli_fetch_array($s_friends)){
            $user_id = $friends_info['user_id'];
            $nb .= "<a href='#' onclick='u_id_replace(this)'>".$user_id . "</a><br>";
        };
    // };
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Show Friends</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="main.js"></script>

</head>
<body>
    <div>
        <form id="formulario">
            <button type="submit" id="btn" class="consultar">Ver mas</button>
        </form>
        <hr>
        <div id="resultado-ajax"><?php echo $nb?></div>
    </div>
    <script>
        $(document).ready(function() {
            from = 6;
            to = 5;
            $("#btn").click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    data: "from=" +  from + "&to=" +  to,
                    success: function(resultado) {
                        $("#resultado-ajax").html("");
                        $("#resultado-ajax").append(resultado);
                        from = from + 5;
                    }
                })
            })
            function u_id_replace($this){
                e.preventDefault();
                alert('$(this)');
                //$(this).fadeOut().html();
                $(this).hide();
            }
        })
        

        

    </script>
</body>
</html>