<!DOCTYPE html>
<html lang ="hr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Luka Javor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <title>Vjezba11</title>
</head>
<body>
<p>Unesite broj: </p>
<form action="" method="post">
<input type="number" name= "number">    
</form>
<?php

function isPrime($number) {
    if ($number <= 1) {
        return false; 
    }
    if ($number == 2) {
        return true;
    }
    if ($number % 2 == 0) {
        return false; 
    }
    
    for ($i = 3; $i <= sqrt($number); $i += 2) {
        if ($number % $i == 0) {
            return false; 
        }
    }
    return true;
}

$number = $_POST["number"];
if (isPrime($number)) {
    echo "$number je prost broj. <br />";
} else {
    echo "$number nije prost broj. <br />";
}
echo "<p>Prosti brojevi do 100 su: <br /></p>";
for ($i = 1; $i <= 100; $i++) {
    if (isPrime($i)) {
        echo $i . ", ";
    }
}
?>
</body>
</html>
