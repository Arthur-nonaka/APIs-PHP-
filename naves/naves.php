<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../single.css">
    <title>Naves</title>
</head>

<body>
    <?php
    $x = $_GET['value'];
    $ch = curl_init("$x");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = json_decode(curl_exec($ch));

    echo ('
        <div class="header">
            <div>
                <div class="title"> 
                    ' . $result->name . '
                </div>
                    ' . $result->model . '
            </div>
            <a href="../">
            <div class="logo">
            </div>
            </a>
            <a href=../naves?page=1>
            <div>
             <
            </div>
            </a>
        </div>
        <div class="main">
            <div class="particao">
                <div class="subtitle">
                    Informações
                </div>
                <hr>    
                <div class="opcoes">
                    <span>Empresa: ' . $result->manufacturer . ' </span>
                    <span>preço: ' . $result->cost_in_credits . ' </span>
                    <span>Tamanho: ' . $result->length . ' </span>
                    <span>Velocidade Maxima: ' . $result->max_atmosphering_speed . '</span>
                    <span>Tripulação: ' . $result->crew . ' </span>
                    <span>Passageiros: ' . $result->passengers . '</span>
                    <span>Capacidade de Carga: ' . $result->cargo_capacity . '</span>
                </div>
                <hr> ');
    echo '<span> Pilotos: </span>';
    if ($result->pilots != []) {
        foreach ($result->pilots as $pilot) {
            $ch = curl_init($pilot);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $pilot = json_decode(curl_exec($ch));
            echo '<a href="../pessoas/pessoas.php?value=' . $pilot->url . '">' . $pilot->name . '</a><br>';
        }
        ;
    } else {
        echo "N/A </span>";
    }


    echo '<hr><span> Filmes: </span>';
    foreach ($result->films as $film) {
        $ch = curl_init($film);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $film = json_decode(curl_exec($ch));
        echo '<a href="../filmes/filmes.php?value=' . $film->url . '">' . $film->title . '</a><br>';
    }
    ;

    echo ('</div>
            <div class="image">
                <img src="../images/' . $result->name . '.png">
            </div>

        </div>
        '
    );
    ?>
</body>

</html>