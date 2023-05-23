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
    <div class="header" style="display: flex; justify-content: center; align-items: center">
        <a href='../'>
            <div class='logo'>
            </div>
        </a>
    </div>
    <div class="reparticao">

        <?php
        $page = $_GET['page'];

        $url = "https://swapi.dev/api/species/?page=$page";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($ch));
        $number = 1;
        foreach ($result->results as $especies) {
            echo "<div class='particao' style='margin: 20px;width: 30%'>";
            echo "<a href=species.php?value=" . $number + ($page * 10) - 10 . ">";
            echo $especies->name . "<br> <hr>";
            echo "altura média: " . $especies->average_height . " cm <br>";
            echo "Lingua: " . $especies->language . " <br>";
            if ($especies->homeworld == '') {
                echo "Planeta Natal: n/a <br>";
            } else {
                $ch = curl_init($especies->homeworld);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = json_decode(curl_exec($ch));
                echo "Planeta Natal: $result->name";
            }
            echo "</a>";
            echo "</div>";
            $number = $number + 1;
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