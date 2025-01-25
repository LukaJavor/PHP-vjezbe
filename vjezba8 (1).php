<!DOCTYPE html>
<html lang ="hr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Luka Javor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <title>Vjezba8</title>
</head>
<body>
<form method="post" action="">
        <?php
        echo "<p>Označi vozilo: </p><ul>";
        $cars = array("Audi", "BMW", "Renault", "Citroen");
        foreach ($cars as $car)
        {
        echo "<input type='radio' name='auto' value='$car'>$car.<br>";
        }
        echo "</ul>";
        echo "<button type='submit'>POŠALJI</button>";
        if (isset($_POST['auto']))
        {
            $a = $_POST['auto'];
            echo "<br><br> Odabrano vozilo je: ".$a;
        }
        ?>
</form>
    
</body>
</html>