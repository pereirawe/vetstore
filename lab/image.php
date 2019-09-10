<?php
    include("../functions.php");
    

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Subir imágenes AJAX</title>
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
                <h2><a href="./"><i class="fas fa-home"></i></a> Subir imágenes AJAX</h2>
            </div>
        </nav>
    </header>
    <div class="container">
        <form id="form_user_banner" action="./image_uploader.php" method="post" enctype="multipart/form-data">
            <div class="image-upload">
                <p>Imágen</small></p>
                <label for="user_banner">
                    <i class="fas fa-edit"></i>
                    <img id="uploaded_image" src="" class="img-thumbnail" />
                </label>
                <input type="text" id="form_database" name="form_database" value="users" style="display: none;">
                <input type="text" id="form_table" name="form_table" value="user_banner" style="display: none;">
                <input type="file" class="form-control" id="user_banner" name="user_banner" aria-describedby="user_banner" onchange="this.form.submit()">
                <button type="submit" id="submit" name="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</body>
</html>