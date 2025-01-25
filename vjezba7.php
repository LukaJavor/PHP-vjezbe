<!DOCTYPE html>
<html lang ="hr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Luka Javor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <title>Vjezba7</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form method="post" action="">
        <p><label for="prvikol">Ocjena I kolokvija </label><input type="number" min="1" max = "5" id="prvikol" name="prvikol" required></p>
        <p><label for="drugikol">Ocjena II kolokvija </label><input type="number" min="1" max = "5" id="drugikol" name="drugikol" required></p>
        <button type="submit" value >POŠALJI</button>
        <?php 
        print "<br><br>";
        if (isset($_POST['prvikol']) && isset($_POST['drugikol'])){
            $a = $_POST['prvikol'];
            $b = $_POST['drugikol'];
            $ocjene = array($a,$b);
            $prosjek = ($ocjene[0] + $ocjene[1])/2;
            $zavrsna = round($prosjek, 0);
            if ($_POST["prvikol"] == 1) {
                $zavrsna = 1;
            }
            
            if ($_POST["drugikol"] == 1) {
                $zavrsna = 1;
            }
            print "Srednja ocjena: ".$prosjek."<br>";
            print "Konačna ocjena: ".$zavrsna;
            ;}
        ?>
        
    </form>
</body>
</html>