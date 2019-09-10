<?php include("../functions.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Funcion Me gusta AJAX</title>
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
            background: #22c1c3; 
            background: -webkit-linear-gradient(to right, #fdbb2d, #22c1c3);
            background: linear-gradient(to right, #fdbb2d, #22c1c3);
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
                <h2><a href="./"><i class="fas fa-home"></i></a> Funcion Me gusta AJAX</h2>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="post_tools">
            <a class="btn btn-light" data-toggle="modal" data-target="#modpost_245bbcb105a75811539092741"><i class="fas fa-edit"></i></a>
            <a href="./delete_post.php?post_id=post_245bbcb105a75811539092741" class="btn btn-light"><i class="fas fa-trash"></i></a>
            <a class="btn btn-light" style="float: right;" data-toggle="modal" data-target="#commentpost_245bbcb105a75811539092741"><i class="fas fa-comments"></i></a>
            <div id="no_like_post_245bbcb105a75811539092741" class="btn btn-light" style="float: right;" onclick="no_like('post_245bbcb105a75811539092741', 'u_5b4ceab93d6a9')">
                <i class="fas fa-thumbs-down" ></i>
                <span id="no_like_post_245bbcb105a75811539092741_account"></span>
            </div>
            <div id="like_post_245bbcb105a75811539092741" class="btn btn-light" style="float: right;" onclick="like('post_245bbcb105a75811539092741', 'u_5b4ceab93d6a9')">
                <i class="fas fa-thumbs-up"></i></i>
                <span id="like_post_245bbcb105a75811539092741_account"></span>
            </div>
        </div>
        <script>
            function loadPHPDoc(post_id, action_query){
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // myFunction(this);
                    }
                }
                xmlhttp.open("GET", action_query , true);
                xmlhttp.send();
            }
            function no_like(post_id, user_id){
                var no_like_btn = '#no_like_' + post_id;
                var no_like_account = '#no_like_' + post_id + "_account";
                var like_btn = '#like_' + post_id;
                var like_account = '#like_' + post_id + "_account";
                var action_query = "../like_post.php?post_id=" + post_id + "&user_id=" + user_id + "&action=no_like";
                $(no_like_btn).css("color", "rgb(200, 35, 51)");
                $(like_btn).css("color", "#212529");
                $(no_like_account).html("1");
                $(like_account).html("");
                if ($(no_like_btn).css("color") ==  "rgb(200, 35, 51)"){
                    $(no_like_btn).css("color", "#212529");
                    $(no_like_account).html("");
                    var action_query = "../like_post.php?post_id=" + post_id + "&user_id=" + user_id + "&action=NULL";
                }
                loadPHPDoc(post_id, action_query);
            }
            function like(post_id, user_id){
                var no_like_btn = '#no_like_' + post_id;
                var no_like_account = '#no_like_' + post_id + "_account";
                var like_btn = '#like_' + post_id;
                var like_account = '#like_' + post_id + "_account";
                var action_query = "../like_post.php?post_id=" + post_id + "&user_id=" + user_id + "&action=like";
                $(like_btn).css("color", "rgb(0, 105, 217)");
                $(no_like_btn).css("color", "#212529");
                $(like_account).html("1");
                $(no_like_account).html("");
                if ($(like_btn).css("color") ==  "rgb(0, 105, 217)"){
                    $(like_btn).css("color", "#212529");
                    $(like_account).html("");
                    var action_query = "../like_post.php?post_id=" + post_id + "&user_id=" + user_id + "&action=NULL";
                }
                loadPHPDoc(post_id, action_query);
            }
        </script>
    </div>
</body>
</html>