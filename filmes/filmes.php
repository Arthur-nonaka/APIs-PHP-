<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../single.css">
    <title>Filmes</title>
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
                    ' . $result->title . '
                </div>
                    Episodio ' . $result->episode_id . '
            </div>
            <a href="../">
            <div class="logo">
            </div>
            </a>
            <a href=../filmes>
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
                    <span>' . $result->opening_crawl . ' </span>
                    <span>Diretor: ' . $result->director . ' cm</span>
                    <span>Produtor: ' . $result->producer . ' kg</span>
                    <span>Data de lancamento: ' . $result->release_date . '</span>
                </div>
                <hr> ');

    echo '<hr><span> personagens: </span>';
    foreach ($result->characters as $character) {
        $ch = curl_init($character);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $character = json_decode(curl_exec($ch));
        echo '<a href="../pessoas/pessoas.php?value=' . $character->url . '">' . $character->name . '</a><br>';
    }
    ;

    echo '<hr><span> Planetas: </span>';
    foreach ($result->planets as $planet) {
        $ch = curl_init($planet);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $planet = json_decode(curl_exec($ch));
        echo '<a href="../planetas/planetas.php?value=' . $planet->url . '">' . $planet->name . '</a><br>';
    }
    ;

    echo '<hr><span> Naves: </span>';
    foreach ($result->starships as $starship) {
        $ch = curl_init($starship);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $starship = json_decode(curl_exec($ch));
        echo '<a href="../naves/naves.php?value=' . $starship->url . '">' . $starship->name . '</a><br>';
    }
    ;

    echo '<hr><span> Veiculos: </span>';
    foreach ($result->vehicles as $vehicle) {
        $ch = curl_init($vehicle);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $vehicle = json_decode(curl_exec($ch));
        echo '<a href="../veiculos/veiculos?value=' . $vehicle->url . '">' . $vehicle->name . '</a><br>';
    }
    ;

    echo '<hr><span> Espécies: </span>';
    foreach ($result->species as $specie) {
        $ch = curl_init($specie);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $specie = json_decode(curl_exec($ch));
        echo '<a href="../especies/species?value=' . $specie->url . '">' . $specie->name . '</a><br>';
    }
    ;

    echo ('</div>
            <div class="image">
                <img src="../images/' . $result->title . '.png">
            </div>

        </div>
        '
    );
    ?>
</body>

</html>