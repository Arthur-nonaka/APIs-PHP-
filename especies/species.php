<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../single.css">
    <title>Especies</title>
</head>

<body>
    <?php
    $x = $_GET['value'];
    $ch = curl_init("https://swapi.dev/api/species/$x");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = json_decode(curl_exec($ch));

    echo ('
        <div class="header">
            <div>
                <div class="title"> 
                    ' . $result->name . '
                </div>
                    ' . $result->classification . '
            </div>
            <a href="../">
            <div class="logo">
            </div>
            </a>
            <a href=../especies?page=1>
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
                    <span>Altura média: ' . $result->average_height . '</span>
                    <span>Anos de Vida médio: ' . $result->average_lifespan . '</span>
                    <span>Cor de Pele: ' . $result->skin_colors . ' </span>
                    <span>Olhos: ' . $result->eye_colors . '</span>
                </div>
                <hr> ');

    echo '<span> Planeta Natal: ';
    $ch = curl_init($result->homeworld);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $planet = json_decode(curl_exec($ch));
    echo $planet->name . '</span>';
    echo ('
                    <span>Designãçao: ' . $result->designation . ' </span>
                    <span>Lingua: ' . $result->language . '</span>
                <hr> ');

    echo '<span> Pessoas: </span>';
    foreach ($result->people as $people) {
        $ch = curl_init($people);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $people = json_decode(curl_exec($ch));
        echo $people->name . '<br>';
    };
    echo '<hr><span> Filmes: </span>';
    foreach ($result->films as $film) {
        $ch = curl_init($film);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $film = json_decode(curl_exec($ch));
        echo $film->title . '<br>';
    };

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