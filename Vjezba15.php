<!DOCTYPE html>
<html lang="hr">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Luka Javor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <title>Vjezba15</title>
</head>
<body>
    
<form method="post">
    <label for="Ime"></label>
    <input type="text" name='search'>
    <button type="submit">Pretraži</button>
    <p>Rezultat:</p>
    
    <?php
        $con=mysqli_connect("localhost", "root","","pretraga");
        $query = "SELECT firstname, lastname FROM users WHERE firstname LIKE '%" . $_POST['search'] . "%' OR lastname LIKE '%" . $_POST['search'] . "%'";
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_array($result)) {
        echo "<p>".$row['firstname'] ." ". $row['lastname']."</p>";
        }
        mysqli_close($con);
    ?>
</form>
</body>
</html>
