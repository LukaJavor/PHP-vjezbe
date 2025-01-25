

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Luka Javor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <title></title>
</head>
<body>
    <form action="" method="post">
		<p><label >Igra (pogodi broj)</label></p>
		<p><label for="a">Upiši jedan broj od 1 do 10 </label><input type="number" id="a" name="a" value= "a"></p>
    </form>
    <?php
    
    $b = rand(1,9);
    if(isset($_POST["a"]))
    {
    if ($_POST["a"] != $b) { print "<button style= 'background-color:red; width:150px'>Krivo, probaj ponovo!</button>";
                    print"<p>Zamišljeni broj je ".$b."</p>";}
    
    else {print "<button style= 'background-color:lightgreen; width:150px'>Pogodak, probaj ponovo!</button>";
            print"<p>Zamišljeni broj je ".$b."</p>";}
    ;}
    ?>    
</body>
</html>


