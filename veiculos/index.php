<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../single.css">
    <title>Veículos</title>
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
        $page = $_GET['page'];

        $url = "https://swapi.dev/api/vehicles/?page=$page";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($ch));
        foreach ($result->results as $vehicles) {
            echo "<div class='particao' style='margin: 20px;width: 30%'>";
            echo "<a href=veiculos.php?value=" . $vehicles->url . ">";
            echo $vehicles->name . "<br> <hr>";
            echo $vehicles->vehicle_class . "  <br>";
            echo "Preço: " . $vehicles->cost_in_credits;
            echo "</a>";
            echo "</div>";
        }

        ?>
    </div>
    <div class="pageButton">
        <?php
        if ($page != 1) {
            echo "<a href=?page=" . $page - 1 . ">";
            echo "<button> < </button>";
            echo "</a>";
        }
        echo $page;
        if ($page != 4) {
            echo "<a href=?page=" . $page + 1 . ">";
            echo "<button> > </button>";
            echo "</a>";
        }
        ?>
    </div>

</body>

</html>