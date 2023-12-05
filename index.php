<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventi kalendárium</title>
    <link rel="stylesheet" href="./css/main.css">
</head>

<!-- 

 - kattintásra be lehessen csukni az összeset egyszerre és külön külön is

-->

<body>
    <?php
    // a tényleges mai nap, tesztnél beírható egy szám amivel ellenőrizhetem
    $date = date("j");
    $num = 25;
    $today = $date;
    // idézetek helye
    include("./data/quotes.php");

    /*
    function randomIndex($idezet) {
        $index = rand(0, count($idezet) - 1);
        return $index;
    }

    foreach($idezet as $id => $q) {
        // echo randomIndex($idezet);
        if($id === randomIndex($idezet)) {
            echo "<p>".$q["quote"]." ".$q["author"]."</p>";
        }
    }
    */

    function flipClass($i, $today, $className1, $className2) {
        if($i == $today) {
            return $className1;
        }
        elseif($i < $today) {
            return $className2;
        }
        return;
    }

    function quote($i, $today, $idezet) {
        if($i <= $today) {
            return '<article class="card_content back '.flipClass($i, $today, "card_back", "old_back").'"><div><q>'.$idezet[$i - 1]["quote"].'</q></div><div>'.$idezet[$i - 1]["author"].'</div></article>';
        }
    }

    function render($today, $idezet) {
        echo '<main class="container">';
        for($i = 1; $i <= 24; $i++) {
            echo '<section class="card">';
            echo '<article class="card_content front '.flipClass($i, $today, "card_front", "old_front").'"><div class="date">December<span class="date-num js-date-num">'. $i .'</span>.</div></article>';
            echo quote($i, $today, $idezet);
            echo '</section>';
        }
        echo '<section class="form"><article><button class="js-close-all">Teszt</button></article></section></main>';
    }

    render($today, $idezet);
    
    ?>
    <script src="./js/main.js"></script>
</body>

</html>