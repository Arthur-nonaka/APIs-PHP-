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
            <div>
             A
            </div>
        </div>
        <div class="main">
            <div class="particao">
                <div class="subtitle">
                    Informações
                </div>
                <hr>    
                <div class="opcoes">
                    <span>Altura média: ' . $result->average_height . '</span>
                    <span>Cor de Pele: ' . $result->skin_colors . ' </span>
                    <span>Olhos: ' . $result->eye_colors . '</span>
                </div>
                <hr>
                    <span>Designãçao: ' . $result->designation . ' </span>
            </div>
            <div class="image">
                <img src="../images/'.$result->name.'.png">
            </div>

        </div>
        '
    );
    ?>
</body>

</html>