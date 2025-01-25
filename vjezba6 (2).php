<!DOCTYPE html>
<html lang="hr">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Luka Javor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <title>Vjezba6</title>
</head>
<body>
    <form action="" method="post">
		<p><label >Kalkulator (Switch naredba)</label></p>
		<p><label for="a">Upiši prvi broj </label><input type="number" id="a" name="a" value="<?php echo isset($_POST['a']) ? $_POST['a'] : ''; ?>" ></p>
    <p><label for="b">Upiši drugi broj </label><input type="number" id="b" name="b" value="<?php echo isset($_POST['b']) ? $_POST['b'] : ''; ?>"></p>
    <p><label for="rezultat">Rezultat : </label>
    <?php
    if (isset($_POST['a']) && isset($_POST['b']) && isset($_POST['izracun'])) {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $zbroji = $a + $b;
    $oduzmi = $a - $b;
    $pomnozi = $a * $b;
    $podijeli = $a / $b;
    switch ($_POST['izracun']) {
      case 'zbroji' :
        $rezultat = $zbroji;
        print "$rezultat";
        break;
      case 'oduzmi' :
        $rezultat = $oduzmi;
        print "$rezultat";
        break;
      case 'pomnozi' :
        $rezultat = $pomnozi;
        print "$rezultat";
        break;
      case 'podijeli' :
        $rezultat = $podijeli;
        print "$rezultat";
        break;
    }
  }
    ?>    
    </p>
    <button type="submit" name= "izracun" value="zbroji">+</button>
    <button type="submit" name= "izracun" value="oduzmi">-</button>
    <button type="submit" name= "izracun" value="pomnozi">*</button>
    <button type="submit" name= "izracun" value="podijeli">/</button>
    </form>
</body>
</html>


