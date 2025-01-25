<!DOCTYPE html>
<html lang ="hr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Luka Javor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <title>Vjezba10</title>
</head>
<body>
    <h1>Zadatak str_word_count</h1>
    <form action="" method="post">
        <label for="">Ulazni niz: <br /></label>
        <input type="text" name = "a"><br />
        <button type="submit" name= "ispis" value="">ispiši broj riječi</button>
    </form>
<?php
    $a = $_POST["a"];
    $b = str_word_count($a);
    echo "ulazni niz: " .$a. " sadrži " .$b. " riječi.";   
?>
</body>
</html>
