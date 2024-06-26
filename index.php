<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="img/icons8-rocha-48.png" />
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <title>IF GeoLab</title>
    <style>
        .minha-imagem {
            height: 220px;
            width: 600px;
            object-fit: cover;
        }

        .meu-span {
            background-color: rgba(0, 0, 0, 0.3);
            width: 100%;
        }
    </style>
</head>

<body>
    <?php

    if (isset($_COOKIE['acesso'])){
     if($_COOKIE['acesso']['permissao'] == 1) {
        include "topo-user.php";
    } elseif ($_COOKIE['acesso']['permissao'] == 2) {
        include "topo-adm.php";
    }} else {
        include "topo.php";
    }
    ?>
    <main>
        <div class="container">
            <h1>Laboratório</h1>
            <hr>
            <span>Conheça Rochas e Minerais e seus tipos</span>
            <hr>
            <div class="row">
                <div class="col s6">
                <a href="rocha.php">
                    <div class="card small green">
                        <div class="card-image">
                            <img src="img/rocha.png">
                        </div>
                        <div class="card-action green">
                            <h5 class="white-text">Rochas</h5>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col s6">
                <a href="mineral.php">
                    <div class="card small green">
                        <div class="card-image">
                            <img src="img/mineral.png">
                        </div>
                        <div class="card-action green">
                            <h5 class="white-text">Minerais</h5>
                        </div>
                    </div>
                    </a>
                </div>
            </div>

            <hr>
        </div>
    </main>
    <?php
    include "footer.php";
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.materialboxed');
            var instances = M.Materialbox.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function() {
            $('.materialboxed').materialbox();
        });
    </script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>

</html>