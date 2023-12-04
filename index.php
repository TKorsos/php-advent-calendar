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
    $num = 1;
    $today = $date;
    
    // 24 idézet
    // https://www.citatum.hu/kategoria/Lelek/3
    $idezet = [
        ["quote" => "A szem mindent megmutat, még a lélek legapróbb titkait is.", "author" => "Julia RedHood"],
        ["quote" => "A lelki sebek belül hagynak nyomot, olyan tintával, amely kitörölhetetlen.", "author" => "Charles Martin"],
        ["quote" => "Nem elég, ha az ember csak kenyérrel él, valaminek a lelkét is táplálnia kell.", "author" => "William Shatner"],
        ["quote" => "A szív a lélek mutatója.", "author" => "Hioszi Tatiosz"],
    ];

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
        $q = "xyz idézet";
        if($i <= $today) {
            return '<article class="card_content back '.flipClass($i, $today, "card_back", "old_back").'"><div><q>'.$idezet[$i - 1]["quote"].'</q></div><div>'.$idezet[$i - 1]["author"].'</div></article>';
        }
    }

    function render($today, $idezet) {
        echo '<main class="container">';
        for($i = 1; $i <= 24; $i++) {
            echo '<section class="card">';
            echo '<article class="card_content front '.flipClass($i, $today, "card_front", "old_front").'">December '.$i.'.</article>';
            echo quote($i, $today, $idezet);
            echo '</section>';
        }
        echo '</main>';
    }

    render($today, $idezet);
    
    ?>
</body>

</html>