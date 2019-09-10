<?php
    include("../functions.php");
    
        $search_users_display = "";
        $search_users_account = 0;
        $query_search_users = "SELECT * FROM users";
        $result_search_users = mysqli_query($linkli,$query_search_users) or die(mysqli_error());
        while ($search_users = mysqli_fetch_array($result_search_users)){
            $search_users_account = $search_users_account + 1;
            $user_id = $search_users['user_id'];
            $user_user_name = $search_users['user_user_name'];
            $user_first_name = $search_users['user_first_name'];
            $user_last_name = $search_users['user_last_name'];
            $user_photo = $search_users['user_photo'];
            $user_email = $search_users['user_email'];
            $user_phone = $search_users['user_phone'];
            $user_registration_date = $search_users['user_registration_date'];
            $user_verified_token = $search_users['user_verified_token'];
            if ($user_verified_token == "true") {
                $user_status = '<span class="badge badge-success">Activo</span>';
            } else{
                $user_status = '<span class="badge badge-warning">No activo</span>';
            }
                
            $search_users_display .= '<li class="list-group-item">
                <div class="row">
                    <div class="col-md-4">
                        <a href="https://vetstore.com.co/welcome.php?perfil='.$user_user_name.'" target="_new">
                            <img src="'.$user_photo.'" width="36px">
                            '. $user_first_name. ' ' . $user_last_name . '
                            </a>
                    </div>
                    <div class="col-md-2">
                        '.$user_status.'
                    </div>
                    <div class="col-md-2">
                        '.$user_phone.'
                    </div>
                    <div class="col-md-4">
                        '.$user_email.'
                    </div>
                </div>
            </li>';
        }
        if ($search_users_account > 0 ){
            $search_users_display = '<h1>'.$search_users_account.' usuarios encontrados</h1>
                <ul class="list-group">
                '. $search_users_display. '
                </ul>
            ';
        }

        $search_display = $search_users_display;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Usuarios registrados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script src="main.js"></script>
    <style>
        body{
            background: #22c1c3;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #fdbb2d, #22c1c3);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #fdbb2d, #22c1c3); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }
        .container{
            padding: 20px 0px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <h2><a href="./"><i class="fas fa-home"></i></a> Usuarios registrados</h2>
            </div>
        </nav>
    </header>
    <div class="container">
<?php
        echo $search_display;
?>
    </div>
</body>
</html>