<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="img/icons8-mineral-48.png" />
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link rel="stylesheet" href="css/3d.css">
    <title>IF GeoLab</title>
    <style>
        .minha-imagem {
            height: 400px;
            width: 400px;
            object-fit: cover;
            align-items: center;
        }

        .meu-span {
            background-color: rgba(0, 0, 0, 0.6);
            width: 100%;
        }

        .icon {
            height: 32px;
            width: 32px;
            align-items: center;
            position: absolute;
        }
    </style>
</head>

<body>
    <?php
    if (isset ($_COOKIE['acesso']) && $_COOKIE['acesso']['permissao'] == 1) {
        include "topo-user.php";
    } elseif (isset ($_COOKIE['acesso']) && $_COOKIE['acesso']['permissao'] == 2) {
        include "topo-adm.php";
    } else {
        include "topo.php";
    }
    ?>
    <main>
        <br><br>
        <?php

        include_once ('conecta.php');
        $conexao = conectar();
        $idmineral = $_GET['idmineral'];

        $sql = "SELECT * FROM mineral WHERE idmineral =" . $idmineral;
        $resultado = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            $dados = mysqli_fetch_assoc($resultado);
            $img = $dados['img'];
            $catJ = $dados['idcat'];
            $idrock = $dados['idmineral'];
            $obj = $dados['3d'];
            $nome = $dados['nome'];
        }

        $j = "SELECT * FROM catmineral WHERE idcat='$catJ'";
        $res = mysqli_query($conexao, $j);
        while ($d = mysqli_fetch_assoc($res)) {
            $idcat = $d['idcat'];
            $name = $d['nome'];
        }
        if ($dados['idcat'] == $idcat) {
            $cat = $name;
        } else {
            echo "Erro ao buscar a categoria no banco de dados!";
        }


        ?>

        <div class="container">
            <div class="row">
                <div class="wrapp">
                    <div class="card">
                        <div class="card__item">
                            <model-viewer class="card__model" loading="eager"
                                style="background-color: rgb(255,255,255);" shadow-intensity="1"
                                src="obj/<?php echo $obj; ?>" camera-orbit="45deg 55deg" autoplay auto-rotate
                                camera-controls ar ios-src="obj/<?php echo $obj; ?>"></model-viewer>
                            <span class="card__txt">
                                <?php echo $nome; ?>
                            </span>
                        </div>
                        <a class="center waves-effect waves-light btn green accent-4"
                            href="relatorioMineral.php?idmineral=<?php echo $idmineral; ?>">
                            <img class="pdf" src="img/pdf-icon.png">Gerar PDF</a>
                    </div>
                </div>
                <h5><b>Categoria:</b>
                    <?php echo $cat; ?>
                </h5>

            </div>
        </div>

        <hr>
        <div class="container">
            <div class="col s12 m6 l4">
                <h5>
                    <?php echo $dados['descricao']; ?>
                </h5>
            </div>
            <hr>
        </div>
    </main>
    <br><br><br>
    <?php
    include "footer.php";
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });
    </script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
</body>

</html>