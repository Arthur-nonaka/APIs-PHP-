<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Especies</title>
</head>

<body>
    <?php
    $url = "https://swapi.dev/api/species/";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = json_decode(curl_exec($ch));
    foreach ($result->results as $especies) {
        echo "<h3>" . $especies->name . "</h3>";
        echo "altura média: " . $especies->average_height . " cm <br>";
        echo "Lingua: " . $especies->language . " <br>";
        if ($especies->homeworld == '') {
            echo "Planeta Natal: n/a <br>";
        } else {
            $ch = curl_init($especies->homeworld);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = json_decode(curl_exec($ch));
            echo "Planeta Natal: " . $result->name . " <br>";
        }
        echo "<br> <hr>";
    }
    ?>
    <main>


    </main>
</body>

</html>