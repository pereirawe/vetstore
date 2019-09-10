<?php
    include("../functions.php");
    
    $top_ten_display = "<ol>";
    $position = 1;
    $query_like_account = "SELECT post_id , COUNT(post_id) AS like_account FROM likes GROUP BY post_id ORDER BY like_account DESC  LIMIT 10;";
    $result_like_account = mysqli_query($linkli,$query_like_account) or die(mysqli_error());
    while ($result_like_top = mysqli_fetch_array($result_like_account)){
        $user_who_like_display = "";
        $post_id = $result_like_top['post_id'];
        $like_account = $result_like_top['like_account'];
        $query_who_likes = "SELECT * FROM likes WHERE post_id = '".$post_id."' AND like_status = 'like';";
        $result_who_likes = mysqli_query($linkli,$query_who_likes) or die(mysqli_error());
        while ($who_likes = mysqli_fetch_array($result_who_likes)){
            $user_id = $who_likes['user_id'];
            $query_user_who_like = "SELECT * FROM users WHERE user_id= '$user_id'";
            $result_user_who_like = mysqli_query($linkli,$query_user_who_like) or die(mysqli_error());
            while ($user_who_like = mysqli_fetch_array($result_user_who_like)){
                $user_id = $user_who_like['user_id'];
                $user_user_name = $user_who_like['user_user_name'];
                $user_first_name = $user_who_like['user_first_name'];
                $user_last_name = $user_who_like['user_last_name'];
                $user_who_like_display .= "<small>".$user_user_name . "</small><br>";
            }
        }
        $top_ten_display .= "<li>
                El Post ID <a
                    class='btn btn-secondary'
                    href='../welcome.php#bp_" . $post_id . "'
                    target='blank'
                    data-toggle='tooltip' data-placement='right' data-html='true' title='".$user_who_like_display."'>
                " . $post_id . " </a> tiene " . $like_account ." likes.
            </li>";
        $position = $position + 1 ;
    }
    $top_ten_display .= "</ol>";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TOP de likes en publicaciones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script src="main.js"></script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <style>
        body{
            background: #22c1c3;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #fdbb2d, #22c1c3);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #fdbb2d, #22c1c3); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }
        .container{
            padding: 20px 0px;
        }
        .tooltip-inner {
            width: 30rem !important;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <h2><a href="./"><i class="fas fa-home"></i></a> TOP de likes en publicacioens</h2>
            </div>
        </nav>
    </header>
    <div class="container">
<?php
       echo $top_ten_display;
?>
    </div>
</body>
</html>