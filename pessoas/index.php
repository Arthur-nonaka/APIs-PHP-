<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pessoas</title>
</head>

<body>
    <?php
    $url = "https://swapi.dev/api/people/";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = json_decode(curl_exec($ch));
    foreach ($result->results as $ator) {
        echo "<h3>Nome: " . $ator->name . "</h3>";
        if($ator->gender == "male" ) {
            echo "genero: masculino <br>";
        }
        if($ator->gender == "female"){
            echo "genero: feminino <br>";
        }
        if($ator->gender == "n/a"){
            echo "genero: n/a <br>";
        }
        echo "Espécie: " . $ator->specie . " <br>";
        echo "Altura: " . $ator->height . " cm <br>";
        foreach ($ator->films as $filmUrl) {
            $ch = curl_init($filmUrl);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = json_decode(curl_exec($ch));
            echo "Filme: ".$result->title. "<br>";
        }
        echo "<br> <hr>";
    }
    ?>
    <main>


    </main>
</body>

</html>