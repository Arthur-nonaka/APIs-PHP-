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
    <div class="header" style="display: flex; justify-content: center; align-items: center">
        <a href='../'>
            <div class='logo'>
            </div>
        </a>
    </div>
    <div class="reparticao">

        <?php

        $url = "https://swapi.dev/api/films";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($ch));
        foreach ($result->results as $film) {
            echo "<div class='particao' style='margin: 20px;width: 20%'>";
            echo "<a style='display: flex; flex-direction: column;align-items: center; justify-content: center' href=filmes.php?value=" . $film->url . ">";
            echo '<img src="../images/' . $film->title . '.png" class="film-image">';
            echo "<hr>" . $film->title . "<br>";
            echo "</a>";
            echo "</div>";
        }

        ?>
    </div>

</body>

</html>