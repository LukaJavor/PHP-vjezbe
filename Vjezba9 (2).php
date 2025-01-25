<!DOCTYPE html>
<html lang ="hr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Luka Javor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <title>Vjezba9</title>
</head>
<body>
<?php
    function ducan($stanje=""){
    
    }
    $date = new DateTimeImmutable();
    
    if($date->format('l') == "Sunday"){
        $stanje = "trenutno zatvoren";
    }
    elseif($date->format('l') == "Saturday" && (int)$date->format('G') >= 9 && (int)$date->format('G') <= 13){
        $stanje = "trenutno otvoren";
    }
    elseif($date->format('l') != "Saturday" && $date->format('l') != "Sunday" && (int)$date->format('G') >= 8 && (int)$date->format('G') <= 19){
        $stanje = "trenutno otvoren";
    }
    else
        $stanje = "trenutno zatvoren";


    echo "Ducan je $stanje";
    echo "<br>";
    ducan();
    
?>
</body>
</html>
