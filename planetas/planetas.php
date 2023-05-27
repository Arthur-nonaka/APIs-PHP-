<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../single.css">
    <title>Planetas</title>
</head>

<body>
    <?php
    $x = $_GET['value'];
    $ch = curl_init("https://swapi.dev/api/planets/$x");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = json_decode(curl_exec($ch));

    echo ('
        <div class="header">
            <div>
                <div class="title"> 
                    ' . $result->name . '
                </div>
            </div>
            <a href="../">
            <div class="logo">
            </div>
            </a>
            <a href=../planetas?page=1>
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
                    <span>População: ' . $result->population . '</span>
                    <hr>
                    <span>Rotação: ' . $result->rotation_period . '</span>
                    <span>Translação: ' . $result->orbital_period . '</span>
                    <span>Diametro: ' . $result->diameter . '</span>
                    <hr>
                    <span>Clima: ' . $result->climate . '</span>
                    <span>Terreno: ' . $result->terrain . '</span>
                </div>
                <hr> ');

    echo '<span> Residents: </span>';
    foreach ($result->residents as $resident) {
        $ch = curl_init($resident);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $people = json_decode(curl_exec($ch));
        echo $people->name . '<br>';
    }
    ;
    echo '<hr><span> Filmes: </span>';
    foreach ($result->films as $film) {
        $ch = curl_init($film);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $film = json_decode(curl_exec($ch));
        echo $film->title . '<br>';
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