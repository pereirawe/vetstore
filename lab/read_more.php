<?php
    include("../functions.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Leer más...</title>
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
        .tooltip-inner {
            width: 30rem !important;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <h2><a href="./"><i class="fas fa-home"></i></a> Leer más...</h2>
            </div>
        </nav>
    </header>
    <div class="container">
        <p id="text_123" >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis imperdiet magna a dignissim porta. Suspendisse pulvinar ipsum nibh, eget tincidunt urna luctus vel. Nullam eu lacinia nulla, ut posuere lacus. Morbi vel mi diam. Donec vel enim consectetur diam hendrerit lacinia. Nunc ultrices hendrerit massa quis volutpat. Curabitur at vehicula ligula. Pellentesque finibus, nibh in venenatis convallis, tellus nisi elementum nisi, eget feugiat ligula mauris at metus. Nullam varius pellentesque placerat. Etiam mollis id urna a bibendum. Sed purus dolor, suscipit venenatis tortor in, blandit vestibulum libero. Ut pretium sed magna sit amet mollis. Nunc et arcu cursus, venenatis arcu eu, auctor leo. Quisque turpis massa, dapibus vitae lacus in, fermentum consectetur tortor. Integer pellentesque iaculis consequat. Maecenas fringilla dignissim egestas. Sed tincidunt libero et dui tincidunt suscipit vel vel nulla. Sed ut tincidunt libero, ac ullamcorper arcu. Maecenas non elit odio. Pellentesque tincidunt nisl at molestie placerat. Nullam feugiat laoreet felis placerat vulputate. Curabitur tempor ullamcorper facilisis. Ut lobortis lectus consectetur sodales blandit. Mauris sed auctor enim, vitae maximus orci. </p>
        <hr>
        <p id="text_456" >Compartimos el video dando a conocer el feliz ganador de nuestra Actividad del Bono por $250.000 pesos colombianos, para ser redimidos en nuestra tienda.vetstore.com.co Damos gracias a Lilo y Lord por su dedicación, compromiso y buen trabajo, esperamos que sigan igual de activos y contar con ellos en futuras actividades. https://youtu.be/hllg-ZeY86I</p>
    </div>
    <script>

        function read_more(rm_block){
            var text_id = rm_block;
            var text_dom = "#" + rm_block;
            //var text_id = "'" + text_id + "'";
            var text = $(text_dom);
            var text_complete = $(text_dom).html();
            var text_complete_length = text_complete.split(/\b[\s,\.\-:;]*/).length;
            var text_limit = 20;
            if (text_complete_length >= text_limit){
                var text_short = text_complete.split(/\b[\s,\.\-:;]*/, text_limit );
                var read_more_btn = "<span id='read_more_btn" + text_id + "'><b>... Leer más</b></span>";
                text_short = text_short.join(" ");
                text.html(text_short + read_more_btn);
                $("#read_more_btn" + text_id ).on("click", function(){
                        text.html(text_complete);
                });
            }

        }
        read_more('text_123');
        read_more('text_456');
        
    </script>
</body>
</html>